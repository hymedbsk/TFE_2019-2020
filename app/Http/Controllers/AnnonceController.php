<?php

namespace App\Http\Controllers;

use Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AnnonceRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Annonces;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = DB::table('annonces')->where('date_supp','=',NULL)->get();

        return view('accueil', compact('annonces'));
    }

    public function list()
    {
        $annonces = Annonces::all();

        return view('annonces.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonces.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnonceRequest $request)
    {
        $annonces = new Annonces;
        $annonces->titre = $request->input('titre');
        $annonces->contenu = $request->input('contenu');
        $annonces->user_id = $request->user()->id;
        $annonces->save();

        Session::flash('message', 'Annonce crée');
        return redirect('membre/annonce');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ids)
    {
        $id = Crypt::decrypt($ids);
        $annonce =  Annonces::findOrFail($id);

        return view('annonces.show', compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ids)
    {
        $id = Crypt::decrypt($ids);
        $id->delete();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $annonces =  Annonces::findOrFail($id);
        $annonces->titre = $request->input('titre');
        $annonces->contenu = $request->input('contenu');
        $annonces->user_id = $request->user()->id;
        $annonces->save();

        Session::flash('message', 'Annonce modifiée');
        return redirect('membre/annonce/'.Crypt::encrypt($id).'/edit');
    }

        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        $id = Crypt::decrypt($ids);
        $annonce = Annonces::findOrFail($id);
	$annonce->delete();
	 return redirect('membre/annonce/');
    }
}

