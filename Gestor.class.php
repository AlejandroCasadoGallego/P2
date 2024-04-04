<?php
class Gestor {
    protected $username;
    protected $email;
    protected $password;
    protected $rol;
    protected $DNI;
    protected $telefono;
    protected $despacho;
    protected $skills;

    public function __construct($username, $email, $password, $rol, $DNI, $telefono, $despacho, $skills) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
        $this->DNI = $DNI;
        $this->telefono = $telefono;
        $this->despacho = $despacho;
        $this->skills = $skills;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }   

    public function getRol() {
        return $this->rol;
    }   

    public function getDNI() {
        return $this->DNI;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDespacho() {
        return $this->despacho;
    }

    public function getSkills() {
        return $this->skills;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setDNI($DNI) {
        $this->DNI = $DNI;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setDespacho($despacho) {
        $this->despacho = $despacho;
    }

    public function setSkills($skills) {
        $this->skills = $skills;
    }

    public function isAdmin() {return false;}
    public function isGestor() {return true;}
    
}