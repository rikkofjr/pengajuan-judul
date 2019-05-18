<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Judul;
use App\Models\StJudul;
use App\Models\Jadwalsempro;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Session;
use Auth;
use Datatables;
use DB;

class JadwalsemproController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //This function for get all schedule of "Proposal Penelitian"
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $dosen = User::role('Dosen')->get(); //Find User Where Role

        return view ('sempro.create', compact('dosen'));
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
            'required' => 'Formulir Wajid Diisi',
            'latar_belakang.min' => 'Harus diisi minimal :min karakter',
            'judul_proposal.min' => 'minimal :min karakter',
        ];
        $this->validate($request, [
            'judul_proposal' =>'required|min:1',
            'tgl_proposal1' =>'required|min:1',
            'tgl_proposal2' =>'required',
            'jam_proposal' =>'required',
            'ruang_proposal' =>'required',
            'koordinator_proposal' =>'required',
        ],$messages);
        $jadwalsempro = new Jadwalsempro;
        $jadwalsempro->judul_proposal = $request->judul_proposal;
        $jadwalsempro->berita_proposal = $request->berita_proposal;
        $jadwalsempro->tgl_proposal1 = $request->tgl_proposal1;
        $jadwalsempro->tgl_proposal2 = $request->tgl_proposal2;
        $jadwalsempro->jam_proposal = $request->jam_proposal;
        $jadwalsempro->ruang_proposal = $request->ruang_proposal;
        $jadwalsempro->koordinator_proposal = $request->koordinator_proposal;
        $jadwalsempro->save();
        
        return redirect()->route('sempro.create')
            ->with('flash_message', 'Jadwal Sempro, '.$jadwalsempro->judul_proposal. 'telah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
