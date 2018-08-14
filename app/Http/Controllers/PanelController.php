<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\User;

class PanelController extends Controller
{
    /**
     * Displays the content
     * 
     * @return View
     */
     public function index()
     {
     }


     /**
      * Log out
      *
      * @return View
      */
    public function logout()
    {
        Auth::logout();
        
        return view('login')
                ->renderSections()['content'];
    }
}
