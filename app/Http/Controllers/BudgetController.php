<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Depense;
use App\Gain;

use App\Http\Requests\BudgRequest;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection\merge;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
class BudgetController extends Controller
{

   private $totDepense = 0;
   private $totBudget = 0;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

      $this->middleware('auth');



    }

	public function test(){

	$user = Auth::user();

	foreach($user->roles as $role){

echo $role->nom;
}

}
    public function supp(){

        $budgets = Budget::withTrashed()->get();

        return view('budget.supp', compact('budgets'));

    }
    public function index(){

        $budgets = Budget::withTrashed()->get();

        return view('budget.list', compact('budgets'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('budget.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $budget = new Budget;
        $budget->nom = $request->input('nom');
        $budget->annee = $request->input('annee');
        $budget->total = $request->input('total');
        $budget->User_id = $request->user()->id;
        $budget->save();

        return redirect('budget');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $budgets = DB::table('budgets')->where('budg_id', '=',$id)->pluck('total');
        $depenses =  Depense::all()->where('budg_id','=',$id);

        foreach ($depenses as $depense) {

          $this->totDepense += $depense->qte;

         }
         foreach ($budgets as $budget) {

          $this->totBudget= $budget;

          }

          echo   $this->totBudget - $this->totDepense;

        return view('budget.index', compact('budgets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ids)
    {
        $id = Crypt::decrypt($ids);
        $budget = Budget::findOrFail($id);
        return view('budget.edit', compact('budget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ids)
    {
        $id = Crypt::decrypt($ids);
        $budget = Budget::findOrFail($id);
        $budget->nom = $request->input('nom');
        $budget->annee = $request->input('annee');
        $budget->total = $request->input('total');
        $budget->User_id = $request->user()->id;
        $budget->save();

        return redirect('budget');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        $id = Crypt::decrypt($ids);
        $budget = Budget::findOrFail($id);
        $budget->delete();

        return redirect('budget');
    }
}

