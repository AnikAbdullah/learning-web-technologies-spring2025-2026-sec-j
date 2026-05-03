function clearForm() {
  document.getElementById("id").value = "";
  document.getElementById("name").value = "";
  document.getElementById("price").value = "";
  document.getElementById("quantity").value = "";

  document.getElementById("legend").innerHTML = "ADD PRODUCT";
  document.getElementById("btn").value = "Add Product";
  document.getElementById("cancel").style.display = "none";
}
