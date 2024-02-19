window.onload = function() {
    var equipmentName = "<?php echo $equipment_name; ?>";
    var dateOfAppointment = "<?php echo $date_of_appointment; ?>";
    var detailsOfEquipment = "<?php echo $details_of_equipment; ?>";
    var budget = "<?php echo $budget; ?>";
    var adminEmail = "<?php echo $admin_email; ?>";
    var adminName = "<?php echo $admin_name; ?>";
    var maintenanceName = "<?php echo $maintenance_name; ?>";
    var maintenanceEmail = "<?php echo $maintenance_email; ?>";
    var contactNumber = "<?php echo $contact_number; ?>";

    if (equipmentName !== "" && dateOfAppointment !== "" && detailsOfEquipment !== "" && budget !== "" && adminEmail !== "" && maintenanceName !== "" && adminName !== "" && maintenanceEmail !== "" && contactNumber !== "") {
        document.getElementById("approveButton").disabled = false;
    } else {
        document.getElementById("approveButton").disabled = true;
    }
};