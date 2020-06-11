@extends('template')

@section('content')
<span class="icon">
  <i class="fas fa-home"></i>
</span>
</span>
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Nom : {{ $professeur->nom }}</p>
            <p class="card-header-title">Prénom : {{ $professeur->prenom }}</p>
            <p class="card-header-title">Email : {{ $professeur->email }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>Année d'arrivée : {{ $professeur->year }}</p>
                <p>Spécialité : {{ $category }}</p>
                <hr>
                <p>{{ $professeur->description }}</p>
            </div>
        </div>
    </div>
@endsection
