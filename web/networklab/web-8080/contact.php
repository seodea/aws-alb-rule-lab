<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white mb-0">Guestbook</h1>
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
                <h2>Guestbook</h2>
                <?php
                // Check if form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                    // Get name and message from form submission
                    $name = $_POST['name'];
                    $message = $_POST['message'];

                    // Data to store in guestbook.txt
                    $data = array(
                        'name' => $name,
                        'message' => $message
                    );

                    // Make a POST request to private_guestbook.php to store the guestbook entry
                    $response = postData('http://guestbook.{domain}/private_guestbook.php', $data);

                    // Check if entry was successfully stored
                    if ($response['status'] === 'success') {
                        // Redirect to thank you page after form submission
                        header("Location: thank_you.php");
                        exit();
                    } else {
                        echo "<p>Error submitting guestbook entry: {$response['message']}</p>";
                    }
                }

                // Function to send POST request
                function postData($url, $data) {
                    $options = array(
                        'http' => array(
                            'method' => 'POST',
                            'header' => 'Content-type: application/x-www-form-urlencoded',
                            'content' => http_build_query($data)
                        )
                    );

                    $context = stream_context_create($options);
                    $result = file_get_contents($url, false, $context);

                    return json_decode($result, true);
                }
                ?>

                <!-- Guestbook Form -->
                <form method="post" action="">
                    Name: <input type="text" name="name"><br>
                    Message: <textarea name="message"></textarea><br>
                    <input type="submit" name="submit" value="Submit">
                </form>
        
    </main>
    <footer class="bg-dark text-white py-3">
        <div class="container">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> Guestbook. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
