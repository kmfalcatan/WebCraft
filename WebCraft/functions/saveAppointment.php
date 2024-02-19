<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";

if(isset($_POST['submit'])) {
    $equipment_name = $_POST['equipment_name'];
    $date_of_appointment = $_POST['date_of_appointment'];
    $details_of_equipment = $_POST['details_of_equipment'];
    $budget = $_POST['budget'];
    $admin_email = $_POST['admin_email'];
    $admin_name = $_POST['admin_name'];
    $maintenance_name = $_POST['maintenance_name'];
    $maintenance_email = $_POST['maintenance_email'];
    $contact_number = $_POST['contact_number'];
    $request_ID = $_GET['request_ID'];

    $maintenance_query = "INSERT INTO maintenance_contact (request_ID, maintenance_name, maintenance_email, contact_number, admin_email, admin_name) 
                         VALUES ('$request_ID', '$maintenance_name', '$maintenance_email', '$contact_number', '$admin_email', '$admin_name')";
    $maintenance_result = $conn->query($maintenance_query);

    $budget_query = "INSERT INTO budget (request_ID, budget, equipment_name, details_of_equipment, equip_img) 
                     VALUES ('$request_ID', '$budget', '$equipment_name', '$details_of_equipment', '$equip_img')";
    $budget_result = $conn->query($budget_query);

    if($maintenance_result && $budget_result) {
        header("Location: ../admin panel/approveAppointment.php?request_ID={$request_ID}&id={$userID}");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Form submission error.";
}
?>
