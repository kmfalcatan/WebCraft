<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/WebCraft/assets/css/addOtherInfor.css">
</head>
<body>
    <div class="container">
        <div class="subContainer">
            <div class="textContainer">
                <p class="text">Warranty</p>
            </div>

            <div class="warrantyContainer">
                <div class="imageContainer">
                    <div class="subImageContainer">
                        <div class="uploadImage">
                            <img class="image" src="" alt="">
                        </div>
                    </div>

                    <div class="uploadButtonContainer">
                        <input class="uploadButton" type="file">
                    </div>
                </div>

                <div class="subWarrantyContainer">
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" type="text" placeholder="Start warranty:" required>
                    </div>
                    
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" type="text" placeholder="End warranty:" required>
                    </div>
                </div>
            </div>

            <div class="budgetContainer">
                <div class="textContainer">
                    <p class="text">Budget</p>
                </div>

                <div class="subBudgetContainer">
                    <input class="budget" type="text" placeholder="Budget:" required>
                </div>
            </div>

            <div class="howToUseContainer">
                <div class="textContainer">
                    <p class="text">How to use</p>
                </div>

                <div class="subHowToUseContainer">
                    <textarea class="inputHowToUse" name=""cols="30" rows="10" placeholder="How to use:" required></textarea>
                </div>
            </div>
        </div>

        <div class="buttonContainer">
            <button class="button">Add to inventory</button>
            <a href="/WebCraft/admin panel/addEquip.html">
                <button class="button">Back</button>
            </a>
        </div>
    </div>
</body>
</html>