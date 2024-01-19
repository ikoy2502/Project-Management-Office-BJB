<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index (){
        return view('admin');
    }

    function GH (){
        return view('home');
    } 

    function MGR (){
        return view('admin');
    } 
    
    function SPV (){
        return view('admin');
    } 
    
    function Staff (){
        return view('admin');
    } 

    function QA (){
        return view('admin');
    } 



}
