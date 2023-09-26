<?php
require_once('../models/logjnModel.php');
include('../helpers/SQLChecker.php');
class loginController
{
    private $model;
    private $sqlChecker; // Changed variable name to lowercase

    public function __construct()
    {
        $this->model = new LoginModel; // Corrected class name to LoginModel
        $this->sqlChecker = new SqlChecker; // Corrected class name to SqlChecker
    }

    public function loginAuth($user, $pass)
    {
        if ($this->sqlChecker->SQL_Injection($user) == true || $this->sqlChecker->SQL_Injection($pass) == true) {
            return "sql";
        } else {
            return $this->model->Auth($user, $pass);
        }
    }
    public function Register($user, $pass)
    {
        if ($this->sqlChecker->SQL_Injection($user) == true || $this->sqlChecker->SQL_Injection($pass) == true) {
            return "sql";
        } else {
            return $this->model->Register($user, $pass);
        }
    }
}


$controller = new LoginController;
$action = $_POST['action'];

//Auth Login
if ($action == "login") {
    $response = $controller->loginAuth($_POST['user'], $_POST['pass']);
    if ($response) {
        session_start();
        $_SESSION['S_ID'] = $response[0]['td_id'];
        $_SESSION['S_NAME'] = $response[0]['td_username'];
    }
    echo json_encode($response);
}
if ($action == "register") {
    $response = $controller->Register($_POST['user'], $_POST['pass']);
    if ($response) {
        session_start();
        $_SESSION['S_ID'] = $response;
    }
    echo json_encode($response);
}
