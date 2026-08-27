<header class="main-header">
    <a href="{{ route('home') }}" class="logo" aria-label="Go to homepage">
        <img
            src="{{ asset('images/branding/logo-v1.svg') }}"
            alt="a-mamal"
        >
    </a>

    <!-- Sidebar toggle button -->
    <button class="sidebar-toggle" 
        aria-label="Toggle sidebar"
        aria-expanded="false"
        aria-controls="site-nav">
        <svg viewBox="0 0 24 24">
            <path d="M6 7L18 7" />
            <path d="M6 12L18 12" />
            <path d="M6 17L18 17" />
        </svg>
        <span class="site-nav-label">Menu</span>
    </button>

    <button id="theme-toggle">Switch Theme</button>

    <nav id="site-nav" class="site-nav" aria-label="Main navigation">

        <a href="{{ route('home') }}">
            <span class="nav-label">Home</span>
        </a>

        <a href="{{ route('projects') }}">
            <span class="nav-label">Projects</span>
        </a>

        <a href="{{ route('articles') }}">
            <span class="nav-label">Articles</span>
        </a>

        
        <a href="{{ route('lab') }}">
            <span class="nav-label">Lab</span>
        </a>

        <a href="{{ route('about') }}">
            <span class="nav-label">About</span>
        </a>

        <a href="{{ route('docs') }}">
            <span class="nav-label">Docs</span>
        </a>

    </nav>

</header>