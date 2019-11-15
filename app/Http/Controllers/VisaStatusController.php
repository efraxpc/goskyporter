<?php

namespace App\Http\Controllers;

use App\VisaStatus;
use Illuminate\Http\Request;

class VisaStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visastatus = VisaStatus::all();
        return view('visastatus.index', compact('visastatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visastatus.create');
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
            'status'=>'required',
        ]);

        $visastatus = new VisaStatus([
            'status' => $request->get('status'),
        ]);
        $visastatus->save();
        return redirect('/visastatus')->with('success', 'Visa Status saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visastatus = VisaStatus::find($id);
        return view('visastatus.edit', compact('visastatus'));
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
            'status'=>'required',
        ]);

        $visastatus = VisaStatus::find($id);
        $visastatus->status =  $request->get('status');
        $visastatus->save();

        return redirect('/visastatus')->with('success', 'Visa Status updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visastatus = VisaStatus::find($id);
        $visastatus->delete();

        return redirect('/visastatus')->with('success', 'Visa status deleted!');
    }
}