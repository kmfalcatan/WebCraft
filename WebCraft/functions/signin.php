<?php
require_once '../dbConfig/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = loginUser($email, $password);

        if ($result === true) {
            exit();
        } else {
            session_start();
            $_SESSION['login_error'] = $result;
            header('Location: login.php');
            exit();
        }
    } else {
        session_start();
        $_SESSION['login_error'] = "Please fill in all required fields.";
        header('Location: login.php');
        exit();
    }
}

function loginUser($email, $password)
{
    global $conn;

    // Check if the provided email and password match the admin credentials
    if ($email === 'admin@wmsu.edu.ph' && $password === 'adminPass') {
        session_start();
        $_SESSION['user_id'] = 1; // Assuming admin has user_id 1
        $_SESSION['email'] = $email;
        header('Location: /WebCraft/admin panel/dashboard.php');
        exit();
    }

    // If not admin credentials, check the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        return "Invalid email or password.";
    }

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        if ($user['email'] === 'admin@wmsu.edu.ph') {
            header('Location: /WebCraft/admin panel/dashboard.php');
            exit();
        } else {
            header('Location: /WebCraft/studentDashboard/home.php');
            exit();
        }
    } else {
        return "Invalid email or password.";
    }
}
