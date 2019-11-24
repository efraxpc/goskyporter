<?php

namespace App\Http\Controllers;

use App\Logo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {

        $logo = Logo::find(1);
        $path = asset('storage/images').'/'.$logo->path;
        return view('logo.index', compact('logo','path'));
    }

    public function save(Request $request)
    {
        $file_name = $request->logo->hashName();
        $file = $request->logo;

        Storage::disk('public')->put('images', $file);

        $idLogo = $request->get('idLogo');
        $logo = Logo::find($idLogo);
        $logo->path = $file_name;
        $logo->save();
        $path = asset('storage/images').'/'.$logo->path;
        return view('logo.index', compact('logo','path'))->with('logo', $logo)->with('path', $path)->with('success', 'Logo changed successfully!');
    }
}
