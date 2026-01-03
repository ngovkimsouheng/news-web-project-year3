<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News Article</title>
<link rel="stylesheet" href="../css/output.css">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-2xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center border-b pb-4">Create New Article</h1>

        <form method="post" action="added_news.php" enctype="multipart/form-data">
            <table class="w-full border-separate border-spacing-y-4">
                <tr>
                    <td class="font-semibold text-gray-700 w-1/3">News Title</td>
                    <td>
                        <input type="text" name="txttitle" required
                            class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </td>
                </tr>

                <tr>
                    <td class="font-semibold text-gray-700">Cover Image</td>
                    <td>
                        <input type="file" name="files" required
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </td>
                </tr>

                <tr>
                    <td class="font-semibold text-gray-700">Description</td>
                    <td>
                        <input type="text" name="txtdesc"
                            class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </td>
                </tr>

                <tr>
                    <td class="font-semibold text-gray-700 align-top pt-2">Full Content</td>
                    <td>
                        <textarea name="txtcontent" rows="5" required
                            class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                    </td>
                </tr>

                <tr>
                    <td class="font-semibold text-gray-700">Category</td>
                    <td>
                        <select name="txtcat"
                            class="w-full p-2 border border-gray-300 rounded bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="1">Politics</option>
                            <option value="2">Sports</option>
                            <option value="3">Technology</option>
                            <option value="4">Entertainment</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="pt-4">
                        <input type="submit" name="btnadd" value="Post News Article"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition duration-300 cursor-pointer shadow-md">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>