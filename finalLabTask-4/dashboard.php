<?php
include('session.php');

if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
    header('location: login.php');
    exit();
}

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = array();
}
?>

<html>
<head>
    <title>Dashboard</title>
    <script src="script.js"></script>
</head>
<body>

Logged in as <?php echo $_SESSION['username']; ?> |
<a href="logout.php">Logout</a>

<h3>PRODUCT DASHBOARD</h3>

<form>
    <fieldset>
        <legend id="legend">ADD PRODUCT</legend>

        <input type="hidden" id="id">

        Product Name<br>
        <input type="text" id="name"><br><br>

        Price<br>
        <input type="number" id="price"><br><br>

        Quantity<br>
        <input type="number" id="quantity"><br><br>

        <input type="button" id="btn" value="Add Product" onclick="ajax()">
        <input type="button" id="cancel" value="Cancel" onclick="clearForm()" style="display:none;">
    </fieldset>
</form>

<br>

<div id="productTable">
    <table border="1" cellpadding="5">
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>

        <?php
        for ($i = 0; $i < count($_SESSION['products']); $i++) {

            if ($_SESSION['products'][$i]['name'] == "") {
                continue;
            }

            echo "<tr>";
            echo "<td>" . ($i + 1) . "</td>";
            echo "<td>" . $_SESSION['products'][$i]['name'] . "</td>";
            echo "<td>" . $_SESSION['products'][$i]['price'] . "</td>";
            echo "<td>" . $_SESSION['products'][$i]['quantity'] . "</td>";
            echo "<td>
                    <input type='button' value='Edit' onclick=\"editProduct('$i', '" . $_SESSION['products'][$i]['name'] . "', '" . $_SESSION['products'][$i]['price'] . "', '" . $_SESSION['products'][$i]['quantity'] . "')\">
                    |
                    <input type='button' value='Delete' onclick='deleteProduct($i)'>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

</body>
</html>