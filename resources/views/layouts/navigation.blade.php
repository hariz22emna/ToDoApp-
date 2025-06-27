<nav class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-4">
            <a href="{{ url('/tasks') }}" class="text-white text-decoration-none fw-bold">
                Mes Tâches
            </a>
        </div>

        <div class="d-flex align-items-center gap-3">
            <span>{{ Auth::user()->name }}</span>
         <form method="POST" action="{{ route('logout') }}" class="d-inline" onsubmit="return confirm('Souhaitez-vous vraiment vous déconnecter ?')">
    @csrf
    <button type="submit" class="btn btn-outline-light btn-sm">Déconnexion</button>
</form>

        </div>
    </div>
</nav>
