
<link rel="stylesheet" href="../assets/css/additionalInfo.css">


<div class="container">
    <div class="subContainer" id="subContainer">
        <div class="topContainer2">
            <img class="top-img" src="../assets/img/stet-icon.png" alt="" >
            <h2>ADDITIONAL INFORMATION</h2>
        </div>

        <div class="warrantyContainer">
            <div class="imageContainer">
                <div class="subImageContainer">
                    <img id="uploadedImage" class="uploadImage" src="../assets/img/img_placeholder.jpg" alt="Mountain Placeholder">
                </div>

                <input type="hidden" name="equipment_ID" value="<?php echo $equipment_ID; ?>">

                <div class="uploadButtonContainer2">
                    <label for="warranty_image" class="uploadButton2">
                        <img src="../assets/img/upload.png" alt="Upload Icon" class="uploadIcon">
                        Upload file
                        <input id="warranty_image" name="warranty_image" type="file" style="display: none;" required onchange="displayImage(this)">
                    </label>
                </div>
            </div>

            <div class="subWarrantyContainer">
                <div class="startWarrantyContainer">
                    <label for="startWarranty">Warranty start date:</label>
                    <input id="startWarranty" class="startWarranty" name="warranty_start" type="date" required>
                </div>

                <div class="startWarrantyContainer">
                    <label for="endWarranty">Warranty expiration date:</label>
                    <input id="endWarranty" class="startWarranty" name="warranty_end" type="date" required>
                </div>
            </div>
        </div>

        <div class="budgetContainer">
            <div class="textContainer">
                <p  class="text">Equipment Maintenance Budget</p>
            </div>

            <div class="subBudgetContainer">
                <input class="budget" name="budget" type="text" placeholder="Budget:" required>
            </div>
        </div>

        <div class="howToUseContainer">
            <div class="textContainer">
                <p class="text">Steps How to Use:</p>
            </div>

            <div class="subHowToUseContainer">
                <textarea class="inputHowToUse" name="instruction" cols="30" rows="10" placeholder="How to use:" required></textarea>
            </div>
        </div>
        <div class="buttonContainer">
            <button class="button" name="submit_form1" >Add to inventory</button>
        </div>
    </div>
</div>

<script>
function displayImage(input) {
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
        document.getElementById('uploadedImage').src = e.target.result;
    };

    reader.readAsDataURL(file);
}
</script>