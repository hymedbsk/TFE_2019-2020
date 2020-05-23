<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TestController extends Controller
{


public function __construct(){

   $this->middleware('president');
}

    public function test(){
     $user = Auth::user();
$role = "ok";


            if ($user->roles->first()) {
                echo "remply";
            }
            else{
                echo"vide";
            }




    }

}
