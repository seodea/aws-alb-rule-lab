<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction to Animals</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white mb-0">Introduction to Animals</h1>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_guestbook.php">Display guestbook</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-5">
        <div class="container">
            <section>
                <h2>Animals</h2>
                <?php
                // Make HTTP request to fetch animal data from the API endpoint
                $animalData = file_get_contents('http://animal.{domain}/animal_api.php');

                // Decode JSON response
                $animals = json_decode($animalData, true);

                // Output animal data
                foreach ($animals as $animal) {
                    echo "<div class='card mb-3'>";
                    echo "<img src='images/" . $animal['image'] . "' class='card-img-top' alt='" . $animal['name'] . "'>";
                    echo "<div class='card-body'>";
                    echo "<h3 class='card-title'>" . $animal['name'] . "</h3>";
                    echo "<p class='card-text'>" . $animal['description'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </section>
        </div>
    </main>
    <footer class="bg-dark text-white py-3">
        <div class="container">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> Introduction to Animals. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
