<?php

namespace App\Http\Controllers\BranchB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrownlinesTController extends Controller
{
    public function index()
    {
        return view('branchb.brownlinestech.index');
    }

}
