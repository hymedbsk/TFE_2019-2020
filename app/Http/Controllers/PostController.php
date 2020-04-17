<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\URL;
class PostController extends Controller{
    protected $postRepository;

    protected $nbrPerPage = 6;

    public function __construct(PostRepository $postRepository){

        $this->middleware('auth', ['except' => 'index']);
		$this->middleware('admin', ['only' => 'destroy']);

		$this->postRepository = $postRepository;
	}

	public function index(){


        $posts = $this->postRepository->getPaginate($this->nbrPerPage);
		$links = $posts->render();

		return view('posts.liste', compact('posts', 'links'));
	}

	public function create(){

		return view('posts.add');
    }

    public function download($url){

        return $url;
    }

    public function search(){

        $filters = Input::get('Option_Nom');
        $filters2 = Input::get('Bac');

        $posts = Post::where([ ['Option_Nom', '=', $filters], ['Bac', '=', $filters2],])->paginate(5)->appends('Option_Nom',$filters);

        return view('posts.liste')->with('posts', $posts);


     /* $user = Post::where(function ($query) use ($filters) {
            if ($filters['Option_Nom']) {
                $query->where('Option_Nom', '=', $filters['Option_Nom']);
            }
             if ($filters['Bac']) {
                $query->where('Bac', '=', $filters['Bac']);
            }
        })->get();

    return $user;
            */
    }
	public function store(PostRequest $request){

        $file = $request->file('Nom_doc');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public', $filename);
        $input['Nom_doc'] = $filename;
        /*
        $inputs = array_merge($request->all(), ['User_id' => $request->user()->User_id]);
        $this->postRepository->store($inputs);
*/
        /* Post::create([
            'Titre' => $request ->Titre,
            'Description' => $request ->Description,
            'User_id' => $request->user()->User_id,
            'Bac' => $request ->Bac,
            'Option_Nom' => $request ->Option_Nom,
            'Nom_doc'=> $filename,

        ]);
*/
        $posts = new Post;
        $posts->Titre = $request->input('Titre');
        $posts->Description = $request->input('Description');
        $posts->User_id = $request->user()->User_id;
        $posts->Bac = $request->input('Bac');
        $posts->Option_Nom = $request->input('Option_Nom');
        $posts->Nom_doc =  $filename;
        $posts->save();

		return redirect(route('post.index'));
    }

    public function edit($id){

        $posts= Post::Find($id);
       return dd($posts);

        if(auth()->user()->id !== $posts->User_id){

            return redirect(route('post.index'));

        }
      return view('posts.edit')->with('posts', $posts);



    }

	public function destroy($id){

		$this->postRepository->destroy($id);

		return redirect()->back();
	}
}
