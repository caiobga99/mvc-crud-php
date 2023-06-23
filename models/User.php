<?php



class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $senha;

    public function __construct($id, $name, $email, $senha)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->senha = $senha;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
        return;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return;
    }
}

?>