<?php
include '../dbConfig/dbconnect.php';
include '../functions/header.php';
include '../authentication/auth.php';

if (isset($_POST['submit_form1'])) {
    $user = $_POST['user'];
    $equipment_name = $_POST['article'];
    $deployment = $_POST['deployment'];
    $property_number = $_POST['property_number'];
    $account_code = $_POST['account_code'];
    $units = $_POST['units'];
    $unit_value = $_POST['unit_value'];
    $total_value = $_POST['total_value'];
    $remarks = $_POST['remarks'];
    $description = $_POST['description'];
    $year_received = $_POST['year_received'];
    $warranty_start = $_POST['warranty_start'];
    $warranty_end = $_POST['warranty_end'];
    $budget = $_POST['budget'];
    $instruction = $_POST['instruction'];

    // Handling image upload
    $target_dir = "../uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Handling warranty image upload
    $warranty_image_name = basename($_FILES["warranty_image"]["name"]);
    $warranty_target_file = $target_dir . $warranty_image_name;
    $warranty_imageFileType = strtolower(pathinfo($warranty_target_file, PATHINFO_EXTENSION));

    $uploadOk = 1;

    // Check if image file is a actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "Error: File is not an image.";
        $uploadOk = 0;
    }

    // Check if warranty image file is a actual image
    $warranty_check = getimagesize($_FILES["warranty_image"]["tmp_name"]);
    if ($warranty_check === false) {
        echo "Error: Warranty File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000 || $_FILES["warranty_image"]["size"] > 500000) {
        echo "Error: File is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_formats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_formats) || !in_array($warranty_imageFileType, $allowed_formats)) {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk) {
        // Move image to target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["warranty_image"]["tmp_name"], $warranty_target_file)) {

            // Your existing SQL code here...
            $sql = "INSERT INTO equipment (user, article, deployment, property_number, account_code, units, unit_value, total_value, remarks, description, year_received, warranty_start, warranty_end, image, warranty_image, budget, instruction) 
                    VALUES ('$user', '$equipment_name', '$deployment', '$property_number', '$account_code', '$units', '$unit_value', '$total_value', '$remarks', '$description', '$year_received', '$warranty_start', '$warranty_end', '$image_name', '$warranty_image_name', '$budget', '$instruction')";

            if ($conn->query($sql) === TRUE) {
                $equipment_ID = $conn->insert_id;

                for ($i = 0; $i < $units; $i++) {
                    $insert_unit_sql = "INSERT INTO units (unit_ID, equipment_ID, equipment_name, status) 
                                        VALUES ('$unit_id', '$equipment_ID', '$equipment_name', 'Available')";
                    if ($conn->query($insert_unit_sql) !== TRUE) {
                        echo "Error: " . $insert_unit_sql . "<br>" . $conn->error;
                    }
                    $unit_id++;
                }

                $_SESSION['equipment_ID'] = $equipment_ID;

                $userInfo = getUserInfo($conn, $userID);
                $role = $userInfo['role'];

                if ($role === 'admin') {
                    header("Location: ../admin panel/dashboard.php?id={$userID}");
                } else {
                    header("Location: ../user panel/dashboard.php?id={$userID}");
                }
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Failed to upload one or both images.";
        }
    }

    $conn->close();
}
?>
