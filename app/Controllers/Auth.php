<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        // Kalau sudah login, jangan balik ke login lagi
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        return view('auth/login');
    }

    // Proses login
    public function prosesLogin()
    {
        $session = session();
        $usersModel = new UsersModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $users = $usersModel->getUsersByUsername($username);

        if ($users) {
            if (password_verify($password, $users['password'])) {

                // SET SESSION
                $session->set([
                    'id_user'   => $users['id_user'],
                    'nama'      => $users['nama'],
                    'username'  => $users['username'],
                    'role'      => $users['role'],
                    'foto'      => $users['foto'],
                    'logged_in' => true
                ]);

                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('salahpw', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Nama tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
