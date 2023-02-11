<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\User;
use Illuminate\Http\Request;

class UserLogbookController extends Controller
{
    public function create()
    {
        $users = User::where('id', auth()->user()->id)->get();
        return view('user.logbook.create', compact('users'), [
            'logbook' => Logbook::where('user_id', auth()->user()->id)->get()
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'laporan_harian' => 'required',

        ]);
    
        $array = $request->only([
            'user_id','tanggal','laporan_harian'
        ]);
    
        Logbook::create($array);
        return redirect('/logbook'
        )->with('success_message', 'Logbook berhasil terkirim');
    }
}
