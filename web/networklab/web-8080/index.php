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
        <h1>Introduction to Animals</h1>
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
        <h2>Animals</h2>
            <?php
            // Make HTTP request to fetch animal data from the API endpoint
            $animalData = file_get_contents('http://animal.{domain}/animal_api.php');

            // Decode JSON response
            $animals = json_decode($animalData, true);

            // Output animal data
            foreach ($animals as $animal) {
                echo "<div class='animal'>";
                echo "<img src='images/" . $animal['image'] . "' alt='" . $animal['name'] . "'>";
                echo "<h3>" . $animal['name'] . "</h3>";
                echo "<p>" . $animal['description'] . "</p>";
                echo "</div>";
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Introduction to Animals. All rights reserved.</p>
    </footer>
</body>
</html>
