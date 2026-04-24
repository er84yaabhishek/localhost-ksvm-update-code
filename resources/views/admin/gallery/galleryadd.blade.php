@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Add Gallery</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Gallery Management</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Add Gallery</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Add New Gallery Item</h4>
                            <a href="{{ route('admin.gallery') }}" class="btn btn-info btn-sm">
                                <i class="fas fa-arrow-left"></i> Back to Gallery
                            </a>
                        </div>
                        <div class="card-body">

                            {{-- Session Messages --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <i class="fas fa-times-circle"></i> {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    @foreach($errors->all() as $err)
                                        <div><i class="fas fa-times-circle"></i> {{ $err }}</div>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            @endif

                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    {{-- Direct POST form (no AJAX) --}}
                                    <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        {{-- Image --}}
                                        <div class="form-group">
                                            <label class="font-weight-bold">
                                                <i class="fas fa-image text-primary"></i>
                                                Image <span class="text-danger">*</span>
                                            </label>
                                            <input type="file" name="gallery_image" class="form-control"
                                                accept="image/jpeg,image/png,image/jpg,image/gif"
                                                required onchange="previewImg(this)">
                                            <small class="text-muted">Allowed: jpg, png, gif | Max: 5MB</small>
                                            <div class="mt-2" id="imgPreviewWrap" style="display:none;">
                                                <img id="imgPreview" src=""
                                                    style="max-height:200px; border-radius:8px; border:2px solid #7a1a58; padding:4px;">
                                            </div>
                                        </div>

                                        {{-- Title --}}
                                        <div class="form-group">
                                            <label class="font-weight-bold">
                                                <i class="fas fa-heading text-primary"></i>
                                                Title <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') }}"
                                                placeholder="e.g. Annual Day 2024" required>
                                        </div>

                                        {{-- YouTube URL --}}
                                        <div class="form-group">
                                            <label class="font-weight-bold">
                                                <i class="fab fa-youtube text-danger"></i>
                                                YouTube Video URL
                                                <small class="text-muted">(optional)</small>
                                            </label>
                                            <input type="url" name="youtube_url" class="form-control"
                                                value="{{ old('youtube_url') }}"
                                                placeholder="https://www.youtube.com/watch?v=XXXXXXXXX"
                                                oninput="previewYoutube(this.value)">
                                            <small class="text-muted">
                                                YouTube link paste karo — gallery mein play button dikhega
                                            </small>
                                            <div id="youtubePreview" class="mt-2" style="display:none;">
                                                <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;border-radius:8px;">
                                                    <iframe id="youtubeFrame" src="" frameborder="0"
                                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                        allowfullscreen></iframe>
                                                </div>
                                                <small class="text-success mt-1 d-block">
                                                    <i class="fas fa-check-circle"></i> YouTube video preview
                                                </small>
                                            </div>
                                        </div>

                                        {{-- Description --}}
                                        <div class="form-group">
                                            <label class="font-weight-bold">
                                                <i class="fas fa-align-left text-primary"></i>
                                                Description <small class="text-muted">(optional)</small>
                                            </label>
                                            <textarea name="description" class="form-control" rows="3"
                                                placeholder="Short description...">{{ old('description') }}</textarea>
                                        </div>

                                        <div class="form-group text-center mt-4">
                                            <button type="submit" class="btn btn-success btn-lg px-5">
                                                <i class="fas fa-upload"></i> Upload & Save
                                            </button>
                                            <a href="{{ route('admin.gallery') }}" class="btn btn-secondary btn-lg px-4 ml-2">
                                                Cancel
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imgPreview').src = e.target.result;
            document.getElementById('imgPreviewWrap').style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewYoutube(url) {
    if (!url) { document.getElementById('youtubePreview').style.display = 'none'; return; }
    var match = url.match(/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([^#&?]{11})/);
    if (match && match[1]) {
        document.getElementById('youtubeFrame').src = 'https://www.youtube.com/embed/' + match[1];
        document.getElementById('youtubePreview').style.display = 'block';
    } else {
        document.getElementById('youtubePreview').style.display = 'none';
    }
}
</script>
@endpush
