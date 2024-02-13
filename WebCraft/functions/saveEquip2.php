<?php
include '../dbConfig/dbconnect.php';

if(isset($_POST['submit_form1'])){

    $user = $_POST['user'];
    $article = $_POST['article'];
    $deployment = $_POST['deployment'];
    $property_number = $_POST['property_number'];
    $account_code = $_POST['account_code'];
    $units = $_POST['units'];
    $unit_value = $_POST['unit_value'];
    $total_value = $_POST['total_value'];
    $remarks = $_POST['remarks'];
    $description = $_POST['description'];
    $year_received = $_POST['year_received'];

    $target_dir = "../uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Error: File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 500000) {
        echo "Error: File is too large.";
        $uploadOk = 0;
    }

    $allowed_formats = array("jpg", "jpeg", "png", "gif");
    if(!in_array($imageFileType, $allowed_formats)) {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            $sql = "INSERT INTO equipment (user, article, deployment, property_number, account_code, units, unit_value, total_value, remarks, description, year_received, image) 
                    VALUES ('$user', '$article', '$deployment', '$property_number', '$account_code', '$units', '$unit_value', '$total_value', '$remarks', '$description', '$year_received', '$image_name')";

            if ($conn->query($sql) === TRUE) {
                session_start();
                $_SESSION['equipment_ID'] = $conn->insert_id; 

                header("Location: ../user panel/addOtherinfo.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Failed to upload image.";
        }
    }

    $conn->close();
}
?>
