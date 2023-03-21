<?php
class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $date;

    public function getId()
    {
        return $this->id;
    }

    public function setId($i)
    {
        $this->id = trim($i);
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($n)
    {
        $this->nome = ucwords(trim($n));
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($e)
    {
        $this->email = strtolower(trim($e));
    }

    public function getData()
    {
        return $this->date;
    }

    public function setData($d)
    {
        $this->date = $d;
    }
}

interface UsuarioDAO
{
    public function create(Usuario $u);
    public function readAll();
    public function findByEmail($email);
    public function findByID($id);
    public function update(Usuario $U);
    public function delete($id);
}
