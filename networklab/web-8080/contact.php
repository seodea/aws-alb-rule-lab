<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Guestbook</h1>
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
        <h1>Guestbook</h1>
        
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
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Guestbook. All rights reserved.</p>
    </footer>
</body>
</html>
