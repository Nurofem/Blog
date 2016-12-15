<?php

namespace Core\Auth;

//用户数据库验证

class DBAuth{


    protected $db ;

    public function __Construct($db)
    {
        $this->db = $db;
    }


    public function login($username , $password)
    {   
        
        $user = $this->db->prepare(
            'SELECT * FROM users WHERE username = ?',
            [$username],
          '\App\Entity\UsersEntity',
          true
            );
        if(is_null($user))
        {
            return false;
        }   
        if($user->password === sha1($password))
        {
            $_SESSION['auth'] = $user;
            return true;
        }
        return false;
            
    }

    public function logged()
    {
        return isset($_SESSION['auth']);
    }

}