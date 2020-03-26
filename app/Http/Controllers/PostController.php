<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\URL;
class PostController extends Controller{
    protected $postRepository;

    protected $nbrPerPage = 15;

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

	public function store(PostRequest $request){

      $file = $request->file('Nom_doc');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public', $filename);
        $input['Nom_doc'] = $filename;
        /*
        $inputs = array_merge($request->all(), ['User_id' => $request->user()->User_id]);
        $this->postRepository->store($inputs);
*/
         Post::create([
            'Titre' => $request ->Titre,
            'Description' => $request ->Description,
            'User_id' => $request->user()->User_id,
            'Bac' => $request ->Bac,
            'Option_Nom' => $request ->Option_Nom,
            'Nom_doc'=> $filename,

        ]);




		return redirect(route('post.index'));
	}

	public function destroy($id){

		$this->postRepository->destroy($id);

		return redirect()->back();
	}
}
