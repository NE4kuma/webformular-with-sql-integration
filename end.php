<?php
$hostname = "localhost";
$username = "review_site";
$password = "YJy22f-44";
$db = "opinions";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
}

if(isset($_POST['submit'])) {
    $reviewer_name=$_POST['reviewer_name'];
    $details=$_POST['details'];
    $query = "INSERT INTO user_review (reviewer_name, details)
    VALUES ('$reviewer_name', '$details')";
        if (!mysqli_query($dbconnect, $query)) {
                die('An error occurred. Your review/opinion has not been submitted.');
        } else {
            echo "Thanks for your review/opinion.";
        }
}
?>
