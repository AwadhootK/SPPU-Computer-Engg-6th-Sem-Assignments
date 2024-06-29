<?php include ('db.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie Form</title>
</head>

<body style="background-color:cyan;">
    <h1>Add a new movie!</h1>
    <form action="form.php" method="POST">
        <center>
            Name: <input type="text" name="name" id="name"><br>
            Rating: <input type="number" name="rating" id="rating"><br>
            Duration: <input type="number" name="duration" id="duration"><br>
            Date: <input type="date" name="date" id="date"><br>
            <input type="submit" value="submit">
        </center>
    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $rating = (int) $_POST['rating'];
    $duration = (int) $_POST['duration'];
    $date = date('Y-m-d', strtotime($_POST["date"]));

    try {
        $sql = "insert into movies (name, rating, date, duration) VALUES ('{$name}', '{$rating}', '{$date}', '{$duration}')";
        echo $sql . "<br>";
        $result = mysqli_execute_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<h3 style='background-color:green'>Successfully added movie!</h3>";
            echo '<a href="browse.php">Browse Movies</a><br>';
        } else {
            echo "<h3 styke='background-color:red'>Movie not added! Try again...</h3>";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}
?>