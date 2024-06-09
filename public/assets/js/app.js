var R = {
    init: function () {
        R.registerEvents();
        R.displayCart();
        R.displayCartCheckOut();
        R.displayCartCount();
    },
    registerEvents: function () {
        $("#addToCart").click(function () {
            let priceText = document.querySelector("#price").textContent;
            let priceValue = priceText.replace("$", "").trim();
            let priceNumber = parseFloat(priceValue).toFixed(2);

            var item = {
                id: document.querySelector("#id").textContent,
                name: document.querySelector("#name").textContent,
                color: document.querySelector('input[name="color"]:checked')
                    .value,
                size: document.querySelector('input[name="size"]:checked')
                    .value,
                quantity: document.querySelector('input[name="quantity"]')
                    .value,
                price: priceNumber,
                img: document.querySelector("#image").src,
                checkout: false,
            };
            let cart = JSON.parse(localStorage.getItem("cart")) || [];

            if (cart.length > 0) {
                let check = false;
                cart.map((prd) => {
                    if (
                        prd.name === item.name &&
                        prd.color === item.color &&
                        prd.size === item.size
                    ) {
                        prd.quantity =
                            parseInt(prd.quantity) + parseInt(item.quantity);
                        check = true;
                    }
                });
                if (!check) {
                    cart.push(item);
                }
            } else {
                cart.push(item);
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            R.displayCartCount();
        });
        $("#clearCart").click(function () {
            localStorage.removeItem("cart");
            R.displayCartCount();
            R.displayCart();
        });
        $("#checkOutFinal").click(function () {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let checkOut = cart.filter((item) => item.checkout === true);
            let checkOutTotal = 0;
            checkOut.forEach(function (item) {
                checkOutTotal += item.price * item.quantity;
            });
            let phone = $("#phone").val();
            let address = $("#address").val();
            if(checkOut.length === 0){
                alert("Please select product to checkout");
                return;
            } else {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "/checkoutStore",
                    method: "POST",
                    data: {
                        data: checkOut.map((item) => {
                            // console.log(item);
                            return {
                                id: item.id,
                                name: item.name,
                                color: item.color,
                                size: item.size,
                                quantity: item.quantity,
                                price: item.price,
                                img: item.img,
                            };
                        }),
                        total: checkOutTotal.toFixed(2),
                        phone: phone,
                        address: address,
                    },
                    success: function (response) {
                        console.log("asdfasdfsdf");
                        console.log(response);
                        if (response) {
                            let checkOutIds = checkOut.map((item) => item.id);
                            cart = cart.filter(
                                (item) => !checkOutIds.includes(item.id)
                            );
                            console.log(cart);
                            localStorage.setItem("cart", JSON.stringify(cart));
                            R.displayCartCount();
                            R.displayCart();
                            R.displayCartCheckOut();
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    },
                    error: function (error, response) {
                        console.log(error);
                        console.log(response);
                    },
                });
            }

            
        });
        $("#logout").click(function () {
            localStorage.removeItem("cart");
            R.displayCartCount();
        })
    },
    displayCart: () => {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let cartContainer = $("#cart");
        cartContainer.empty();
        let total = 0;
        cart.forEach(function (item) {
            total += item.price * item.quantity;
        });

        $("#total").text("Total: " + total.toFixed(2) + "$");

        if (cart.length === 0) {
            cartContainer.append("<p>Your cart is empty</p>");
        } else {
            cart.forEach(function (item, index) {
                let totalEachItem = item.price * item.quantity;
                let itemHtml = `
                    <tr>
                        <td>
                            <img class="" src="${item.img}" alt="${
                    item.name
                }" height="100px">
                        </td>
                        <td >${item.name}</td>
                        <td>${item.color}</td>
                        <td>${item.price}</td>
                        <td>
                            <input min="0" class="quantity" type="number" data-index="${index}" value="${
                    item.quantity
                }" >
                        </td>
                        <td>${totalEachItem.toFixed(2)}$</td>
                        <td>
                            <button class="remove-from-cart btn btn-danger" data-index="${index}">Remove</button>
                        </td>
                        <td>
                            <input type="checkbox" name="check" id="check" value="${
                                item.id
                            }">
                        </td>
                    </tr>
                `;
                cartContainer.append(itemHtml);
            });

            $(".remove-from-cart").click(function () {
                let index = $(this).data("index");
                cart.splice(index, 1);
                localStorage.setItem("cart", JSON.stringify(cart));
                displayCart();
            });
            $(".quantity").change(function () {
                let cart = JSON.parse(localStorage.getItem("cart")) || [];
                let index = $(this).data("index");
                cart[index].quantity = $(this).val();
                localStorage.setItem("cart", JSON.stringify(cart));
                R.displayCart();
            });
            $("#prepareCheckOut").click(function () {
                let ids = $('input[name="check"]:checked')
                    .map(function () {
                        return $(this).val();
                    })
                    .get();

                let cart = JSON.parse(localStorage.getItem("cart")) || [];
                cart.forEach((item) => {
                    if (ids.includes(item.id.toString())) {
                        item.checkout = true;
                    }
                });
                localStorage.setItem("cart", JSON.stringify(cart));
            });
        }
    },
    displayCartCheckOut: () => {
        let checkOutContainer = $("#checkOut");
        checkOutContainer.empty();
        let checkOutTotal = 0;

        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let checkOut = cart.filter((item) => item.checkout === true);
        console.log(checkOut);

        checkOut.forEach(function (item) {
            checkOutTotal += item.price * item.quantity;
        });

        $("#checkOutTotal").text("Total: " + checkOutTotal.toFixed(2) + "$");

        if (checkOut.length === 0) {
            checkOutContainer.append("<p>Your cart is empty</p>");
        } else {
            checkOut.forEach(function (item, index) {
                // console.log(item);
                let totalEachItem = item.price * item.quantity;
                let itemHtml = `
                    <tr>
                        <td>
                            <img class="" src="${item.img}" alt="${
                    item.name
                }" height="100px">
                        </td>
                        <td >${item.name}</td>
                        <td>${item.color}</td>
                        <td>${item.price}</td>
                        <td>
                            <input disabled class="quantity" type="number" data-index="${index}" value="${
                    item.quantity
                }" >
                        </td>
                        <td >${totalEachItem.toFixed(2)}$</td>
                    </tr>
                `;
                checkOutContainer.append(itemHtml);
            });
        }
    },
    displayCartCount: () => {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        document.getElementById("cart-item-count").textContent = cart.length;
    },
};
R.init();
