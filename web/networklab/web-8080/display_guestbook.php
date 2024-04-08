<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction to Animals</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Read Guestbook</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="display_guestbook.php">Display guestbook</a></li>
        </ul>
    </nav>
    <main>
        <section>
        <h2>Guestbook</h2>

            <?php
            // Fetch guestbook entries from private WAS server
            $entries = file_get_contents('http://guestbook.{domain}/was_display_guestbook.php');
            // $entries = json_decode($entries, true);
            $dataArray = preg_split('/(?<=\})\s+(?=\{)/', $entries);

            foreach ($dataArray as $json) {
                // Remove trailing whitespace and comma
                // $json = rtrim($json, ', ');

                // Add back the closing brace for valid JSON
                // $json .= '}';

                // Decode JSON object
                $entry = json_decode($json, true);

                // Check if decoding was successful
                if ($entry !== null) {
                    // Process the entry (e.g., display or store it)
                    echo "Name: " . $entry['name'] . ", Message: " . $entry['message'] . "<br>";
                } else {
                    // Handle decoding error
                    echo "Error decoding JSON: $json<br>";
                }
            }
            ?>
        </section>
    </main>
</body>
</html>
