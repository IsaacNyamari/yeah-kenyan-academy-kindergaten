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
            echo json_encode([
                "status" => "teacher logged in"
            ]);
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
            }
        }
    }
}

$login = new Login();
echo $loginUser = $login->loginUser("vincentj@gmail.com", "admin123");
