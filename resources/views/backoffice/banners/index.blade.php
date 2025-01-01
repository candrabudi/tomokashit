@extends('backoffice.layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Data Banner</h5>
                    <a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#createModal">Tambah
                        Banner</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-centered">
                            <thead>
                                <tr>
                                    <th>Nama Banner</th>
                                    <th>Gambar</th>
                                    <th>URL Redirect</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                    <tr>
                                        <td>{{ $banner->banner_name }}</td>
                                        <td><img src="{{ $banner->image }}" alt="Banner" width="100"></td>
                                        <td>{{ $banner->url_redirect ?? '-' }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $banner->status == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($banner->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $banner->id }}">Edit</a>
                                            <form action="{{ route('system.banners.destroy', $banner->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit -->
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal{{ $banner->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel{{ $banner->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $banner->id }}">Edit
                                                        Banner</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('system.banners.update', $banner->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="banner_name" class="form-label">Nama Banner</label>
                                                            <input type="text" class="form-control" id="banner_name"
                                                                name="banner_name" value="{{ $banner->banner_name }}"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="url_redirect" class="form-label">URL
                                                                Redirect</label>
                                                            <input type="text" class="form-control" id="url_redirect"
                                                                name="url_redirect" value="{{ $banner->url_redirect }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="banner_status" class="form-label">Banner
                                                                Status</label>
                                                            <select class="form-select" id="banner_status"
                                                                name="banner_status" required>
                                                                <option value="enable"
                                                                    {{ $banner->status == 'enable' ? 'selected' : '' }}>
                                                                    Enable</option>
                                                                <option value="disable"
                                                                    {{ $banner->status == 'disable' ? 'selected' : '' }}>
                                                                    Disable</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Gambar Banner</label>
                                                            <input type="file" class="form-control" id="image"
                                                                name="image">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
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
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('system.banners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="banner_name" class="form-label">Nama Banner</label>
                            <input type="text" class="form-control" id="banner_name" name="banner_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="url_redirect" class="form-label">URL Redirect</label>
                            <input type="text" class="form-control" id="url_redirect" name="url_redirect">
                        </div>
                        <div class="mb-3">
                            <label for="banner_status" class="form-label">Banner Status</label>
                            <select class="form-select" id="banner_status" name="banner_status" required>
                                <option value="enable">Enable</option>
                                <option value="disable">Disable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Banner</label>
                            <input type="file" class="form-control" id="image" name="image" required>
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
