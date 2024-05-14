<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug; 

class DrugController extends Controller
{
    //function for return drugs into select box
    public function showDrugNames()
    {
        $drugNames = Drug::all(); 
        return $drugNames;
    }
}
