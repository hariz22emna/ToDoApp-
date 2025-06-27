@extends('layout')

@section('content')
    <h2 class="mb-4">Modifier la tâche</h2>

    <form action="{{ url('/tasks/' . $task->id) }}" method="POST" class="bg-white p-4 shadow rounded">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titre :</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ $task->description }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_completed" id="is_completed" class="form-check-input"
                   {{ $task->is_completed ? 'checked' : '' }}>
            <label for="is_completed" class="form-check-label">
                Marquer comme terminée
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ url('/tasks') }}" class="btn btn-secondary"> Annuler</a>
    </form>
@endsection
