<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[Dev] Introduction to Animals</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>[Dev] Introduction to Animals</h1>
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
        <h2>[Dev] web site</h2>
            <?php
            
                echo "<div class='dev'>";
                echo "<img src='images/build-page.jpg' alt='build-page'>";
                echo "</div>";
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Introduction to Animals. All rights reserved.</p>
    </footer>
</body>
</html>
