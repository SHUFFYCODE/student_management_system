<?php


namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\UserModel;


class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }


    public function generatePassword()
    {
        $password = 'admin123';
        echo password_hash($password, PASSWORD_DEFAULT);
    }


    public function registerUser()
    {
        helper(['form']);


        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[20]|alpha_numeric',
            'password' => 'required|min_length[6]',
        ]);


        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', implode(', ', $validation->getErrors()));
        }


        $username = esc($this->request->getPost('username'));
        $password = $this->request->getPost('password');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        $userModel = new UserModel();


        if ($userModel->where('username', $username)->first()) {
            return redirect()->back()->with('error', 'Username already exists!');
        }


        $userModel->insert([
            'username' => $username,
            'password' => $hashedPassword,
            'role'     => 'user'
        ]);


        return redirect()->to('/login')->with('success', 'Registration successful!');
    }


    public function login()
    {
        return view('auth/login');
    }


    public function loginCheck()
    {
        helper(['form']);


        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|alpha_numeric',
            'password' => 'required',
        ]);


        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', implode(', ', $validation->getErrors()));
        }


        $username = esc($this->request->getPost('username'));
        $password = $this->request->getPost('password');


        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();


        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'isLoggedIn' => true,
                'username'   => $user['username'],
                'role'       => $user['role']
            ]);


            return redirect()->to('/students');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password!');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}


