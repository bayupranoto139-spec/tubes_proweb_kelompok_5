//button + -
document.addEventListener("click", function(e) {
    if (e.target.classList.contains("plus")) {
        let id = e.target.getAttribute("data-id");
        let qtyElement = document.getElementById("qty-"+id);

        qtyElement.innerText = parseInt(qtyElement.innerText) + 1;
    }

    else if (e.target.classList.contains("minus")) {
        let id = e.target.getAttribute("data-id");
        let qtyElement = document.getElementById("qty-"+id);

        let current = parseInt(qtyElement.innerText);
        if (current > 0) qtyElement.innerText = current - 1;
    }

    else if (e.target.classList.contains("order")) {
        let id = e.target.getAttribute("data-id");
        let qtyElement = document.getElementById("qty-" + id);
        let jumlah = parseInt(qtyElement.innerText);

        if (jumlah < 1) {
            alert("Jumlah belum diisi!");
            return;
        }

        let form = new FormData();
        form.append("menu_id", id);
        form.append("jumlah", jumlah);

        fetch("addCart.php", {
            method: "POST",
            body: form
        })
        .then(r=> r.text())
        .then(alert);
    }
});

// CART PANEL

// buka cart ketika icon diklik
document.getElementById("cart-toggle").addEventListener("click", function() {
    document.getElementById("cart-panel").style.display = "block";
    loadCart(); // load isi cart via AJAX
});

// tutup cart ketika tombol X diklik
document.getElementById("close-cart").addEventListener("click", function() {
    document.getElementById("cart-panel").style.display = "none";
});


// LOAD CART AJAX
function loadCart() {
    fetch("cart_data.php")
        .then(r => r.text())
        .then(html => {
            document.getElementById("cart-container").innerHTML = html;
        });
}


// BUTTON PESAN (AJAX cart)
document.addEventListener("click", function(e) {
    if (e.target.classList.contains("order")) {

        let id = e.target.getAttribute("data-id");
        let qtyElement = document.getElementById("qty-" + id);
        let jumlah = parseInt(qtyElement.innerText);

        if (jumlah < 1) {
            alert("Jumlah belum dipilih!");
            return;
        }

        let form = new FormData();
        form.append("menu_id", id);
        form.append("jumlah", jumlah);

        fetch("add_to_cart.php", {
            method: "POST",
            body: form
        })
        .then(r => r.text())
        .then(() => {
            qtyElement.innerText = 0;
            alert("Item masuk keranjang!");
        });
    }
});

// buka cart
document.getElementById("cart-toggle").addEventListener("click", function() {
    let panel = document.getElementById("cart-panel");
    panel.classList.add("active");
    loadCart();
});

// tutup cart
document.getElementById("close-cart").addEventListener("click", function() {
    document.getElementById("cart-panel").classList.remove("active");
});


// CART ACTION BUTTONS
document.addEventListener("click", function(e) {

    // + tombol dalam cart panel
    if (e.target.classList.contains("cart-plus")) {
        let id = e.target.getAttribute("data-id");

        let form = new FormData();
        form.append("menu_id", id);
        form.append("action", "plus");

        fetch("updateCart.php", {
            method: "POST",
            body: form
        })
        .then(r => r.text())
        .then(loadCart);
    }

    // - tombol dalam cart panel
    else if (e.target.classList.contains("cart-minus")) {
        let id = e.target.getAttribute("data-id");

        let form = new FormData();
        form.append("menu_id", id);
        form.append("action", "minus");

        fetch("updateCart.php", {
            method: "POST",
            body: form
        })
        .then(r => r.text())
        .then(loadCart);
    }

    // hapus item
    else if (e.target.classList.contains("cart-delete")) {
        let id = e.target.getAttribute("data-id");

        let form = new FormData();
        form.append("menu_id", id);
        form.append("action", "delete");

        fetch("updateCart.php", {
            method: "POST",
            body: form
        })
        .then(r => r.text())
        .then(loadCart);
    }
});

function updateTotalLive() {
    let subtotals = document.querySelectorAll(".subtotal-value");
    let total = 0;

    subtotals.forEach(el => {
        total += parseInt(el.dataset.subtotal);
    });

    document.getElementById("cart-total").innerText =
        "Rp " + total.toLocaleString("id-ID");
}
