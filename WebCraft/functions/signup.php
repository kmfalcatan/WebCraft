<?php
require_once('../dbConfig/dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['fullname'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password !== $confirmPassword) {
            $message = "Passwords do not match.";
        } elseif (strpos($email, '@wmsu.edu.ph') === false) {
            $message = "Email should end with @wmsu.edu.ph.";
        } else {
            $result = registerUser($fullname, $username, $email, $password);

            if ($result) {
                if ($result === 'admin') {
                    header('Location: ../authentication/login.php');
                    exit();
                } else {
                    header('Location: login.php');
                    exit();
                }
            } else {
                $message = "Email already exists.";
            }
        }
    } else {
        $message = "Please fill in all required fields.";
    }
}

function registerUser($fullname, $username, $email, $password)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return false;
    }

    $role = (strpos($username, '@admin') !== false) ? 'admin' : 'user'; 

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, password, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullname, $username, $email, $hashedPassword, $role);

    if ($stmt->execute()) {
        return $role;
    } else {
        return false;
    }
}
?>