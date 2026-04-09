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

    // ================= TAMBAH ALAT =================
    public function simpan()
    {
        $db = \Config\Database::connect();

        $db->table('alat')->insert([
            'nama_alat' => $this->request->getPost('nama_alat'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jumlah' => $this->request->getPost('persediaan')
        ]);

        return redirect()->to('/alat/data')
            ->with('success', 'Data alat berhasil ditambahkan!');
    }

    // ================= PINJAM ALAT =================
    public function pinjam()
    {
        $db = \Config\Database::connect();
        $id_alat = $this->request->getPost('id_alat');

        $alat = $db->table('alat')
            ->where('id_alat', $id_alat)
            ->get()
            ->getRowArray();

        // ❌ kalau stok habis
        if (!$alat || $alat['jumlah'] <= 0) {
            return redirect()->to('/alat/peminjaman')
                ->with('error', '❌ Stok alat sudah habis!');
        }

        // simpan peminjaman
        $db->table('peminjaman')->insert([
            'id_alat' => $id_alat,
            'nama_peminjam' => $this->request->getPost('nama'),
            'tanggal_pinjam' => date('Y-m-d')
        ]);

        // kurangi stok (aman)
        $db->table('alat')
            ->where('id_alat', $id_alat)
            ->set('jumlah', 'jumlah-1', false)
            ->update();

        return redirect()->to('/alat/peminjaman')
            ->with('success', '✅ Berhasil meminjam alat!');
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
