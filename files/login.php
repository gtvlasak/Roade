<?php
 

// Include our MySQL connection.


include("database.php");
 
// If submit button is pressed, the script will be sent.
if(isset($_POST['login'])){
    
    //Retrieve values from form fields
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    // IF it exists, retrieve the values from the SQL database.
    $sql = "SELECT id, username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    // Execute our prepared statement!
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    if($user === false){
       // If user doesn't exist, the script dies.
        die('Incorrect username / password combination!');
    } else{
        // If the user exists, the password entered is compared to the one in the database.
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
       
        if($validPassword){
            // Success in our login will redirect us to the portal page, whereas register just redirects you 
            // back to login.

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();
            
    
            header('Location: portal.php');
            exit;
            
        } else{
            // If password doesn't match, the script dies.
            die('Incorrect username / password combination!');
        }
    }
    
}
 