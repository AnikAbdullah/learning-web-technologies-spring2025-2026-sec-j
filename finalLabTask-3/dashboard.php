<?php
include('session.php');

if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
    header('location: login.php');
}

$editProduct = null;
$editId = "";

if (isset($_GET['delete'])) {
    $deleteId = $_GET['delete'];

    unset($_SESSION['products'][$deleteId]);
    $_SESSION['products'] = array_values($_SESSION['products']);

    header('location: dashboard.php');
}

if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];
    $editProduct = $_SESSION['products'][$editId];
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if ($name != "" && $price != "" && $quantity != "") {
        $_SESSION['products'][] = array(
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        );
    }

    header('location: dashboard.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $_SESSION['products'][$id]['name'] = $_POST['name'];
    $_SESSION['products'][$id]['price'] = $_POST['price'];
    $_SESSION['products'][$id]['quantity'] = $_POST['quantity'];

    header('location: dashboard.php');
}
?>

<html>
<head>
    <title>Dashboard</title>
</head>
<body>

Logged in as <?php echo $_SESSION['username']; ?> |
<a href="logout.php">Logout</a>

<h3>PRODUCT DASHBOARD</h3>

<form method="post" action="">
    <fieldset>
        <legend>
            <?php
            if ($editProduct != null) {
                echo "UPDATE PRODUCT";
            } else {
                echo "ADD PRODUCT";
            }
            ?>
        </legend>

        <input type="hidden" name="id" value="<?php echo $editId; ?>">

        Product Name<br>
        <input type="text" name="name" value="<?php if ($editProduct != null) echo $editProduct['name']; ?>"><br><br>

        Price<br>
        <input type="text" name="price" value="<?php if ($editProduct != null) echo $editProduct['price']; ?>"><br><br>

        Quantity<br>
        <input type="text" name="quantity" value="<?php if ($editProduct != null) echo $editProduct['quantity']; ?>"><br><br>

        <?php
        if ($editProduct != null) {
            echo '<input type="submit" name="update" value="Update Product">';
            echo ' <a href="dashboard.php">Cancel</a>';
        } else {
            echo '<input type="submit" name="add" value="Add Product">';
        }
        ?>
    </fieldset>
</form>

<br>

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
                <a href='dashboard.php?edit=$i'>Edit</a> |
                <a href='dashboard.php?delete=$i'>Delete</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>