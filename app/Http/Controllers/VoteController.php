<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Formatur;
use App\Peserta;
use App\Vote;
use Alert;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['formatur'] = Formatur::all();
        return view('vote.index')->with($arr);            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vote $vote)
    {
        $user_id = $request->user_id;
        $formatur_id = $request->formatur_id;
        $cek = DB::table('votes')->where('user_id',$user_id)->count();

        
        if (DB::table('pesertas')->where('user_id',$user_id)->exists() and (count($formatur_id)==13) and ($cek == 0)) {
            foreach ($formatur_id as $id) {
                DB::table('votes')->insert(['formatur_id' => $id, 'user_id' => $user_id]);
                
            }
            alert()->success('Terima Kasih Telah Memilih ','Sukses!')->persistent('Ok');
            return back();
        }
        else
        {
            alert()->error('Periksa kembali ID peserta dan jumlah pilihan Anda, pastikan tidak kurang dan tidak lebih dari 13 ','Oops!')->persistent('Ok');
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   public function hasil(){
    $arr['hasil'] = DB::table('formaturs')
                ->selectRaw('formaturs.id, formaturs.nama, formaturs.nim, (select count(*) from votes where formatur_id = formaturs.id) jumlah')
                ->get();
    $arr['teratas'] = DB::table('formaturs')
                ->selectRaw('formaturs.id, formaturs.nama, formaturs.nim, (select count(*) from votes where formatur_id = formaturs.id) jumlah')
                ->orderByRaw('jumlah desc')
                ->get();
    
    
    return view('tes')->with($arr);
                   
   }
}
