<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Repositories\UserRepository;

use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userRepository;

    protected $nbrPerPage = 4;

    public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function index()
	{
		$users = $this->userRepository->getPaginate($this->nbrPerPage);
		$links = $users->render();

		return view('user.user', compact('users', 'links'));
	}
	public function getCheck(){
		 $users = $this->userRepository->getPaginate($this->nbrPerPage);
                $links = $users->render();

                return view('user.userCheck', compact('users', 'links'));
	}
	public function check (User $user){
		 $userToValid = $user;
                                                                                                                               
		 User::where('id','=', $userToValid->id)->update(['compte_check'=> 1]);                                                    
		 Session::flash('message', 'Utilisateur mis    jour');                                                                
		return redirect('verification');                                                                                 
	}
	public function create()
	{
		return view('create');
	}

	public function store(UserCreateRequest $request)
	{
		$this->setAdmin($request);

		$user = $this->userRepository->store($request->all());

		return redirect('user')->withOk("L'utilisateur " . $user->name . " a été créé.");
	}
	
	public function show($id)
	{
		$user = $this->userRepository->getById($id);

		return view('show',  compact('user'));
	}

	public function edit($id)
	{
		$user = $this->userRepository->getById($id);

		return view('user.edit',  compact('user'));
	}

	public function update(UserUpdateRequest $request, $id)
	{
		

		$this->userRepository->update($id, $request->all());
		  return redirect('user');
		
	}

	public function destroy($id)
	{
		$this->userRepository->destroy($id);

		return redirect()->back();
	}

	public function admin(User $user){
       		 $userToValid = $user;
        
        	User::where('id','=', $userToValid->id)->update(['membre'=> 1]);
		Session::flash('message','Utilisateur mis à jour');
       		 return redirect('user');
    
	}

	public function delAdmin(User $user){
       	   $userToValid = $user;

           User::where('id','=', $userToValid->id)->update(['membre'=> 0]);
	   Session::flash('message', 'Utilisateur mise à jour');
            return redirect('user');

        }
	private function setAdmin($request)
        {
                if(!$request->has('membre'))
                {
                        $request->merge(['membre' => 0]);
                }
        }
}
