<?php
 
//Include our MySQL connection.


include("database.php");
 
//IF the submit button is pressed, the following query will deploy
if(isset($_POST['register'])){
    
    // This will retrieve our values in the form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    
    //Create SQL statement and prepare it for processing.
    $sql = "SELECT COUNT(username) AS user_count FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    // Insert variable into prepared statement,
    $stmt->bindValue(':username', $username);
    
    // Execute prepared statement.
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If the user is already in the database, the script will die.
    
    if($row['user_count'] > 0){
        die('This username is already taken!');
    }
    
    // Password encryption for security purposes.

    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    // Another prepare statement, this time an insert statement. Can also use question marks, but must take care
    // to follow the correct order.
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    
    // Execute next prepared statement.
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);
    $result = $stmt->execute();
    
    // If successful, you will be redirected to the splash page.
    if($result){
        echo 'Thank you, please wait while we redirect you!';
        header('Location: index.php');
    }
    
}
 
?>