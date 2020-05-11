<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Crypt;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TeRequests;

class RoleController extends Controller
{


    protected $userRepository;

    protected $nbrPerPage = 10;

    public function __construct(UserRepository $userRepository)
	{
        $this->userRepository = $userRepository;

        $this->middleware('auth');

	}
    public function index()
    {
        $users = $this->userRepository->getPaginate($this->nbrPerPage);
        $links = $users->render();
        $roles = Role::all();

		return view('role.gestion', compact('users', 'links','roles'));
    }


    public function create()
    {

        return view('role.add');
    }


    public function store(RoleRequest $request)
    {
        $role = new Role;
        $role->nom = $request->input('nom');
        $role->save();

        return redirect('role/gestion')->with('message', 'Rôle créé');
    }


    public function show()
    {
        $roles = Role::all();
        $users = $this->userRepository->getPaginate($this->nbrPerPage);

        return view('role.role', compact('roles','links'));
    }

    public function change(TeRequests $request, $id){


            $User = User::find($id);
            $Roles = Role::find($request);
            $User->roles()->syncWithoutDetaching($Roles);
            $users = $this->userRepository->getPaginate($this->nbrPerPage);
            $links = $users->render();

            return redirect('role')->with('message', 'Utilisateur mis à jour', 'links', $links);


        /*$role_id = $request->input('role');

        echo($role_id );*/



    }
    public function edit(){

        $users = User::find(2);
        $roleIds = [1, 2];
        $users->roles()->attach($roleIds);
    }


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
   public function destroy($id){

        $roles = Role::findOrFail($id);

        $roles->delete();

        return redirect(route('role.show'));

   }

   public function delete($id){

    $user = User::findOrFail($id);

    $user->roles()->detach();

    return redirect(route('role.index'));

    }
}

