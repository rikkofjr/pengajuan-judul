<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Judul;
use Spatie\Permission\Models\Role;
use Session;
use Auth;
use Datatables;

class JudulController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'clearance']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judulnya = Judul::orderby('id_judul', 'desc')->get(); 
        return view('judul.index', compact  ('judulnya'));
    }
    
    //judul per user
    
     public function myjudul()
    {
        
        $judul=Judul::orderby('id_judul', 'desc')
            ->where(['user_judul'=>Auth::user()->id])
            ->paginate(5);
        return view('judul.myjudul', compact('judul'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('judul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Formulir Wajid Diisi',
            'latar_belakang.min' => ':Harus diisi minimal :min karakter',
            'judul.min' => 'minimal :min karakter',
        ];
        $this->validate($request, [
            'judul' =>'required|min:1',
            'latar_belakang' =>'required|min:1',
            'jenis_penelitian' =>'required',
        ],$messages);
        $judul = new Judul;
        $judul->judul = $request->judul;
        $judul->latar_belakang = $request->latar_belakang;
        $judul->jenis_penelitian = $request->jenis_penelitian;
        $judul->dp_1 = 0;
        $judul->dp_2 = 0;
        $judul->user_judul = Auth::user()->id;
        $judul->st_judul = 0;
        $judul->save();
        
        return redirect()->route('judul.index')
            ->with('flash_message', 'Judul,'.$judul->judul. 'telah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_judul)
    {
        $judul = Judul::where('id_judul', $id_judul)->first(); //Find post of id = $id

        return view ('judul.show', compact('judul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_judul)
    {
        $judul = Judul::where('id_judul', $id_judul)->first(); //Find post of id = $id
        
        $dosen = User::role('Dosen')->get(); //Find post of id = $id

        return view ('judul.edit', compact('judul', 'dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
