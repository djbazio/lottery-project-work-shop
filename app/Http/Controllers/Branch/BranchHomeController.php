<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchHomeController extends Controller
{
    public function index(){
        return view('auth.branch.home');
    }
}
