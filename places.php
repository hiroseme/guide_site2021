<?php

include 'connection.php';
session_start();

//query to select all place details from database
$all_places_query = "SELECT PlaceID, PlaceName, Town, ALT, ImageFile, Rating, placetypes.TypeName, regions.Name, regions.MaoriName FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY PlaceName ASC";
$all_places_result = mysqli_query($con, $all_places_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> GuideSITE | PLACES </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <nav class="nav_navy">
        <div class="nav_container">
            <img class="logo_img" src="GuideSITE.png" alt="Guide Site Logo">
            <form class="search_nav" action="places.php" method="post">
                <input class="search_text_nav" type="text" value="Search... " name='search_place'
                       onclick="value=''">
                <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
            </form>
            <?php
            //checking if user is logged in
            if(isset($_SESSION['logged_in'])){
                $username = $_SESSION['logged_in'];
                echo "<a class='a_nav font_small' href='login.php'> Logged in as ".$username." </a>";
            }
            elseif(isset($_SESSION['logged_in_admin'])){
                $username_admin = $_SESSION['logged_in_admin'];
                echo "<a class='a_nav' href='login.php'> Logged in as ".$username_admin." </a>";
            }
            else {
                echo "<a class='a_nav' href='login.php'> LOGIN </a>";
            }
            ?>
            <a class="a_nav" href="about.php"> ABOUT </a>
            <a class="a_nav a_nav_clicked" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
        </div>
    </nav>
    <div class="nav_regions">
        <h1 class="regions_head">Regions</h1>
        <div class="region_button_container">
            <!-- Northland filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='NTL' value="Northland">
        </form>
        <?php
        //if user has clicked the 'Northland' filter button
        if (isset($_POST['NTL'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='NTL' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Auckland filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='AUK' value="Auckland">
        </form>
        <?php
        //if user has clicked the 'Auckland' filter button
        if (isset($_POST['AUK'])) {
            //Query to get all places in the Auckland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='AUK' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Hawke's Bay filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='HKB' value="Hawkes Bay">
        </form>
        <?php
        if (isset($_POST['HKB'])) {
            //Query to get all places in the Hawke's Bay region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile,ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='HKB' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Gisborne filter button -->
        <form class="region_button" action="places.php" method="post">
            <input class="region_button" type='submit' name='GIS' value="Gisborne">
        </form>
        <?php
        if (isset($_POST['GIS'])) {
            //Query to get all places in the Gisborne region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='GIS' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Wellington filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WGN' value="Wellington">
        </form>
        <?php
        if (isset($_POST['WGN'])) {
            //Query to get all places in the Wellington region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating, placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='WGN' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Manawatu-Wanganui filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='MWT' value="Manawatu-Wanganui">
        </form>
        <?php
        if (isset($_POST['MWT'])) {
            //Query to get all places in the Manawatu-Wanganui region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='MWT' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Waikato filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WKO' value="Waikato">
        </form>
        <?php
        if (isset($_POST['WKO'])) {
            //Query to get all places in the Waikato region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='WKO' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Bay of Plenty filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='BOP' value="Bay of Plenty">
        </form>
        <?php
        if (isset($_POST['BOP'])) {
            //Query to get all places in the Bay of Plenty region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='BOP' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Taranaki filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='TKI' value="Taranaki">
        </form>
        <?php
        if (isset($_POST['TKI'])) {
            //Query to get all places in the Taranaki region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='TKI' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Marlborough filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='MBH' value="Marlborough">
        </form>
        <?php
        if (isset($_POST['MBH'])) {
            //Query to get all places in the Marlborough region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='MBH' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Nelson Bay filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='NSN' value="Nelson">
        </form>
        <?php
        if (isset($_POST['NSN'])) {
            //Query to get all places in the Nelson region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='NSN' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Tasman filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='TAS' value="Tasman">
        </form>
        <?php
        if (isset($_POST['TAS'])) {
            //Query to get all places in the Tasman region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='TAS' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Canterbury filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='CAN' value="Canterbury">
        </form>
        <?php
        if (isset($_POST['CAN'])) {
            //Query to get all places in the Canterbury region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='CAN' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- West Coast filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WTC' value="West Coast">
        </form>
        <?php
        if (isset($_POST['WTC'])) {
            //Query to get all places in the West Coast region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='WTC' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Otago filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='OTA' value="Otago">
        </form>
        <?php
        if (isset($_POST['OTA'])) {
            //Query to get all places in the Otago region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='OTA' ORDER BY PlaceName ASC");
        }
        ?>
            <!-- Southland filter button -->
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='STL' value="Southland">
        </form>
        <?php
        if (isset($_POST['STL'])) {
            //Query to get all places in the Southland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='STL' ORDER BY PlaceName ASC");
        }
        ?>
        <?php
        //if user searches for something on the search bar...
        if (isset($_POST['search_place'])) {
        $search_place = $_POST['search_place'];

        //Query to select all places that are like the user input
        $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, ALT,Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE PlaceName LIKE '%$search_place%'");
        $count = mysqli_num_rows($all_places_result); //number of places that match the search
        }
        ?>
        </div>
    </div>
</header>
<main class="main_places">
    <!-- side bar with filter buttons -->
    <div class="column_left">
        <h2 class="filter_header">Filter</h2>
            <form action="places.php" method="post">
                <input class="filter_btn button" type='submit' name='indoors' value="Indoors">
            </form>
            <?php
            if (isset($_POST['indoors'])) {
                //query that selects only indoor places
                $all_places_result = mysqli_query($con, "SELECT ALT,PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE placetypes.TypeID = 'INDR'");
            }
            ?>
        <form action="places.php" method="post">
            <input class="filter_btn button" type='submit' name='outdoors' value="Outdoors & Sport">
        </form>
        <?php
        if (isset($_POST['outdoors'])) {
            //query that selects only outdoor places
            $all_places_result = mysqli_query($con, "SELECT ALT, PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE placetypes.TypeID = 'OTDS'");
        }
        ?>
        <form action="places.php" method="post">
            <input class="filter_btn button" type='submit' name='cultural' value="Cultural">
        </form>
        <?php
        if (isset($_POST['cultural'])) {
            //query that selects only cultural places
            $all_places_result = mysqli_query($con, "SELECT ALT, PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE placetypes.TypeID = 'CLTR'");
        }
        ?>
        <form action="places.php" method="post">
            <input class="filter_btn button" type='submit' name='a-z' value="A-Z">
        </form>
        <?php
        if (isset($_POST['a-z'])) {
            //query to reorder alphabetically
            $all_places_result = mysqli_query($con, "SELECT ALT,PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="filter_btn button" type='submit' name='z-a' value="Z-A">
        </form>
        <?php
        if (isset($_POST['z-a'])) {
            //query to reorder in reverse alphabetical order
            $all_places_result = mysqli_query($con, "SELECT ALT,PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY PlaceName DESC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="filter_btn button" type='submit' name='rating_highlow' value="Rating: High-Low">
        </form>
        <?php
        if (isset($_POST['rating_highlow'])) {
            //query to reorder by rating, high to low
            $all_places_result = mysqli_query($con, "SELECT ALT,PlaceID, PlaceName, Town, ImageFile, Rating, placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY Rating DESC");
        }
        ?><form action="places.php" method="post">
            <input class="filter_btn button" type='submit' name='rating_lowhigh' value="Rating: Low-High">
        </form>
        <?php
        if (isset($_POST['rating_lowhigh'])) {
            //query to reorder by rating, low to high
            $all_places_result = mysqli_query($con, "SELECT ALT,PlaceID, PlaceName, Town, ImageFile, Rating, placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY Rating ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="filter_btn button background_green" type='submit' name='reset' value="RESET">
        </form>
        <?php
        if (isset($_POST['reset'])) {
            //query to reset filter
            $all_places_result = mysqli_query($con, "SELECT ALT,PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY PlaceName ASC");
        }
        ?>
    </div>
    <div class="column_right">
        <div class="search_places_container">
            <!-- search bar -->
        <form class="search_places" action="places.php" method="post">
            <input class="search_text_places" type="text" value="Search... " name='search_place'
                   onclick="value=''">
            <div class="search_btn_places_container">
            <input class="search_btn_places" type="submit" name="submit" value="Submit">
            </div>
        </form>
        </div>
        <!-- header, displays which filter button has been clicked -->
        <h1 class="places_header">
        <?php if (isset($_POST['AUK'])) {
            //displays region name in english and maori
            $regionname = $_POST['AUK'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        } elseif (isset($_POST['BOP'])) {
            //displays region name in english and maori
            $regionname = $_POST['BOP'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        } elseif (isset($_POST['CAN'])) {
            //displays region name in english and maori
            $regionname = $_POST['CAN'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        } elseif (isset($_POST['GIS'])) {
            //displays region name in english and maori
            $regionname = $_POST['GIS'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        } elseif (isset($_POST['HKB'])) {
            //displays region name in english and maori
            $regionname = $_POST['HKB'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        } elseif (isset($_POST['MBH'])) {
            //displays region name in english and maori
            $regionname = $_POST['MBH'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        } elseif (isset($_POST['MWT'])) {
            //displays region name in english and maori
            $regionname = $_POST['MWT'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        } elseif (isset($_POST['NSN'])) {
            //displays region name in english and maori
            $regionname = $_POST['NSN'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        } elseif (isset($_POST['NTL'])) {
            //displays region name in english and maori
            $regionname = $_POST['NTL'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        } elseif (isset($_POST['OTA'])) {
            //displays region name in english and maori
            $regionname = $_POST['OTA'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        } elseif (isset($_POST['STL'])) {
            //displays region name in english and maori
            $regionname = $_POST['STL'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        }elseif (isset($_POST['TAS'])) {
            //displays region name in english and maori
            $regionname = $_POST['TAS'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        }elseif (isset($_POST['TKI'])) {
            //displays region name in english and maori
            $regionname = $_POST['TKI'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        }elseif (isset($_POST['WGN'])) {
            //displays region name in english and maori
            $regionname = $_POST['WGN'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        }elseif (isset($_POST['WTC'])) {
            //displays region name in english and maori
            $regionname = $_POST['WTC'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        }elseif (isset($_POST['WKO'])) {
            //displays region name in english and maori
            $regionname = $_POST['WKO'];
            $region_query = "SELECT * FROM regions WHERE Name='$regionname'";
            $region_query_result = mysqli_query($con, $region_query);
            $region_query_record= mysqli_fetch_assoc($region_query_result);
            echo $region_query_record['Name'];
            echo "<br>";
            echo "<i>".$region_query_record['MaoriName']."</i>";
        }
        //headers if filter button is clicked...
        elseif (isset($_POST['indoors'])) {
            echo "Indoors";
        } elseif (isset($_POST['outdoors'])) {
            echo "Outdoors & Sport";
        } elseif (isset($_POST['cultural'])) {
            echo "Cultural";
        } elseif (isset($_POST['z-a'])) {
            echo "Z-A";
        }elseif (isset($_POST['rating_highlow'])) {
            echo "Rating: High to Low";
        }elseif (isset($_POST['rating_lowhigh'])) {
            echo "Rating: Low to High";
        }elseif (isset($_POST['search_place'])) {
            if ($search_place == "") {
                //error message displayed if user searches for nothing
                echo "</tr><br><h2 class='search_error_text'>Please enter something!</h2>";
            } elseif ($search_place == "Search... ") {
                //error message if user clicks 'Search' before entering anything
                echo "</tr><br><h2 class='search_error_text'>Please enter something!</h2>";
            } elseif ($count == 0) {
                //error message if nothing matches user's search
                echo "</tr><br><h2 class='search_error_text'>No places matched '".$_POST['search_place']."'...</h2>";
            } else{
                //header if user searches for something valid
                echo "Search Results for '".$_POST['search_place']."'";
            }
        } else {
            //header if user hasn't searched or clicked filter buttons - default header
            echo "Discover places...";
        }
        ?>
        </h1>
        <div class="places_container_outer">
        <?php
        $count_places=0; //counting how many places are selected from query
        while ($all_places_record = mysqli_fetch_assoc($all_places_result)) {
            //displays each of the place details in a box
            $count_places = $count_places + 1;
            echo "<div class='places_container'>";
            echo "<div class='more_info'><form action='places_info.php' method='get'>
                        <input class='more_info_btn' type='submit' id='place' name='place' value=' Click for more info' onclick='value=" . $all_places_record['PlaceID'] . "' >
                    </form></div>";
            echo "<img class='places_image' src='" . $all_places_record['ImageFile'] . "' alt='".$all_places_record['ALT']."'>";
            echo "<div class='places_text'>";
            echo "<p class='places_text_name'>" . $all_places_record['PlaceName'] . "</p>";
            echo "<br>";

            //displaying average rating of each rating, rounding to the nearest whole number.
            $star_num = round($all_places_record['Rating'], 0);
            if($star_num==0){
                echo "<p class='places_text_name'>☆☆☆☆☆</p>";
            }
            elseif($star_num==1){
                echo "<p class='places_text_name'>★☆☆☆☆</p>";
            }
            elseif($star_num==2){
                echo "<p class='places_text_name'>★★☆☆☆</p>";
            }
            elseif($star_num==3){
                echo "<p class='places_text_name'>★★★☆☆</p>";
            }
            elseif($star_num==4){
                echo "<p class='places_text_name'>★★★★☆</p>";
            }
            elseif($star_num==5){
                echo "<p class='places_text_name'>★★★★★</p>";
            }

            echo "<p class='places_text_grey'>" . $all_places_record['Town'] . ", " . $all_places_record['Name'] . "</p>";
            echo "<p class='places_text_grey'><b>" . $all_places_record['TypeName'] . "</b></p>";
            echo "</div></div>";

            //selecting all reviews of a selected place
            $reviews_query = "SELECT * FROM reviews WHERE PlaceID='".$all_places_record['PlaceID']."'";
            $reviews_result = mysqli_query($con, $reviews_query);
            $count = 0;
            $rating = 0;

            while ($reviews_record = mysqli_fetch_assoc($reviews_result)){
                $count = $count + 1; //counting the number of reviews
                $rating = $rating + $reviews_record['Rating']; //sum of the ratings
            }
            if($count === 0){
                $final_rating = 'a'; //if there are no reviews
            }
            else{
                $final_rating = round($rating/$count,2); //getting the average rating and rounding to the nearest 2 dp
            }
            //storing average rating in database.
            $update_review_command = "UPDATE places SET Rating='".$final_rating."', ReviewNum='".$count."' WHERE PlaceID='".$all_places_record['PlaceID']."'";
            $update_review_result = mysqli_query($con, $update_review_command);
        }
        //if no places match the search/filter, error message
        if($count_places===0){
            echo "<h1 class='colour_grey'>No places found</h1>";
        }
        ?>
    </div>
    </div>
</main>
<footer>
    <div class="footer_container">
        <div class="footer_text">
            <p><b>Contact Us:<br></b><br>Ph: 020 123 4567<br>Email: guidesite@info.co.nz<br>Office Hours: 7:00am ~ 5:00pm /7 days<br>PO Box:32134</p>
            <p><b>Address:</b><br>1 Kiwi Avenue, Wellington<br></p>
        </div>
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2998.536516319165!2d174.77800201539225!3d-41.27542644765783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38ae2f27710d0d%3A0x2d0763d38f00974b!2sWellington%20Girls&#39;%20College!5e0!3m2!1sen!2snz!4v1632524713252!5m2!1sen!2snz" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <p class="footer_small">By Megumi Hirose 2021</p>
</footer>
</body>
</html>
