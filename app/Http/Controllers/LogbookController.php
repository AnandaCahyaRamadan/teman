<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Logbook;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLogbookRequest;
use App\Http\Requests\UpdateLogbookRequest;

class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logbooks = Logbook::paginate(5);
        return view('admin.logbook.index', [
           'logbook' => $logbooks
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
        return view('admin.logbook.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLogbookRequest  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('logbook.index')
            ->with('success_message', 'Berhasil menambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function show(Logbook $logbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {        
      
        $logbooks = Logbook::find($id);
        $users = User::all();
        if (!$logbooks) return redirect()->route('logbooks.index')
            ->with('error_message', 'lobgook dengan id'.$id.' tidak ditemukan');
            
        return view('admin.logbook.edit',compact('logbooks','users'),[
            'logbook' => $logbooks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLogbookRequest  $request
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'laporan_harian' => 'required',

        ]);
    
        $logbooks = Logbook::find($id);
        $logbooks->tanggal = $request->tanggal;
        $logbooks->laporan_harian = $request->laporan_harian;
        $logbooks->save();
    
        return redirect()->route('logbook.index')
            ->with('success_message', 'Berhasil mengubah Data Logbook');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logbook = Logbook::find($id);
        if ($logbook) $logbook->delete();
        
        return redirect()->route('logbook.index')
            ->with('success_message', 'Berhasil menghapus logbook');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        
        $logbook = Logbook::where('tanggal', 'like', "%" . $keyword . "%")->paginate(5);
        return view('admin.logbook.index', compact('logbook'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
