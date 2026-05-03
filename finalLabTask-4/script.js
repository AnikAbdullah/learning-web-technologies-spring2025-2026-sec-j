let id = document.getElementById("id");
let productName = document.getElementById("name");
let price = document.getElementById("price");
let quantity = document.getElementById("quantity");
let legend = document.getElementById("legend");
let btn = document.getElementById("btn");
let cancel = document.getElementById("cancel");
let productTable = document.getElementById("productTable");

function clearForm() {
  id.value = "";
  productName.value = "";
  price.value = "";
  quantity.value = "";

  legend.innerHTML = "ADD PRODUCT";
  btn.value = "Add Product";
  cancel.style.display = "none";
}
