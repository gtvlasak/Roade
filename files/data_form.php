
<!-- Initial include calls -->

<?php include('header.php'); ?>
<?php include('add_vehicle.php'); ?>
<!-- HTML here below, simple form data -->
<div id="fleetForm">
    <form method="POST" enctype="multipart/form-data">
        <h2 class="formHeader">Add A Vehicle</h2>
        <?= $error ?> <!-- ECHO out Error message, if applicable -->
        <div class="form-group formBody">
            <div class="row">
                <div class="col">
                    Name: <input type="text" name="name" class="form-control"
                        placeholder="Enter data here..." /><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Speed: <input type="text" name="speed" class="form-control"
                        placeholder="Enter data here..." /><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Year: <input type="text" name="year" class="form-control"
                        placeholder="Enter data here..." /><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Median Range: <input type="text" name="median_range" class="form-control"
                        placeholder="Enter data here..." /><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Price: <input type="text" name="price" class="form-control"
                        placeholder="Enter data here..." /><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Description: <input type="text" name="description" class="form-control"
                        placeholder="Enter data here..." /><br>
                </div>
            </div>

            <input class="btn addMovie" type="submit" name="submit" value="Submit" />
        </div>
    </form>
</div>

<?php include('footer.php'); ?>
<!-- Footer information is generated here from PHP file. -->