<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Hash;
use Lang;
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
        return view('panel.index')
                ->renderSections()['panel-content'];
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

    /**
     * Displays the content
     * 
     * @return View
     */
    public function profile()
    {
        return view('panel.profile')
                ->renderSections()['panel-content'];
    }

    /**
     * Saves the changes in the profile
     * 
     * @param Request $request
     * @return View
     */
    public function save_profile(Request $request)
    {
        // Creating an inline validator because of ajax.
        $validator = Validator::make($request->all(), [
            'name'      => 'required|min:5|max:50|regex:/^[\p{L} .\'-]+$/',
            'email'     => 'required|email|max:100',
            'password'  => 'required|max:50',
            'npassword' => 'nullable|min:6|max:50|different:password',
            'cpassword' => 'same:npassword',
        ], [
            'name.required'       => Lang::get('panel.profile.error.name'),
            'name.min'            => Lang::get('panel.profile.error.name'),
            'name.max'            => Lang::get('panel.profile.error.name'),
            'name.regex'          => Lang::get('panel.profile.error.name'),
            'email.required'      => Lang::get('panel.profile.error.email'),
            'email.email'         => Lang::get('panel.profile.error.email'),
            'email.max'           => Lang::get('panel.profile.error.email'),
            'password.required'   => Lang::get('panel.profile.error.password'),
            'password.min'        => Lang::get('panel.profile.error.invalid_password'),
            'password.max'        => Lang::get('panel.profile.error.invalid_password'),
            'npassword.min'       => Lang::get('panel.profile.error.npassword'),
            'npassword.max'       => Lang::get('panel.profile.error.npassword'),
            'npassword.different' => Lang::get('panel.profile.error.invalid_npassword'),
            'cpassword.same'      => Lang::get('panel.profile.error.cpassword')
        ]);

        $request->flash();

        if ($validator->passes()) {
            if (Hash::check($request->input('password'), Auth::user()->password)) {
                if (strcasecmp($request->input('email'), Auth::user()->email) == 0) {
                    $email = false;
                } else {
                    $email = User::where([
                        ['email', '=', $request->input('email')],
                        ['id', '<>', Auth::user()->id]
                    ])->get();
                }
                if (!$email) {
                    Auth::user()->name  = $request->input('name');
                    Auth::user()->email = $request->input('email');
                    
                    if (!empty($request->input('npassword'))) {
                        Auth::user()->password = bcrypt($request->input('npassword'));
                    }

                    if (Auth::user()->save()) {
                        return view('panel.profile')
                                ->with('success', true)
                                ->renderSections()['panel-content'];
                    } else {
                        return view('panel.profile')
                                ->with('success', false)
                                ->renderSections()['panel-content'];
                    }
                } else {
                    $validator->getMessageBag()->add('email', Lang::get('panel.profile.error.email_unique'));
                }
            } else {
                $validator->getMessageBag()->add('password', Lang::get('panel.profile.error.invalid_password'));
            }
        }

        return view('panel.profile')
                ->withErrors($validator)
                ->withInput($request->except(['password', 'cpassword', 'npassword']))
                ->renderSections()['panel-content'];
    }
}
