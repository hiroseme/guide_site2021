
<?php
include 'connection.php';
session_start();

//checking if user is logged in
if(isset($_SESSION['logged_in_admin'])){
    $username_admin = $_SESSION['logged_in_admin'];
}
else {
    //if user isn't logged in, taken to log in page
    echo header("Location: login.php");
}

//getting existing place details
$place_query = "SELECT * FROM places";
$place_query_result = mysqli_query($con, $place_query);

//Getting inputted data and storing values in variabel
$placename = trim($_POST['PlaceName']);
$description = trim($_POST['Description']);
$regionid = trim($_POST['RegionID']);
$housenumber = trim($_POST['HouseNumber']);
$streetname = trim($_POST['StreetName']);
$town = trim($_POST['Town']);
$postcode = trim($_POST['PostCode']);
$typeid = trim($_POST['TypeID']);
$image = trim($_POST['ImageFile']);
$alt = trim($_POST['ALT']);

//checking to see if their are no blank fields
if(strlen($placename)===0 or strlen($regionid)===0 or strlen($streetname)===0 or strlen($town)===0 or strlen($postcode)===0 or strlen($typeid)===0 or strlen($image)===0 or strlen($alt)===0){
    //if there are blank fields...
    echo 'Fill out all details!';
    header("refresh:1;url=add_place.php");
}

//checking to see if input meets minimum character length
elseif(strlen($placename)<5 or strlen($streetname)<5 or strlen($town)<3 or strlen($alt)<3 or strlen($image)<5){
    //if input is too short...
    echo 'Enter valid details! ';
    header("refresh:1;url=add_place.php");
}
//checking to see if postcode is valid
elseif(strlen($postcode)!=4){
    echo 'Invalid Postcode! Should be 4 digits!';
    header("refresh:1;url=add_place.php");
}

else {
    //checking if place name the user has entered is identical to any existing place names
    while($place_query_record = mysqli_fetch_assoc($place_query_result)){
        if($placename===$place_query_record['PlaceName']){
            echo 'Error: Place with the same name already exists!';
            header("refresh:1;url=add_place.php");
        }
    }

    //if description field is blank, set default text
    if(strlen($description)===0){
        $description = 'Description coming soon...';
    }
//if there is no house number, set it to -
    if(strlen($housenumber)===0){
        $housenumber = '-';
    }
    //if there are no errors, new account is made
    //query to insert new place into database
    $insert_command = "INSERT INTO places (PlaceName, Description, RegionID, HouseNumber, StreetName, Town, PostCode, TypeID, ImageFile, ALT) VALUES ('$placename', '$description', '$regionid', '$housenumber', '$streetname', '$town', '$postcode', '$typeid', '$image', '$alt')";

    //checking if new place is added successfully
    if(!mysqli_query($con, $insert_command)) {
        //if not added, error message
        echo 'Error: Failed to add place.';
        header("refresh:1;url=add_place.php");
    }
    else{
        //if added, success message
        echo 'Inserted Successfully';
        header("refresh:3;url=add_place.php");
    }
}
?>


