<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePendaftaranRequest;
use App\Http\Requests\UpdatePendaftaranRequest;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::paginate(5);
        return view('admin.pendaftaran.index', [
            'pendaftarans' => $pendaftarans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.pendaftaran.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendaftaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'telepon' =>  'required',
            'status' =>  'nullable',
            'penjadwalan' =>  'nullable',
            'file' => 'required|file|mimes:doc,docx,pdf',
            'user_id' => 'required'
        ]);

         if($request->file('file')){
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $validatedData ['file'] = $file->storeAs('file', $fileName);
         }


        Pendaftaran::create($validatedData);
        return redirect()->route('pendaftaran.index')
        ->with('success_message', 'Berhasil menambah Data');     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $pendaftarans = Pendaftaran::find($id);
        $users = User::all();
        if (!$pendaftarans) return redirect()->route('pendaftaran.index')
            ->with('error_message', 'pendaftar dengan id'.$id.' tidak ditemukan');
            
        return view('admin.pendaftaran.edit',compact('pendaftarans','users'),[
            'pendaftarans' => $pendaftarans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendaftaranRequest  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'telepon' =>  'required',
            'status' =>  'nullable',
            'penjadwalan' =>  'nullable',
            'file' => 'file|mimes:doc,docx,pdf',
            // 'user_id' => 'required'
        ]);
        
         $pendaftarans = Pendaftaran::find($id);
         $pendaftarans->status = $request->status;
         $pendaftarans->penjadwalan = $request->penjadwalan;
         $pendaftarans->telepon = $request->telepon;
        //  $pendaftarans->user_id = $request->user_id;
         if($request->hasfile('file')) {   
        
            if($request->oldfile){
                Storage::delete($request->oldfile);
            }
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $store = $file->storeAs('file', $fileName);
             $pendaftarans->file=$store;
         }
         $pendaftarans->save();
     
         return redirect()->route('pendaftaran.index')
             ->with('success_message', 'Berhasil mengubah Data Pendaftaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        if($pendaftaran->file){
            Storage::delete($pendaftaran->file);
        }
        pendaftaran::destroy($pendaftaran->id);
        return redirect()->route('pendaftaran.index')
        ->with('success_message', 'Berhasil menghapus');
    }


    public function search(Request $request)
    {
        $keyword = $request->search;
        $pendaftarans = Pendaftaran::where('telepon', 'like', "%" . $keyword . "%")->paginate(5);
        return view('admin.pendaftaran.index', compact('pendaftarans'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
