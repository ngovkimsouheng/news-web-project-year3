<?php
// 1. Connection (Go up two levels as config is outside news_project)
include_once('../../config.php');

// 2. Fetch existing data
$id = isset($_GET['proID']) ? mysqli_real_escape_string($conn, $_GET['proID']) : 0;
$res = mysqli_query($conn, "SELECT * FROM tblnews WHERE news_id = '$id'");
$data = mysqli_fetch_assoc($res);

if (!$data) {
    header("Location: index.php");
    exit();
}

// 3. Handle the Update Logic
if (isset($_POST['btnUpdate'])) {
    $title  = mysqli_real_escape_string($conn, $_POST['txttitle']);
    $desc   = mysqli_real_escape_string($conn, $_POST['txtdesc']);
    $conent = mysqli_real_escape_string($conn, $_POST['txtcontent']);
    $cat_id = mysqli_real_escape_string($conn, $_POST['txtcat']);

    // Handle Image Update
    $img = $_FILES['files']['name'];
    if ($img != "") {
        // If new image uploaded, replace the old one
        move_uploaded_file($_FILES['files']['tmp_name'], "../Images/" . $img);
        $img_query = ", img = '$img'";
    } else {
        $img_query = ""; // Keep old image
    }

    $sql = "UPDATE tblnews SET 
            news_title = '$title', 
            news_description = '$desc', 
            conent = '$conent', 
            cat_id = '$cat_id' 
            $img_query 
            WHERE news_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?status=updated");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit News Article</title>
    <link rel="stylesheet" href="../css/output.css">
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <?php include('navbar.php'); ?>

    <main class="flex-grow p-10">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-4">Edit Article</h2>

            <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Title</label>
                    <input type="text" name="txttitle" value="<?php echo htmlspecialchars($data['news_title']); ?>" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Short Description</label>
                    <input type="text" name="txtdesc" value="<?php echo htmlspecialchars($data['news_description']); ?>" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Full Content</label>
                    <textarea name="txtcontent" rows="6" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none" required><?php echo htmlspecialchars($data['conent']); ?></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Category ID</label>
                        <input type="number" name="txtcat" value="<?php echo $data['cat_id']; ?>" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Current Image</label>
                        <img src="../Images/<?php echo $data['img']; ?>" class="w-20 h-20 object-cover rounded border">
                        <input type="file" name="files" class="mt-2 text-xs">
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-6">
                    <a href="index.php" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-bold hover:bg-gray-300">Cancel</a>
                    <button type="submit" name="btnUpdate" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 shadow-md">Update Article</button>
                </div>
            </form>
        </div>
    </main>

    <?php include('footer.php'); ?>
</body>

</html>