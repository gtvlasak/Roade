<?php 
// THIS SCRIPT WILL ADD A VEHICLE TO THE DATABASE, WHICH CAN THEM BE SWITCHED OUT FOR ANY OF THE OTHER VEHICLES IN A FLEET.
 // Include database connection.
    include('database.php');
 
 // Placeholder blank variables for all of the forms fields, as well as the error messages. .= is used to append more <p> tags to the top fo the page.
$error = '';
$name = '';
$speed = '';
$year = '';
$median_range='';
$price = '';
$description = '';


// If the add movie button is pushed, this code will run that will vet all the fields to make sure they hae been entered.

if(isset($_POST["submit"])) {
        if(empty($_POST["name"])) {

        $error .= '<p>Please enter your name!</p>';

    }
    else {
        $name = $_POST["name"];
        $name = htmlspecialchars($name);
        
    }

    if(empty($_POST["speed"])) {

        $error .= '<p>Please enter your top speed!</p>';

    }
    else {
        $speed = $_POST["speed"];
        $speed = htmlspecialchars($speed);
        
    }

    if(empty($_POST["year"])) {

        $error .= '<p>Please enter the vehicle year!</p>';

    }
    else {
        $year = $_POST["year"];
        $year = htmlspecialchars($year);
        
    }

    if(empty($_POST["median_range"])) {

        $error .= '<p>Please enter the median range for a full charge!</p>';

    }
    else {
        $median_range = $_POST["median_range"];
        $median_range = htmlspecialchars($median_range);
        
    }

    if(empty($_POST["price"])) {

        $price .= '<p>Please enter a valid hourly price to rent!</p>';

    }
    else {
        $price = $_POST["price"];
        $price = htmlspecialchars($price);
        
    }

    if(empty($_POST["description"])) {

        $description .= '<p>Please enter a valid description!</p>';

    }
    else {
        $description = $_POST["description"];
        $description = htmlspecialchars($description);
        
    }
    



    

    // If there are no errors, we will open the CSV file and append the array of form values.

    if($error == '') {
        // IF no errors were passed through the previous if/else statement, the following code will run.
        $new_vehicle = array(
            "name" => $name,
            "speed" => $speed,
            "year" => $year,
            "median_range" => $median_range,
            "price" => $price,
            "description" => $description
            );
    // Found some documentation on sprintf and an article that outlined this below; thought I would use it to diversify styles, learn different ways to write.
        $sql = sprintf( 
            "INSERT INTO %s (%s) values (%s)",
            "vehicles",
            implode(", ", array_keys($new_vehicle)),
            ":" . implode(", :", array_keys($new_vehicle))
        );
        $statement = $pdo->prepare($sql);
        $statement->execute($new_vehicle);
        
    }

    
}

?> 
