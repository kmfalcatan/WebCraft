<?php
require_once('../dbConfig/dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_name'], $_POST['password'])) {
        $username = $_POST['user_name'];
        $password = $_POST['password'];

        $result = loginUser($username, $password);

        if ($result) {
            if ($result === 'admin') {
                header('Location: ../admin panel/dashboard.php');
                exit();
            } else {
                header('Location: ../userPanel/dashboard.php');
                exit();
            }
        } else {
            $message = "Invalid username or password.";
        }
    } else {
        $message = "Please fill in all required fields.";
    }
}

function loginUser($username, $password)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            return $row['role'];
        }
    }

    return false;
}
?>