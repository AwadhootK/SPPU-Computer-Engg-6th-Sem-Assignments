<?php
include ("db.php");
?>

<?php
echo "<br>";
$sql = "SELECT * FROM movies";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $i = 1;
    echo "Movie {$i}<br>";
    $i++;
    while ($row = mysqli_fetch_array($result)) {
        echo $row["name"] . "<br>";
        echo $row["rating"] . "<br>";
        echo $row["date"] . "<br>";
        echo $row["duration"] . "<br>";
        echo "************<br>";
    }
}
?>