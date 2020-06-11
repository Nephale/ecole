@extends('template')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modification d'un professeur</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('professeur.update', $professeur->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="field">
                    <label class="label">Spécialité</label>
                        <div class="select">
                            <select name="category_id">
                                @foreach($categories as $category)

                                    <option value="{{ $category->id }}" {{ $professeur->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="field">
                        <label class="label">Nom</label>
                        <div class="control">
                          <input class="input @error('nom') is-danger @enderror" type="text" name="nom" value="{{ old('nom', $professeur->nom) }}" placeholder="Nom de professeur">
                        </div>
                        @error('nom')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Prénom</label>
                        <div class="control">
                          <input class="input @error('prenom') is-danger @enderror" type="text" name="prenom" value="{{ old('prenom', $professeur->prenom) }}" placeholder="Prénom du professeur">
                        </div>
                        @error('prenom')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                          <input class="input @error('email') is-danger @enderror" type="email" name="email" value="{{ old('email', $professeur->email) }}" placeholder="Email du professeur">
                        </div>
                        @error('email')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Année d'arrivée</label>
                        <div class="control">
                          <input class="input" type="number" name="year" value="{{ old('year', $professeur->year) }}" min="1950" max="{{ date('Y') }}">
                        </div>
                        @error('year')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <textarea class="textarea" name="description" placeholder="Description du professeur">{{ old('description', $professeur->description) }}</textarea>
                        </div>
                        @error('description')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="control">
                          <button class="button is-link">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
