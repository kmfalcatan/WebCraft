<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";
include_once "../functions/report.php";
include_once "../functions/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
    <link rel="stylesheet" href="../assets/css/report.css">
</head>
<body>
    <div class="container1">
        <div class="headerContainer">
            <div class="subHeaderContainer">
                <div class="imageContainer">
                    <div class="subImageContainer">
                        <img class="image" src="../assets/img/medLogo.png" alt="">
                    </div>

                    <div class="nameContainer">
                        <img class="medName" src="../assets/img/system-name.png" alt="">
                    </div>
                </div>

                <div class="profileContainer">
                    <div class="subProfileContainer" id="profileContainer">
                        <?php
                            if (!empty($userInfo['profile_img'])) {
                                echo '<img class="headerImg" src="../uploads/' . $userInfo['profile_img'] . '" alt="Profile Image">';
                            } else {
                                echo '<img class="headerImg" src="../assets/img/person-circle.png" alt="Mountain Placeholder">';
                            }
                        ?>
                    </div>

                    <div class="subProfileContainer">
                        <p class="adminName"><?php echo $userInfo['username'] ?? ''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="subContainer2">
            <div class="headerContainer1">
                <a href="../user panel/userEquip.php?equipment_ID=<?php echo $equipment_ID; ?>&id=<?php echo $userID; ?>"> 
                    <div class="backContainer">
                        <img class="backContainer1" src="../assets/img/left-arrow.png" alt="">
                    </div>
                </a>

                <div class="iconContainer">
                    <div class="subIconContainer">
                        <img src="../assets/img/transfer-icon.png" alt="" style="width: 2.5rem; height: 2.2rem;">
                    </div>

                    <div class="textContainer10">
                        <p>UNIT TRANSFER</p>
                    </div>
                </div>
            </div>

            <div class="infoContainer">
                <div class="subInfoContainer">
                    <div class="imageContainer1">
                        <div class="subImageContainer1"> 
                            <img class="subImageContainer1" src="<?php echo $imageURL; ?>" alt="Mountain Placeholder" onerror="this.onerror=null; this.src='../assets/img/img_placeholder.jpg';">
                        </div>
                    </div>

                    <div class="equipNameContainer">
                        <p><?php echo $article; ?></p>
                    </div>
                </div>

                <div class="infoContainer1">
                    <div class="subInfoContainer1">
                        <p>UNIT CUSTODIAN</p>
                    </div>

                    <div class="textContainer">
                        <div class="subTextContainer">
                            <?php foreach ($userInfo as $info): ?>
                                <div class="userHandler">
                                    <p><?php echo $info['user']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="subInfoContainer1">
                        <p>DEPLOYMENT</p>
                    </div>

                    <div class="textContainer">
                        <div class="subTextContainer">
                            <p><?php echo $deployment; ?></p>
                        </div>
                    </div>

                    <div class="subInfoContainer1">
                        <p>PROPERTY NUMBER</p>
                    </div>

                    <div class="textContainer">
                        <div class="subTextContainer">
                            <p><?php echo $property_number; ?></p>
                        </div>
                    </div>

                    <div class="subInfoContainer1">
                        <p>ACCOUNT CODE</p>
                    </div>

                    <div class="textContainer">
                        <div class="subTextContainer">
                            <p><?php echo $account_code; ?></p>
                        </div>
                    </div>

                    <div class="subInfoContainer1">
                        <p>DESCRIPTION</p>
                    </div>

                    <div class="textContainer1">
                        <div class="subTextContainer1">
                            <p><?php echo $description; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form class="buttonContainer" id="buttonContainer" action="../functions/saveTransfer.php" method="post">
            <button style="display: block;" id="selectButton" onclick="popup()" class="button" type="button">SELECT UNIT</button>
            
            <input type="hidden" name="equipment_ID" value="<?php echo $equipment_ID; ?>">
            <input type="hidden" name="user_ID" value="<?php echo $userID; ?>">
            <input type="hidden" name="unit_ID" id="unit_ID">
            <input type="hidden" name="reason" id="reason">
            <input type="hidden" name="new_handler" id="new_handler">


            <div class="unitContainer" style="display: none;">
                <div class="subUnitContainer">
                <?php
                        if(isset($_GET['equipment_ID'])) {
                            $equipment_ID = $_GET['equipment_ID'];
                        
                            $sql = "SELECT u.unit_ID, u.user 
                                    FROM units u 
                                    JOIN users usr ON u.user = usr.fullname 
                                    WHERE u.equipment_ID = ? AND usr.id = ?";
                            $stmt = $conn->prepare($sql);
                        
                            $stmt->bind_param("ii", $equipment_ID, $userID);
                            $stmt->execute();
                            $result = $stmt->get_result();
                        
                            while($row = $result->fetch_assoc()) {
                                $unit_id = $row['unit_ID'];
                                $user = $row['user'];
                        
                                $unitPrefix = 'UNIT';
                                $defaultUnitID = '0000';
                                $formattedUnitID = $unitPrefix . '-' . str_pad($unit_id, strlen($defaultUnitID), '0', STR_PAD_LEFT);
                        
                                echo '<div class="unitAndCheckboxContainer">'; 
                                echo '<div class="equipContainer">';
                                echo '<div class="checkBoxContainer">';
                                echo '<input class="checkbox" type="checkbox" data-unit-id="' . $formattedUnitID . '">';
                                echo '</div>';
                                echo '<div class="unitNameContainer">';
                                echo '<h3>' . $formattedUnitID . '</h3>';
                                echo '</div>';
                                echo '<div class="userContainer" style="display: none";>';
                                echo '<p>' . $user . '</p>';
                                echo '</div>';
                                echo '<div class="unitNameContainer1">';
                                echo '<select  class="issue" data-unit-id="' . $formattedUnitID . '">';
                                echo '<option value="" disabled selected>Select user</option>';
                                $userQuery = "SELECT fullname FROM users WHERE role = 'user'";
                                $userResult = $conn->query($userQuery);
                                if ($userResult->num_rows > 0) {
                                    while($userRow = $userResult->fetch_assoc()) {
                                        echo '<option value="' . $userRow["fullname"] . '">' . $userRow["fullname"] . '</option>';
                                    }
                                }
                                echo '</select>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>'; 
                            }
                        }
                        ?>
                        
                </div>

                <div class="buttonContainer1">
                    <button onclick="popup1()" class="button1" id="save-button" type="button">Save</button>
                </div>
            </div>

            <div class="unitContainer1" id="unit" style="display: none;">
                <div class="headerContainer2">
                    <p>SELECTED UNITS</p>
                </div>

                <div class="unitInfoContainer">
                    
                </div>
                <div class="submitContainer"  id="submitContainer">
                    <button onclick="popup1()" class="button2" type="button" id="add-more">Add more</button>
                    <button class="button2"  id="submit-button" type="submit"  onclick="submitForm()">Submit</button>
                </div>

            </div>
        </form>
    </div>

    <script src="../assets/js/toggle.js"></script>
    <script>
     document.addEventListener("DOMContentLoaded", function() {
    let selectedUnits = [];

    const checkboxes = document.querySelectorAll('.checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateDisplayOnChange);
    });

    const issueSelects = document.querySelectorAll('.issue');
    issueSelects.forEach(select => {
        select.addEventListener('change', updateDisplayOnChange);
    });

    function updateDisplayOnChange() {
    selectedUnits = [];
    let reasonSelected = false; // Flag to track if the reason has been selected
    checkboxes.forEach(checkbox => {
        const unitID = checkbox.dataset.unitId;
        const issueSelect = document.querySelector(`.issue[data-unit-id="${unitID}"]`);
        const issue = issueSelect.value || '';
        if (checkbox.checked) {
            if (!reasonSelected) {
                document.getElementById('new_handler').value = issueSelect.options[issueSelect.selectedIndex].text;
                reasonSelected = true;
            } else {
                // Set the reason or problem description
                document.getElementById('reason').value = issue;
            }
            selectedUnits.push({ unit_ID: unitID, report_issue: issue, problem_desc: '' });
        }
    });
    updateDisplay(selectedUnits);
}

    function updateDisplay(units) {
        const unitInfoContainer = document.querySelector('.unitInfoContainer');
        unitInfoContainer.innerHTML = ''; 

        units.forEach((item, index) =>  {
            
            const subContainer = document.createElement('div');
            subContainer.classList.add('subInfoContainer');

            const unitNumber = document.createElement('div');
            unitNumber.classList.add('subInfoContainer1');
            unitNumber.innerHTML = '<p>Unit ID</p>';
            subContainer.appendChild(unitNumber);

            const unitIDContainer = document.createElement('div');
            unitIDContainer.classList.add('textContainer');
            const unitIDText = document.createElement('div');
            unitIDText.classList.add('subTextContainer');
            unitIDText.textContent = item.unit_ID;
            unitIDText.id = 'unitID_' + index;
            unitIDContainer.appendChild(unitIDText);
            subContainer.appendChild(unitIDContainer);

            const issueContainer = document.createElement('div');
            issueContainer.classList.add('subInfoContainer1');
            issueContainer.innerHTML = '<p>New Custodian</p>';
            subContainer.appendChild(issueContainer);

            const issueTextContainer = document.createElement('div');
            issueTextContainer.classList.add('textContainer');
            const issueText = document.createElement('div');
            issueText.classList.add('subTextContainer');
            issueText.textContent = item.report_issue;
            issueText.id = 'issue_' + index;
            issueTextContainer.appendChild(issueText);
            subContainer.appendChild(issueTextContainer);

            const additionalIssueExplanation = document.createElement('div');
            additionalIssueExplanation.classList.add('subInfoContainer1');
            additionalIssueExplanation.innerHTML = '<p>Tell me why do you want to transfer the unit</p>';
            additionalIssueExplanation.style.justifyContent = 'flex-start';
            additionalIssueExplanation.style.marginLeft = '1rem';
            subContainer.appendChild(additionalIssueExplanation);

            const additionalIssueContainer = document.createElement('div');
            additionalIssueContainer.classList.add('textContainer1');
            const additionalIssueText = document.createElement('input'); 
            additionalIssueText.classList.add('subTextContainer1');
            additionalIssueText.value = item.problem_desc;
            additionalIssueText.setAttribute('type', 'text');   
            additionalIssueText.setAttribute('placeholder', 'Enter your reason  here..'); 
            additionalIssueText.style.fontWeight = '100';
            additionalIssueText.style.alignItems = 'start';
            additionalIssueContainer.appendChild(additionalIssueText);
            subContainer.appendChild(additionalIssueContainer);


            unitInfoContainer.appendChild(subContainer);

            const unitID = document.getElementById('unitID_' + index); 
            const subTextContainers = [unitID];
            subTextContainers.forEach(container => {
                container.style.maxWidth = '50%'; 
            });

            if (index < units.length - 1) {
                const space = document.createElement('div');
                space.classList.add('container-space');
                space.style.height = '10rem'; 
                space.style.overflowX = 'hidden'; 
                space.style.marginLeft = '37px';
                space.style.borderBottom = '2px solid rgb(2, 116, 200)'; 
                space.style.maxWidth = 'calc(80% + 10px)';
                unitInfoContainer.appendChild(space);
            }
        });
    }

    document.getElementById('buttonContainer').addEventListener('submit', function(event) {
            event.preventDefault(); 

            const unitIDInput = document.getElementById('unit_ID');

            unitIDInput.value = '';

            selectedUnits.forEach((selectedUnit, index) => {
                unitIDInput.value += selectedUnit.unit_ID;

                if (index < selectedUnits.length - 1) {
                    unitIDInput.value += '\n';
                }
            });

            const problemDescriptions = document.querySelectorAll('.subTextContainer1');
            let allProblemDesc = ""; 

            problemDescriptions.forEach(input => {
                if (input.tagName.toLowerCase() === "input" && input.value.trim() !== "") {
                    allProblemDesc += input.value + "\n"; 
                    input.setAttribute('readonly', 'readonly');
                }
            });

            const reasonInput = document.getElementById('reason');
            if (reasonInput) { 
                reasonInput.value = allProblemDesc.trim();
            }

            const submitContainer = document.getElementById('submitContainer');
            submitContainer.innerHTML = `
                <button class="button2" id="cancel-submit" type"button">Cancel</button>
                <button class="button2" id="confirm-submit" style="width: 10rem;">Confirm Submit</button>
            `;
            document.getElementById('confirm-submit').addEventListener('click', function() {
                document.getElementById('buttonContainer').submit();
            });

            document.getElementById('cancel-submit').addEventListener('click', function() {
                window.location.reload(); 
            });
        });

});

</script>
<script>
    
</script>

</body>
</html>
