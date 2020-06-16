<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreviewController extends Controller
{
    
	public function index($file){
	
		return redirect('https://view.officeapps.live.com/op/view.aspx?src=https://www.che2-ephec.be/storage/post/vzRzaYm9dF95Uca8unJ0vunMydT7vpp8bJcFmywHF9IAauRl2TSK010juQeGUiZ92aLK2TXGOKGsM0v4dpzFdOU4GkippB21/'.$file);
	}

}
