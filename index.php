<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test php post</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="int">
        <input type="text" name="nom">
        <input type="submit" name="submitbtn">
    </form>
    
    <?php
    if (isset($_POST['int']) && isset($_POST['nom'])) {
            
        $submit = $_POST['submitbtn']; 
        $id = $_POST['int'];
        $nom = $_POST['nom'];
        $connection = new mysqli('localhost', 'root', '', 'TP7');
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        } else {
            echo 'worked ';
        }
        
        if (isset($_POST['int'])) {
            echo '<br/>ID: ' . $id . ' Name: ' . $nom .'<br/>';
        }
        
        $query = "INSERT INTO testTP7 values($id, '$nom')";
        $sql = mysqli_query($connection, $query) or die ("Bad query: $query");
    }
    ?>
</body>
</html>