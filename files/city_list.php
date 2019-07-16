<?php
require_once("database.php"); // So no duplicate calls are made.

if(!empty($_POST["keyword"])) {

    $keyword = $_POST["keyword"].'%';
    $stmt = $pdo->prepare("SELECT `name` FROM cities WHERE `name` like ? ORDER BY `name` LIMIT 0,3");
    $stmt->execute([$keyword]);
    $result = $stmt->execute([$keyword]);
    $result = $stmt->fetch();

        if(!empty($result)) { ?>

        <!-- HTML SCRIPT BELOW -->
        <ul id="city-list">

        <!-- HTML SCRIPT ENDS -->

<?php foreach($result as $city) { // NOTE: The below method is helpful, but it confuses me and I make lots of simple mistakes // ?>

    <!-- HTML SCRIPT BELOW -->
<li onClick="selectCity('<?php echo $result["name"]; ?>');"><?php echo $result["name"]; ?></li>
    <!-- HTML SCRIPT ENDS -->
    
<?php } ?>
    <!-- HTML SCRIPT BELOW -->
</ul>
    <!-- HTML SCRIPT ENDS -->

<?php } } ?>
