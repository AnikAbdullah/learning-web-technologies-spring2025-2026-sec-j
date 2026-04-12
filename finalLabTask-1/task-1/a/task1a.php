<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    echo "<p>Your name is: " . $name . "</p>";
}else{
 ?>

<!doctype html>
<html>
  <head>
    <title>Task 1 - a</title>
  </head>
  <body>
    <form action="" method="post">
      <fieldset>
        <legend><b>NAME</b></legend>
        <input type="text" name="name" />
        <br /><br />
        <input type="submit" value="Submit" />
      </fieldset>
    </form>
  </body>
</html>
<?php
}
