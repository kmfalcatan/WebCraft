<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;

function getUserInfo($conn, $id) {
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null; 
    }
}

$userInfo = getUserInfo($conn, $id);
?>

<?php
    // if (!empty($userInfo['profile_img'])) {
    //     echo '<img class="headerImg" src="../uploads/' . $userInfo['profile_img'] . '" alt="Profile Image">';
    // } else {
    //     echo '<img class="headerImg" src="../assets/img/person-circle.png" alt="Mountain Placeholder">';
    // }
?>