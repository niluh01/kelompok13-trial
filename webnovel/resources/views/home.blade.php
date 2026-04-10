<!DOCTYPE html>
<html>
<head>
    <title>Web Novel</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

<!-- 🔹 Navbar -->
<nav class="navbar">
    <h2>Logo</h2>

    <div class="nav-menu">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('popular') }}">Popular</a>
        <a href="{{ route('latest') }}">Terbaru</a>

        <!-- GENRE DROPDOWN -->
        <div class="dropdown">
            <button class="dropbtn">Genre</button>
            <div class="dropdown-content">
                @forelse($genres ?? [] as $genre)
                    <a href="{{ route('novels.genre', $genre->id) }}">{{ $genre->name }}</a>
                @empty
                    <span>Horor</span>
                    <span>Aksi</span>
                    <span>Fantasy</span>
                    <span>Dll</span>
                @endforelse
            </div>
        </div>

    <div class="nav-right">
        <!-- 🔍 SEARCH -->
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="keyword" placeholder="Search..." value="{{ $keyword ?? '' }}">
        </form>

        
        @auth
            <a href="{{ route('novels.create') }}">Tulis Novel</a>
            <a href="{{ route('logout') }}">Logout</a>
        @else
            <a href="{{ route('login') }}" class="btn-login">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</nav>

<!-- 🔹 Banner -->
<section class="banner">
    <h1>LOREM IPSUM NEQUE</h1>
    <p>Rekomendasi novel terbaik untuk kamu</p>
</section>

<div class="container">

<!-- 🔹 CONDITIONAL CONTENT -->
@if(isset($novels))
    <h2>Hasil Genre</h2>
    @forelse($novels as $novel)
        <div class="card">
            <h3>{{ $novel->title }}</h3>
            <p>{{ optional($novel->user)->name ?? 'Author' }}</p>
        </div>
    @empty
        <p>Tidak ada novel untuk genre ini.</p>
    @endforelse

@else
    <!-- 🔥 DEFAULT HOME -->

    <!-- Populer -->
    <h2>Populer</h2>
    @forelse($popular ?? [] as $novel)
        <div class="card">
            <h3>{{ $novel->title }}</h3>
            <p>{{ optional($novel->user)->name ?? 'Author' }}</p>
        </div>
    @empty
        <p>Tidak ada data</p>
    @endforelse

    <!-- Terbaru -->
    <h2>Terbaru</h2>
    @forelse($latest ?? [] as $novel)
        <div class="card">
            <h3>{{ $novel->title }}</h3>
        </div>
    @empty
        <p>Tidak ada data</p>
    @endforelse

    <!-- Semua -->
    <h2>Semua</h2>
    @forelse($all ?? [] as $novel)
        <div class="card">
            <h3>{{ $novel->title }}</h3>
        </div>
    @empty
        <p>Tidak ada data</p>
    @endforelse

@endif

</div>

</body>
</html>