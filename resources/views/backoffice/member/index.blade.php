@extends('backoffice.layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Data <i class="baseline-system_update"></i> Member</h5>
                                    <div class="d-flex">
                                        <input type="text" id="search-input" class="form-control me-2"
                                            placeholder="Search username..." style="width: 200px;">
                                        <select id="per-page-select" class="form-select" style="width: 100px;">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table table-centered align-middle table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">IP Address Register</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Lock</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="user-table-body">

                                        </tbody>
                                    </table>
                                </div>
                                <div id="pagination-links" class="mt-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            function loadUsers(page = 1, query = '', perPage = 10) {
                $('#user-table-body').html('<tr><td colspan="6" class="text-center">Loading...</td></tr>');

                $.ajax({
                    url: "{{ route('system.member.getAllUsers') }}",
                    type: 'GET',
                    data: {
                        page: page,
                        query: query,
                        per_page: perPage
                    },
                    success: function(response) {
                        let usersHtml = '';

                        if (response.data.length > 0) {
                            $.each(response.data, function(index, user) {
                                usersHtml += `<tr>
                                <td>${user.username}</td>
                                <td>${user.email}</td>
                                <td>${user.ip_address}</td>
                                <td>${user.status}</td>
                                <td>${user.is_locked ? 'Yes' : 'No'}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>`;
                            });
                        } else {
                            usersHtml =
                                '<tr><td colspan="6" class="text-center">No users found.</td></tr>';
                        }

                        $('#user-table-body').html(usersHtml);

                        // Menambahkan pagination
                        let paginationHtml =
                            '<div class="row align-items-center mt-4 pt-2 gy-2 text-center text-sm-start">';
                        paginationHtml += '<div class="col-sm">';
                        paginationHtml +=
                            `<div class="text-muted">Showing <span class="fw-semibold">${response.from || 0}</span> to <span class="fw-semibold">${response.to || 0}</span> of <span class="fw-semibold">${response.total}</span> Results</div>`;
                        paginationHtml += '</div>';
                        paginationHtml += '<div class="col-sm-auto">';
                        paginationHtml +=
                            '<ul class="pagination pagination-separated pagination-sm mb-0 justify-content-center justify-content-sm-start">';

                        if (response.prev_page_url) {
                            paginationHtml += `<li class="page-item">
                            <a class="page-link" href="#" data-page="${response.current_page - 1}">←</a>
                        </li>`;
                        }

                        for (let i = 1; i <= response.last_page; i++) {
                            let activeClass = response.current_page === i ? 'active' : '';
                            paginationHtml += `<li class="page-item ${activeClass}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>`;
                        }

                        if (response.next_page_url) {
                            paginationHtml += `<li class="page-item">
                            <a class="page-link" href="#" data-page="${response.current_page + 1}">→</a>
                        </li>`;
                        }

                        paginationHtml += '</ul></div></div>';
                        $('#pagination-links').html(paginationHtml);
                    }
                });
            }

            // Load data pertama kali
            loadUsers();
        });
    </script>
@endsection
