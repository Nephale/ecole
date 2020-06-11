@extends('template')

@section('css')
<style>
    .card-footer {
        justify-content: center;
        align-items: center;
        padding: 0.4em;
    }
    .is-info {
        margin: 0.3em;
    }

    select, .is-info {
        margin: 0.3em;
    }
</style>
@endsection

@section('content')
    @if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Professeurs</p>

            <div class="select">
                <select onchange="window.location.href = this.value">
                    <option value="{{ route('professeur.index') }}" @unless($slug) selected @endunless>Toutes
                        les spécialités
                    </option>
                    @foreach($categories as $category)
                        <option value="{{ route('professeur.category', $category->slug) }}" {{ $slug == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <a class="button is-info" href="{{ route('professeur.create') }}">Créer un professeur</a>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>Professeur</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($professeurs as $professeur)
                            <tr @if($professeur->deleted_at) class="has-background-grey-lighter" @endif>
                                <td><strong>{{ $professeur->nom }}</strong></td>
                                    <td>
                                        @if($professeur->deleted_at)
                                            <form action="{{ route('professeur.restore', $professeur->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="button is-primary" type="submit">Restaurer</button>
                                            </form>
                                        @else
                                            <a class="button is-primary" href="{{ route('professeur.show', $professeur->id) }}">Voir</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($professeur->deleted_at)
                                        @else
                                            <a class="button is-warning" href="{{ route('professeur.edit', $professeur->id) }}">Modifier</a>
                                        @endif
                                    </td>
                                <td>
                                    <form action="{{ route($professeur->deleted_at? 'professeur.force.destroy' : 'professeur.destroy', $professeur->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer">
            {{ $professeurs->links() }}
        </footer>
    </div>
@endsection
