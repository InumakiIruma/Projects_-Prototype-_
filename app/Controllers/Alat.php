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
        $db = \Config\Database::connect();
        $alat = $db->table('alat')->get()->getResultArray();

        return view('alat/data', [
            'alat' => $alat
        ]);
    }
    public function tambah()
    {
        return view('alat/tambah');
    }

    public function peminjaman()
    {
        $db = \Config\Database::connect();
        $alat = $db->table('alat')->get()->getResultArray();

        return view('alat/peminjaman', [
            'alat' => $alat
        ]);
    }
    public function laporan()
    {
        return view('alat/laporan');
    }
    public function simpan()
    {
        $db = \Config\Database::connect();

        $db->table('alat')->insert([
            'nama_alat' => $this->request->getPost('nama_alat'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jumlah' => $this->request->getPost('persediaan')
        ]);

        return redirect()->to('/alat/data')
            ->with('success', 'Data berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $db = \Config\Database::connect();
        $alat = $db->table('alat')->where('id_alat', $id)->get()->getRowArray();

        return view('alat/edit', [
            'alat' => $alat
        ]);
    }
    public function update($id)
    {
        $db = \Config\Database::connect();

        $db->table('alat')->where('id_alat', $id)->update([
            'nama_alat' => $this->request->getPost('nama_alat'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jumlah' => $this->request->getPost('persediaan')
        ]);

        return redirect()->to('/alat/data')
            ->with('success', 'Data berhasil diupdate!');
    }
    public function delete($id)
    {
        $db = \Config\Database::connect();

        $db->table('alat')->where('id_alat', $id)->delete();

        return redirect()->to('/alat/data')
            ->with('success', 'Data berhasil dihapus!');
    }
}
