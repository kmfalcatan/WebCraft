<?php
include '../dbConfig/dbconnect.php';


if(isset($_POST['submit_form2'])){

    if(isset($_POST['equipment_ID'])){
        $equipment_ID = $_POST['equipment_ID'];

        $warranty_image = $_FILES['warranty_image']['name'];
        $warranty_start = $_POST['warranty_start'];
        $warranty_end = $_POST['warranty_end'];
        $budget = $_POST['budget'];
        $instruction = $_POST['instruction'];

        $target_dir = "../uploads/";
        $warranty_image_name = basename($_FILES["warranty_image"]["name"]);
        $target_file = $target_dir . $warranty_image_name;
        move_uploaded_file($_FILES["warranty_image"]["tmp_name"], $target_file);

        $sql = "UPDATE equipment 
                SET warranty_image = '$warranty_image_name', warranty_start = '$warranty_start', warranty_end = '$warranty_end', budget = '$budget', instruction = '$instruction'
                WHERE equipment_ID = $equipment_ID";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../admin panel/dashboard.php"); 
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Error: equipment_ID is not set.";
    }
}
?>
