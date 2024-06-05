@extends('app')
@section('content')
<div class="container">
    <h1>Ajouter une Voiture</h1>
    <form action="{{ route('voitures.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="immatriculation" class="form-label">Immatriculation</label>
            <input type="text" class="form-control" id="immatriculation" name="immatriculation" value="{{ old('immatriculation') }}" required>
        </div>

        <div class="mb-3">
            <label for="num_assurance" class="form-label">Numéro Assurance</label>
            <input type="text" class="form-control" id="num_assurance" name="num_assurance" value="{{ old('num_assurance') }}" required>
        </div>

        <div class="mb-3">
            <label for="kilometrage" class="form-label">Kilométrage</label>
            <input type="number" class="form-control" id="kilometrage" name="kilometrage" value="{{ old('kilometrage') }}" required>
        </div>

        <div class="mb-3">
            <label for="date_debut_location" class="form-label">Date Début Location</label>
            <input type="date" class="form-control" id="date_debut_location" name="date_debut_location" value="{{ old('date_debut_location') }}" required>
        </div>

        <div class="mb-3">
            <label for="date_fin_location" class="form-label">Date Fin Location</label>
            <input type="date" class="form-control" id="date_fin_location" name="date_fin_location" value="{{ old('date_fin_location') }}" required>
        </div>

        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <select class="form-select" id="client_id" name="client_id" required>
                <option value="">Sélectionner un client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
