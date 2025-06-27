@extends('layout')

@section('content')
    <h2 class="mb-4"> Ajouter une nouvelle tâche</h2>

    <form action="{{ url('/tasks') }}" method="POST" class="bg-white p-4 shadow rounded">
        @csrf

        <div class="mb-3">
 <label for="title" class="form-label">Titre <span class="text-danger">*</span> :</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Entrez le titre de la tâche" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Entrez une description (facultatif)"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ url('/tasks') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
