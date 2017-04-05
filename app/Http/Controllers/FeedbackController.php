<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Feedback";
    }
    function index() {
        if (Auth::check()) {
            $this->general->identity = Auth::user()->getType();
            return view('feedback', ['general' => $this->general]);
        }
        return redirect('sign_in'); 
    }
}
