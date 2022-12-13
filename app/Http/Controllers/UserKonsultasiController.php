<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class UserKonsultasiController extends Controller
{
    public function create()
    {
        $users = User::where('id', auth()->user()->id)->get();
        return view('user.konsultasi.create', compact('users'), [
            'konsultasi' => Konsultasi::where('user_id', auth()->user()->id)->get()
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'pesan' => 'required',
            'balasan' => 'null'

        ]);
    
        $array = $request->only([
            'user_id','pesan','balasan'
        ]);
    
        Konsultasi::create($array);
        return redirect('/konsultasi'
        )->with('success_message', 'Pesan berhasil terkirim');
    }

    public function destroy($id)
    {
        $konsultasi = Konsultasi::find($id);
        if ($konsultasi) $konsultasi->delete();
        
        return redirect('/konsultasi')
            ->with('success_message', 'Berhasil menghapus');
    }
}
