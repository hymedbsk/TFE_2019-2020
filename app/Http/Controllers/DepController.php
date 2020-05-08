<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Gain;
use App\Depense;
use Illuminate\Support\Facades\DB;

class DepController extends Controller
{
    private $totDepense = 0;
    private $totGain = 0;
    private $tot = 0;
    private $montant = 0;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id){

        $totals = DB::table('budget')->where('id', '=','2')->pluck('total');
        $gains = Gain::all()->where('budg_id','=',$id);
        $depenses =  Depense::all()->where('budg_id','=',$id);

        foreach ($depenses as $depense) {

            $this->totDepense += $depense->qte;

        }

        foreach ($gains as $gain) {

            $this->totGain += $gain->qte;

        }

        foreach ($totals as $total) {

            $this->montant = $total;

        }

        $this->tot = $total - $this->totDepense;
        $this->tot +=  $this->totGain;
            return view('depense.list', compact('depenses','gains','totals'))->with('totGain', $this->totGain)->with('totDepense',$this->totDepense)->with('tot',$this->tot);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('depense.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
