<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;

class MailController extends Controller
{
    public function index(){
        Mail::send('email.reminder', ['user' =>'yabets'], function($m){
            $m->from('yokidatest@gmail.com', 'yabets: subject');
            $m->to('yabetsbelay@gmail.com', 'username:eg')->subject('daily notification');
        });
        return ("true");
    }
}
