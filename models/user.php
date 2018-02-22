<?php

/**
 * Class User
 */
class User extends Model {


    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function checkLogin($email, $password) {
        $stmt = $this->mysqli->prepare("SELECT ID FROM users WHERE Email=? AND Password=?;");
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows() > 0) {
            $stmt->bind_result($user_id);
            $stmt->fetch();

            $_SESSION['UserID'] = $user_id;
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    /**
     * @param $fname
     * @param $lname
     * @param $username
     * @param $email
     * @param $password
     * @param null $user_id
     * @return bool|int
     */
    public function updateUser($fname, $lname, $username, $email, $password, $user_id = null) {
        if (!isset($user_id)) {
            $stmt = $this->mysqli->prepare("INSERT INTO users(FirstName, LastName, UserName, Email, Password) VALUES(?, ?, ?, ?, ?);");
            $stmt->bind_param('sssss', $fname, $lname, $username, $email, $password);
        }

        if ($stmt->execute()) {
            $stmt->store_result();
            return $stmt->insert_id;
        } else {
            return false;
        }
    }


    /**
     * @return array
     */
    public function getUsers() {
        $users = array();

        $stmt = $this->mysqli->prepare("SELECT * FROM users;");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $user_first_name, $user_last_name, $user_username, $user_email, $user_password);

        while ($stmt->fetch()) {


            $object = new stdClass();

            $object->UserID = $user_id;
            $object->FirstName = $user_first_name;
            $object->LastName = $user_last_name;
            $object->UserName = $user_username;
            $object->EmailAddress = $user_email;
            $object->Password = $user_password;

            array_push($users, $object);

        }

        return $users;

        $stmt->close();
    }
}