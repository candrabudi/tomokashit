@extends('backoffice.layouts.app') <!-- Assuming you're using a layout -->

@section('content')
<div class="container">
    <h2>Transaction Report</h2>

    <!-- Filters Form -->
    <form action="{{ route('system.transaction.report') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" value="{{ $startDate }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" value="{{ $endDate }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="search_term">Search</label>
                <input type="text" name="search_term" value="{{ $searchTerm }}" class="form-control" placeholder="Search Transaction ID or Notes">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Filter</button>
    </form>

    <!-- Display Cards for Each Transaction Type -->
    @foreach($groupedTransactions as $type => $transactions)
        <div class="card mt-4">
            <div class="card-header">
                <h5>{{ ucfirst($type) }} Transactions ({{ $transactions->count() }})</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($transactions as $transaction)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Transaction ID: {{ $transaction->id }}</span>
                            <span>Status: {{ ucfirst($transaction->status) }}</span>
                            <span>Amount: {{ number_format($transaction->nominal, 2) }}</span>
                            <span>{{ $transaction->created_at->format('Y-m-d H:i') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach

    <!-- Manual Pagination Controls -->
    <div class="mt-4 d-flex justify-content-between">
        <div>
            <span>Showing {{ $transactions->count() }} of {{ $totalTransactions }} transactions</span>
        </div>
        <div>
            <nav>
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if($currentPage > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ route('system.transaction.report', ['page' => $currentPage - 1, 'start_date' => $startDate, 'end_date' => $endDate, 'search_term' => $searchTerm]) }}">Previous</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                    @endif

                    <!-- Page Numbers -->
                    @for($i = 1; $i <= $totalPages; $i++)
                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link" href="{{ route('system.transaction.report', ['page' => $i, 'start_date' => $startDate, 'end_date' => $endDate, 'search_term' => $searchTerm]) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Next Page Link -->
                    @if($currentPage < $totalPages)
                        <li class="page-item">
                            <a class="page-link" href="{{ route('system.transaction.report', ['page' => $currentPage + 1, 'start_date' => $startDate, 'end_date' => $endDate, 'search_term' => $searchTerm]) }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
