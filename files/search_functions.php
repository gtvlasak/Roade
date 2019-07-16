<?php

include('database.php');

// Was able to make functions out of two of the main classes, but did not have enough time to troubleshoot the rest.

class City { // Spits out city name
    function spitCity($pdo) {
        if(isset($_GET['name'])) {
            $name = $_GET['name'];
            $stmt = $pdo->prepare('SELECT * FROM cities WHERE name = ?');
            $stmt->execute([$name]);
            $city = $stmt->fetch();
            echo $city['name'];
        }

    }

    function spitState($pdo) { // Spits out state name
        if(isset($_GET['name'])) {
            $name = $_GET['name'];
            $stmt = $pdo->prepare('SELECT * FROM cities WHERE name = ?');
            $stmt->execute([$name]);
            $city = $stmt->fetch();
            echo ', '.$city['state'].'';
        }

    }

    function spitPic($pdo) { // Spits out banner picture
        if(isset($_GET['name'])) {
            $name = $_GET['name'];
            $stmt = $pdo->prepare('SELECT * FROM cities WHERE name = ?');
            $stmt->execute([$name]);
            $city = $stmt->fetch();
            echo '<img class="cityBanner" src="data:image/jpeg;base64,'.base64_encode($city['img']).'"/>';
        }

    }

    function spitNickname($pdo) { // Spits out nickname
        if(isset($_GET['name'])) {
            $name = $_GET['name'];
            $stmt = $pdo->prepare('SELECT * FROM cities WHERE name = ?');
            $stmt->execute([$name]);
            $city = $stmt->fetch();
            echo $city['nickname'];
        }

    }

    function searchQuery($pdo) { // Runs the search query that redirects us to the appropriate fleet city page.

        // NOTE ************ ONLY DALLAS AND DENVER HAS BEEN ENTERED THUS FAR!

    // gets value sent over search form
    if(isset($_POST['submit'])) {
    if(isset($_POST['name'])) {
            $name = $_POST['name'];
            $stmt = $pdo->prepare('SELECT * FROM cities WHERE name LIKE ?');
            $stmt->execute([$name]);
            $city = $stmt->fetch();
            $city = $city['name'];
            if($city == $name) {
            header( "Location: search.php?name=" . $city );
            

    } else { header( "Location: redirect.php"); }
    }}
}
}

class Bikes {
   /* function bicycleTable($pdo) { // THIS WAS MY OLD TABLE CODE, BEFORE I TRANSITIONED TO DIVS.
        if(isset($_GET['name'])) {
            $name = $_GET['name'];
            $stmt = $pdo->prepare('SELECT vehicles.name, vehicles.picture
            FROM `vehicles`
            LEFT JOIN fleets ON vehicles.id = fleets.vehicle_id
            WHERE fleets.city_id = ?');
            $stmt->execute([$name]);
            
            while ($row = $stmt->fetch()){
                echo '<tr class="d-flex"><td class="imgWrapper col-3"><img src="data:image/jpeg;base64,'.base64_encode( $row['picture'] ).'"/><a href="details.php?id=""/><p class="detailsPlus">+</p></a></td><td class="vehicleInfo col-9">'.$row['name'].'</td></tr>';
            }
        }
    } */

    function bicycleTable($pdo) { // loads the bicycle divs on the search page.
        if(isset($_GET['name'])) {
            $name = $_GET['name'];
            $stmt = $pdo->prepare('SELECT *, fleets.id
            FROM `vehicles`
            LEFT JOIN fleets ON vehicles.id = fleets.vehicle_id
            WHERE fleets.city_id = ?');
            $stmt->execute([$name]);
            
            while ($row = $stmt->fetch()){
               echo '<div class="fleetItem text-center"><div class="imgWrapper"><img src="data:image/jpeg;base64,'.base64_encode( $row['picture'] ).'"/></div><div class="vehicleLabel">VEHICLE TYPE</div><div class="vehicleInfo text-center justify-content-center">'.$row['name'].'</div><div class="vehicleLabel">PRODUCTION YEAR</div><div class="vehicleInfo text-center justify-content-center">'.$row['year'].'</div><div class="vehicleLabel">TOP SPEED</div><div class="vehicleInfo text-center justify-content-center">'.$row['speed'].'</div><div class="vehicleLabel">MEDIAN RANGE</div><div class="vehicleInfo text-center justify-content-center">'.$row['median_range'].'</div><div class="vehicleLabel">DESCRIPTION</div><div class="vehicleInfo text-center justify-content-center">'.$row['description'].'</div><div class="vehicleLabel">RENTAL PRICE</div><div class="vehicleInfo text-center justify-content-center">'.$row['price'].'</div><div class="vehicleButtons"><form method="POST" enctype="multipart/form-data"><button class="btn vehicleLink"><a href="update_form.php?id='.$row['id'].'">Update</a></button><form method="POST" enctype="multipart/form-data"><button class="btn vehicleLink"><a href="delete_confirm.php?id='.$row['id'].'">Delete</a></button></div></div>';
               // echo '<tr class="d-flex"><td class="imgWrapper col-3"><img src="data:image/jpeg;base64,'.base64_encode( $row['picture'] ).'"/><a href="details.php?id=""/><p class="detailsPlus">+</p></a></td><td class="vehicleInfo col-9">'.$row['name'].'</td></tr>';
            }
        }
    }

}
    ?>