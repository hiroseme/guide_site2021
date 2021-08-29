<?php

include 'connection.php';
$all_places_query = "SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID ORDER BY PlaceName ASC";
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
                <input class="search_text_nav" type="text" value="Search... " name='search_product'
                       onclick="value=''">
                <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
            </form>
            <a class="a_nav" href="login.php"> LOGIN </a>
            <a class="a_nav" href="index.php"> ABOUT </a>
            <a class="a_nav a_nav_clicked" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
        </div>
    </nav>
    <div class="nav_regions">
        <h1 class="regions_head">Regions</h1>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='NTL' value="Northland">
        </form>
        <?php
        if (isset($_POST['NTL'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='NTL' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='AUK' value="Auckland">
        </form>
        <?php
        if (isset($_POST['AUK'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='AUK' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='HKB' value="Hawke's Bay">
        </form>
        <?php
        if (isset($_POST['HKB'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='HKB' ORDER BY PlaceName ASC");
        }
        ?>
        <form class="region_button" action="places.php" method="post">
            <input class="region_button" type='submit' name='GIS' value="Gisborne">
        </form>
        <?php
        if (isset($_POST['GIS'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='GIS' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WGN' value="Wellington">
        </form>
        <?php
        if (isset($_POST['WGN'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='WGN' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='MBH' value="Marlborough">
        </form>
        <?php
        if (isset($_POST['MBH'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='MBH' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='MWT' value="Manawatu-Wanganui">
        </form>
        <?php
        if (isset($_POST['MWT'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='MWT' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WKO' value="Waikato">
        </form>
        <?php
        if (isset($_POST['WKO'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='WKO' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='BOP' value="Bay of Plenty">
        </form>
        <?php
        if (isset($_POST['BOP'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='BOP' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='NSN' value="Nelson">
        </form>
        <?php
        if (isset($_POST['NSN'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='NSN' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='TKI' value="Taranaki">
        </form>
        <?php
        if (isset($_POST['TKI'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='TKI' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='TAS' value="Tasman">
        </form>
        <?php
        if (isset($_POST['TAS'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='TAS' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='CAN' value="Canterbury">
        </form>
        <?php
        if (isset($_POST['CAN'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='CAN' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WTC' value="West Coast">
        </form>
        <?php
        if (isset($_POST['WTC'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='WTC' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='OTA' value="Otago">
        </form>
        <?php
        if (isset($_POST['OTA'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='OTA' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='STL' value="Southland">
        </form>
        <?php
        if (isset($_POST['STL'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID=places.RegionID WHERE places.RegionID='STL' ORDER BY PlaceName ASC");
        }
        ?>
    </div>
</header>
<main class="main_places">
    <div class="column_left">
        <h2 class="filter_header">Filter</h2>
    </div>
    <div class="column_right">
        <div class="search_places_container">
            <form class="search_places" action="search_results.php" method="post">
                <input class="search_text_places" type="text" value="Search... " name='search_product'
                       onclick="value=''">
                <div class="search_btn_places_container">
                    <input class="search_btn_places" type="submit" name="submit" value="&#x1F50D">
                </div>
            </form>
        </div>
        <h1 class="places_header">
            <?php if (isset($_POST['AUK'])) {
                echo "Auckland";
            } elseif (isset($_POST['BOP'])) {
                echo "Bay of Plenty";
            } elseif (isset($_POST['CAN'])) {
                echo "Canterbury";
            } elseif (isset($_POST['GIS'])) {
                echo "Gisborne";
            } elseif (isset($_POST['HKB'])) {
                echo "Hawke's Bay";
            } elseif (isset($_POST['MBH'])) {
                echo "Marlborough";
            } elseif (isset($_POST['MWT'])) {
                echo "Manawatu-Wanganui";
            } elseif (isset($_POST['NSN'])) {
                echo "Nelson";
            } elseif (isset($_POST['NTL'])) {
                echo "Northland";
            } elseif (isset($_POST['OTA'])) {
                echo "Otago";
            } elseif (isset($_POST['STL'])) {
                echo "Southland";
            }elseif (isset($_POST['TAS'])) {
                echo "Tasman";
            }elseif (isset($_POST['TKI'])) {
                echo "Taranaki";
            }elseif (isset($_POST['WGN'])) {
                echo "Wellington";
            }elseif (isset($_POST['WKO'])) {
                echo "Waikato";
            } elseif (isset($_POST['WTC'])) {
                echo "West Coast";
            } else {
                echo "Top Picks...";
            }
            ?>
        </h1>
        <div class="places_container_outer">
            <?php
            while ($all_places_record = mysqli_fetch_assoc($all_places_result)) {
                echo "<div class='places_container'>";
                echo "<div class='more_info'><form action='places_info.php' method='get'>
                        <input class='more_info_btn' type='submit' id='place' name='place' value=' Click for more info' onclick='value=" . $all_places_record['PlaceID'] . "' >
                    </form></div>";
                echo "<img class='places_image' src='".$all_places_record['ImageFile']."'>";
                echo "<div class='places_text'>";
                echo "<p class='places_text_name'>".$all_places_record['PlaceName']."</p>";
                echo "<br>";
                echo "<p class='places_text_grey'>".$all_places_record['Town'].", ".$all_places_record['Name']."</p>";
                echo "</div></div>";
            }
            ?>
        </div>
    </div>
</main>
</body>
</html>




