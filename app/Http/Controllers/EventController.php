<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class EventController extends Controller
{
    public function index()
{
    $events = DB::table('events')->where('date_supp','=',NULL)->get();
    return view('event.index', compact('events'));
}

public function store(Request $request)
{

    $events = new Event ;
    $events->titre = $request->input('name');
    $events->user_id = $request->user()->id;
    $events->début = $request->input('task_date');
    $events->fin = $request->input('task_end');
    $events->description =  $request->input('description');
    $events->color = $request->input('color');
    $events->save();

    return redirect()->route('event.index');


}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ids)
    {
	
        $id = Crypt::decrypt($ids);
	$event = Event::findOrFail($id);
	
	return view('event.show', compact('event'));
	
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
    public function destroy($ids)
    {
        $id = Crypt::decrypt($ids);
        $events = Event::findOrFail($id);

	$events->delete();
	
	return redirect('event');
    }
}

