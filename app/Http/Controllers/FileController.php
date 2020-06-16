<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\File;
use App\Http\Requests\FileRequest;
use App\Doc;
use App\User;
use Illuminate\Support\Facades\Crypt;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){

	$this->middleware('auth');
	$this->middleware('verified');
        $this->middleware('membre');

     }

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
    public function create($ids)
    {
        $id = Crypt::decrypt($ids);
        $docs = Doc::get();
        return view('file.add', compact('docs'))->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequest $request){


        $request->validate([
            'Nom_doc' => 'required|max:50',
        ]);

            $files = $request->file('Nom_doc');
            foreach($files as $file){

                $filename = preg_replace('/\s+/', '', $file->getClientOriginalName());
                $file->storeAs('public/che2/ka72OnZ6lfXsHROV07obREo9WTeQC8VNdAY2uAo2xCCDVFdZWdZx0bU8WzqzFeI2ZTpBBgjUv0783LqSCU5KiVmdZUFBNphk', $filename);
                $input['Nom_doc'] = $filename;
	
                $file = new file;
        	$file->doc_id = $request->doc;
	        $file->user_id = $request->user()->id;
                $file->nom = $filename;
                $file->save();

                $Doc = Doc::findOrFail($request->doc);
                $Doc->files()->attach($file->file_id);
            }

                 /* $filename = $file->getClientOriginalName();

           echo $request->file('Nom_doc')->getClientOriginalName();

            $file->storeAs('public', $filename);
            $input['Nom_doc'] = $filename;*/
            /*
            $file = new file;
            $file->ajoute_par = $request->user()->User_id;
            $file->file_nom = $filename;
            $file->save();

            $Doc = Doc::findOrFail($request->doc);
            $Doc->files()->attach($file->file_id);*/


        return redirect('document/'.Crypt::encrypt($request->doc).'/list');

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
        $file = File::findOrFail($id);
        $file->delete();

        return redirect('document/'.Crypt::encrypt($file->doc_id).'/list');
    }

    public function delete(Request $request)
    {


        $files = $request->delete;

      foreach($files as $file){

            $fichier = File::findOrFail($file);
            echo $fichier;
            //$fichier->delete();
        }
         /*
         //return redirect('document/'.$id);*/
    }

    public function deleteAll(Request $request){

        $ids = $request->input('file');
        foreach($ids as $id){

            $file = File::findOrFail($id);
            $file->delete();
        }


        return redirect('document/'.Crypt::encrypt($request->doc).'/list');

    }

}
