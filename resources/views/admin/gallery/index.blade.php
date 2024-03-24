@extends('admin._layout.app')

@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Foto Gallery</h5>
                    <!-- add button tambah berita -->
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary mb-3">Tambah Gambar</a>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Nama Gambar</th>
                                <th>Created Date</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $item)
                            <tr>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.gallery.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <form id="deleteForm" action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>

@push('js')
<script>
    function confirmDelete() {
        if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@endpush

@endsection