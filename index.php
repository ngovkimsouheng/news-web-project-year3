<?php
// config.php is located one level up from news_project or in root
// Based on your folder structure image:
include_once('../config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breaking News - Latest Updates</title>

    <link rel="stylesheet" href="./css/output.css">
</head>

<body class="bg-background font-primary leading-normal tracking-normal">

    <header class="sticky top-0 z-50">
        <nav class="bg-white shadow-md  ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <span class="text-2xl font-black text-blue-600 tracking-tighter uppercase">News</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="index.php" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                        <a href="admin/index.php" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-bold hover:bg-blue-700 transition">Admin
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>



    <main>

        <section class="relative bg-white  sm:py-10 sm:my-10">
            <section class="lg:w-7xl mx-auto px-4">
                <div class="lg:container px-4 py-4 lg:mx-auto relative">
                    <div class="absolute inset-0 flex p-4 max-lg:opacity-5 lg:opacity-100 pointer-events-none">
                        <span
                            data-aos="fade-up"
                            data-aos-delay="200"
                            class="sm:text-[75px] max-sm:text-6xl font-bold text-blue-800/10 whitespace-nowrap uppercase">
                            Breaking News
                        </span>
                    </div>

                    <div data-aos="zoom-in" class="absolute inset-0 pointer-events-none">
                        <div data-aos="zoom-in" data-aos-delay="500" class="absolute max-sm:top-60 top-20 right-20 w-30 z-10 h-30 max-sm:h-10 max-sm:w-10 max-sm:left-10 bg-blue-700 rounded-[10px] opacity-80"></div>
                        <div data-aos="zoom-in" data-aos-delay="400" class="absolute top-30 z-10 right-110 w-16 h-16 bg-blue-400 rounded-[10px]"></div>
                        <div data-aos="zoom-in" data-aos-delay="100" class="absolute bottom-0 right-90 w-20 h-20 bg-red-500 rounded-[10px]"></div>
                        <div data-aos="zoom-in" data-aos-delay="200" class="absolute bottom-40 right-15 w-12 h-12 bg-amber-300 rounded-[10px]"></div>
                        <div data-aos="zoom-in" data-aos-delay="200" class="absolute right-100 w-12 h-12 bg-amber-300 rounded-[10px]"></div>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-12 items-center relative">
                        <div class="space-y-8">
                            <h1 class="max-sm:pr-4 text-secondary ">
                                <span
                                    class="font-primary md:text-[30px] sm:text-[28px] max-sm:text-[26px]  font-bold py-10 max-md:mt-5"
                                    id="travel-typing"></span>
                                <span
                                    class="blinking-cursor max-md:text-[38px] md:text-[48px] sm:text-[28px] max-sm:text-[22px]  font-bold py-10 max-md:mt-5">|</span>
                            </h1>
                            <p
                                data-aos-delay="300"
                                data-aos="fade-right"
                                class="font-primary text-accent text-lg leading-relaxed max-w-md">
                                Stay ahead with the latest updates from around the globe.
                                From breaking stories to in-depth analysis, we deliver
                                reliable journalism directly to your screen, 24/7.
                            </p>
                        </div>

                        <div class="relative">
                            <div data-aos="zoom-in" data-aos-delay="300" class="w-80 h-80  rounded-[10px] right-1 mx-auto mb-8   ">
                                <img src="Images/BREAKINGNEWS.png" alt="Breaking Story" class="w-full h-full object-contain" />
                            </div>
                            <div data-aos="zoom-in" data-aos-delay="600" class="absolute -top-10 lg:right-30 w-24 h-24 rounded-[10px]    ">
                                <img src="Images/NEWS.png" alt="World News" class="w-full h-full object-contain" />
                            </div>
                            <div data-aos="zoom-in" data-aos-delay="200" class="absolute bottom-8 max-lg:left-18 lg:bottom-2 lg:right-110 w-32 h-32 rounded-[10px]    ">
                                <img src="Images/tech.png" alt="Tech Updates" class="w-full h-full object-contain" />
                            </div>
                            <div data-aos="zoom-in" data-aos-delay="400" class="absolute bottom-0 right-30 w-25 h-25 rounded-[10px]    ">
                                <img src="Images/world.png" alt="Business" class="w-full h-full object-contain" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>



        <section class="lg:container mx-auto ">
            <h1 class="text-4xl max-w-7xl text-secondary text-start mx-auto pl-6 font-bold pb-8">Today's News</h1>
        </section>
        <section class="grid sm:px-6 mb-8  lg:px-8 max-w-7xl  px-4  mx-auto grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3.5">

            <?php
            // Fetching data from tblnews
            $sql = "SELECT * FROM tblnews ORDER BY news_id DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <article class="bg-white overflow-hidden rounded-[22px] shadow-sm hover:shadow-xl transition-shadow duration-300   flex flex-col">
                        <div class="relative h-48 w-full  rounded-[10px]">
                            <img src="Images/<?php echo $row['img']; ?>"
                                alt="<?php echo htmlspecialchars($row['news_title']); ?>"
                                class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">

                            <span class="absolute top-3 left-3 bg-secondary rounded-[10px] text-white text-xs font-bold px-3 py-1  uppercase">
                                <?php
                                // Basic category display logic
                                $cats = [1 => 'Politics', 2 => 'Sports', 3 => 'Technology', 4 => 'Entertainment'];
                                echo isset($cats[$row['cat_id']]) ? $cats[$row['cat_id']] : 'General';
                                ?>
                            </span>
                        </div>

                        <div class="p-6 ">
                            <h2 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 hover:text-blue-600 cursor-pointer">
                                <?php echo htmlspecialchars($row['news_title']); ?>
                            </h2>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                <?php echo htmlspecialchars($row['news_description']); ?>
                            </p>
                        </div>

                        <div class="px-6 py-4  bg-gray-50 border-t border-gray-100 mt-auto">
                            <a href="details.php?id=<?php echo $row['news_id']; ?>"
                                class="text-blue-600 font-bold text-sm flex items-center hover:underline">
                                Read Full Story
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
            <?php
                }
            } else {
                echo "<div class='col-span-full text-center py-20 text-gray-500 italic'>No news articles have been posted yet.</div>";
            }
            ?>

        </section>
    </main>

    <footer class="bg-white border-t py-10">
        <div class="text-center text-gray-500 text-sm">
            &copy; 2026 NewsPortal. All rights reserved.
        </div>
    </footer>
    <script src="./js/news-typing-section1.js"></script>
</body>

</html>