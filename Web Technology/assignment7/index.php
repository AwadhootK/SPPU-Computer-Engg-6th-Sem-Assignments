<?php
include ("header.html");
include ("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <style>
        .movie-card {
            position: relative;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: cyan;
        }

        .movie-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .movie-info {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .del-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: chartreuse;
            border-radius: 10px;
            height: 30px;
        }
    </style>
</head>

<body>
    <h1>Movies are</h1>
    <?php
    $sql = "SELECT * FROM movies";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="movie-card">
                <form action="index.php" method="post">
                    <button class="del-btn" type="submit" name="del-btn" value="<?php echo $row["name"] ?>">Delete</button>
                </form>
                <center>
                    <h3 class="movie-title"><?php echo $row["name"]; ?></h3>
                    <p class="movie-info">Rating: <?php echo $row["rating"]; ?></p>
                    <p class="movie-info">Duration: <?php echo $row["duration"]; ?></p>
                    <p class="movie-info">Date: <?php echo $row["date"]; ?></p>
                </center>
            </div>
            <?php
        }
    }
    ?>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["del-btn"])) {
        $movie = $_POST["del-btn"];
        $sql = "DELETE FROM movies WHERE name = '{$movie}'";
        try {
            $result = mysqli_execute_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "Deleted";

            } else {
                echo "Some error occurred";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Some error occurred " . $e->getMessage();
        }
    }
}
?>