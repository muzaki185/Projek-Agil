<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="{{ route('obat.index') }}">
            <i class="fas fa-capsules me-1"></i> ApotekApp
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarApotek" aria-controls="navbarApotek" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarApotek">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('obat.*') ? 'active text-success' : '' }}" href="{{ route('obat.index') }}">
                        <i class="fas fa-pills me-1"></i> Obat
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('customer.*') ? 'active text-success' : '' }}" href="{{ route('customer.index') }}">
                        <i class="fas fa-user-friends me-1"></i> Customer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('transaksi.*') ? 'active text-success' : '' }}" href="{{ route('transaksi.index') }}">
                        <i class="fas fa-receipt me-1"></i> Transaksi
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
