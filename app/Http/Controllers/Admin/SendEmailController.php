<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function sendEmail(Request $request)
    {
        dd($request->all());
    }
}
