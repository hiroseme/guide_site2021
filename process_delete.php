
<?php

include 'connection.php';

//gets place id
$placeid = trim($_POST['placeid']);

//query to delete the selected place from the database
$delete_command = "DELETE FROM places WHERE PlaceID='$placeid'";

//check to see if delete was successful
if(!mysqli_query($con, $delete_command))
{
    //if not deleted, error message
    echo 'Not Deleted';
}
else{
    //if deleted, success message
    echo 'Deleted';
}

//taken back to edit_places page
header("refresh:2;url=edit_places.php");

?>