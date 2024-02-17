<?php
include '../dbConfig/dbconnect.php';

if (isset($_POST['submit_form1'])) {

    $user = $_POST['user'];
    $equipment_name = $_POST['article'];
    $deployment = $_POST['deployment'];
    $property_number = $_POST['property_number'];
    $account_code = $_POST['account_code'];
    $units = $_POST['units'];
    $total_value = $_POST['total_value'];
    $remarks = $_POST['remarks'];
    $description = $_POST['description'];
    $year_received = $_POST['year_received'];

    $target_dir = "../uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
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
    if (!in_array($imageFileType, $allowed_formats)) {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            $check_equipment_sql = "SELECT MAX(unit_ID) as max_unit_id FROM units WHERE equipment_name = '$equipment_name'";
            $check_equipment_result = $conn->query($check_equipment_sql);

            if ($check_equipment_result->num_rows > 0) {
                $row = $check_equipment_result->fetch_assoc();
                $max_unit_id = $row['max_unit_id'];
                $unit_id = $max_unit_id + 1;
            } else {
                $unit_id = 1;
            }

            $sql = "INSERT INTO equipment (user, article, deployment, property_number, account_code, units, total_value, remarks, description, year_received, image) 
                    VALUES ('$user', '$equipment_name', '$deployment', '$property_number', '$account_code', '$units', '$total_value', '$remarks', '$description', '$year_received', '$image_name')";

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

                session_start();
                $_SESSION['equipment_ID'] = $equipment_ID;

                if ($userInfo['role'] == 'admin') {
                    header("Location: ../admin panel/addOtherinfo.php");
                } else {
                    header("Location: ../user panel/addOtherinfo.php");
                }
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