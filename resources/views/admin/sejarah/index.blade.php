@extends('admin._layout.app')

@section('content')
<div class="pagetitle">
    <h1>Blank Page</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Blank</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.sejarah.store') }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sejarah Editor</h5>
                        <div id="quill-editor" class="mb-3" style="height: 300px;">
                            {!! $sejarah->deskripsi ?? '' !!}
                        </div>
                        <textarea rows="3" class="mb-3 d-none" name="deskripsi" id="quill-editor-area">
                        {{ $sejarah->deskripsi ?? '' }}
                        </textarea>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Upload Gambar Sejarah</h5>
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" name="foto">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <img src="{{ asset('storage/sejarah/' . ($sejarah->foto ?? '')) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</section>

@push('js')
<script>
    var quillEditor = document.getElementById('quill-editor-area');
    document.addEventListener('DOMContentLoaded', function() {
        if (quillEditor) {
            var editor = new Quill('#quill-editor', {
                theme: 'snow'
            });
            editor.on('text-change', function() {
                quillEditor.value = editor.root.innerHTML;
            });
            quillEditor.addEventListener('input', function() {
                editor.root.innerHTML = quillEditor.value;
            });
        }
    });
</script>

<script>
    // make post ajax
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            if (confirm("Apakah Anda Yakin Ingin Menyimpan ?")) {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        alert('Data berhasil disimpan');
                        window.location.href = "{{ route('admin.sejarah.index') }}";
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert('Data gagal disimpan');
                    }
                });
            }
        });
    });
</script>
@endpush

@endsection