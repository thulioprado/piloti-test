<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Lang;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    /**
     * Displays the content
     * 
     * @return View
     */
    public function index()
    {
        return view('register')
                ->renderSections()['content'];
    }

    /**
     * Saves the user data and log in.
     * 
     * @param Request $request
     * @return View
     */
    public function save(Request $request)
    {
        // Creating an inline validator because of ajax.
        $validator = Validator::make($request->all(), [
            'name'      => 'required|min:5|max:50|regex:/^[\p{L} .\'-]+$/',
            'email'     => 'required|email|max:100|unique:users,email',
            'password'  => 'required|min:6|max:50',
            'cpassword' => 'required|same:password'
        ], [
            'name.required'      => Lang::get('register.error.name'),
            'name.min'           => Lang::get('register.error.name'),
            'name.max'           => Lang::get('register.error.name'),
            'name.regex'         => Lang::get('register.error.name'),
            'email.required'     => Lang::get('register.error.email'),
            'email.email'        => Lang::get('register.error.email'),
            'email.max'          => Lang::get('register.error.email'),
            'email.unique'       => Lang::get('register.error.email_unique'),
            'password.required'  => Lang::get('register.error.password'),
            'password.min'       => Lang::get('register.error.password_minmax'),
            'password.max'       => Lang::get('register.error.password_minmax'),
            'cpassword.required' => Lang::get('register.error.cpassword'),
            'cpassword.same'     => Lang::get('register.error.cpassword_same'),
        ]);

        $request->flash();

        if ($validator->passes()) {
            $user           = new User();
            $user->name     = $request->input('name');
            $user->email    = $request->input('email');
            $user->password = bcrypt($request->input('password'));

            if ($user->save()) {
                Auth::attempt([
                    'email'     => $request->input('email'), 
                    'password'  => $request->input('password')
                ]);

                return view('panel.index')
                        ->renderSections()['content'];
            }
        }
                
        return view('register')
                ->withErrors($validator)
                ->withInput($request->except(['password', 'cpassword']))
                ->renderSections()['content'];
    }
}
