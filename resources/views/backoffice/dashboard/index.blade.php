@extends('backoffice.layouts.app')

@section('content')
    <div class="row">
        @include('backoffice.dashboard.components.card')
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/system/dashboard/summary',
                type: 'GET',
                success: function(response) {
                    $('#total-deposit').text('Rp ' + formatCurrency(response.total_deposit));
                    $('#total-withdraw').text('Rp ' + formatCurrency(response.total_withdraw));
                    $('#penghasil').text('Rp ' + formatCurrency(response.penghasil));
                    $('#total-member').text(response.total_member);
                },
                error: function(error) {
                    console.log('Error fetching dashboard summary:', error);
                }
            });

            function formatCurrency(amount) {
                return amount.toLocaleString('id-ID');
            }
        });
    </script>
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
                        let noTransactionsMessage =
                            `<tr><td colspan="6" class="text-center">Tidak ada transaksi yang ditemukan</td></tr>`;

                        if (transactions.length === 0) {
                            tableBody = noTransactionsMessage;
                        } else {
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
                        }

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
                fetchWithdrawPendingTransactions();
            });


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
                            $('#updateStatusWithdrawModal').modal('hide');
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
    <!-- Modal for Member Details -->
    <div class="modal fade" id="memberDetailModal" tabindex="-1" aria-labelledby="memberDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="memberDetailModalLabel">Member Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="detail-content"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Member Lock Confirmation -->
    <div class="modal fade" id="confirmLockModal" tabindex="-1" aria-labelledby="confirmLockModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmLockModalLabel">Konfirmasi Kunci Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin mengunci member ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmLockBtn">Kunci Member</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedMemberId = null; // To store the selected member ID for locking

        function fetchDataMemberList(page = 1) {
            const search = $('#search').val();
            const limit = 10;
            const offset = (page - 1) * limit;

            $.ajax({
                url: '/system/dashboard/member/list',
                type: 'GET',
                data: {
                    search: search,
                    limit: limit,
                    offset: offset,
                },
                success: function(response) {
                    const members = response.data;
                    const total = response.total;

                    const tbody = $('#member-list');
                    tbody.empty();
                    members.forEach(member => {
                        tbody.append(`
                        <tr>
                            <td><a href="#!" class="fw-medium link-primary">${member.id}</a></td>
                            <td>${member.username}</td>
                            <td>${member.ip_address}</td>
                            <td>${member.email}</td>
                            <td>${member.member.full_name}</td>
                            <td>${member.member.phone_number}</td>
                            <td>${member.member.bank}</td>
                            <td>${member.member.account_number}</td>
                            <td>Rp ${member.member.balance}</td>
                            <td>${member.last_login}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" onclick="openLockModal(${member.id})">Kunci Member</button>
                                <button type="button" class="btn btn-info btn-sm" onclick="showMemberDetails(${member.id})">Detail</button>
                            </td>
                        </tr>
                    `);
                    });

                    $('#showing-results').text(members.length);
                    $('#total-results').text(total);

                    // Update pagination
                    const totalPages = Math.ceil(total / limit);
                    const pagination = $('#pagination');
                    pagination.empty();

                    for (let i = 1; i <= totalPages; i++) {
                        pagination.append(`
                        <li class="page-item ${i === page ? 'active' : ''}">
                            <a href="#" class="page-link" onclick="fetchDataMemberList(${i})">${i}</a>
                        </li>
                    `);
                    }
                },
                error: function(error) {
                    console.error('Error fetching member list:', error);
                }
            });
        }

        // Show member details in a modal
        function showMemberDetails(memberId) {
            $.ajax({
                url: `/system/dashboard/member/detail/${memberId}`,
                type: 'GET',
                success: function(response) {
                    const member = response.data;

                    $('#detail-content').html(`
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-3 text-center">${member.member.full_name}</h5>
                                <p class="text-muted text-center mb-4">${member.username}</p>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Email:</strong>
                                        <p>${member.email}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Phone Number:</strong>
                                        <p>${member.member.phone_number}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Bank:</strong>
                                        <p>${member.member.bank}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Account Number:</strong>
                                        <p>${member.member.account_number}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Balance:</strong>
                                        <p>Rp ${member.member.balance}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Last Login:</strong>
                                        <p>${member.last_login}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);

                    // Menampilkan modal
                    $('#memberDetailModal').modal('show');
                },
                error: function(error) {
                    console.error('Error fetching member details:', error);
                }
            });
        }


        function openLockModal(memberId) {
            selectedMemberId = memberId;
            $('#confirmLockModal').modal('show');
        }

        $('#confirmLockBtn').on('click', function() {
            if (selectedMemberId) {
                $.ajax({
                    url: `/system/dashboard/member/lock/${selectedMemberId}`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Member berhasil dikunci.');
                        $('#confirmLockModal').modal('hide');
                        fetchDataMemberList();
                    },
                    error: function(error) {
                        console.error('Error locking member:', error);
                    }
                });
            }
        });

        $(document).ready(function() {
            fetchDataMemberList();
        });
    </script>
@endsection
