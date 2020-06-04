<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Repositories\UserRepository;

class AdminController extends Controller
{
	protected $userRepository;

    protected $nbrPerPage = 30;

    public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function index()
	{
		$users = $this->userRepository->getPaginate($this->nbrPerPage);
		$links = $users->render();

		return view('user.admin', compact('users', 'links'));
	}
	
	public function admin($user){
       		 $userToValid = User::findOrFail($user);
   			
		
		if($userToValid->membre == 0){
        	User::where('id','=', $userToValid->id)->update(['membre'=> 1]);
		Session::flash('message','Utilisateur mis à jour');
       		 return redirect('admin');
		}
		else if($userToValid->membre == 1){
		 User::where('id','=', $userToValid->id)->update(['membre'=> 0]);
           Session::flash('message', 'Utilisateur mise    jour');
            return redirect('admin');
					

		}
    
	}

	public function delAdmin(User $user){
       	   $userToValid = $user;

           User::where('id','=', $userToValid->id)->update(['membre'=> 0]);
	   Session::flash('message', 'Utilisateur mise à jour');
            return redirect('user');

        }    
}
