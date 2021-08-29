
<?php

include 'connection.php';
session_start();

if (isset($_POST['place'])) {
    $id = $_POST['place'];
} else {
    $id = 1;
}

$this_place_query = "SELECT * FROM places WHERE PlaceID='$id'";
$this_place_result =mysqli_query($con, $this_place_query);
$this_place_record = mysqli_fetch_assoc($this_place_result);

if(isset($_SESSION['logged_in'])){
    $username = $_SESSION['logged_in'];
}
else {
    echo header("Location: login.php");
}
$reviewid = "$id$username";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> GuideSITE | HOME </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>
<header>
    <nav class="nav_navy">
        <div class="nav_container">
            <img class="logo_img" src="GuideSITE.png" alt="Guide Site Logo">
            <form class="search_nav" action="search_results.php" method="post">
                <input class="search_text_nav" type="text" value="Search... " name='search_place'
                       onclick="value=''">
                <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
            </form>
            <a class="a_nav a_nav_clicked" href="login.php"> LOGIN </a>
            <a class="a_nav" href="index.php"> ABOUT </a>
            <a class="a_nav" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
        </div>
    </nav>
</header>
<main class="main_login">
    <h2>Write a review for <?php echo $this_place_record['PlaceName']?></h2>
    <div class="user_login_container">
        <form name="review_form" id="review_form" method="post" action="process_new_review.php">
            <label for="date">Date: <?php echo date("Y-m-d");?> </label>
            <input type='hidden' name='date' value='<?php echo date("Y-m-d");?>'><br>
            <div class="stars">
                <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                <label class="star star-1" for="star-1"></label>
            </div>
            <textarea class="review_box" placeholder="Write your review here..." type="text" name="description"></textarea><br>
            <input type="hidden" name="reviewid" value="<?php echo $reviewid;?>">
            <input type="hidden" name="placeid" value="<?php echo $id;?>"><br>
            <input type="submit" name="submit" id="submit" value="Submit">
        </form>
    </div>
    </div>
</main>
</body>
</html>
