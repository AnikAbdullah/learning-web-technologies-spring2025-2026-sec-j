<?php
include('session.php');

if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
    header('location: login.php');
    exit();
}

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = array();
}

if (isset($_POST['action'])) {

    if ($_POST['action'] == "add") {
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
    }

    if ($_POST['action'] == "update") {
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
    }

    if ($_POST['action'] == "delete") {
        $id = $_POST['id'];

        unset($_SESSION['products'][$id]);
        $_SESSION['products'] = array_values($_SESSION['products']);
    }
}
?>

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