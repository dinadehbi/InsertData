<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $servername = "localhost";
    $username = "root";
    $ps = "";
    $dbname = "ana";
    $tablename = "form2";
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $ps);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO $tablename (Firstname, Lastname, Email, Password)
        VALUES ('$fname', '$lname', '$email', '$password')";
        $conn->exec($sql);
        echo "New record created successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
    }
    ?>
    <header>
    <form method="post">
        <label>FirstName:</label>
        <input type="text" name="fname" reaquired>
        <br>
        <label>LastName:</label>
        <input type="text" name="lname" reaquired>
        <br>
        <label>Email:</label>
        <input type="email" name="email" reaquired>
        <br>
        <label>Password:</label>
        <input type="password" name="password" reaquired>
        <br>
        <button type="submit" name="submit">Insert Data</button>

        
    </form>
</header>
</body>
</html>