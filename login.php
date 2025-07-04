<?php
require "../includes/functions.php";

class Login extends Dbh
{
    public function loginUser(string $email, string $password)
    {
        $connect = $this->connect();
        $loginUser = "SELECT * FROM teachers WHERE `email` = ?";
        $stmt = mysqli_prepare($connect, $loginUser);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['role'] = "teacher";
                $_SESSION['fname'] = $user['fname'];
                $_SESSION['lname'] = $user['lname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['teacher'] = true;
            }else{
                echo json_encode([
                    "status"=>"Error",
                    "message"=>"wrong email or password!"
                ]);
            }
            exit();
        } else {
            $loginAdmin = "SELECT * FROM admins WHERE `email` = ?";
            $stmt = mysqli_prepare($connect, $loginAdmin);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                echo json_encode([
                    "status" => "admin logged in"
                ]);
                exit();
            } else {
                $loginAdmin = "SELECT * FROM students WHERE `email` = ?";
                $stmt = mysqli_prepare($connect, $loginAdmin);
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    echo json_encode([
                        "status" => "student logged in"
                    ]);
                    exit();
                }
            }
        }
    }
}

// $login = new Login();
// echo $loginUser = $login->loginUser("jablessions76@gmail.com", "123");
$data = file_get_contents("php://input");
echo $data;