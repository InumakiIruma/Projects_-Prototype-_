<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FeedbackModel;

class FeedbackController extends BaseController
{
    protected $feedbackModel;

    public function __construct()
    {
        // Inisialisasi model agar bisa digunakan di semua method
        $this->feedbackModel = new FeedbackModel();
    }

    /**
     * Menampilkan halaman form feedback
     */
    public function index()
    {
        $data = [
            'title' => 'Feedback & Bug Report'
        ];
        return view('feedback_view', $data);
    }

    /**
     * Memproses data yang dikirim dari form
     */
    public function send()
    {
        // 1. Validasi input (opsional tapi sangat disarankan)
        $rules = [
            'nama'  => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'tipe'  => 'required|in_list[Bug,Saran,Error]',
            'pesan' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Mohon isi form dengan benar.');
        }

        // 2. Ambil data dari post
        $data = [
            'nama'       => $this->request->getPost('nama'),
            'email'      => $this->request->getPost('email'),
            'tipe'       => $this->request->getPost('tipe'),
            'pesan'      => $this->request->getPost('pesan'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        // 3. Simpan ke database
        try {
            $this->feedbackModel->insert($data);

            // Redirect dengan pesan sukses
            return redirect()->to('/feedback')->with('success', 'Laporan Anda berhasil dikirim! Tim kami akan segera meninjaunya.');
        } catch (\Exception $e) {
            // Jika terjadi error pada database
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    /**
     * Bonus: Method untuk melihat daftar feedback (Khusus Admin)
     */
    public function list()
    {
        $model = new \App\Models\FeedbackModel();
        $data = [
            'title'    => 'Daftar Masuk Feedback',
            'feedback' => $model->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/feedback_list', $data);
    }
}
