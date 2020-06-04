<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreviewController extends Controller
{
    
	public function index($file){
	
		return redirect('https://view.officeapps.live.com/op/view.aspx?src=https://www.che2-ephec.be/storage/'.$file);
	}

}
