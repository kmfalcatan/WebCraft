<?php
session_start();

require_once '../dbConfig/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = loginUser($email, $password);

        if ($result === true) {
            $user = getUserByEmail($email);
            $_SESSION['user_id'] = $user['id'];
            if ($user['role'] === 'admin') {
                header("Location: ../admin panel/dashboard.php?id=" . $user['id']);
            } else {
                header("Location: ../user panel/dashboard.php?id=" . $user['id']);
            }
            exit();
        } else {
            $_SESSION['login_error'] = $result;
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Please fill in all required fields.";
        header('Location: login.php');
        exit();
    }
}

function loginUser($email, $password)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        return "Invalid email or password.";
    }

    $user = $result->fetch_assoc();
    $hashedPassword = $user['password'];

    if (password_verify($password, $hashedPassword)) {
        return true;
    } else {
        return "Invalid email or password.";
    }
}

function getUserByEmail($email)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        return null;
    }

    return $result->fetch_assoc();
}
?>