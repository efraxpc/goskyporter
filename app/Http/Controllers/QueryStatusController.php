<?php

namespace App\Http\Controllers;

use App\Logo;
use App\QueryStatus;
use Illuminate\Http\Request;

class QueryStatusController extends Controller
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
        $querystatuses = QueryStatus::all();
        $path = $this->path;
        return view('querystatuses.index', compact('querystatuses','path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $path = $this->path;
        return view('querystatuses.create',compact('path'));
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

        $querystatuses = new QueryStatus([
            'name' => $request->get('name'),
        ]);
        $querystatuses->save();
        return redirect('/querystatuses')->with('success', 'Query Status saved!');
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
        $querystatus = QueryStatus::find($id);

        $path = $this->path;
        return view('querystatuses.edit',compact('querystatus','path'));

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

        $querystatus = QueryStatus::find($id);
        $querystatus->name = $request->get('name');
        $querystatus->save();

        return redirect('/querystatuses')->with('success', 'Query Status updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $querystatus = QueryStatus::find($id);
        $querystatus->delete();

        return redirect('/querystatuses')->with('success', 'Query Status deleted!');
    }
}
