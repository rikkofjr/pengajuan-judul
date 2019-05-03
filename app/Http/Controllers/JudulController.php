<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Judul;
use App\Models\StJudul;
use Spatie\Permission\Models\Role;
use Session;
use Auth;
use Datatables;
use DB;

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
        $judul = Judul::orderby('id_judul', 'desc')->get(); 
        return view('judul.index', compact  ('judul'));
    }
    
    //judul per user
    
     public function myjudul()
    {
        $user = Auth::user();
        $judul = Judul::where('user_judul', $user->id)
        ->orderby('id_judul', 'desc')->get(); 
        return view('judul.myjudul', compact  ('judul'));

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
            ->with('flash_message', 'Judul, '.$judul->judul. 'telah dibuat');
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
        
        $dosen = User::role('Dosen')->get(); //Find User Where Role
        $st_judul = StJudul::orderby('id_st_judul', 'desc')->get(); //Find User Where Role

        //orang ygn boleh ngedit
        $adminrole = Auth::user()->hasAnyRole('Admin Prodi', 'Kaprodi');
        $dosen1 = Auth::user()->id == $judul->dp_1;
        $dosen2 = Auth::user()->id == $judul->dp_2;
        //$punyasaya = Auth::user()->id == $judul->user_judul;

        //$user0 = User::where('id', '=', '0');
        if( $adminrole || $dosen1 || $dosen2 ){
            return view ('judul.edit', compact('judul', 'dosen', 'st_judul'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_judul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_judul)
    {
        $user = Auth::user();
        if($user->hasRole('Admin Prodi')){
            $this->validate($request, [
                'judul'=>'required'
            ]);

            $post = Judul::findOrFail($id_judul);
            $post->judul = $request->input('judul');
            $post->latar_belakang = $request->input('latar_belakang');
            $post->dp_1 = $request->input('dp_1');
            $post->dp_2 = $request->input('dp_2');
            $post->st_judul = $request->input('st_judul');
            $post->save();

            return redirect()->route('judul.show', 
                $post->id_judul)->with('flash_message', 
                'Article, '. $post->judul.' updated');
       }
        if($user->hasRole('Dosen')){
            $this->validate($request, [
                'judul'=>'required'
            ]);

            $post = Judul::findOrFail($id_judul);
            $post->judul = $request->input('judul');
            $post->latar_belakang = $request->input('latar_belakang');
            $post->save();

            return redirect()->route('judul.show', 
                $post->id_judul)->with('flash_message', 
                'Article, '. $post->judul.' updated');
       }
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
    public function jditerima(){
        $judul = Judul::where('st_judul', '2')
        ->orderby('id_judul', 'desc')->get(); 
        return view('judul.index', compact  ('judul'));
    }
    public function jditolak(){
        $judul = Judul::where('st_judul', '1')
        ->orderby('id_judul', 'desc')->get(); 
        return view('judul.index', compact  ('judul'));
    }
    public function jdtps(){
        $judul = Judul::where('st_judul', '0')
        ->orderby('id_judul', 'desc')->get(); 
        return view('judul.index', compact  ('judul'));
    }
    public function hitungjudul(){
        $hitungjudul = Judul::select(DB::raw('jenis_penelitian, count(id_judul) as total')) 
        ->groupby('jenis_penelitian') 
        ->orderby('jenis_penelitian','asc') ->get();
        
        $hitungst = Judul::select(DB::raw('st_judul, count(id_judul) as totalst')) 
        ->groupby('st_judul') 
        ->orderby('st_judul','asc') ->get();
        return view('dashboardindex', compact ('hitungjudul', 'hitungst'));
    }
}
