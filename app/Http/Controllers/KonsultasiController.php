<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Konsultasi;
use App\Http\Requests\StoreKonsultasiRequest;
use App\Http\Requests\UpdateKonsultasiRequest;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsultasis = Konsultasi::paginate(5);
        return view('admin.konsultasi.index', [
           'konsultasi' => $konsultasis
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
        return view('admin.konsultasi.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKonsultasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pesan' => 'required',
            'balasan' => 'nullable'

        ]);
    
        $array = $request->only([
            'user_id','pesan','balasan'
        ]);
    
        Konsultasi::create($array);
        return redirect()->route('konsultasi.index')
            ->with('success_message', 'Berhasil menambah Data');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konsultasi  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function show(Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konsultasi  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {        
      
        $konsultasis = Konsultasi::find($id);
        $users = User::all();
        if (!$konsultasis) return redirect()->route('konsultasis.index')
            ->with('error_message', 'pemesan dengan id'.$id.' tidak ditemukan');
            
        return view('admin.konsultasi.edit',compact('konsultasis','users'),[
            'konsultasi' => $konsultasis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKonsultasiRequest  $request
     * @param  \App\Models\Konsultasi  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pesan' => 'required',
            'balasan' => 'nullable',
        ]);
    
        $konsultasis = Konsultasi::find($id);
        $konsultasis->pesan = $request->pesan;
        $konsultasis->balasan = $request->balasan;
        $konsultasis->save();
    
        return redirect()->route('konsultasi.index')
            ->with('success_message', 'Berhasil mengubah Data Pusat Bantuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konsultasi  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konsultasi = Konsultasi::find($id);
        if ($konsultasi) $konsultasi->delete();
        
        return redirect()->route('konsultasi.index')
            ->with('success_message', 'Berhasil menghapus');
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $konsultasi = Konsultasi::where('pesan', 'like', "%" . $keyword . "%")->paginate(5);
        return view('admin.konsultasi.index', compact('konsultasi'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
