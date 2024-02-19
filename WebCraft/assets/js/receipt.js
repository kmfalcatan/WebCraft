function showContainer() {
    var receiptModal = document.getElementById("receiptModal");
    receiptModal.style.display = "block";
}

function hideContainer() {
    var receiptModal = document.getElementById("receiptModal");
    receiptModal.style.display = "none";
}

var image7 = document.querySelector(".image7");
image7.addEventListener("click", showContainer);

var backButton = document.querySelector(".backButton");
backButton.addEventListener("click", hideContainer);