<?php

namespace App\Http\Controllers;

use App\Models\Tevekenyseg;
use Illuminate\Http\Request;

class TevekenysegController extends Controller
{
    public function index()
    {
        $tevekenyseg = Tevekenyseg::all();
        return $tevekenyseg;
    }
    public function show($id)
    {
        $tevekenyseg = Tevekenyseg::all($id);
        return $tevekenyseg;
    }
    public function destroy($id)
    {
        Tevekenyseg::find($id)->delete();
    }

    public function store(Request $request)
    {
        $tevekenyseg = new Tevekenyseg();
        $tevekenyseg->tevekenyseg_nev = $request->tevekenyseg_nev;
        $tevekenyseg->pontszam = $request->pontszam;
        $tevekenyseg->save();
    }

    public function update(Request $request, $id)
    {
        $tevekenyseg = Tevekenyseg::find($id);
        $tevekenyseg->tevekenyseg_nev = $request->tevekenyseg_nev;
        $tevekenyseg->pontszam = $request->pontszam;
        $tevekenyseg->save();
    }
}
