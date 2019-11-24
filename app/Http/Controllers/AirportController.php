<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airport;
use App\Logo;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $logo = Logo::find(1);
        $this->path = asset('storage/images').'/'.$logo->path;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = Airport::all();
        $path = $this->path;
        return view('airports.index', compact('airports','path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $path = $this->path;
        return view('airports.create',compact('path'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'data'=>'required',
        ]);

        $airport = new Airport([
            'name' => $request->get('name'),
            'data' => $request->get('data'),
        ]);
        $airport->save();
        return redirect('/airports')->with('success', 'Airport saved!');
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
        $airport = Airport::find($id);
        $path = $this->path;
        return view('airports.edit', compact('airport','path'));
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
        $request->validate([
            'name'=>'required',
            'data'=>'required',
        ]);

        $airport = Airport::find($id);
        $airport->name =  $request->get('name');
        $airport->data =  $request->get('data');
        $airport->save();

        return redirect('/airports')->with('success', 'Airport updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Airport::find($id);
        $contact->delete();

        return redirect('/airports')->with('success', 'Airport deleted!');
    }
}
