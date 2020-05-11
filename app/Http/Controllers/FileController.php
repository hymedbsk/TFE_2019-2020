<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\File;
use App\Doc;
use App\User;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Storage::disk('comm')->delete('Englais_aout_2k19.docx');

      //  $Doc = Doc::find(2);
      //  $Doc->files()->attach(2);



      $docs = Doc::get()->pluck('nom', 'doc_id');

      return view('file.test', compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $docs = Doc::get()->pluck('nom', 'doc_id');
        return view('file.add', compact('docs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $file = $request->file('Nom_doc');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public', $filename);
        $input['Nom_doc'] = $filename;

        $file = new file;
        $file->ajoute_par = $request->user()->User_id;
        $file->file_nom = $filename;
        $file->save();


        return redirect('document');
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

