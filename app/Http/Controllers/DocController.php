<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doc;
use App\File;
use App\Http\Requests\DocRequest;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

	$this->middleware('auth');
	$this->middleware('membre');
	$this->middleware('verified');
     }
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
    public function store(DocRequest $request){

      /*  echo($request->user()->User_id);
        echo($request->input('nom'));*/
       /* $doc = new Doc;
        $doc->nom = $request->input('nom');
       // $doc->cree_par = $request->user()->User_id;
        $doc->save();*/

        Doc::create([
            'nom' => $request->nom,
            'user_id' => $request->user()->id,
        ]);
        return redirect('document');
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
        $docs =  Doc::with('files')->where('doc_id','=',$id)->get();
        $files = File::all();

       return view('document.show', compact('docs','files'))->with('id',Crypt::encrypt($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo $id;
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
    public function destroy($ids)
    {
	$id = Crypt::decrypt($ids);
        $doc = Doc::findOrFail($id);
	$doc->delete();
	
	return redirect('document');
    }
}
