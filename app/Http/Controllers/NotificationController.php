<?php

namespace App\Http\Controllers;

use App\Logo;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $logo = Logo::find(1);
        $path = asset('storage/images').'/'.$logo->path;
        return view('notifications.index', compact('path'));
    }

    public function save(Request $request)
    {
        $notification = new Notification([
            'content' => $request->get('content'),
        ]);
        $notification->save();
        return redirect('/')->with('success', 'Notification saved!');
    }
}
