<?php
include ("header.html");
include ("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            margin-top: 30px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Insert a movie</h1>
    <form action="insert.php" method="post">
        <label for="name">Movie Name</label>
        <input type="text" name="name" required>

        <label for="rating">Rating</label>
        <input type="number" name="rating" min="1" max="10" required>

        <label for="duration">Duration (minutes)</label>
        <input type="number" name="duration" min="1" required>

        <label for="date">Release Date</label>
        <input type="date" name="date" required>

        <input type="submit" value="Add Movie">
    </form>
</body>
</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $movie_name = $_POST["name"];
        $rating = (int) $_POST["rating"];
        $duration = (int) $_POST["duration"];
        $date = date('Y-m-d', strtotime($_POST["date"]));

        echo "Movie Name: " . $movie_name . "<br>";
        echo "Rating: " . $rating . "<br>";
        echo "Duration: " . $duration . "<br>";
        echo "Date: " . $date . "<br>";

        $sql = "INSERT INTO movies (name, rating, duration, date)
                VALUES ('{$movie_name}', {$rating}, {$duration}, '{$date}')";

        echo "<br>" . $sql;
        $result = mysqli_execute_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo "Inserted!";
        } else {
            echo "Not inserted!";
        }
    } catch (Exception $e) {
        echo "Some error occurred: " . $e->getMessage();
    }
}

?>