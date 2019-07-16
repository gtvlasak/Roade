<?php

 // Include database connection.
include('database.php');


// Simple statement to delete the vehicle from the respective fleet.
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $sql = "DELETE FROM fleets WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $id = $statement->fetch(PDO::FETCH_ASSOC);
        };
            echo "This vehicle has successfully been removed from your local bikeshare fleet!";


        