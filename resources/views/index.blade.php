<!-- resources/views/voitures/index.blade.php -->

@extends('app')

@section('content')
<div class="container">
    <h1>Liste des Voitures</h1>

    <div class="mb-3">
        <a href="{{ route('voitures.create') }}" class="btn btn-primary">Ajouter une Voiture</a>
    </div>

    @if($voitures->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Immatriculation</th>
                    <th>Numéro Assurance</th>
                    <th>Kilométrage</th>
                    <th>Date Début Location</th>
                    <th>Date Fin Location</th>
                    <th>Client</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($voitures as $voiture)
                    <tr>
                        <td>{{ $voiture->immatriculation }}</td>
                        <td>{{ $voiture->num_assurance }}</td>
                        <td>{{ $voiture->kilometrage }}</td>
                        <td>{{ $voiture->date_debut_location }}</td>
                        <td>{{ $voiture->date_fin_location }}</td>
                        <td>{{ $voiture->client->nom  }}</td>
                        <td>
                            <a href="{{ route('voitures.show', $voiture->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('voitures.edit', $voiture->id) }}" class="btn btn-warning btn-sm">Éditer</a>
                            <form action="{{ route('voitures.destroy', $voiture->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" >Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $voitures->links() }} <!-- Pagination links -->
    @else
        <p>Aucune voiture trouvée.</p>
    @endif
</div>
@endsection
