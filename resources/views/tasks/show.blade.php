@extends('layout')

@section('content')
<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow-lg rounded-4 p-5 w-100" style="max-width: 700px; background: #ffffff;">
        <h2 class="fw-bold text-center mb-4">{{ $task->title }}</h2>

        <p class="text-muted text-center fs-6 mb-4">{{ $task->description }}</p>

        <div class="text-center mb-4">
            <span class="badge {{ $task->is_completed ? 'bg-success' : 'bg-warning text-dark' }} px-4 py-2 fs-6 rounded-pill">
                {{ $task->is_completed ? '✔️ Terminée' : ' En cours' }}
            </span>
        </div>

        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ url('/tasks') }}" class="btn btn-outline-secondary rounded-pill px-4">
                ← Retour
            </a>

            <a href="{{ url('/tasks/' . $task->id . '/edit') }}" class="btn btn-primary rounded-pill px-4">
                Modifier
            </a>

            <form action="{{ url('/tasks/' . $task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger rounded-pill px-4">Supprimer</button>
            </form>

            @if (!$task->is_completed)
                <form action="{{ url('/tasks/' . $task->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-outline-success rounded-pill px-4">
                       Terminer la tâche
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background: linear-gradient(to bottom right, #f0f4f8, #dbe9f4);
    }

    .card {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush
