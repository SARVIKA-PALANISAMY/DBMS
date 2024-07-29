<?php
session_start();
require '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = dataFilter($_POST['name']);
    $mobile = dataFilter($_POST['mobile']);
    $user = dataFilter($_POST['uname']);
    $email = dataFilter($_POST['email']);
    $id = dataFilter($_POST['id']);

    $_SESSION['Email'] = $email;
    $_SESSION['Name'] = $name;
    $_SESSION['Username'] = $user;
    $_SESSION['MobileNo'] = $mobile;
    $_SESSION['id'] = $id;

    $stmt = $conn->prepare("UPDATE farmer SET fname=?, fusername=?, fmobile=?, femail=? WHERE fid=?");
    if (!$stmt) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    if (!$stmt->bind_param("ssssi", $name, $user, $mobile, $email, $id)) {
        die("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    if (!$stmt->execute()) {
        die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    $stmt->close();

    $_SESSION['message'] = "Profile Updated successfully !!!";
    header("Location: ../profileView.php");
} else {
    $_SESSION['message'] = "There was an error in updating your profile! Please Try again!";
    header("Location: ../Login/error.php");
}

function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
