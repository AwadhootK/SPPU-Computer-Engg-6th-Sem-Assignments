<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script lang="php">
        echo $hello;
    </script>
</head>

<body>
    <form action="index.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username"> <br>

        <label for="password">Password</label>
        <input type="password" name="password"> <br>

        <input type="submit" value="Log In">
    </form>
</body>

</html>

<?php
// $name = "Awadhoot";
// echo "{$_GET["username"]} <br>";
// echo "{$_GET["password"]} <br>";

echo "{$_POST["username"]} <br>";
echo "{$_POST["password"]} <br>";

// if() {}
// elseif() {}
// else {}

// switch($name) {
//     case "a": echo "A"; break;
//     case "b": echo "B"; break;
//     default: echo "None";
// }

// for ($i = 0; $i < 10; $i++) {
//     echo "{$i} ";
// }

// while ($c <= 10) {
//     $c--;
// }

// $days = array("mon", "tue", "wed", "thu", "fri", "sat", "sun");
// echo $days[2];

// foreach($day as $days) {
//     echo $day . "<br>";
// } 

// array_push($days, "new day1", "new day2");
// array_pop($days);

// $capitals = array(
//     "USA" => "DC",
//     "India" => "New Delhi"
// );

// echo $capitals["India"];

// foreach($capitals as $k => $v) {
//     echo "". $k ."". $v ."";
// }

// $keys = array_keys($capitals);

// $username1 = "name";
// $username2 = "";
// $username3 = null;

// echo isset($username1)? "set username1 <br>" : "not set username1 <br>";
// echo isset($username2)? "set username2 <br>" : "not set username2 <br>";
// echo isset($username3) ? "set username3 <br>" : "not set username3 <br>";

// echo empty($username1) ? "empty username1 <br>" : "not empty username1 <br>";
// echo empty($username2) ? "empty username2 <br>" : "not empty username2 <br>";
// echo empty($username3) ? "empty username3 <br>" : "not empty username3 <br>";

// function hello() {
//     echo "hello world";
// }
// hello();

// include()

// setcookie("token", "keckuwhf2y892932hdi24nfohf42fwehf824uf24hjkrfbk34ghui43h", time() + 10, "/")
// setcookie("token", "keckuwhf2y892932hdi24nfohf42fwehf824uf24hjkrfbk34ghui43h", time() - 0, "/")

// foreach ($_COOKIE as $key => $value) {
//     echo "". $key ."". $value ."";
// }

// $_SESSION

// foreach ($_SERVER as $key => $value) {
//     echo"". $key ." = ". $value ."<br>";
// }

// echo $_SERVER["PHP_SELF"]

// $password = "awadhoot";
// $hash = password_hash($password, PASSWORD_DEFAULT);
// echo $hash . "<br>";

// if (password_verify($password, $hash)) {
//     echo "Password verified!";
// } else {
//     echo "Invalid password";
// }

?>