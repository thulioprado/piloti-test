<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Lang;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /**
     * Displays the content
     * 
     * @return View
     */
    public function index()
    {
        return view('login')
                ->renderSections()['content'];
    }

    /**
     * Checks the credentials and log in.
     * 
     * @param Request $request
     * @return View
     */
    public function login(Request $request)
    {
        // Creating an inline validator because of ajax.
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|max:100',
            'password'  => 'required|max:50',
        ], [
            'email.required'    => Lang::get('login.error.email'),
            'email.email'       => Lang::get('login.error.check_email'),
            'email.email'       => Lang::get('login.error.check_email'),
            'password.required' => Lang::get('login.error.password'),
            'password.max'      => Lang::get('login.error.check_password')            
        ]);

        $request->flashOnly('email');
        
        if ($validator->passes()) {
            if (Auth::attempt([
                'email'     => $request->input('email'), 
                'password'  => $request->input('password')
            ], $request->has('remember'))) {
                return view('panel.index')
                            ->renderSections()['content'];
            } else {
                $validator->getMessageBag()->add('email', Lang::get('login.error.check_email'));
                $validator->getMessageBag()->add('password', Lang::get('login.error.check_password'));
            }
        }
        
        return view('login')
                ->withErrors($validator)
                ->withInput($request->except('password'))
                ->renderSections()['content'];
    }
}
