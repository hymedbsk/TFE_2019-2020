<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Budget;
use App\Gain;
class GainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('superadmin',['except' => 'index']);


	}


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ids)
    {
        $id = Crypt::decrypt($ids);
        $budget = Budget::findOrFail($id);


        return view('gain.add', compact('budget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ids)
    {
        $id = Crypt::decrypt($ids);
        $gain = new Gain;

        $gain->libelle = $request->input('libelle');
        $gain->montant = $request->input('montant');
        $gain->User_id = $request->user()->User_id;
        $gain->budg_id = $id;
        $gain->description = $request->input('description');
        $gain->save();

        return redirect('budget/'.Crypt::encrypt($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
