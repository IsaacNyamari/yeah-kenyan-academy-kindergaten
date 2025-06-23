<?php
require "../includes/functions.php";
$data = file_get_contents("php://input");
$postedData = json_decode($data, true);

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
                $role = $_SESSION['role'];
                echo json_encode([
                    "status" => "Success",
                    "message" => "Logged in successfully as a $role!",
                    "role" => "$role"
                ]);
            } else {
                echo json_encode([
                    "status" => "Error",
                    "message" => "wrong email or password!"
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
                session_start();
                $user = mysqli_fetch_assoc($result);
                $_SESSION['role'] = "admin";
                $_SESSION['fname'] = $user['fname'];
                $_SESSION['lname'] = $user['lname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['admin'] = true;
                $role = $_SESSION['role'];
                echo json_encode([
                    "status" => "Success",
                    "message" => "Logged in successfully as a $role!",
                    "role" => "$role"
                ]);
                exit();
            } else {
                $loginAdmin = "SELECT * FROM students WHERE `email` = ?";
                $stmt = mysqli_prepare($connect, $loginAdmin);
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    session_start();
                    $role = $_SESSION['role'];
                    $user = mysqli_fetch_assoc($result);
                    $_SESSION['role'] = "student";
                    $_SESSION['fname'] = $user['fname'];
                    $_SESSION['lname'] = $user['lname'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['student'] = true;
                    echo json_encode([
                        "status" => "Success",
                        "message" => "Logged in successfully as a $role!",
                        "role" => "$role"
                    ]);
                    exit();
                }
            }
        }
    }
}
if (isset($postedData)) {
    $email = $postedData['email'];
    $password = $postedData['password'];
    $userlogin = new Login();
    echo $userlogin->loginUser($email, $password);
}
