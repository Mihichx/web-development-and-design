import "bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".open-modal-btn");

    buttons.forEach((button) => {
        button.addEventListener("click", function () {
            const productId = this.getAttribute("data-id");

            document.getElementById("modal-product-id").value = productId;
        });
    });
});
