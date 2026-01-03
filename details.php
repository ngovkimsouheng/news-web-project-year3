<?php
// Go up one level to find config.php
include_once('../config.php');

// Get the ID from the URL
$news_id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : 0;

// Fetch the specific article
$query = "SELECT * FROM tblnews WHERE news_id = '$news_id'";
$result = mysqli_query($conn, $query);
$news = mysqli_fetch_assoc($result);

// If no news found, redirect back to home
if (!$news) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($news['news_title']); ?> - NewsPortal</title>
    <link rel="stylesheet" href="./css/output.css">
</head>

<body class="bg-gray-50 font-sans">

    <nav class="bg-white shadow-sm border-b py-4 mb-8">
        <div class="max-w-4xl mx-auto px-4 flex justify-between items-center">
            <a href="index.php" class="text-blue-600 font-black text-xl uppercase tracking-tighter">NewsPortal</a>
            <a href="index.php" class="text-gray-500 hover:text-gray-800 flex items-center text-sm font-medium">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                Back to News
            </a>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 pb-20">
        <header class="mb-8">
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                <?php echo htmlspecialchars($news['news_title']); ?>
            </h1>
            <p class="text-xl text-gray-500 italic">
                <?php echo htmlspecialchars($news['news_description']); ?>
            </p>
        </header>

        <div class="mb-10 rounded-2xl overflow-hidden shadow-lg border border-gray-200">
            <img src="Images/<?php echo $news['img']; ?>"
                class="w-full h-auto object-cover max-h-[500px]"
                alt="Featured Image">
        </div>

        <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
            <?php echo nl2br(htmlspecialchars($news['conent'])); ?>
        </div>
    </main>

    <footer class="bg-white border-t py-10 text-center text-gray-400 text-sm">
        &copy; 2026 NewsPortal. Reading: <?php echo htmlspecialchars($news['news_title']); ?>
    </footer>

</body>

</html>