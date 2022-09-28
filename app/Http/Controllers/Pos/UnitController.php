<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function UnitAll(){
        $unites = Unit::latest()->get();
        return view('backend.unit.unit_all', compact('unites'));
    }//end metod
}
