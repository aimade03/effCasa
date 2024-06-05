@extends('app')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Immatriculation</th>
            <th>Numéro Assurance</th>
            <th>Kilométrage</th>
            <th>Date Début Location</th>
            <th>Date Fin Location</th>
            <th>Client</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>{{ $voiture->immatriculation }}</td>
                <td>{{ $voiture->num_assurance }}</td>
                <td>{{ $voiture->kilometrage }}</td>
                <td>{{ $voiture->date_debut_location }}</td>
                <td>{{ $voiture->date_fin_location }}</td>
                <td>{{ $voiture->client->nom  }}</td>
            </tr>
    </tbody>
</table>
@endsection