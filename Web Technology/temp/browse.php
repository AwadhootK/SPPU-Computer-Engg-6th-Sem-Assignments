<?php include ('db.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Movies</title>
</head>

<body>
    <h1>Movie Catalog</h1>
    <?php

    $sql = "select * from movies";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . '</td>';
            echo "<td>" . $row['rating'] . '</td>';
            echo "<td>" . $row['date'] . '</td>';
            echo "<td>" . $row['duration'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo 'No movies yet! Insert one';
        echo '<a href="form.php">Add a new movies</a><br>';
    }

    ?>
</body>

</html>