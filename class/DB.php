<?php
class DB
{
    private $_db;

    /**
     * DB constructor.
     */
    public function __construct()
    {
        $servername = "localhost";
        $username = "user";
        $password = "1234";
        $dbname = "mysql";

        $this->_db = mysqli_connect($servername, $username, $password, $dbname);
    }

    function __destruct()
    {
        $this->_db->close();
    }

    private function query($sql)
    {
        return $this->_db->query($sql);
    }

    public function escape_string($str)
    {
        return $str = $this->_db->real_escape_string($str);
    }

    public function getCommentsBD()
    {
        return $this->_db->query("SELECT u.login, co.comment, co.id_parrent, co.id
                                        FROM `comments` co
                                        INNER JOIN `users` u
                                        ON u.id = co.user
                                        ORDER BY co.id");
    }

    public function addCommentBD($id, $comments, $parrent)
    {
        $sql = 'INSERT INTO comments (comment, id_parrent, user)
        VALUES ("' . $this->escape_string($comments) . '",
                "' . $this->escape_string($parrent) . '",
                "' . $this->escape_string($id) . '")';
        $this->query($sql);
    }

    public function addUserInBD($login, $password, $email, $name, $surname)
    {
        $sql = 'INSERT INTO users (login,password,email,surname,name)
        VALUES("' . $this->_db->escape_string($login) . '",
        "' . $this->escape_string($password) . '",
        "' . $this->escape_string($email) . '",
        "' . $this->escape_string($surname) . '",
        "' . $this->escape_string($name) . '")';

        if (!empty($this->query($sql))) {
            return true;
        } else {
            return false;
        }
    }

    public function validate($login,$password)
    {
        if (!empty($this->authorisationBD($login, $password))) {
            return true;
        } else {
            return false;
        }
    }

    public function authorisationBD($login, $password)
    {
        $sql = 'SELECT * FROM users WHERE login= "' . $this->escape_string($login) . '"
                            AND password = "' . $this->escape_string($password) . '"';
        return $this->query($sql)->fetch_array();
    }
}