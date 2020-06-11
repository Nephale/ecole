<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Professeur as ProfesseurRequest;
use App\{Professeur, Category};

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {
        $query = $slug ? Category::whereSlug($slug)->firstOrFail()->professeur() : Professeur::query();
        $professeurs = $query->withTrashed()->oldest('nom')->paginate(5);
        return view('index', compact('professeurs', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Professeur  $ProfesseurRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ProfesseurRequest $ProfesseurRequest)
    {
        Professeur::create($ProfesseurRequest->all());

        return redirect()->route('professeur.index')->with('info', 'Le professeur a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professeur $professeur
     * @return \Illuminate\Http\Response
     */
    public function show(Professeur $professeur)
    {
        $category = $professeur->category->name;
        return view('show', compact('professeur', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professeur $professeur
     * @return \Illuminate\Http\Response
     */
    public function edit(Professeur $professeur)
    {
        $categories = Category::all();

        return view('edit', compact('professeur', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Http\Requests\Professeur  $ProfesseurRequest
     * @return \Illuminate\Http\Response
     */
    public function update(ProfesseurRequest $ProfesseurRequest, Professeur $professeur)
    {
        $professeur->update($ProfesseurRequest->all());

        return redirect()->route('professeur.index')->with('info', 'Les informations sur le professeur ont bien été modifiées');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professeur $professeur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professeur $professeur)
    {
        $professeur->delete();

        return back()->with('info', 'La fiche du professeur a bien été mise dans la corbeille.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Int $id
     * @return \Illuminate\Http\Response
     */
    public function forceDestroy($id)
    {
        Professeur::withTrashed()->whereId($id)->firstOrFail()->forceDelete();

        return back()->with('info', 'La fiche du professeur a bien été supprimée définitivement dans la base de données.');
    }

    /**
     * Restore the specified resource.
     *
     * @param  Int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Professeur::withTrashed()->whereId($id)->firstOrFail()->restore();

        return back()->with('info', 'La fiche du professeur a bien été restauré.');
    }
}
