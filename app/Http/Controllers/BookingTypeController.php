<?php
namespace App\Http\Controllers;

use App\BookingType;
use Illuminate\Http\Request;

class BookingTypeController extends Controller
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
        $bookingtypes = BookingType::all();

        return view('bookingtypes.index', compact('bookingtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookingtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $bookingtypes = new BookingType([
            'name' => $request->get('name'),
        ]);
        $bookingtypes->save();
        return redirect('/bookingtypes')->with('success', 'Booking Type saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookingtype = BookingType::find($id);
        //dd($bookingtype);
        return view('bookingtypes.edit', compact('bookingtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $bookingtype = BookingType::find($id);
        $bookingtype->name = $request->get('name');
        $bookingtype->save();

        return redirect('/bookingtypes')->with('success', 'Booking Type updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookingtype = BookingType::find($id);
        $bookingtype->delete();

        return redirect('/bookingtypes')->with('success', 'Booking Type deleted!');
    }
}
