
<?php
include 'connection.php';
session_start();

if(isset($_SESSION['logged_in_admin'])){
    $username_admin = $_SESSION['logged_in_admin'];
}
else {
    echo header("Location: login.php");
}

//gets user input and stores values in variables
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

//query to select all place details from database
$all_places_query = "SELECT * FROM places";
$all_places_result = mysqli_query($con, $all_places_query);
$all_places_record =mysqli_fetch_assoc($all_places_result);

//query to update place details
$update_place_command = "UPDATE places SET PlaceName='$placename', Description='$description', RegionID='$regionid', HouseNumber='$housenumber', StreetName='$streetname', Town='$town', PostCode='$postcode',ImageFile='$image',TypeID='$typeid' WHERE PlaceID='$placeid'";

if(!mysqli_query($con, $update_place_command))
//if update failed, error message.
{
    echo 'Error: Update failed';
    header("refresh:1;url=edit_places_form.php");
}
else{
    //if update was a success...
    echo 'Update Successful';
    header("refresh:3;url=edit_places.php");
}

?>