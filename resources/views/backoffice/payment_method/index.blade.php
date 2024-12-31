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
                                    <h5>Data Metode Pembayaran</h5>
                                    <a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Metode Pembayaran</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table table-centered align-middle table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Kode Pembayaran</th>
                                                <th scope="col">Nama Pembayaran</th>
                                                <th scope="col">Jenis Pembayaran</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($paymentMethods as $paymentMethod)
                                            <tr>
                                                <td>{{ $paymentMethod->payment_code }}</td>
                                                <td>{{ $paymentMethod->payment_name }}</td>
                                                <td>{{ ucfirst($paymentMethod->payment_type) }}</td>
                                                <td>
                                                    <span class="badge {{ $paymentMethod->payment_status ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $paymentMethod->payment_status ? 'Aktif' : 'Non-Aktif' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $paymentMethod->id }}">Edit</a>
                                                    <form action="{{ route('system.payment.method.destroy', $paymentMethod->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal{{ $paymentMethod->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $paymentMethod->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $paymentMethod->id }}">Edit Metode Pembayaran</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('system.payment.method.update', $paymentMethod->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="payment_code" class="form-label">Kode Pembayaran</label>
                                                                    <input type="text" class="form-control" id="payment_code" name="payment_code" value="{{ $paymentMethod->payment_code }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="payment_name" class="form-label">Nama Pembayaran</label>
                                                                    <input type="text" class="form-control" id="payment_name" name="payment_name" value="{{ $paymentMethod->payment_name }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="payment_type" class="form-label">Jenis Pembayaran</label>
                                                                    <select class="form-select" id="payment_type" name="payment_type" required>
                                                                        <option value="bank" {{ $paymentMethod->payment_type == 'bank' ? 'selected' : '' }}>Bank</option>
                                                                        <option value="ewallet" {{ $paymentMethod->payment_type == 'ewallet' ? 'selected' : '' }}>E-wallet</option>
                                                                        <option value="qris" {{ $paymentMethod->payment_type == 'qris' ? 'selected' : '' }}>QRIS</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="payment_status" class="form-label">Status</label>
                                                                    <select class="form-select" id="payment_status" name="payment_status" required>
                                                                        <option value="1" {{ $paymentMethod->payment_status == 1 ? 'selected' : '' }}>Aktif</option>
                                                                        <option value="0" {{ $paymentMethod->payment_status == 0 ? 'selected' : '' }}>Non-Aktif</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="payment_image" class="form-label">Gambar Pembayaran</label>
                                                                    <input type="file" class="form-control" id="payment_image" name="payment_image">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
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
                </div> <!-- end card-->
            </div> <!-- end .rightbar-->
        </div> <!-- end col -->
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Metode Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('system.payment.method.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="payment_code" class="form-label">Kode Pembayaran</label>
                            <input type="text" class="form-control" id="payment_code" name="payment_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="payment_name" class="form-label">Nama Pembayaran</label>
                            <input type="text" class="form-control" id="payment_name" name="payment_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="payment_type" class="form-label">Jenis Pembayaran</label>
                            <select class="form-select" id="payment_type" name="payment_type" required>
                                <option value="bank">Bank</option>
                                <option value="ewallet">E-wallet</option>
                                <option value="qris">QRIS</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="payment_status" class="form-label">Status</label>
                            <select class="form-select" id="payment_status" name="payment_status" required>
                                <option value="1">Aktif</option>
                                <option value="0">Non-Aktif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="payment_image" class="form-label">Gambar Pembayaran</label>
                            <input type="file" class="form-control" id="payment_image" name="payment_image">
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
