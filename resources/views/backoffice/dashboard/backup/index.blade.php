@extends('backoffice.layouts.app')

@section('content')
    <div class="row">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted mb-0 fs-13">Total Deposit</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-success fs-14 mb-0">
                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold mb-4">Rp 500.0000</h4>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-success-subtle rounded fs-3">
                                    <i class="bx bx-dollar-circle text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate bg-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-white-50 mb-0 fs-13">Total Withdraw</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold mb-4 text-white">Rp 100.000</h4>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle rounded fs-3">
                                    <i class="bx bx-wallet text-primary"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted mb-0 fs-13">Penghasilan</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold mb-4">+Rp 400.000</h4>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle rounded fs-3">
                                    <i class="bx bx-wallet text-primary"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted mb-0 fs-13">Total Member</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-muted fs-14 mb-0">
                                    +0.00 %
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold mb-4">100</h4>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle rounded fs-3">
                                    <i class="bx bx-user-cricle text-primary"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('backoffice.dashboard.components.deposit')
        @include('backoffice.dashboard.components.withdraw')
    </div>
    <div class="row">
        @include('backoffice.dashboard.components.user_promotion')
        @include('backoffice.dashboard.components.user')
    </div>

    @include('backoffice.dashboard.components.modal_deposit')
    @include('backoffice.dashboard.components.modal_withdraw')


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/8.3.0/pusher.min.js"
        integrity="sha512-tXL5mrkSoP49uQf2jO0LbvzMyFgki//znmq0wYXGq94gVF6TU0QlrSbwGuPpKTeN1mIjReeqKZ4/NJPjHN1d2Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            var pusher = new Pusher('45bce0ee5985f73b967f', {
                cluster: 'ap1',
                encrypted: true
            });

            var channel = pusher.subscribe('transaction-deposit-channel');

            channel.bind('transaction-deposit-created', function(data) {
                fetchDepositPendingTransactions();
            });

            function fetchDepositPendingTransactions(query = '') {
                $.ajax({
                    url: '/system/dashboard/deposit/pending/list',
                    method: 'GET',
                    data: {
                        query: query,
                        per_page: 10
                    },
                    success: function(response) {
                        let transactions = response.data;
                        let total = response.total;

                        let tableBody = '';

                        transactions.forEach(function(transaction) {
                            tableBody += `<tr>
                                <td><a href="#!" class="fw-medium link-primary">#${transaction.transaction_number}</a></td>
                                <td>${transaction.user_member.username}</td>
                                <td>${transaction.payment_account.payment_account_name}</td>
                                <td>${transaction.payment_account.payment_account_number}</td>
                                <td>Rp ${transaction.nominal}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" 
                                        data-bs-toggle="modal" data-bs-target="#updateStatusModal" 
                                        data-id="${transaction.id}" 
                                        data-status="${transaction.transaction_status}">Update</button>
                                    <button type="button" class="btn btn-info btn-sm" 
                                        data-bs-toggle="modal" data-bs-target="#detailDepositModal" 
                                        data-id="${transaction.id}">Detail</button>
                                </td>
                            </tr>`;
                        });

                        $('#transaction-deposit-pending').html(tableBody);
                        $('#showing-count-deposit-pending').text(transactions.length);
                        $('#total-count-deposit-pending').text(total);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching transactions:', error);
                    }
                });
            }

            fetchDepositPendingTransactions();


            $('#search-input').on('input', function() {
                let query = $(this).val();
                fetchDepositPendingTransactions(query);
            });

            $('#updateStatusModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let transactionId = button.data('id');
                let transactionStatus = button.data('status');

                let modal = $(this);
                modal.find('#transactionId').val(transactionId);
                modal.find('#transactionStatus').val(transactionStatus);
            });

            $('#updateStatusForm').on('submit', function(event) {
                event.preventDefault();

                let transactionId = $('#transactionId').val();
                let newStatus = $('#transactionStatus').val();

                $.ajax({
                    url: `/system/dashboard/deposit/update/${transactionId}`,
                    method: 'POST',
                    data: {
                        status: newStatus,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#updateStatusModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false
                            });
                            fetchDepositPendingTransactions();
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: xhr.responseJSON ? xhr.responseJSON.message :
                                'Terjadi kesalahan saat memperbarui status.',
                            showConfirmButton: true
                        });
                        console.error('Error updating status:', error);
                    }
                });
            });

            $('#detailDepositModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let transactionId = button.data('id');

                $.ajax({
                    url: `/system/dashboard/deposit/${transactionId}/detail`,
                    method: 'GET',
                    success: function(response) {
                        let modalContent = `
                            <p><strong>Nomor Transaksi:</strong> #${response.transaction_number}</p>
                            <p><strong>Nama User:</strong> ${response.user_member.username}</p>
                            <p><strong>Nama Lengkap User:</strong> ${response.user_member.member.full_name}</p>
                            <p><strong>Email User:</strong> ${response.user_member.email}</p>
                            <p><strong>Telepon User:</strong> ${response.user_member.member.phone_number}</p>
                            <p><strong>Bank Tujuan:</strong> ${response.payment_account.payment_account_name}</p>
                            <p><strong>Rekening Tujuan:</strong> ${response.payment_account.payment_account_number}</p>
                            <p><strong>Nominal:</strong> Rp ${response.nominal.toLocaleString()}</p>
                            <p><strong>Status:</strong> ${response.status.charAt(0).toUpperCase() + response.status.slice(1)}</p>
                        `;

                        $('#detailDepositContent').html(modalContent);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching transaction details:', error);
                    }
                });
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            function fetchWithdrawPendingTransactions(query = '') {
                $.ajax({
                    url: '/system/dashboard/withdraw/pending/list',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        let transactions =
                            response;
                        let tableBody = '';
                        let noTransactionsMessage =
                            `<tr><td colspan="6" class="text-center">Tidak ada transaksi yang ditemukan</td></tr>`;

                        if (transactions.length === 0) {
                            tableBody = noTransactionsMessage;
                        } else {
                            transactions.forEach(function(transaction) {
                                tableBody += `<tr>
                        <td><a href="#!" class="fw-medium link-primary">#${transaction.transaction_number}</a></td>
                        <td>${transaction.user_member.username}</td>
                        <td>${transaction.user_member.member_payment_account.account_name}</td>
                        <td>${transaction.user_member.member_payment_account.account_number}</td>
                        <td>Rp ${transaction.nominal}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" 
                                data-bs-toggle="modal" data-bs-target="#updateStatusWithdrawModal" 
                                data-id="${transaction.id}" 
                                data-status="${transaction.transaction_status}">Update</button>
                            <button type="button" class="btn btn-info btn-sm" 
                                data-bs-toggle="modal" data-bs-target="#detailWithdrawModal" 
                                data-id="${transaction.id}">Detail</button>
                        </td>
                    </tr>`;
                            });
                        }

                        $('#transaction-withdraw-pending').html(tableBody);
                        $('#showing-count-withdraw-pending').text(transactions.length);
                        $('#total-count-withdraw-pending').text(transactions
                            .length);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching transactions:', error);
                    }
                });
            }

            fetchWithdrawPendingTransactions();

            $('#search-input').on('input', function() {
                let query = $(this).val();
                fetchWithdrawPendingTransactions(query);
            });

            Pusher.logToConsole = true;
            var pusher = new Pusher('45bce0ee5985f73b967f', {
                cluster: 'ap1',
                forceTLS: true
            });

            var channel = pusher.subscribe('transaction-withdraw-channel');

            channel.bind('transaction-withdraw-created', function(data) {
                appendNewTransaction(data.transaction);
            });

            function appendNewTransaction(transaction) {
                let tableBody = document.getElementById('transaction-withdraw-pending');

                if (!tableBody) {
                    console.error("Table body not found!");
                    return;
                }

                let noTransactionsMessage = document.querySelector('#transaction-withdraw-pending tr .text-center');
                if (noTransactionsMessage) {
                    noTransactionsMessage.remove();
                }

                let newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td><a href="#!" class="fw-medium link-primary">#${transaction.transaction_number}</a></td>
                    <td>${transaction.user_member.username}</td>
                    <td>${transaction.user_member.member_payment_account.account_name}</td>
                    <td>${transaction.user_member.member_payment_account.account_number}</td>
                    <td>Rp ${transaction.nominal.toLocaleString()}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" 
                            data-bs-toggle="modal" data-bs-target="#updateStatusWithdrawModal" 
                            data-id="${transaction.id}" 
                            data-status="${transaction.transaction_status}">Update</button>
                        <button type="button" class="btn btn-info btn-sm" 
                            data-bs-toggle="modal" data-bs-target="#detailWithdrawModal" 
                            data-id="${transaction.id}">Detail</button>
                    </td>
                `;
                tableBody.insertBefore(newRow, tableBody.firstChild);
            }

            $('#updateStatusWithdrawModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let transactionWithdrawId = button.data('id');
                let transactionWithdrawStatus = button.data('status');

                let modal = $(this);
                modal.find('#transactionWithdrawId').val(transactionWithdrawId);
                modal.find('#transactionWithdrawStatus').val(transactionWithdrawStatus);
            });

            $('#updateStatusWithdrawForm').on('submit', function(event) {
                event.preventDefault();

                let transactionWithdrawId = $('#transactionWithdrawId').val();
                let newStatus = $('#transactionWithdrawStatus').val();

                $.ajax({
                    url: `/system/dashboard/withdraw/update/${transactionWithdrawId}`,
                    method: 'POST',
                    data: {
                        status: newStatus,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#updateStatusModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false
                            });
                            fetchWithdrawPendingTransactions();
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: xhr.responseJSON ? xhr.responseJSON.message :
                                'Terjadi kesalahan saat memperbarui status.',
                            showConfirmButton: true
                        });
                        console.error('Error updating status:', error);
                    }
                });
            });

            $('#detailWithdrawModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let transactionId = button.data('id');

                $.ajax({
                    url: `/system/dashboard/withdraw/${transactionId}/detail`,
                    method: 'GET',
                    success: function(response) {
                        let modalContent = `
                        <p><strong>Nomor Transaksi:</strong> #${response.transaction_number}</p>
                        <p><strong>Nama User:</strong> ${response.user_member.username}</p>
                        <p><strong>Nama Lengkap User:</strong> ${response.user_member.member.full_name}</p>
                        <p><strong>Email User:</strong> ${response.user_member.email}</p>
                        <p><strong>Telepon User:</strong> ${response.user_member.member.phone_number}</p>
                        <p><strong>Bank Tujuan:</strong> ${response.user_member.member_payment_account.account_name}</p>
                        <p><strong>Rekening Tujuan:</strong> ${response.user_member.member_payment_account.account_number}</p>
                        <p><strong>Nominal:</strong> Rp ${response.nominal.toLocaleString()}</p>
                        <p><strong>Status:</strong> ${response.status.charAt(0).toUpperCase() + response.status.slice(1)}</p>
                    `;

                        $('#detailWithdrawContent').html(modalContent);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching transaction details:', error);
                    }
                });
            });
        });
    </script>
@endsection
