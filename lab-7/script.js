let giftCouponGiven = false;

function updateProduct(productId, totalId, unitPrice) {
  let quantity = Number(document.getElementById(productId).value);

  if (quantity < 0) {
    alert("Quantity cannot be negative!");
    quantity = 0;
    document.getElementById(productId).value = 0;
  }

  let total = quantity * unitPrice;
  document.getElementById(totalId).value = total;

  updateGrandTotal();
}

function updateGrandTotal() {
  let t1 = Number(document.getElementById("t1").value);
  let t2 = Number(document.getElementById("t2").value);
  let t3 = Number(document.getElementById("t3").value);

  let grandTotal = t1 + t2 + t3;
  document.getElementById("grand").value = grandTotal;

  if (grandTotal > 1000 && !giftCouponGiven) {
    alert("You are eligible for a gift coupon!");
    giftCouponGiven = true;
  }
}

function resetData() {
  document.getElementById("q1").value = 0;
  document.getElementById("q2").value = 0;
  document.getElementById("q3").value = 0;

  document.getElementById("t1").value = 0;
  document.getElementById("t2").value = 0;
  document.getElementById("t3").value = 0;

  document.getElementById("grand").value = 0;

  giftCouponGiven = false;
}
