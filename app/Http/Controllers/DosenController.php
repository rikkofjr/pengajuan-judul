<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Judul;
use App\Models\User;
use Session;
use Auth;
use DB;

class DosenController extends Controller
{
    public function __contruct(){
        $this->middleware(['auth', 'clearence']);
    }
    public function daftarbimbingan(){
        $user = Auth::user();
        //has Role admin
        if($user->hasRole('Admin Prodi')){
            $judulnya = Judul::where(['dp_1'=>Auth::user()->id])
            ->orWhere(['dp_2'=>Auth::user()->id])
            ->orderby('id_judul', 'desc')
            ->get(); 
             return view('judul.index', compact  ('judulnya'));
        }
        // if($user->hasRole('Dosen')){
        //     $judulnya = Judul::where('dp_1', '=', Auth::user()->id)
        //     ->orwhere('dp_2', '=', Auth::user()->id)
        //     //->orWhere('st_judul', '=', '1')
        //     ->orderby('id_judul', 'desc')
        //     ->get(); 
        //      return view('judul.index', compact  ('judulnya'));
        // }
        if($user->hasanyRole('Dosen', 'Kaprodi')){
            $judulnya = Judul::where([
                ['dp_1', '=', Auth::user()->id],
                ['st_judul', '=', '2']
            ])
            ->orwhere([
                ['dp_2', '=', Auth::user()->id],
                ['st_judul', '=', '2']
            ])
            //->orWhere('st_judul', '=', '1')
            ->orderby('id_judul', 'desc')
            ->get(); 
             return view('judul.index', compact  ('judulnya'));
        }
        //Has Role Mahasiswa
        if($user->hasRole('Mahasiswa')){
            $judulnya = Judul::where(['user_judul'=>Auth::user()->id])
            ->orderby('id_judul', 'DESC')
            ->get(); 
             return view('judul.index', compact  ('judulnya'));
        }
    }
}
