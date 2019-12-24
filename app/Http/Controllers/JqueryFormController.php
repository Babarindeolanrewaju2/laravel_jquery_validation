<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Redirect;

class JqueryFormController extends Controller
{

    public function index()
    {

        return view('jqueryform');

    }

    public function save(Request $request)
    {

        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|unique:users',
        ]);

        $data = $request->all();
        $check = Customer::create($data);
        return Redirect::to("jqueryform")->withSuccess('Great! Form successfully submit with validation.');

    }
}
