<?php
include "../dbConfig/dbconnect.php";
include "../functions/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $sql = "UPDATE users SET 
            username = '$username',
            fullname = '$fullname',
            email = '$email',
            contact = '$contact',
            department = '$department',
            address = '$address',
            gender = '$gender'
            WHERE id = '$userID'";

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
           
            $sql = "UPDATE users SET profile_img = '$image_name' WHERE id = '$userID'";
            
            if ($conn->query($sql) === TRUE) {
                echo "Profile image updated successfully";
            } else {
                echo "Error updating profile image: " . $conn->error;
            }
        } else {
            echo "Error uploading profile image.";
        }
    }

    $userInfo = getUserInfo($conn, $userID);
    $role = $userInfo['role'];

    if ($role === 'admin') {
        header("Location: ../admin panel/userProfile.php?id=" . $userID);
    } else {
        header("Location: ../user panel/userProfile.php?id=" . $userID);
    }
    
    exit();
}

?>