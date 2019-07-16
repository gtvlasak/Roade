    <?php 
    // Include statement for database connection.
    include('database.php');

// Placeholder blank variables for all of the forms fields, as well as the error messages. .= is used to append more <p> tags to the top fo the page.

$error = '';
$name = '';
$city_id = '';
$id = '';





// If the update movie button is pushed, this code will run that will vet all the fields to make sure they hae been entered.


if (isset($_POST['submit'])) {

    $vehicle = array(
        $_POST['name'],
        $_POST['city_id'],
        $_POST['speed'],
        $_POST['year'],
        $_POST['median_range'],
        $_POST['description'],
        $_GET['id'],

    ); // Used positional placeholders this time, quicker to query but easier to mess up!
        $sql = "UPDATE fleets
                LEFT JOIN vehicles ON vehicles.id = fleets.vehicle_id
                SET name = ?,
                city_id = ?,
                speed = ?,
                year = ?,
                median_range = ?,
                description = ?
                WHERE fleets.id = ?";
    // Prepare statement and delpoy
    $statement = $pdo->prepare($sql);
    $statement->execute($vehicle);
    echo '<h1 class="update">Update successful!</h1>';
        }


        if (isset($_GET['id'])) { // If ID is set, this query is run, which joins some tables to pull together all data needed.
            $id = $_GET['id'];
            $sql = "SELECT * FROM fleets LEFT JOIN vehicles ON vehicles.id = fleets.vehicle_id WHERE fleets.id = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $vehicle = $statement->fetch(PDO::FETCH_ASSOC);
        
        };              // BEGINNING OF HTML BELOW
?>                 
 
    <?php include('header.php'); ?>

    <!-- Footer information is generated here from PHP file. -->
    <div id="fleetForm">
        <form method="POST" enctype="multipart/form-data">
            <!-- foreach loop has been opened, which will then be able to pull the data from form fields -->
            <h2 class="formHeader">Update Your Fleet</h2>
            <?= $error ?>
            <!-- ECHO out Error message, if applicable -->
            <div class="form-group formBody">
                <div class="row">
                    <div class="col">
                        Name: <input type="text" name="name" class="form-control"
                            placeholder="Enter data here..." value="<?php echo $vehicle['name']; ?>"/><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        City ID: <input type="text" name="city_id" class="form-control" placeholder="Enter data here..."
                            value="<?php echo $vehicle['city_id']; ?>"></input><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Speed: <input type="text" name="speed" class="form-control" placeholder="Enter data here..."
                            value="<?php echo $vehicle['speed']; ?>"></input><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Year: <input type="text" name="year" class="form-control" placeholder="Enter data here..."
                            value="<?php echo $vehicle['year']; ?>"></input><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Median Range: <input type="text" name="median_range" class="form-control" placeholder="Enter data here..."
                            value="<?php echo $vehicle['median_range']; ?>"></input><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Description: <input type="text" name="description" class="form-control" placeholder="Enter data here..."
                            value="<?php echo $vehicle['description']; ?>"></input><br>
                    </div>
                </div>
                <!-- end of foreach loop is here -->
                
                <input class="btn addMovie" type="submit" name="submit" value="Submit" />
            </div>
        </form>
    </div>


    <?php include('footer.php'); ?>
    <!-- Footer information is generated here from PHP file. -->