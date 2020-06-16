<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($file)
    {
        return Storage::download('post',$file);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($file){

	
        $extension = pathinfo(storage_path($file), PATHINFO_EXTENSION);
	 if($extension == "mp4") return view('video')->with('file',$file);
        else if($extension == "pdf")return redirect('https://www.che2-ephec.be/storage/che2/ka72OnZ6lfXsHROV07obREo9WTeQC8VNdAY2uAo2xCCDVFdZWdZx0bU8WzqzFeI2ZTpBBgjUv0783LqSCU5KiVmdZUFBNphk/'.$file);
	 else if($extension == "png" || $extension == "jpeg" ) return view('image')->with('file',$file);
        else  return redirect('https://view.officeapps.live.com/op/view.aspx?src=https://www.che2-ephec.be/storage/che2/ka72OnZ6lfXsHROV07obREo9WTeQC8VNdAY2uAo2xCCDVFdZWdZx0bU8WzqzFeI2ZTpBBgjUv0783LqSCU5KiVmdZUFBNphk/'.$file);


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
