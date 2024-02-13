<?php
include "../dbConfig/dbconnect.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

function getUserInfo($conn, $id) {
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null; 
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $department = $_POST['department'];

    $sql = "UPDATE users SET 
            username = '$username',
            fullname = '$fullname',
            email = '$email',
            contact = '$contact',
            department = '$department'
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    if ($_FILES['profile_img']['error'] === 0) {
        $uploadsDirectory = '../uploads/';
        $image_name = basename($_FILES['profile_img']['name']);
        $target_file = $uploadsDirectory . $image_name;

        if (move_uploaded_file($_FILES['profile_img']['tmp_name'], $target_file)) {
           
            $sql = "UPDATE users SET profile_img = '$image_name' WHERE id = '$id'";
            
            if ($conn->query($sql) === TRUE) {
                echo "Profile image updated successfully";
            } else {
                echo "Error updating profile image: " . $conn->error;
            }
        } else {
            echo "Error uploading profile image.";
        }
    }

    // Get the role of the user
    $userInfo = getUserInfo($conn, $id);
    $role = $userInfo['role'];

    // Redirect based on the user's role
    if ($role === 'admin') {
        header("Location: ../admin panel/userProfile.php?id=" . $id);
    } else {
        header("Location: ../user panel/userProfile.php?id=" . $id);
    }
    
    exit();
}

$userInfo = getUserInfo($conn, $id);

?>