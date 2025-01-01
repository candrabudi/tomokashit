<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportTransactionController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->start_date ?? Carbon::now()->subDays(30)->format('Y-m-d');
        $endDate = $request->end_date ?? Carbon::now()->format('Y-m-d');
        $searchTerm = $request->search_term ?? '';

        $query = Transaction::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where(function ($query) use ($searchTerm) {
                $query->where('id', 'like', "%$searchTerm%")
                      ->orWhere('notes', 'like', "%$searchTerm%")
                      ->orWhere('reason', 'like', "%$searchTerm%");
            });

        $totalTransactions = $query->count();

        $perPage = 15;
        $currentPage = $request->input('page', 1);
        $skip = ($currentPage - 1) * $perPage;

        $transactions = $query->skip($skip)->take($perPage)->get();

        $totalPages = ceil($totalTransactions / $perPage);

        $groupedTransactions = $transactions->groupBy('type');

        return view('backoffice.transaction.report', compact('groupedTransactions', 'transactions', 'startDate', 'endDate', 'searchTerm', 'currentPage', 'totalPages', 'totalTransactions', 'perPage'));
    }
}
