{{-- Usage: @include('frontend.partials.page_banner', ['title' => 'Page Title', 'breadcrumb' => 'Page Name']) --}}
<div class="page-banner">
    <div class="container">
        <h1>{{ $title ?? 'Page' }}</h1>
        <nav class="breadcrumb-nav">
            <a href="{{ route('home.index') }}">Home</a>
            <span class="mx-2">›</span>
            <span>{{ $breadcrumb ?? $title ?? 'Page' }}</span>
        </nav>
    </div>
</div>
