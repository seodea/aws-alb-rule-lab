<!DOCTYPE html>
<html>
<head>
    <title>AWS EC2 Instance Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #333;
            margin-bottom: 5px;
        }
        .header img {
            width: 200px;
            height: auto;
            border-radius: 5px;
        }
        .info {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .info h2 {
            color: #333;
            margin-bottom: 10px;
        }
        .info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <img src="images/aws_logo.png" alt="AWS Logo">
        <h1>My AWS EC2 Instance Information</h1>
    </div>

    <div class="info">
        <?php
        // Get instance metadata
        $instance_data = file_get_contents('http://169.254.169.254/latest/meta-data/instance-id');
        $instance_id = ($instance_data !== false) ? $instance_data : 'N/A';

        $instance_data = file_get_contents('http://169.254.169.254/latest/meta-data/instance-type');
        $instance_type = ($instance_data !== false) ? $instance_data : 'N/A';

        $instance_data = file_get_contents('http://169.254.169.254/latest/meta-data/public-ipv4');
        $public_ip = ($instance_data !== false) ? $instance_data : 'N/A';

        $instance_data = file_get_contents('http://169.254.169.254/latest/meta-data/placement/availability-zone');
        $availability_zone = ($instance_data !== false) ? $instance_data : 'N/A';
        ?>
        
        <h2>Instance ID: <?php echo $instance_id; ?></h2>
        <p>Instance Type: <?php echo $instance_type; ?></p>
        <p>Public IP: <?php echo $public_ip; ?></p>
        <p>Availability Zone: <?php echo $availability_zone; ?></p>
    </div>
</div>

</body>
</html>
