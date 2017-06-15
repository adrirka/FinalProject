<?php

namespace Repository;

use Entity\User;


class UserRepository extends RepositoryAbstract{
    
    public function insert(User $user){
        $this->db->insert('user',
            ['email' => $user->getEmail(), 'password'=> $user->getPassword(),
            ]);
    }
    
    public function findByEmail($email){
        $dbUser = $this->db->fetchAssoc('SELECT * FROM user WHERE email = :email', [':email'=> $email]);
        var_dump($dbUser);
        if(!empty($dbUser)){
            $user = new User();
            
            $user
                ->setEmail($dbUser['email'])
                ->setPassword($dbUser['password'])
                ->setRole($dbUser['role']);
                    
            return $user;
        }
     return null;   
    } 
}
