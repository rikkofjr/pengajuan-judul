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
        $judulnya = Judul::where(['dp_1'=>Auth::user()->id])
                ->orWhere(['dp_2'=>Auth::user()->id])
                ->orderby('id_judul', 'desc')
                ->get(); 
        return view('judul.index', compact  ('judulnya'));
    }
}
