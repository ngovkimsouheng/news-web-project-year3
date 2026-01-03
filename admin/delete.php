<?php
// 1. Go up two levels to find config.php (as it is outside news_project)
include_once('../../config.php');

// 2. Check if proID exists in the URL
if (isset($_GET['proID'])) {
    // Sanitize the ID for security
    $id = mysqli_real_escape_string($conn, $_GET['proID']);

    // 3. First, get the image name so we can delete the file from the folder
    $get_img = mysqli_query($conn, "SELECT img FROM tblnews WHERE news_id = '$id'");
    $row = mysqli_fetch_assoc($get_img);
    $image_name = $row['img'];

    // 4. Delete the record from the database
    $sql = "DELETE FROM tblnews WHERE news_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        // 5. If DB delete is successful, remove the physical file from the Images folder
        // Path goes up one level to find 'Images' inside news_project
        if ($image_name != "" && file_exists("../Images/" . $image_name)) {
            unlink("../Images/" . $image_name);
        }

        // 6. Redirect back to index.php with a success status
        header("Location: index.php?status=deleted");
        exit();
    } else {
        die("Error deleting record: " . mysqli_error($conn));
    }
} else {
    // If no ID is found, just go back to the list
    header("Location: index.php");
    exit();
}

mysqli_close($conn);
