<?php
// Includes for the database connection, search queries to generate the page, and the header
include('database.php');
include('search_functions.php');
include('header.php');
?>
<div class="jumbotron jumbotron-fluid" style=position:relative;>
    <div class="roadeIcon">
    <?php City::spitPic($pdo); ?>
        <!-- Jumbotron and title area - beginning of index body -->
        <div class="container" id="cityText">
            <div class="row align-items-center text-center justify-content-center">
                 <!-- One of my Objects is being called to fill some elements with city data from the database. -->
                <h1 class="display-4 col-sm-12" id="cityTitle"><?php City::spitCity($pdo); ?><span
                        class="yellowText"><?php City::spitState($pdo); ?></span><br /></h1> 
            </div>
            <div class="row align-items-center text-center justify-content-center">
                <p class="lead col-sm-12 text-center" id="cityHeader"><?php City::spitNickname($pdo); ?></p>
            </div>
        </div>
    </div>
</div>
    <div class="fleetContainer align-items-center text-center justify-content-center"> <!-- Beginning of table structure for the array to be loaded into. -->
        <div class="fleetWrapper d-flex align-items-center text-center justify-content-center">
            <!-- This is where the bicycle table is loaded.  UPDATE: Was integrated into divs instead for a more clean appearance, though not optimized yet responsively -->
           <?php Bikes::bicycleTable($pdo) ?>
        </div>
        <button class="btn btnSplash"><a href="data_form.php">ADD TO FLEET</a></button>
    </div>

<?php 
// Include for the footer.
include('footer.php'); 
?>



