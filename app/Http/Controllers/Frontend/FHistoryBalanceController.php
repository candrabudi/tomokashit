<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FHistoryBalanceController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->user()->id; // Get the logged-in user ID
    
        // Get the filter from the request, default to 'semua' (all)
        $filter = $request->get('filter', 'semua');
        
        // Initialize the query for transactions
        $query = Transaction::where('user_id', $userId);
    
        // Apply date range filter based on the filter selected
        switch ($filter) {
            case 'hari-ini':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'kemarin':
                $query->whereDate('created_at', Carbon::yesterday());
                break;
            case '7-hari-terakhir':
                $query->whereBetween('created_at', [Carbon::today()->subDays(7), Carbon::now()]);
                break;
            case '30-hari-terakhir':
                $query->whereBetween('created_at', [Carbon::today()->subDays(30), Carbon::now()]);
                break;
            default:
                // Do nothing, fetch all transactions
                break;
        }
    
        // Paginate the filtered results
        $transactions = $query->paginate(10);
    
        return view('frontend.history_balance.index', compact('transactions', 'filter'));
    }
}
