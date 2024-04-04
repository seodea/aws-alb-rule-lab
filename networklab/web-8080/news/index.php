<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AWS News</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .article {
            background-color: #fff;
            margin-bottom: 20px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .article .content {
            padding: 20px;
        }
        .article h2 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #333;
        }
        .article p {
            margin: 0;
        }
        .article .author {
            color: #777;
            font-size: 14px;
        }
        .read-more {
            display: block;
            text-align: right;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 0 5px;
            cursor: pointer;
            border-radius: 5px;
        }
        .pagination button:hover {
            background-color: #0056b3;
        }
        .pagination button.active {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>AWS News</h1>

    <?php
    // Pagination
    $items_per_page = 10; // Number of articles per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
    $start = ($page - 1) * $items_per_page; // Start index of articles for the current page

    // Fetch the RSS feed
    $rss_url = 'https://aws.amazon.com/ko/about-aws/whats-new/recent/feed/';
    $rss_feed = simplexml_load_file($rss_url);

    // Check if the RSS feed was loaded successfully
    if ($rss_feed === false) {
        echo "<p>Failed to load RSS feed.</p>";
        error_log("Failed to load RSS feed from: $rss_url");
    } else {
        // Check if there are articles available
        if (isset($rss_feed->channel->item)) {
            $total_articles = count($rss_feed->channel->item);
            $total_pages = ceil($total_articles / $items_per_page);

            if ($total_articles > 0) {
                // Display news articles for the current page
                for ($i = $start; $i < min($start + $items_per_page, $total_articles); $i++) {
                    $item = $rss_feed->channel->item[$i];
                    $title = (string) $item->title;
                    $link = (string) $item->link;
                    $description = (string) $item->description;
                    $pubDate = date('M d, Y', strtotime((string) $item->pubDate));

                    echo "<div class='article'>";
                    echo "<div class='content'>";
                    echo "<h2>{$title}</h2>";
                    echo "<p>{$description}</p>";
                    echo "<p class='author'>Published: {$pubDate}</p>";
                    echo "<a href='{$link}' class='read-more'>Read More</a>";
                    echo "</div>";
                    echo "</div>";
                }

                // Pagination buttons
                echo "<div class='pagination'>";
                if ($page > 1) {
                    echo "<a href='?page=" . ($page - 1) . "'><button>Previous</button></a>";
                }
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<a href='?page=$i'><button class='" . ($i == $page ? 'active' : '') . "'>$i</button></a>";
                }
                if ($page < $total_pages) {
                    echo "<a href='?page=" . ($page + 1) . "'><button>Next</button></a>";
                }
                echo "</div>";
            } else {
                echo "<p>No articles found.</p>";
            }
        } else {
            echo "<p>No articles found in the RSS feed.</p>";
            error_log("No articles found in the RSS feed from: $rss_url");
        }
    }
    ?>

</div>

</body>
</html>
