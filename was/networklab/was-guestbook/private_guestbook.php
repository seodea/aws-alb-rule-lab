<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get name and message from form submission
    $name = $_POST['name'];
    $message = $_POST['message'];

    // Data to store in guestbook.txt
    $data = array(
        'name' => $name,
        'message' => $message
    );

    // File path to guestbook.txt (on private server)
    $guestbookFile = 'guestbook.txt'; // Update with the correct file path

    // Append data to guestbook.txt
    if (file_put_contents($guestbookFile, json_encode($data) . PHP_EOL, FILE_APPEND | LOCK_EX) !== false) {
        // Respond with success status
        echo json_encode(array('status' => 'success'));
    } else {
        // Respond with error status
        echo json_encode(array('status' => 'error', 'message' => 'Failed to store data.'));
    }
} else {
    // Fetch guestbook entries from guestbook.txt (on private server)
    $guestbookFile = 'guestbook.txt'; // Update with the correct file path
    $entries = file($guestbookFile, FILE_IGNORE_NEW_LINES);
    
    // Respond with guestbook entries
    header('Content-Type: application/json');
    echo json_encode($entries);
}
?>
