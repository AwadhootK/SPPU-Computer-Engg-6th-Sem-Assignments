<?php
try {
    $conn = mysqli_connect("localhost", "root", "", "php_assignment");
} catch (Exception $e) {
    echo "". $e->getMessage();
}