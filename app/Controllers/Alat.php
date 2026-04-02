<?php

namespace App\Controllers;

class Alat extends BaseController
{
    public function index()
    {
        return view('alat/index');
    }
    public function data()
    {
        return view('alat/data');
    }

    public function tambah()
    {
        return view('alat/tambah');
    }

    public function peminjaman()
    {
        return view('alat/peminjaman');
    }

    public function laporan()
    {
        return view('alat/laporan');
    }
}
