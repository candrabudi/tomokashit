<div class="col-xl-12">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Data Member</h4>
            <!-- Add search input -->
            <div class="ms-3">
                <input type="text" id="search" class="form-control form-control-sm" placeholder="Search" onkeyup="fetchDataMemberList()" style="max-width: 300px;">
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive table-card">
                <table class="table table-centered align-middle table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">IP Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Nomor Handphone</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">Saldo</th>
                            <th scope="col">Terakhir Login</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="member-list">
                        <!-- Data will be inserted here via AJAX -->
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center mt-4 pt-2 gy-2 text-center text-sm-start">
                <div class="col-sm">
                    <div class="text-muted">
                        Showing <span id="showing-results">0</span> of <span id="total-results">0</span> Results
                    </div>
                </div>
                <div class="col-sm-auto">
                    <ul class="pagination pagination-separated pagination-sm mb-0 justify-content-center justify-content-sm-start" id="pagination">
                        <!-- Pagination buttons will be inserted here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
