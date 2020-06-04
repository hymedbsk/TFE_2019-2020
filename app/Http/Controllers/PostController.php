<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use APP\Post;
use APP\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\PostRepository;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\URL;
class PostController extends Controller{
    protected $postRepository;

    protected $nbrPerPage = 6;

    public function __construct(PostRepository $postRepository){

        $this->middleware('auth');
	$this->middleware('check');
	$this->postRepository = $postRepository;

	}

	public function index(){

		$links = Post::paginate(6);
		$links->withPath('/post');
		$posts = $this->postRepository->getPaginate($this->nbrPerPage);
		return view('post.list', compact('posts', 'links'));
	}

	public function create(){

		return view('post.add');
    	}
        public function search(){

		$links = Post::paginate(6);
    		$links->withPath('/post');
        	$filters = Input::get('Option_Nom');
        	$filters2 = Input::get('Bac');
        	$posts = Post::where([ ['option', '=', $filters], ['bac', '=', $filters2],])->paginate(6)->appends('option',$filters);
		Session::flash('message', 'Résultat pour votre filtre'); 
		return view('post.list')->with(compact('posts', 'links'));


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

        $posts = new Post;
        $posts->titre  = $request->input('Titre');
        $posts->description = $request->input('Description');
        $posts->User_id = $request->user()->id;
	$posts->option= $request->input('Option_Nom');
	$posts->bac = $request->input('Bac');
	$posts->doc = $filename;
        $posts->save();
        /*Post::create([
            'Titre' => $request ->Titre,
            'Description' => $request ->Description,
            'User_id' => $request->user()->User_id,
        ]);*/

		return redirect(route('post.index'))->withOk("Annonce crée");
    }
	  public function download($url){

        return $url;
    }


    public function edit($id){



        $posts= Post::findOrFail($id);


        if(auth()->user()->id !== $posts->User_id){

            return redirect(route('post.index'));

        }
      return view('post.edit')->with('posts', $posts);

    }


    public function update(PostRequest $request, $id){

	$file = $request->file('Nom_doc');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public', $filename);
        $input['Nom_doc'] = $filename;

        $posts = Post::find($id);
        $posts->titre = $request->input('Titre');
        $posts->description = $request->input('Description');
        $posts->User_id = $request->user()->id;
	$posts->option = $request->input('Option_Nom');
        $posts->bac = $request->input('Bac');
        $posts->doc = $filename;
        $posts->save();
	Session::flash('message', 'Annonce mise à jour !');
        return redirect(route('post.index'));
    }

	public function destroy($id){

        $posts = Post::findOrFail($id);

        if(auth()->user()->membre == 1){
	
	$posts->delete();
        Session::flash('message', 'Post supprimer !');
        return redirect(route('post.index'));
	
	 

        }else if(auth()->user()->id !== $posts->User_id){

        return redirect(route('post.index'));
	}else{

        $posts->delete();
	Session::flash('message', 'Post supprimer !');
	return redirect(route('post.index'));
	}
	}
}
