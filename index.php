<?php
$dbname = "trip";
$insert = false;
if(isset($_POST['name'])){
  $server = "localhost";
  $username = "root";
  $password = "";

  $conn = new mysqli($server, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $desc = $_POST['desc'];
  $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
  echo $sql;
  if ($conn -> query($sql) == true){
    $insert = true;
  }
  else{
    echo "Error: $sql <br> $conn->error";
  }
  $conn ->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Sriracha&display=swap" rel="stylesheet">
    <title>Incredible India</title>
</head>
<body>
    <img src="in.jpg" alt="Incredible India" class="bg">
    <div class="container">
        <h1>Welcome to India's travel form</h1>
        <p>Enter your details for confirming participation</p>
        <?php
        if($insert == true){
          echo "<p class='pop'>Thank you for submitting, we are happy to welcome you in our trip to India.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="10" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
