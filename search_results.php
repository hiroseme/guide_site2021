

<?php

include 'connection.php';
$all_places_query = "SELECT PlaceID, PlaceName, Town, ImageFile, placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY PlaceName ASC";
$all_places_result = mysqli_query($con, $all_places_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> GuideSITE | HOME </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
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
            <a class="a_nav a_nav_clicked" href="index.php"> LOGIN </a>
            <a class="a_nav" href="index.php"> ABOUT </a>
            <a class="a_nav" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
        </div>
    </nav>
</header>
    <form class="search" action="search_results.php" method="post">
        <input class="search_text" type="text" value="Search for a place..." name='search_place' onclick="value=''">
        <input class="search_btn" type="submit" name="submit" value="Search">
    </form>
    <main>
        <div class="search_results_container">
            <h1 class="search_results_head">Search Results</h1>
            <table class="menu_table">
                <tr class="menu_table_header">
                    <?php
                    if (isset($_POST['search_place'])) {
                        $search_place = $_POST['search_place'];

                        //Query to select all places that are like the user input
                        $query1 = "SELECT * FROM places WHERE PlaceName LIKE '%$search_place%'";
                        $query = mysqli_query($con, $query1);
                        $count = mysqli_num_rows($query);
                        if ($search_place == "") {
                            echo "</tr><br><h2 class='search_error_text'>Please enter something!</h2>";
                        } elseif ($count == 0) {
                            echo "</tr><br><h2 class='search_error_text'>No places matched your search...</h2>";
                        } else {
                            echo " <th>PlaceID</th>
            <th>Place Name</th>
            <th>Town</th>
            <th></th>
        </tr>";
                            while ($row = mysqli_fetch_array($query)) {
                                echo " <tr>
                <td>" . $row['PlaceID'] . "</td>";
                                echo "
                <td>" . $row['PlaceName'] . "</td>";
                                echo "
                <td>".$row['Town'] . "</td>";
                                echo "<td><form action='places_info.php' method='get'>
                        <input class='info_btn' type='submit' id='place' name='place' value='info' onclick='value=" . $row['PlaceID'] . "' >
                    </form></td>";
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
            </table>
            <?php
            while ($row = mysqli_fetch_array($query)) {
                echo "<div class='search_results_container2'>";
                echo "<div class='more_info'><form action='places_info.php' method='get'>
                        <input class='more_info_btn' type='submit' id='place' name='place' value=' Click for more info' onclick='value=" . $all_places_record['PlaceID'] . "' >
                    </form></div>";
                echo "<img class='places_image' src='".$row['ImageFile']."'>";
                echo "<div class='places_text'>";
                echo "<p class='places_text_name'>".$row['PlaceName']."</p>";
                echo "<br>";
                echo "<p class='places_text_grey'>".$all_places_record['Town'].", ".$all_places_record['Name']."</p>";
                echo "<p class='places_text_grey'><b>".$all_places_record['TypeName']."</b></p>";
                echo "</div></div>";
            }
            ?>            <h1 class="search_results_head">Search for another place</h1>
            <div class="container80">
                <form class="search" action="search_results.php" method="post">
                    <input class="search_text fs30" type="text" value="Search for a place..." name='search_place' onclick="value=''">
                    <input class="search_btn fs30" type="submit" name="submit" value="Search">
                </form>
            </div>
        </div>
</main>
</body>
</html>
