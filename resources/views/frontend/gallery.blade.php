@extends('frontend.layout.app')
@section('content')

@include('frontend.partials.page_banner', ['title' => 'Photo Gallery', 'breadcrumb' => 'Gallery'])

<section class="py-5" style="background:#f8f4f8;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Our Gallery</h2>
            <p class="section-subtitle mt-3">Glimpses of life at K.S.V.M. Education Centre</p>
        </div>

        @if($gallery->count() > 0)
        <div class="row g-3" id="galleryGrid">
            @foreach($gallery as $item)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="gallery-card" onclick="openLightbox('{{ public_asset('images/'.$item->image) }}', '{{ $item->title }}')">
                    <div class="gallery-img-wrap">
                        <img src="{{ public_asset('images/'.$item->image) }}" alt="{{ $item->title }}" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-overlay-content">
                                <i class="fas fa-search-plus"></i>
                                <p>{{ $item->title }}</p>
                            </div>
                        </div>
                    </div>
                    @if($item->title)
                    <div class="gallery-caption">{{ $item->title }}</div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-images fa-4x text-muted mb-3 d-block"></i>
            <h5 class="text-muted">Gallery coming soon...</h5>
        </div>
        @endif
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightboxModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.92); z-index:99999; align-items:center; justify-content:center;">
    <button onclick="closeLightbox()" style="position:absolute; top:20px; right:25px; background:none; border:none; color:#fff; font-size:32px; cursor:pointer; z-index:2;">&times;</button>
    <button onclick="prevImg()" style="position:absolute; left:20px; top:50%; transform:translateY(-50%); background:rgba(255,255,255,0.1); border:none; color:#fff; font-size:24px; padding:12px 16px; border-radius:50%; cursor:pointer;">&#8249;</button>
    <button onclick="nextImg()" style="position:absolute; right:20px; top:50%; transform:translateY(-50%); background:rgba(255,255,255,0.1); border:none; color:#fff; font-size:24px; padding:12px 16px; border-radius:50%; cursor:pointer;">&#8250;</button>
    <div style="text-align:center; max-width:90vw; max-height:90vh;">
        <img id="lightboxImg" src="" alt="" style="max-width:100%; max-height:80vh; border-radius:8px; box-shadow:0 20px 60px rgba(0,0,0,0.5);">
        <p id="lightboxCaption" style="color:#fff; margin-top:12px; font-size:16px;"></p>
    </div>
</div>

<style>
.gallery-card {
    cursor: pointer;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transition: transform 0.3s, box-shadow 0.3s;
    background: #fff;
}
.gallery-card:hover { transform: translateY(-5px); box-shadow: 0 12px 30px rgba(122,26,88,0.2); }
.gallery-img-wrap { position: relative; overflow: hidden; aspect-ratio: 4/3; }
.gallery-img-wrap img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; }
.gallery-card:hover .gallery-img-wrap img { transform: scale(1.08); }
.gallery-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(122,26,88,0.85), rgba(90,18,64,0.85));
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transition: opacity 0.3s;
}
.gallery-card:hover .gallery-overlay { opacity: 1; }
.gallery-overlay-content { text-align: center; color: #fff; }
.gallery-overlay-content i { font-size: 32px; margin-bottom: 8px; display: block; }
.gallery-overlay-content p { font-size: 14px; font-weight: 500; margin: 0; }
.gallery-caption { padding: 10px 14px; font-size: 13px; font-weight: 500; color: #444; background: #fff; }
</style>

<script>
var galleryImages = [
    @foreach($gallery as $item)
    { src: '{{ public_asset('images/'.$item->image) }}', caption: '{{ addslashes($item->title) }}' },
    @endforeach
];
var currentIndex = 0;

function openLightbox(src, caption) {
    currentIndex = galleryImages.findIndex(function(img) { return img.src === src; });
    document.getElementById('lightboxImg').src = src;
    document.getElementById('lightboxCaption').textContent = caption;
    document.getElementById('lightboxModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightboxModal').style.display = 'none';
    document.body.style.overflow = '';
}
function prevImg() {
    currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
    document.getElementById('lightboxImg').src = galleryImages[currentIndex].src;
    document.getElementById('lightboxCaption').textContent = galleryImages[currentIndex].caption;
}
function nextImg() {
    currentIndex = (currentIndex + 1) % galleryImages.length;
    document.getElementById('lightboxImg').src = galleryImages[currentIndex].src;
    document.getElementById('lightboxCaption').textContent = galleryImages[currentIndex].caption;
}
document.getElementById('lightboxModal').addEventListener('click', function(e) {
    if (e.target === this) closeLightbox();
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft') prevImg();
    if (e.key === 'ArrowRight') nextImg();
});
</script>
@endsection
