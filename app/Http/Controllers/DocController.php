<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doc;
use App\File;
use App\Http\Requests\DocRequest;
use App\User;
use Illuminate\Support\Facades\DB;
class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Doc::all();
        return view('document.sharepoint', compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocRequest $request)
    {

      /*  echo($request->user()->User_id);
        echo($request->input('nom'));*/

       /* $doc = new Doc;
        $doc->nom = $request->input('nom');
       // $doc->cree_par = $request->user()->User_id;
        $doc->save();*/

        Doc::create([
            'nom' => $request->nom,
            'cree_par' => $request->user()->User_id,
        ]);
        return redirect('document');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $docs =  Doc::with('files')->where('doc_id','=','1')->get();

        foreach($docs as $doc){
            foreach($doc->files as $file){
                echo $file->file_nom;
            }
        }
       // $docs = Doc::with('files')->where('doc_id', '=', '1')->get();



       // return view('document.show', compact('docs','files'));

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
