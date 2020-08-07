<?php
include 'database.php';
class User extends DB{
    private $nombre;
    private $username;
    private $rol;
    private $nombrerol;
    public function userExists($user, $pass){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE correo = :user AND pass = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE correo = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombres'];
            $this->username = $currentUser['username'];
        }
    }
    public function getNombre(){
        return $this->nombre;
        
    }

    public function getRol(){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE correo = :user');
        $query->execute(['tipo' => $this->rol]);

        foreach ($query as $currentUser) {
            $this->nombrerol = $currentUser['rol'];
        }
        return $this->nombrerol;
    }

   

    
}
?>