<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";
?>

    <link rel="stylesheet" href="../assets/css/receipt.css">

        <div class="receiptContainer">
            <div class="logoContainer">
                <div class="recieptContainer">
                    <p>RECEIPT</p>
                </div>

                <div class="subLogoContainer">
                    <img class="logo" src="../assets/img/medLogo.png" alt="">
                </div>
            </div>

            <div class="infoContainer">
                 <div class="subInfoContainer">
                    <p>MEDEQUIP TRACKER</p>
                 </div>

                 <div class="subInfoContainer1">
                    <p>College of Medicine</p>
                 </div>

                 <div class="subInfoContainer1">
                    <p>Medicine@gmail.coim</p>
                 </div>

                 <div class="subInfoContainer1">
                    <p>+63 012 3124 123</p>
                 </div>
            </div>

            <div class="infoContainer1">
                <div class="subInfoContainer1">
                   <p class="text">Request #. <?php echo $requestID; ?></p>
                </div>

                <div class="subInfoContainer1">
                    <p>Date: <?php echo $dateApproved; ?> </p>
                 </div>
            </div>

            <div class="infoContainer">
                <div class="subInfoContainer">
                   <p>RECEIPT FOR EQUIPMENT</p>
                </div>

                <div class="subInfoContainer1">
                   <p><?php echo $equipmentName; ?></p>
                </div>

                <div class="subInfoContainer1">
                   <p><?php echo $unit_ID; ?></p>
                </div>
           </div>

           <div class="infoContainer2">
                <div class="subInfoContainer2">
                    <p>DESCRIPTION</p>
                    <p>PRICE</p>
                </div>

                <div class="subInfoContainer3">
                    <p><?php echo $detailsOfEquipment; ?></p>
                    <p><?php echo $budget; ?></p>
                </div>

                <div class="subInfoContainer4">
                    <p>Total:</p>
                    <p>₱<?php echo $budget; ?></p>
                </div>
           </div>

           <div class="infoContainer3">
                <div class="subInfoContainer5">
                    <p class="text">Requested by:</p>
                    <p class="text">Approve by:</p>
                </div>

                <div class="subInfoContainer5">
                    <p><?php echo $requestedBy; ?></p>
                    <p><?php echo $approvedBy; ?></p>
                </div>
           </div>
        </div>
    </div>