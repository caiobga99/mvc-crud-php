<?php
class UserDao implements DAO
{

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function create($data)
    {
        $nome = $data['name'];
        $email = $data['email'];
        $senha = $data['password'];

        $sql = "INSERT INTO user(name, email, password) VALUES ('$nome', '$email', '$senha')";
        $this->db->connect();
        $results = $this->db->query($sql);
        $id = $this->db->getLastInsertedId();
        $this->db->close();

        if ($results) {
            return new User($id, $nome, $email, $senha);
        } else {
            die("Error in create new User" . $this->db->getError());
        }
    }
    public function read()
    {
        $sql = "SELECT * FROM user";
        $this->db->connect();
        $results = $this->db->query($sql);

        $users = array();

        if ($results && $results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                $user = new User($row['id'], $row['name'], $row['email'], $row['password']);
                $users[] = $user;
            }
        }

        $this->db->close();
        return $users;

    }
    public function update($id, $data)
    {
        $nome = $data['name'];
        $email = $data['email'];

        $sql = "UPDATE user SET name='$nome', email='$email' WHERE id=$id";
        $this->db->connect();
        $results = $this->db->query($sql);
        $this->db->close();
        return $results;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM user WHERE id=$id";
        $this->db->connect();
        $results = $this->db->query($sql);
        $this->db->close();
        return $results;

    }
}


?>