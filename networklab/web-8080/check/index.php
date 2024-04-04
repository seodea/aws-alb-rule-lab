<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .info {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Server Information</h1>

    <div class="info">
        <strong>Service Port:</strong> <?php echo $_SERVER['SERVER_PORT']; ?>
    </div>

    <div class="info">
        <strong>Current Directory:</strong> <?php echo getcwd(); ?>
    </div>

    <div class="info">
        <strong>The hostname of this server:</strong> <?php echo gethostname(); ?>
    </div>

</div>

</body>
</html>

