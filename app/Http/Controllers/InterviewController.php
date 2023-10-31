<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    public function index()
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view("employees.interview.list", $data);
    }
}
