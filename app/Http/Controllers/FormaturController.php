<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formatur;

class FormaturController extends Controller
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
        $arr['formatur'] = Formatur::all();
        return view('admin.formatur.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formatur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Formatur $formatur)
    {
        if (isset($request->image) && $request->image->getClientOriginalName()) {
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->storeAs('public/formatur',$file);
        }
        else
        {
            $file = '';
        }
        if ($request->nama != '' and $request->panggilan != '' and $request->nim != '' and $request->jurusan != '' and $request->visi != '') {
            $formatur->nama = $request->nama;
            $formatur->panggilan = $request->panggilan;
            $formatur->nim = $request->nim;
            $formatur->ttl = $request->ttl;
            $formatur->jurusan = $request->jurusan;
            $formatur->visi = $request->visi;
            $formatur->image = $file;
            $formatur->save();
            alert()->success('Data Berhasil  Ditambahkan')->persistent('OK');
            return back();
        }else
        {
            alert()->error('Silakan Periksa data anda yang anda Masukkan','Gagal Menambahkan Data')->persistent('ok');
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
    public function edit(Formatur $formatur)
    {
        $arr['formatur'] = $formatur;
        return view('admin.formatur.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formatur $formatur)
    {
        if (isset($request->image) && $request->image->getClientOriginalName()) {
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->storeAs('public/formatur',$file);
        }
        else
        {
            if (!$formatur->image)
                $file = '';
            else
                $file = $formatur->image;

        }

        if ($request->nama != '' and $request->panggilan != '' and $request->nim != '' and $request->jurusan != '' and $request->visi != '') {
            $formatur->nama = $request->nama;
            $formatur->panggilan = $request->panggilan;
            $formatur->nim = $request->nim;
            $formatur->ttl = $request->ttl;
            $formatur->jurusan = $request->jurusan;
            $formatur->visi = $request->visi;
            $formatur->image = $file;
            $formatur->save();
            alert()->success('Data Berhasil Perbaharui')->persistent('OK');
            return back();
        }else
        {
            alert()->error('Silakan Periksa data anda yang anda Masukkan','Gagal Menambahkan Data')->persistent('ok');
            return back();
        }
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
}
