<?php
namespace App\Http\Controllers;

use App\BookingType;
use App\Logo;
use Illuminate\Http\Request;

class BookingTypeController extends Controller
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
        $bookingtypes = BookingType::all();

        $path = $this->path;
        return view('bookingtypes.index', compact('bookingtypes','path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $path = $this->path;
        return view('bookingtypes.create',compact('path'));
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
     *text
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookingtype = BookingType::find($id);

        $path = $this->path;
        return view('bookingtypes.edit', compact('bookingtype','path'));
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
