<?php
require_once('../Database/DbConection.php');
class LoginModel extends DbConection
{

    #region SELECT
    public function Auth($username, $pass)
    {
        $pass = hash('sha256', $pass);
        $pass = substr($pass, 0, 12);
        $sql = "SELECT * FROM td_users WHERE td_username = '$username' AND td_password = '$pass' AND td_state = 1 LIMIT 1";
        $results = $this->getQuery($sql);
        if (sizeof($results) > 0) {
            return $results;
        } else {
            return 'no valido';
        }
    }
    #endregion
    #region INSERT
    public function Register($username, $pass)
    {
        if ($this->UsernameChecker($username)) {
            $pass = hash('sha256', $pass);
            $sql = "INSERT INTO td_users(td_username,td_password) VALUES ('$username','$pass')";
            if ($this->setQuery($sql)) {
                $sql = "SELECT * FROM td_users ORDER BY td_id DESC LIMIT 1";
                $results = $this->getQuery($sql);
                return $results[0]['td_id'];
            }
        } else {
            return false;
        }
    }
    #endregion
    #region UPDATE
    #endregion
    #region DELETE
    #endregion
    #region MISC
    #endregion

    public function UsernameChecker($username)
    {
        $sql = "SELECT * FROM td_users WHERE td_username = '$username' LIMIT 1";
        $results = $this->getQuery($sql);
        if (sizeof($results) == 0) {
            //If the username is available
            return true;
        } else {
            //if the username is not available
            return false;
        }
    }
}
