<?php
namespace App\Http\Controllers;

use App\Logo;
use App\QueryType;
use Illuminate\Http\Request;

class QueryTypeController extends Controller
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
        $querytypes = QueryType::all();

        $path = $this->path;
        return view('querytypes.index', compact('querytypes','path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $path = $this->path;
        return view('querytypes.create',compact('path'));
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

        $querytypes = new QueryType([
            'name' => $request->get('name'),
        ]);
        $querytypes->save();
        return redirect('/querytypes')->with('success', 'Query Type saved!');
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
        $querytype = QueryType::find($id);
        $path = $this->path;
        return view('querytypes.edit',compact('querytype','path'));
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

        $querytype = QueryType::find($id);
        $querytype->name = $request->get('name');
        $querytype->save();

        return redirect('/querytypes')->with('success', 'Query Type updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $querytype = QueryType::find($id);
        $querytype->delete();

        return redirect('/querytypes')->with('success', 'Query Type deleted!');
    }
}
