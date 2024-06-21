<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback</title>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <!-- Bootstrap Js -->
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Your CSS -->
    <style>
        body {
            background-color: #dedede;
        }
        .container {
            padding: 20px;
        }
        .feedback-card {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .feedback-card h4 {
            margin-bottom: 10px;
        }
        .feedback-card .meta {
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Feedback</h2>
    <div class="row">
        <?php
        include "config.php";
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Query to fetch all feedback records
        $sql = "SELECT * FROM newfeedback ORDER BY id DESC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-md-6">';
                echo '<div class="feedback-card">';
                echo '<h4>' . htmlspecialchars($row['name']) . '</h4>';
                echo '<div class="meta">';
                echo '<p>Email: ' . htmlspecialchars($row['email']) . '</p>';
                echo '<p>Rating: ' . htmlspecialchars($row['rating']) . '</p>';
                echo '</div>';
                echo '<p>' . htmlspecialchars($row['comments']) . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No feedback found.</p>';
        }
        
        $conn->close();
        ?>
    </div>
</div>

</body>
</html>