<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class UserPendaftaranController extends Controller
{
    public function index(){
        return view('user.pendaftaran.index', [
            'pendaftarans' => Pendaftaran::where('user_id', auth()->user()->id)->get()
        ]);
    }
    public function create()
    {
        $users = User::where('id', auth()->user()->id)->get();
        return view('user.pendaftaran.create', compact('users'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'telepon' =>  'required|numeric',
            'status' =>  'nullable',
            'penjadwalan' =>  'nullable',
            'file' => 'required|file|mimes:doc,docx,pdf',
            'user_id' => 'required|unique:pendaftarans'
        ]);

         if($request->file('file')){
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $validatedData ['file'] = $file->storeAs('file', $fileName);
         }


        Pendaftaran::create($validatedData);
        return redirect('/pendaftaran')->with('success_message', 'Pendaftaran Berhasil');
    }
    
}
