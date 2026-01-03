<?php
// Ensure your path to config.php is correct based on your folder setup
// Going up two levels because config.php is outside the news_project folder
include_once('../../config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - News List</title>
    <link rel="stylesheet" href="../css/output.css">
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <?php include('navbar.php'); ?>

    <main class="flex-grow p-10 text-sm">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-xl shadow-md">

            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">News Articles</h1>
                <a href="add_news.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition font-bold">+ Add News</a>
            </div>

            <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] == 'success'): ?>
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6 shadow-sm">
                        Article added successfully!
                    </div>
                <?php elseif ($_GET['status'] == 'deleted'): ?>
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6 shadow-sm">
                        Article has been removed successfully.
                    </div>
                <?php elseif ($_GET['status'] == 'updated'): ?>
                    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded mb-6 shadow-sm">
                        Article updated successfully!
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-800 text-white uppercase text-xs tracking-wider">
                            <th class="p-4 border border-gray-700">Image</th>
                            <th class="p-4 border border-gray-700">Title</th>
                            <th class="p-4 border border-gray-700">Description</th>
                            <th class="p-4 border border-gray-700 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM tblnews ORDER BY news_id DESC");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-4 border">
                                        <img src="../Images/<?php echo $row['img']; ?>"
                                            class="w-20 h-20 object-cover rounded shadow-sm border">
                                    </td>
                                    <td class="p-4 border font-bold text-gray-800">
                                        <?php echo htmlspecialchars($row['news_title']); ?>
                                    </td>
                                    <td class="p-4 border text-gray-600">
                                        <?php echo htmlspecialchars($row['news_description']); ?>
                                    </td>
                                    <td class="p-4 border text-center whitespace-nowrap">
                                        <a href="edit.php?proID=<?php echo $row['news_id']; ?>"
                                            class="bg-blue-100 text-blue-700 px-3 py-1 rounded-md hover:bg-blue-200 transition mr-2">
                                            Edit
                                        </a>
                                        <a href="delete.php?proID=<?php echo $row['news_id']; ?>"
                                            class="bg-red-100 text-red-700 px-3 py-1 rounded-md hover:bg-red-200 transition"
                                            onclick="return confirm('Are you sure you want to delete this article?')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='4' class='p-10 text-center text-gray-400 italic'>No news articles found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include('footer.php'); ?>

</body>

</html>