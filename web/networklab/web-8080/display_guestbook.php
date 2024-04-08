<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Guestbook</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white mb-0">Read Guestbook</h1>
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
                <h2>Guestbook Entries</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch guestbook entries from private WAS server
                            $entries = file_get_contents('http://guestbook.{domain}/was_display_guestbook.php');
                            $dataArray = preg_split('/(?<=\})\s+(?=\{)/', $entries);
                            
                            foreach ($dataArray as $json) {
                                // Decode JSON object
                                $entry = json_decode($json, true);

                                // Check if decoding was successful
                                if ($entry !== null) {
                                    // Output the entry in a table row
                                    echo "<tr>";
                                    echo "<td>" . $entry['name'] . "</td>";
                                    echo "<td>" . $entry['message'] . "</td>";
                                    echo "</tr>";
                                } else {
                                    // Handle decoding error
                                    echo "<tr><td colspan='2'>Error decoding JSON: $json</td></tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
    <footer class="bg-dark text-white py-3">
        <div class="container">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> Read Guestbook. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
