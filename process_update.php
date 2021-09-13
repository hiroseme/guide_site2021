
<?php
include 'connection.php';
session_start();

if(isset($_SESSION['logged_in_admin'])){
    $username_admin = $_SESSION['logged_in_admin'];
}
else {
    echo header("Location: login.php");
}

$placeid = trim($_POST['placeid']);
$placename = trim($_POST['placename']);
$description = trim($_POST['description']);
$regionid = trim($_POST['regionid']);
$housenumber = trim($_POST['housenumber']);
$streetname = trim($_POST['streetname']);
$town = trim($_POST['town']);
$postcode = trim($_POST['postcode']);
$typeid = trim($_POST['typeid']);
$image = trim($_POST['image']);

$all_places_query = "SELECT * FROM places";
$all_places_result = mysqli_query($con, $all_places_query);
$all_places_record =mysqli_fetch_assoc($all_places_result);

$update_place_command = "UPDATE places SET PlaceName='$placename', Description='$description', RegionID='$regionid', HouseNumber='$housenumber', StreetName='$streetname', Town='$town', PostCode='$postcode',ImageFile='$image',TypeID='$typeid' WHERE PlaceID='$placeid'";

if(!mysqli_query($con, $update_place_command))
{
    echo 'Error: Update failed';
}
else{
    echo 'Update Successful';
}

?>