<?php
if (isset($_POST['ssc']) || isset($_POST['hsc']) || isset($_POST['bsc'])) {
    $degrees = [];
    
    if (isset($_POST['ssc'])) {
        $degrees[] = $_POST['ssc'];
    }
    if (isset($_POST['hsc'])) {
        $degrees[] = $_POST['hsc'];
    }
    if (isset($_POST['bsc'])) {
        $degrees[] = $_POST['bsc'];
    }
    
    echo "<p>Your selected degrees are: " . implode(", ", $degrees) . "</p>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Task 5 - a</title>
  </head>
  <body>
    <form action="" method="post">
      <fieldset>
        <legend><b>Degree</b></legend>
        
        <input type="checkbox" name="ssc" value="SSC" />
        <label for="ssc">SSC</label>
        
        <input type="checkbox" name="hsc" value="HSC" />
        <label for="hsc">HSC</label>
        
        <input type="checkbox" name="bsc" value="BSc" />
        <label for="bsc">BSc</label>
        
        <br><br>
        <input type="submit" value="Submit" />
      </fieldset>
    </form>
  </body>
</html>
