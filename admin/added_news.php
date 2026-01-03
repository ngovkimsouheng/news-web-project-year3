<?php
// 1. Path to Images folder (stays ../ because it is in news_project)
$folder = "../Images/";

// 2. NEW FIX: Path to config.php (Go up TWO levels)
include_once('../../config.php');

// 3. The rest of your code remains the same
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$title  = mysqli_real_escape_string($conn, $_POST['txttitle']);
$desc   = mysqli_real_escape_string($conn, $_POST['txtdesc']);
$conent = mysqli_real_escape_string($conn, $_POST['txtcontent']);
$cat_id = mysqli_real_escape_string($conn, $_POST['txtcat']);

$img      = $_FILES['files']['name'];
$tmp_name = $_FILES['files']['tmp_name'];

if ($img != "") {
    move_uploaded_file($tmp_name, $folder . $img);
}

$sql = "INSERT INTO tblnews (news_title, news_description, conent, img, cat_id)  
        VALUES ('$title', '$desc', '$conent', '$img', '$cat_id')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php?status=success");
    exit();
} else {
    die('Error: ' . mysqli_error($conn));
}
