<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";

$userID = isset($_GET['id']) ? $_GET['id'] : null; 

$query = "SELECT * FROM users WHERE id = '$userID'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

$userID = isset($user['id']) ? date('Y') . '-' . str_pad($user['id'], 5, '0', STR_PAD_LEFT) : "";

$fullname = isset($user['fullname']) ? $user['fullname'] : "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/viewUSerEquip.css">
</head>
<body id="body">
    <div class="container2">
        <div class="topContainer" id="topContainer">
            <button class="backbtn" type="button" onclick="goBack()">
                <img src="../assets//img/left-arrow.png" style="width: 1.5rem; height: 1.5rem;" >
            </button>

            <img class="top-img" src="../assets/img/file-text-circle.png" alt= "">
            <h2>USER EQUIPMENT</h2>
        </div>

        <div class="subContainer">
            <div class="userInfoContainer">
                <div class="imageContainer">
                    <div class="subImageContainer3">
                        <?php if (!empty($user['profile_img'])): ?>
                            <img class="profile_img" src="../uploads/<?php echo $user['profile_img']; ?>" alt="">
                        <?php else: ?>
                            <img class="profile_img" src="../assets/img/pp_placeholder.png" alt="Placeholder">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="inforContainer">
                    <div class="subInfoContainer">
                        <p id="name"><?php echo isset($user['fullname']) ? $user['fullname'] : ""; ?></p>
                    </div>

                    <div class="subInfoContainer">
                        <p>ID: <?php echo $userID; ?></p>
                    </div>

                    <div class="subInfoContainer">
                        <p>Department: <?php echo isset($user['department']) ? $user['department'] : ""; ?></p>
                    </div>
                </div>
            </div>

            <div class="tableContainer1">
                <div class="subTableContainer">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ARTICLE</th>
                                <th>UNIT ID</th>
                                <th>PROPERTY NUMBER</th>
                                <th>ACCOUNT CODE</th>
                                <th>UNIT VALUE</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            <?php
                            $unitQuery = "SELECT unit_ID, equipment_name FROM units WHERE user = '$fullname'";
                            $unitResult = mysqli_query($conn, $unitQuery);
                            $properties = array();

                            while ($row = mysqli_fetch_assoc($unitResult)) {
                                $unitID = $row['unit_ID'];
                                $equipment_name = $row['equipment_name'];

                                $unitPrefix = 'UNIT';
                                $defaultUnitID = '0000';
                                $unitID = $unitPrefix . '-' . str_pad($unitID, strlen($defaultUnitID), '0', STR_PAD_LEFT);

                                $propertyQuery = "SELECT property_number, account_code, unit_value FROM equipment WHERE article = '$equipment_name'";
                                $propertyResult = mysqli_query($conn, $propertyQuery);

                                while ($propertyRow = mysqli_fetch_assoc($propertyResult)) {
                                    $property_number = $propertyRow['property_number'];
                                    $account_code = $propertyRow['account_code'];
                                    $unit_value = $propertyRow['unit_value'];

                                    $properties[] = array(
                                        'equipment_name' => $equipment_name,
                                        'unit_ID' => $unitID,
                                        'property_number' => $property_number,
                                        'account_code' => $account_code,
                                        'unit_value' => $unit_value
                                    );
                                }
                            }

                            $count = 1; 
                            foreach ($properties as $property) {
                                echo "<tr>";
                                echo "<td>{$count}</td>";
                                echo "<td>{$property['equipment_name']}</td>";
                                echo "<td>{$property['unit_ID']}</td>";
                                echo "<td>{$property['property_number']}</td>";
                                echo "<td>{$property['account_code']}</td>";
                                echo "<td>{$property['unit_value']}</td>";
                                echo "</tr>";
                                $count++; 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        <script>
        function goBack() {
            window.history.back();
        }
        </script>
</body>
</html>