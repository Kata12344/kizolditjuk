<?php

namespace App\Http\Controllers;

use App\Models\Bejegyzes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BejegyzesController extends Controller
{
    public function index()
    {
        $bejegyzes = Bejegyzes::all();
        return $bejegyzes;
    }
    public function show($id)
    {
        $bejegyzes = Bejegyzes::all($id);
        return $bejegyzes;
    }
    public function destroy($id)
    {
        Bejegyzes::find($id)->delete();
    }

    public function store(Request $request)
    {
        $bejegyzes = new Bejegyzes();
        $bejegyzes->tevekenyseg_id = $request->tevekenyseg_id;
        $bejegyzes->osztaly_id = $request->osztaly_id;
        $bejegyzes->allapot = "jóváhagyásra vár";
        $bejegyzes->save();
        return $bejegyzes;
    }

    public function update(Request $request, $id)
    {
        $bejegyzes = Bejegyzes::find($id);
        $bejegyzes->tevekenyseg_id = $request->tevekenyseg_id;
        $bejegyzes->osztaly_id = $request->osztaly_id;
        $bejegyzes->allapot = $request->allapot;
        $bejegyzes->save();
    }

    public function bejgy_tev(){
        $bejgy = DB::select(DB::raw("
        select * 
        from bejegyzes be, tevekenysegs tev 
        where be.tevekenyseg_id = tev.tevekenyseg_id "));
        return $bejgy;
    }
}
