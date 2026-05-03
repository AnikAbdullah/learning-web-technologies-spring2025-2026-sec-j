<?php
include('session.php');

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = array();
}
function showProducts()
{
    echo '<table border="1" cellpadding="5">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>';

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

    echo '</table>';
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

    if (
        $name != "" &&
        $price != "" &&
        $quantity != "" &&
        ctype_alpha(str_replace(" ", "", $name)) &&
        is_numeric($price) &&
        is_numeric($quantity)
    ) {
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
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if (
        $name != "" &&
        $price != "" &&
        $quantity != "" &&
        ctype_alpha(str_replace(" ", "", $name)) &&
        is_numeric($price) &&
        is_numeric($quantity)
    ) {
        $_SESSION['products'][$id]['name'] = $name;
        $_SESSION['products'][$id]['price'] = $price;
        $_SESSION['products'][$id]['quantity'] = $quantity;
    }

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
        <input type="number" name="price" value="<?php if ($editProduct != null) echo $editProduct['price']; ?>"><br><br>

        Quantity<br>
        <input type="number" name="quantity" value="<?php if ($editProduct != null) echo $editProduct['quantity']; ?>"><br><br>

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

<div id="productTable">
    <?php showProducts(); ?>
</div>

</body>
</html>