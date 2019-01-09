<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="id">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_REQUEST['id'];
    if (empty($name)) {
        echo "ID is empty";
    } else {
        echo $name;
    }
}
?>

</body>
</html>
