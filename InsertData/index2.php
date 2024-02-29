<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: cursive;
        }

        header{
            background-color: #f0f5f5;
            height: 100vh;
            width: 100vw;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 500px;
            width: 450px;
            background-color: white;
            border-radius: 10px;
            flex-direction: column;
        }
        div{
            height: 50px;
            width: 450px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        button{
            background-color: #99ebff;
            border-radius: 5px;
            border: none;
            font-size: 16px;   
            height: 40px;
            width: 150px;    
         }
        button:hover{
           box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.2);
        }
      input{
        box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.2);
        border: none;
        height: 30px;
        border-radius: 5px;
        width: 220px;
      }
      input::placeholder{
        position: relative;
        left: 10px;
      }
      h1{
        color: #99ebff;
      }
      #span1{
       color:  #00e673;
       text-align: center;

      }
      #span2{
       color: red;
       font-size: 12px;
       text-align: center;
      }
      #email{
        margin-left: 35px;
      }
    </style>
</head>
</head>
<body>
    <?php
    $display = $display2 = "";
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
        $display = "New record created successfully";
      } catch(PDOException $e) {
        $display2 = "Ereur " . $e->getMessage();
      }
      $conn = null;
    }
    ?>
    <header>
    <form method="post">
        <h1>Insert Data</h1>
        <br>
        <div>
        <label>FirstName:</label>
        <input type="text" name="fname"  placeholder="entre your Firstname" reaquired>
        </div>
        <br>
        <div>
        <label>LastName:</label>
        <input type="text" name="lname"  placeholder="entre your Lastname" reaquired>
        </div>
        <br>
        <div>
        <label>Email:</label>
        <input type="email" name="email" placeholder="entre your Email Addresse"  id="email" reaquired>
        </div>
        <br>
        <div>
        <label>Password:</label>
        <input type="password" name="password" placeholder="enter password" reaquired>
        </div>
        <br>
        <button type="submit" name="submit">Insert Data</button>
        <br><br>
        <span id="span1"><?php echo $display?></span>
        <span id="span2""><?php echo $display2?></span>
        
    </form>
</header>
</body>
</html>
