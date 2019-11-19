<?php

namespace App\Http\Controllers;

use App\BookingSource;
use Illuminate\Http\Request;

class BookingSourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookingsources = BookingSource::all();
        return view('bookingsources.index', compact('bookingsources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookingsources.create');
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
        ]);

        $bookingsources = new BookingSource([
            'name' => $request->get('name'),
        ]);
        $bookingsources->save();
        return redirect('/bookingsources')->with('success', 'Booking resource saved!');
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
        $bookingsource = BookingSource::find($id);
        return view('bookingsources.edit', compact('bookingsource'));
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
        ]);

        $bookingsources = BookingSource::find($id);
        $bookingsources->name =  $request->get('name');
        $bookingsources->save();

        return redirect('/bookingsources')->with('success', 'Booking Resource updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookingsource = BookingSource::find($id);
        $bookingsource->delete();

        return redirect('/bookingsources')->with('success', 'Booking Resource deleted!');
    }
}
