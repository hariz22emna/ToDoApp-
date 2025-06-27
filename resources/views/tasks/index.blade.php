@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5">
    <h2 class="fw-bold">Liste des tâches</h2>
    <a href="{{ url('/tasks/create') }}" class="btn btn-success rounded-pill shadow-sm px-4 py-2">
        <i class="bi bi-plus-circle"></i> Nouvelle tâche
    </a>
</div>

@if($tasks->isEmpty())
    <div class="alert alert-info text-center py-4">
        Aucune tâche pour le moment.
    </div>
@else
    <div class="row g-4">
        @foreach ($tasks as $task)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 task-card position-relative">
                    <a href="{{ url('/tasks/' . $task->id) }}" class="text-decoration-none text-dark p-4 d-block h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-semibold mb-2">
                                {{ $task->title }}
                                <span class="badge {{ $task->is_completed ? 'bg-success' : 'bg-warning text-dark' }} ms-2">
                                    {{ $task->is_completed ? 'Terminée' : 'En cours' }}
                                </span>
                            </h5>
                            <p class="card-text text-muted small">{{ $task->description }}</p>
                        </div>
                    </a>

                    <!-- Icons actions alignées -->
                    <div class="card-footer bg-white border-0 d-flex justify-content-center gap-3 pb-3 pt-0">
                        <a href="{{ url('/tasks/' . $task->id . '/edit') }}" class="text-primary" title="Modifier">
                            <i class="bi bi-pencil-square fs-5"></i>
                        </a>

                        <form action="{{ url('/tasks/' . $task->id) }}" method="POST" onsubmit="return confirm('Supprimer cette tâche ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn p-0 border-0 text-danger" title="Supprimer">
                                <i class="bi bi-trash3 fs-5"></i>
                            </button>
                        </form>

                        @if (!$task->is_completed)
                            <form action="{{ url('/tasks/' . $task->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn p-0 border-0 text-success" title="Terminer">
                                    <i class="bi bi-check-circle fs-5"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $tasks->links('pagination::bootstrap-5') }}
    </div>
@endif
@endsection

@push('styles')
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        background: #f8f9fa;
    }

    .task-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 1rem;
        background-color: #fff;
    }

    .task-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.1);
    }

    .card-title {
        font-size: 1.1rem;
        font-weight: 600;
    }

    .card-footer i {
        transition: transform 0.2s ease;
        cursor: pointer;
    }

    .card-footer i:hover {
        transform: scale(1.2);
    }

    .btn:focus {
        outline: none;
        box-shadow: none;
    }

    .btn:active {
        transform: scale(0.95);
    }
</style>
@endpush

@push('scripts')
<!-- Bootstrap JS if not already in layout -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush
