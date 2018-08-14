<?php

namespace App\Http\Controllers;

use Validator;
use Lang;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Displays the content
     * 
     * @return View
     */
    public function index()
    {
        return view('panel.admin.index')
                ->renderSections()['panel-content'];
    }

    /**
     * Displays the content
     * 
     * @return View
     */
    public function users()
    {
        return view('panel.admin.table')
                ->with('users', User::all())
                ->renderSections()['admin-content'];
    }

    /**
     * Displays the content
     * 
     * @return View
     */
    public function deleted()
    {
        return view('panel.admin.table')
                ->with('users', User::onlyTrashed()->get())
                ->with('restore', true)
                ->renderSections()['admin-content'];
    }

    /**
     * Gets the user data
     * 
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        return view('panel.admin.edit')
                ->with('target', User::where(['id' => $id])->first())
                ->renderSections()['admin-content'];
    }

    /**
     * Saves the user data
     * 
     * @param int $id
     * @param Request $request
     * @return View
     */
    public function save($id, Request $request)
    {
        // Creating an inline validator because of ajax.
        $validator = Validator::make($request->all(), [
            'name'      => 'nullable|min:5|max:50|regex:/^[\p{L} .\'-]+$/',
            'email'     => 'nullable|email|max:100|unique:users,email',
            'password'  => 'nullable|min:6|max:50'
        ], [
            'name.min'      => Lang::get('panel.admin.edit.error.name'),
            'name.max'      => Lang::get('panel.admin.edit.error.name'),
            'name.regex'    => Lang::get('panel.admin.edit.error.name'),
            'email.email'   => Lang::get('panel.admin.edit.error.email'),
            'email.max'     => Lang::get('panel.admin.edit.error.email'),
            'email.unique'  => Lang::get('panel.admin.edit.error.email_unique'),
            'password.min'  => Lang::get('panel.admin.edit.error.password'),
            'password.max'  => Lang::get('panel.admin.edit.error.password')
        ]);

        $request->flash();

        if ($validator->passes()) {
            $user = User::where(['id' => $id])->first();

            if (!empty($request->input('name'))) {
                $user->name = $request->input('name');
            }

            if (!empty($request->input('email'))) {
                $user->email = $request->input('email');
            }

            if (!empty($request->input('password'))) {
                $user->password = bcrypt($request->input('password'));
            }

            if ($user->save()) {
                return view('panel.admin.edit')
                        ->with('target', $user)
                        ->with('success', true)
                        ->renderSections()['admin-content'];
            } else {
                return view('panel.admin.edit')
                        ->with('target', $user)
                        ->with('success', false)
                        ->renderSections()['admin-content'];
            }
        }

        return view('panel.admin.edit')
                ->withErrors($validator)
                ->withInput($request->except(['password']))
                ->renderSections()['admin-content'];
    }

    /**
     * Confirm user deletion
     * 
     * @param int $id
     * @return View
     */
    public function confirm($id)
    {
        return view('panel.admin.delete')
                ->with('target', User::where(['id' => $id])->first())
                ->renderSections()['admin-content'];
    }

    /**
     * Deletes the user
     * 
     * @param int $id
     * @return View
     */
    public function delete($id)
    {
        User::find($id)->delete();

        return view('panel.admin.delete')
                ->with('success', true)
                ->renderSections()['admin-content'];
    }

    /**
     * Restores a registry
     * 
     * @param int $id
     * @return View
     */
    public function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();

        return $this->deleted();
    }
}
