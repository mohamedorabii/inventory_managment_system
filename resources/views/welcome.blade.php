<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inventory_M_System') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            --page-bg: #0f172a;
            --page-bg-soft: #111827;
            --surface: rgba(15, 23, 42, 0.72);
            --surface-border: rgba(255, 255, 255, 0.09);
            --accent: #38bdf8;
            --accent-strong: #0ea5e9;
            --text-main: #e2e8f0;
            --text-muted: #94a3b8;
        }

        html, body {
            min-height: 100%;
        }

        body {
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(56, 189, 248, 0.22), transparent 28%),
                radial-gradient(circle at 85% 15%, rgba(14, 165, 233, 0.16), transparent 22%),
                linear-gradient(160deg, var(--page-bg) 0%, #020617 100%);
            color: var(--text-main);
        }

        .hero-shell {
            position: relative;
            overflow: hidden;
        }

        .hero-shell::before,
        .hero-shell::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            filter: blur(18px);
            pointer-events: none;
        }

        .hero-shell::before {
            width: 240px;
            height: 240px;
            right: -70px;
            top: 120px;
            background: rgba(56, 189, 248, 0.14);
        }

        .hero-shell::after {
            width: 180px;
            height: 180px;
            left: -50px;
            bottom: 120px;
            background: rgba(15, 118, 110, 0.16);
        }

        .glass-card {
            background: var(--surface);
            border: 1px solid var(--surface-border);
            backdrop-filter: blur(14px);
            box-shadow: 0 24px 80px rgba(2, 6, 23, 0.35);
        }

        .text-muted-soft {
            color: var(--text-muted) !important;
        }

        .brand-badge {
            width: 44px;
            height: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-strong) 100%);
            box-shadow: 0 18px 40px rgba(14, 165, 233, 0.3);
        }

        .feature-icon {
            width: 46px;
            height: 46px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: rgba(56, 189, 248, 0.12);
            color: #7dd3fc;
        }

        .hero-title {
            letter-spacing: -0.04em;
            line-height: 0.95;
        }

        .stat-pill {
            min-width: 120px;
            border: 1px solid rgba(148, 163, 184, 0.18);
            background: rgba(15, 23, 42, 0.55);
        }
    </style>
</head>
<body>
    <div class="hero-shell min-vh-100 d-flex flex-column">
        <nav class="navbar navbar-expand-lg navbar-dark py-4">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-3 fw-bold" href="{{ url('/') }}">
                    <span class="brand-badge text-white">I</span>
                    <span>{{ config('app.name', 'Inventory_M_System') }}</span>
                </a>

                <div class="ms-auto d-flex align-items-center gap-2">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-outline-light rounded-pill px-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light rounded-pill px-4">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-info rounded-pill px-4 fw-semibold text-white">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </nav>

        <main class="container flex-grow-1 d-flex align-items-center py-4 py-lg-5">
            <div class="row align-items-center g-4 g-lg-5 w-100">
                <div class="col-lg-6">
                    <div class="d-inline-flex align-items-center gap-2 rounded-pill px-3 py-2 mb-4 glass-card text-uppercase small fw-semibold text-info">
                        <span class="feature-icon me-1" style="width: 30px; height: 30px; border-radius: 999px;">+</span>
                        Inventory Management System
                    </div>

                    <h1 class="display-3 fw-bold hero-title mb-4">
                        نظم المخزون
                        <span class="d-block text-info">بشكل أوضح وأسرع</span>
                    </h1>

                    <p class="lead text-muted-soft col-lg-11 mb-4">
                        لوحة دخول بسيطة وواضحة لإدارة المنتجات، متابعة المخزون، وتنظيم العمليات اليومية من مكان واحد.
                    </p>

                    <div class="d-flex flex-wrap gap-3 mb-4">
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-info btn-lg rounded-pill px-4 fw-semibold text-white">Open Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-info btn-lg rounded-pill px-4 fw-semibold text-white">Get Started</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg rounded-pill px-4 fw-semibold">Create Account</a>
                            @endif
                        @endauth
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <div class="stat-pill rounded-4 px-4 py-3">
                            <div class="fw-bold fs-4">24/7</div>
                            <div class="small text-muted-soft">Inventory visibility</div>
                        </div>
                        <div class="stat-pill rounded-4 px-4 py-3">
                            <div class="fw-bold fs-4">Fast</div>
                            <div class="small text-muted-soft">Workflow access</div>
                        </div>
                        <div class="stat-pill rounded-4 px-4 py-3">
                            <div class="fw-bold fs-4">Simple</div>
                            <div class="small text-muted-soft">Clean interface</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="glass-card rounded-5 p-4 p-lg-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <div class="small text-muted-soft text-uppercase fw-semibold">Overview</div>
                                <div class="h4 mb-0 fw-semibold">Quick operations board</div>
                            </div>
                            <span class="badge rounded-pill text-bg-info px-3 py-2">Live</span>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="glass-card rounded-4 p-3 h-100">
                                    <div class="feature-icon mb-3 fw-bold">P</div>
                                    <div class="fw-semibold mb-1">Products</div>
                                    <div class="small text-muted-soft">Track stock and item status with clarity.</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="glass-card rounded-4 p-3 h-100">
                                    <div class="feature-icon mb-3 fw-bold">R</div>
                                    <div class="fw-semibold mb-1">Reports</div>
                                    <div class="small text-muted-soft">Keep an eye on movement and totals.</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="glass-card rounded-4 p-3 h-100">
                                    <div class="feature-icon mb-3 fw-bold">U</div>
                                    <div class="fw-semibold mb-1">Users</div>
                                    <div class="small text-muted-soft">Manage access and responsibilities.</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="glass-card rounded-4 p-3 h-100">
                                    <div class="feature-icon mb-3 fw-bold">S</div>
                                    <div class="fw-semibold mb-1">Secure</div>
                                    <div class="small text-muted-soft">Built on Inventory_M_System auth and sessions.</div>
                                </div>
                            </div>
                        </div>

                        <div class="glass-card rounded-4 p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <div class="small text-muted-soft text-uppercase fw-semibold">Next step</div>
                                    <div class="fw-semibold">Jump into the dashboard</div>
                                </div>
                                <i class="bi bi-arrow-right fs-4 text-info"></i>
                            </div>
                            <div class="small text-muted-soft">
                                Start by signing in, then use the dashboard as your central inventory workspace.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
