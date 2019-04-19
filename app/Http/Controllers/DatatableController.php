<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Judul;
use App\Models\User;
use Session;
use Auth;
use Datatables;

class DatatableController extends Controller
{
    public function judulmahasiswa(){
        return Datatables::of(Judul::query())->make(true);
    }
    public function cobain(Request $request){

        if ($request->ajax()){
            $data = Judul::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('judul.coba');

    }
}
