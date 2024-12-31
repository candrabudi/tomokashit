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
                                    <h5>Data Akun Pembayaran</h5>
                                    <a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal"
                                        data-bs-target="#createModal">Tambah Akun Pembayaran</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table table-centered align-middle table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Metode Pembayaran</th>
                                                <th scope="col">Nama Akun Pembayaran</th>
                                                <th scope="col">Nomor Akun Pembayaran</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($paymentAccounts as $paymentAccount)
                                                <tr>
                                                    <td>{{ $paymentAccount->paymentMethod->payment_name }}</td>
                                                    <td>{{ $paymentAccount->payment_account_name }}</td>
                                                    <td>{{ $paymentAccount->payment_account_number }}</td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $paymentAccount->payment_account_status ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $paymentAccount->payment_account_status ? 'Aktif' : 'Non-Aktif' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $paymentAccount->id }}">Edit</a>
                                                        <form
                                                            action="{{ route('system.payment.accounts.destroy', $paymentAccount->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal{{ $paymentAccount->id }}"
                                                    tabindex="-1" aria-labelledby="editModalLabel{{ $paymentAccount->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editModalLabel{{ $paymentAccount->id }}">Edit Akun
                                                                    Pembayaran</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form
                                                                action="{{ route('system.payment.accounts.update', $paymentAccount->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="payment_account_name"
                                                                            class="form-label">Nama Akun Pembayaran</label>
                                                                        <input type="text" class="form-control"
                                                                            id="payment_account_name"
                                                                            name="payment_account_name"
                                                                            value="{{ $paymentAccount->payment_account_name }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="payment_account_number"
                                                                            class="form-label">Nomor Akun Pembayaran</label>
                                                                        <input type="text" class="form-control"
                                                                            id="payment_account_number"
                                                                            name="payment_account_number"
                                                                            value="{{ $paymentAccount->payment_account_number }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="payment_account_image"
                                                                            class="form-label">Gambar Akun
                                                                            Pembayaran</label>
                                                                        <input type="file" class="form-control"
                                                                            id="payment_account_image"
                                                                            name="payment_account_image">
                                                                        @if ($paymentAccount->payment_account_image)
                                                                            <img src="{{ asset('storage/' . $paymentAccount->payment_account_image) }}"
                                                                                alt="Image" class="mt-2"
                                                                                style="max-height: 100px;">
                                                                        @endif
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="payment_account_status"
                                                                            class="form-label">Status Akun</label>
                                                                        <select class="form-select"
                                                                            id="payment_account_status"
                                                                            name="payment_account_status" required>
                                                                            <option value="1"
                                                                                {{ $paymentAccount->payment_account_status == 1 ? 'selected' : '' }}>
                                                                                Aktif</option>
                                                                            <option value="0"
                                                                                {{ $paymentAccount->payment_account_status == 0 ? 'selected' : '' }}>
                                                                                Non-Aktif</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Akun Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('system.payment.accounts.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="payment_account_name" class="form-label">Pilih Pembayaran</label>
                            <select name="payment_method_id" class="form-control" id="">
                                <option value="">Pilih Payment</option>
                                @foreach ($paymentMethods as $pm)
                                    <option value="{{ $pm->id }}">{{ $pm->payment_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="payment_account_name" class="form-label">Nama Akun Pembayaran</label>
                            <input type="text" class="form-control" id="payment_account_name"
                                name="payment_account_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="payment_account_number" class="form-label">Nomor Akun Pembayaran</label>
                            <input type="text" class="form-control" id="payment_account_number"
                                name="payment_account_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="payment_account_image" class="form-label">Gambar Akun Pembayaran</label>
                            <input type="file" class="form-control" id="payment_account_image"
                                name="payment_account_image">
                        </div>
                        <div class="mb-3">
                            <label for="payment_account_status" class="form-label">Status Akun</label>
                            <select class="form-select" id="payment_account_status" name="payment_account_status"
                                required>
                                <option value="1">Aktif</option>
                                <option value="0">Non-Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
