<?php
// File path to guestbook.txt
$guestbookFile = 'guestbook.txt'; // Update with the correct file path

// Check if the file exists and is readable
if (!file_exists($guestbookFile) || !is_readable($guestbookFile)) {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(array('error' => 'Guestbook file not found or inaccessible'));
    exit;
}

// Read the file contents
$entries = file_get_contents($guestbookFile);

// Check if the file contents are empty
if (empty($entries)) {
    echo json_encode(array('message' => 'No entries found'));
    exit;
}

// Respond with guestbook entries
header('Content-Type: application/json');
echo $entries;
?>
