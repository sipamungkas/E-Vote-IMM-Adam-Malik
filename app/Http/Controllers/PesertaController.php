<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Peserta;
use Alert;

class PesertaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $arr['peserta'] = DB::table('pesertas')
                ->selectRaw('pesertas.user_id,(select count(*) from votes where user_id=pesertas.user_id) jumlah')
                ->orderByRaw('created_at desc')
                ->paginate(6);
        
        // $arr['peserta']= Peserta::orderBy('created_at','desc')->paginate(6);
        $arr['total']=Peserta::all();
        // $arr['peserta']=Peserta::all();
        // $arr['peserta'] = DB::table('peserta')->orderBy('created_at','desc')->get();
        return view('admin.peserta.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // return view('admin.peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Peserta $peserta)
    {
        
        
        
        $id = 'musy10'.str_random(6);

        $peserta->user_id = $id;
        $peserta->save();
        alert()->success($id,'Berikut Adalah ID Peserta')->persistent('Done');
        return redirect()->route('admin.peserta.index');
        
        
        
        // return redirect()->route('admin.peserta.index');
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

        DB::table('pesertas')->where('user_id',$id)->delete();
        alert()->success($id,'Berhasil Menghapus ID Peserta')->persistent('Done');
        return redirect()->route('admin.peserta.index');
    }
}
