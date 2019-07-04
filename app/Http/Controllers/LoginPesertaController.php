<?php

namespace App\Http\Controllers;
use App\Peserta;

use Illuminate\Http\Request;

class LoginPesertaController extends Controller
{
    public function login(){
        unset($user);
        return view('vote.login-peserta');
    }

    public function store(Request $request){
    	$user = $request->user;
    	if (isset($user)) {
    		$cek = Peserta::find($user)->exists();
	    	if ($cek) {
	    		$arr['user'] = $user;
	    		return view('vote.login-sukses')->with($arr);
	    	}	
    	}
    	
    	return redirect('login-peserta');
    	
    }
}
