<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Gain;
use App\Depense;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
class DepController extends Controller
{
    private $totDepense = 0;
    private $totGain = 0;
    private $tot = 0;
    private $montant = 0;

    public function __construct(){

        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('superadmin',['except' => 'index']);


	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ids){

        $id = Crypt::decrypt($ids);

        $totals = DB::table('budget')->where('id', '=','2')->pluck('total');
        $gains = Gain::all()->where('budg_id','=',$id);
        $depenses =  Depense::all()->where('budg_id','=',$id);
        $budget = Budget::findOrFail($id);



        foreach ($depenses as $depense) {

            $this->totDepense += $depense->montant;

        }

        foreach ($gains as $gain) {

            $this->totGain += $gain->montant;

        }

        foreach ($totals as $total) {

            $this->montant = $total;

        }

        $this->tot = $total - $this->totDepense;
        $this->tot +=  $this->totGain;
            return view('depense.list', compact('depenses','gains','totals','budget'))->with('totGain', $this->totGain)->with('totDepense',$this->totDepense)->with('tot',$this->tot);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ids)
    {
        $id = Crypt::decrypt($ids);
        $budget = Budget::findOrFail($id);


        return view('depense.add', compact('budget'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$ids)
    {
        $id = Crypt::decrypt($ids);
        echo $ids;

        $depense = new Depense;
        $depense->libelle = $request->input('libelle');
        $depense->montant = $request->input('montant');
        $depense->User_id = $request->user()->User_id;
        $depense->budg_id = $id;
        $depense->description = $request->input('description');
        $depense->save();

        return redirect('budget/'.Crypt::encrypt($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdf($ids)
    {
        $id = Crypt::decrypt($ids);

        $totals = DB::table('budget')->where('id', '=','2')->pluck('total');
        $gains = Gain::all()->where('budg_id','=',$id);
        $depenses =  Depense::all()->where('budg_id','=',$id);
        $budget = Budget::findOrFail($id);



        foreach ($depenses as $depense) {

            $this->totDepense += $depense->montant;

        }

        foreach ($gains as $gain) {

            $this->totGain += $gain->montant;

        }

        foreach ($totals as $total) {

            $this->montant = $total;

        }

        $this->tot = $total - $this->totDepense;
        $this->tot +=  $this->totGain;
        $pdf = PDF::loadView('pdf', compact('depenses','gains','totals','budget'),['totDepense'=> $this->totDepense, 'totGain'=>$this->totGain, 'tot'=>$this->tot]);
        return $pdf->download('compte.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function destroy($id)
    {
        //
    }
}

