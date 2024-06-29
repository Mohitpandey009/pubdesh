<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Ad Manager API Example</title>
    <!-- Include any necessary CSS or meta tags -->
</head>
<body>
    <h1>Google Ad Manager API Example</h1>
    <div>
        <?php
        if (!empty($reportData)) {
            echo '<pre>';
            print_r($reportData); // Display the report data
            echo '</pre>';
        } else {
            echo 'No data available.';
        }
        ?>
    </div>
    <!-- Add more HTML/CSS/JS for styling or interaction -->
</body>
</html>
