<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BB3 - @yield('title', 'Home')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body>
    <!-- Navigation Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <!-- Logo và Tên Website -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('homepage') }}">
                <i class="bi bi-box-seam fs-3 text-primary"></i>
                <span class="logo-text">BB3</span>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-fire me-1"></i>Hot Review
                        </a>
                    </li>
                </ul>

                <!-- Right Side Menu -->
                <ul class="navbar-nav ms-auto">
                    <!-- Language Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                            id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-globe me-2"></i>
                            <span id="currentLang">
                                {{ app()->getLocale() == 'vi' ? 'Tiếng Việt' : 'English' }}
                            </span>
                        </a>
                        <ul class="dropdown-menu language-dropdown" aria-labelledby="languageDropdown">
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() == 'vi' ? 'active' : '' }}"
                                    href="#">
                                    {{-- href="{{ route('lang.switch', 'vi') }}"> --}}
                                    <i
                                        class="bi bi-check me-2 {{ app()->getLocale() != 'vi' ? 'invisible' : '' }}"></i>Tiếng
                                    Việt
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                                    href="#">
                                    {{-- href="{{ route('lang.switch', 'en') }}"> --}}
                                    <i
                                        class="bi bi-check me-2 {{ app()->getLocale() != 'en' ? 'invisible' : '' }}"></i>English
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        <!-- Login Button -->
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary px-3" href="#">
                                <i class="bi bi-box-arrow-in-right me-1"></i>{{ __('Login') }}
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item ms-2">
                                <a class="nav-link btn btn-primary text-white px-3" href="#">
                                    <i class="bi bi-person-plus me-1"></i>{{ __('Register') }}
                                </a>
                            </li>
                        @endif
                    @else
                        <!-- User Avatar Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle p-0" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=007bff&color=fff&size=32' }}"
                                    alt="Avatar" class="user-avatar">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <!-- User Info -->
                                <div class="user-info">
                                    <div class="user-name">{{ Auth::user()->name }}</div>
                                    <div class="user-phone">{{ Auth::user()->phone ?? __('Phone not updated') }}</div>
                                </div>

                                <!-- Menu Items -->
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-person-gear me-2"></i>{{ __('User Settings') }}
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item text-danger" href="#" id="logoutBtn">
                                    <i class="bi bi-box-arrow-right me-2"></i>{{ __('Logout') }}
                                </a>

                                <!-- Logout Form -->
                                <form id="logout-form" action="#" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/header.js') }}"></script>

    @stack('scripts')
</body>

</html>
