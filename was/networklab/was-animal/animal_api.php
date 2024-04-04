
<?php
// animal_api.php

// Include animal_array.php
include 'animal_array.php';

// Set response headers to indicate JSON content
header('Content-Type: application/json');

// Output the animal data as JSON
echo json_encode($animals);
?>
