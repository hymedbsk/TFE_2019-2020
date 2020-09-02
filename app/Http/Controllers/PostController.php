<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use APP\Post;
use APP\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\URL;
class PostController extends Controller{
    protected $postRepository;

    protected $nbrPerPage = 6;

    public function __construct(PostRepository $postRepository){

      /*  $this->middleware('auth');
	$this->middleware('verified');
	$this->middleware('check');
	*/
	}


	public function index(){

		$posts =  Post::where('post_check', '=', '1')->paginate(16);
                $links = $posts->render();
		

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
		Session::flash('message', 'Résultat pour votre filtre : '.$filters.' bac '.$filters2); 
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
        $filename = uniqid('che2_');
	$extension = $file->getClientOriginalExtension();
        $file->storeAs('public/post/vzRzaYm9dF95Uca8unJ0vunMydT7vpp8bJcFmywHF9IAauRl2TSK010juQeGUiZ92aLK2TXGOKGsM0v4dpzFdOU4GkippB21/'.$request->user()->matricule.'/', $filename.'.'.$extension);
        $input['Nom_doc'] = $filename;

        $posts = new Post;
        $posts->titre  = $request->input('Titre');
        $posts->description = $request->input('Description');
        $posts->User_id = $request->user()->id;
	$posts->option= $request->input('Option_Nom');
	$posts->bac = $request->input('Bac');
	$posts->doc = $filename.'.'.$extension;
        $posts->save();
        /*Post::create([
            'Titre' => $request ->Titre,
            'Description' => $request ->Description,
            'User_id' => $request->user()->User_id,
        ]);*/
		Session::flash('message', "Post en attente d'approbation");
		return redirect(route('post.index'));
    }
	  

    public function edit($ids){

	$id = Crypt::decrypt($ids);
        $posts= Post::findOrFail($id);


        if(auth()->user()->id !== $posts->User_id){

            return redirect(route('post.index'));

        }
      return view('post.edit')->with('posts', $posts);

    }

    public function getCheck(){

	$posts =  Post::where('post_check', '=', '0')->paginate(15);
        $links = $posts->render();
        return view('post.check', compact('posts', 'links'));
    }

    
    public function download($matricule, $file){

	 return response()->download(storage_path("app/public/post/vzRzaYm9dF95Uca8unJ0vunMydT7vpp8bJcFmywHF9IAauRl2TSK010juQeGUiZ92aLK2TXGOKGsM0v4dpzFdOU4GkippB21/".$matricule.'/'.$file));

   }

   public function visio($matricule,$file){


        $extension = pathinfo(storage_path($file), PATHINFO_EXTENSION);
        
        if($extension == "pdf")return redirect('https://www.che2-ephec.be/storage/post/vzRzaYm9dF95Uca8unJ0vunMydT7vpp8bJcFmywHF9IAauRl2TSK010juQeGUiZ92aLK2TXGOKGsM0v4dpzFdOU4GkippB21/'.$matricule.'/'.$file);
        else  return redirect('https://view.officeapps.live.com/op/view.aspx?src=https://www.che2-ephec.be/storage/post/vzRzaYm9dF95Uca8unJ0vunMydT7vpp8bJcFmywHF9IAauRl2TSK010juQeGUiZ92aLK2TXGOKGsM0v4dpzFdOU4GkippB21/'.$matricule.'/'.$file);


   }

   public function check($ids){
	$id = Crypt::decrypt($ids);	
	Post::where('post_id','=', $id)->update(['post_check'=> 1]);
	Session::flash('message', 'Post approuvé');
	return redirect('post/admin/verification');
  }
    public function update(PostRequest $request, $id){

	$file = $request->file('Nom_doc');
        $filename = uniqid('che2_');
        $extension = $file->getClientOriginalExtension();
$file->storeAs('public/post/vzRzaYm9dF95Uca8unJ0vunMydT7vpp8bJcFmywHF9IAauRl2TSK010juQeGUiZ92aLK2TXGOKGsM0v4dpzFdOU4GkippB21/'.$request->user()->matricule.'/', $filename.'.'.$extension);
        $input['Nom_doc'] = $filename;

        $posts = Post::find($id);
        $posts->titre = $request->input('Titre');
        $posts->description = $request->input('Description');
        $posts->User_id = $request->user()->id;
	$posts->option = $request->input('Option_Nom');
        $posts->bac = $request->input('Bac');
        $posts->doc = $filename.'.'.$extension;
        $posts->save();
	Session::flash('message', 'Post mise à jour !');
        return redirect(route('post.index'));
    }
	public function double($use0, $use1){

	echo $use0, $use1;	

	}

	public function destroy($id){

        $posts = Post::findOrFail($id);

        if(auth()->user()->membre == 1){
	
	$posts->delete();
        Session::flash('message', 'Post supprimé !');
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
