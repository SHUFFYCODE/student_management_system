<?php


namespace App\Models;


use CodeIgniter\Model;


class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'role']; 


    public function usernameExists($username)
    {
        return $this->where('username', $username)->countAllResults() > 0;
    }
}


