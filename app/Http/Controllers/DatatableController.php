<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Judul;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Session;
use Auth;
use Datatables;
use DB;

class DatatableController extends Controller
{
    public function judulmahasiswa(){
        return Datatables::of(Judul::query())->make(true);
    }
    public function cobain(Request $request){

        // if ($request->ajax()){
        //     $data = Judul::latest()->get();
        //     return Datatables::of($data)
        //     ->addIndexColumn()
        //     ->addColumn('action', function($row){
        //         $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
        //         return $btn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // }
        // return view('judul.coba');
        $roles = Role::all();
        $users = User::with('roles')->get();
        $nonmembers = $users->reject(function ($user, $key) {
            return $user->hasRole('Mahasiswa');
        });
        $dosen = User::role('Dosen')->get();
        return view('judul.coba', ['dosen'=>$dosen, 'roles'=>$roles, 'nonmembers' => $nonmembers]);
    }
}
