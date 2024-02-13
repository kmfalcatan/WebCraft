<?php
require_once "../dbConfig/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $role = $_POST['role'];
    $fullname = $_POST['fullname'];

    if ($password !== $confirmPassword) {
        echo "Error: Passwords do not match.";
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password, role, fullname) VALUES ('$email', '$hashedPassword', '$role', '$fullname')";

    if ($conn->query($sql) === TRUE) {
       header('Location: ../admin panel/userAccount.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>