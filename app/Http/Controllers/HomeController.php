<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formatur;
use App\Peserta;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['formatur'] = Formatur::all();
        $arr['peserta'] = Peserta::all();
        return view('home')->with($arr);
    }

    public function myNotification($type)
    {
        switch ($type) {

            case 'message':

                alert()->message('Sweet Alert with message.');

                break;

            case 'basic':

                alert()->basic('Sweet Alert with basic.','Basic');

                break;

            case 'info':

                alert()->info('Sweet Alert with info.');

                break;

            case 'success':

                alert()->success('Sweet Alert with success.','Welcome to ItSolutionStuff.com')->autoclose(3500);

                break;

            case 'error':

                alert()->error('Sweet Alert with error.');

                break;

            case 'warning':

                alert()->warning('Sweet Alert with warning.');

                break;

            default:

                # code...

                break;

        }


        return view('my-notification');
    }
}
