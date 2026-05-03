let id = document.getElementById("id");
let productName = document.getElementById("name");
let price = document.getElementById("price");
let quantity = document.getElementById("quantity");
let legend = document.getElementById("legend");
let btn = document.getElementById("btn");
let cancel = document.getElementById("cancel");
let productTable = document.getElementById("productTable");

function ajax() {
  let action = "add";

  if (id.value != "") {
    action = "update";
  }

  let xhttp = new XMLHttpRequest();

  xhttp.open("post", "productAction.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhttp.send(
    "action=" +
      action +
      "&id=" +
      id.value +
      "&name=" +
      productName.value +
      "&price=" +
      price.value +
      "&quantity=" +
      quantity.value,
  );

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      productTable.innerHTML = this.responseText;

      clearForm();
    }
  };
}

function editProduct(productId, name, productPrice, productQuantity) {
  id.value = productId;
  productName.value = name;
  price.value = productPrice;
  quantity.value = productQuantity;

  legend.innerHTML = "UPDATE PRODUCT";
  btn.value = "Update Product";
  cancel.style.display = "inline";
}

function deleteProduct(productId) {
  let xhttp = new XMLHttpRequest();

  xhttp.open("post", "productAction.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhttp.send("action=delete&id=" + productId);

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      productTable.innerHTML = this.responseText;

      clearForm();
    }
  };
}

function clearForm() {
  id.value = "";
  productName.value = "";
  price.value = "";
  quantity.value = "";

  legend.innerHTML = "ADD PRODUCT";
  btn.value = "Add Product";
  cancel.style.display = "none";
}
