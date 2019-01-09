<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="name">
</br>
  Password: <input type="text" name="password">
</br>
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_REQUEST['name'];
    $password = $_REQUEST['password'];
    if (empty($name) && empty('password')) {
        echo "Name is empty";
    } else {
        echo $name . "</br>" . $password;
    }
}
?>

</body>
</html>
