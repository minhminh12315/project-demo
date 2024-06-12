var R = {
    init: function () {
        R.registerEvents();
<<<<<<< Updated upstream
=======
        R.displayCart();
        R.displayCartCheckOut();
        R.displayCartCount();
        R.navbarStick();
        R.collapseToggle();
>>>>>>> Stashed changes
    },
    registerEvents: function () {
        $("input[name='name']").change(function () {
            console.log("change quantity");
        });
        $(".addnew_category").click(function () {
            $("#form_addnew_category").css("display", "block");
        });
        $("#store_category").click(function () {
            var category = $("#category_addnew").val();
            var parent_id = $("#parent_id").val();
            console.log(category);
            console.log(parent_id);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/admin/category/store",
                method: "POST",
                data: {
                    category: category,
                    parent_id: parent_id,
                },
                success: function (response) {
                    console.log(response);
                    $("#form_addnew_category").css("display", "none");
                },
                error: function (error) {
                    console.log(error);
                },
            });
        });
        $("#cancel_category").click(function () {
            $("#form_addnew_category").css("display", "none");
        });

        let variantCount = 0;
        let variantData = [];

        $("#add_variant").click(function () {
            variantCount++;
            $("#variants_container").append(`
                    <div class="variant-group mb-2" data-variant-id="${variantCount}">
                        <div class="form-group">
                            <label for="variant_name_${variantCount}">Variant Name</label>
                            <input type="text" class="form-control variant-name" name="variant_name[]" required>
                        </div>
                        <div class="variant-options-container" data-variant-id="${variantCount}"></div>
                        <button type="button" class="btn btn-info badge add_variant_option" data-variant-id="${variantCount}">Add Variant Option</button>
                        <button type="button" class="btn btn-danger badge remove_variant">Remove Variant</button>
                    </div>
                `);
        });

        $(document).on("click", ".remove_variant", function () {
            $(this).closest(".variant-group").remove();
        });

        $(document).on("click", ".add_variant_option", function () {
            let variantId = $(this).data("variant-id");
            $(
                `.variant-options-container[data-variant-id="${variantId}"]`
            ).append(`
                    <div class="variant-option-group">
                        <div class="form-group">
                            <label for="value_${variantId}">Option Value</label>
                            <input type="text" class="form-control variant-value" name="value[${variantId}][]" required>
                        </div>
                        <button type="button" class="btn btn-danger badge remove_variant_option">Remove Option</button>
                    </div>
                `);
        });

        $(document).on("click", ".remove_variant_option", function () {
            $(this).closest(".variant-option-group").remove();
        });

        $("#generate_combinations").click(function () {
            variantData = [];
            $("#variants_container .variant-group").each(function () {
                let variantName = $(this).find(".variant-name").val();
                let options = [];
                $(this)
                    .find(".variant-value")
                    .each(function () {
                        options.push($(this).val());
                    });
                variantData.push({ name: variantName, options: options });
            });

            let combinations = generateCombinations(variantData);
        $("#combinations_container").empty();
            combinations.forEach((combination, index) => {
                $("#combinations_container").append(`
                    <div class="combination-group mb-2">
                        <div class="form-group">
                            <label>Combination: ${combination.join(', ')}</label>
                            <input type="hidden" name="combinations[${index}]" value="${combination.join(', ')}">
                        </div>
                        <div class="form-group">
                            <label for="quantity_${index}">Quantity</label>
                            <input type="number" class="form-control" name="quantity[${index}]" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="price_${index}">Price</label>
                            <input type="number" step="0.01" class="form-control" name="price[${index}]" min="0" required>
                        </div>
                    </div>
                `);
            });
        });
        

        function generateCombinations(variants) {
            let result = [];
            let f = function (prefix, variants) {
                if (variants.length === 0) {
                    result.push(prefix);
                    return;
                }
<<<<<<< Updated upstream
                let variant = variants[0];
                let rest = variants.slice(1);
                variant.options.forEach(function (option) {
                    f(prefix.concat([option]), rest);
                });
            };
            f([], variants);
            return result;
        }
    },
=======
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
            if (checkOut.length === 0) {
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
                                total: (item.price * item.quantity).toFixed(2),
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
                            alert("Order success");
                            window.location.href = "/";
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
        });
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.collapse.show').length && !$(event.target).is('.navbar-toggler')) {
                $('.collapse').collapse('hide'); 
            }
        });

        $('.collapse').on('show.bs.collapse', function () {
            $('body').addClass('overlay-visible');
        });

        $('.collapse').on('hidden.bs.collapse', function () {
            $('body').removeClass('overlay-visible'); 
        });
        $('.search-icon').click(function() {
            $('.home-search').toggleClass('active');
        });
    
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.home-search, .search-icon').length) {
                $('.home-search').removeClass('active');
            }
        });
        $(".inp-color li").click(function() {
            $(".inp-color li").removeClass("selected");
            $(this).addClass("selected");
        })
        $(".inp-size li").click(function() {
            $(".inp-size li").removeClass("selected");
            $(this).addClass("selected");
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
            cartContainer.append("<h5>Your cart is empty</h5>");
        } else {
            cart.forEach(function (item, index) {
                let totalEachItem = item.price * item.quantity;
                let itemHtml = `
                    <tr>
                        <td>
                            <img class="" src="${item.img}" alt="${item.name
                    }" height="100px">
                        </td>
                        <td >${item.name}</td>
                        <td>${item.color}</td>
                        <td>${item.price}</td>
                        <td>
                            <input min="0" class="quantity" type="number" data-index="${index}" value="${item.quantity
                    }" >
                        </td>
                        <td>${totalEachItem.toFixed(2)}$</td>
                        <td>
                            <button class="remove-from-cart btn btn-danger" data-index="${index}">Remove</button>
                        </td>
                        <td>
                            <input type="checkbox" name="check" id="check" value="${item.id
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
            checkOutContainer.append("<h2>Your cart is empty</h2>");
        } else {
            checkOut.forEach(function (item, index) {
                // console.log(item);
                let totalEachItem = item.price * item.quantity;
                let itemHtml = `
                    <tr>
                        <td>
                            <img class="" src="${item.img}" alt="${item.name
                    }" height="100px">
                        </td>
                        <td >${item.name}</td>
                        <td>${item.color}</td>
                        <td>${item.price}</td>
                        <td>
                            <input disabled class="quantity" type="number" data-index="${index}" value="${item.quantity
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
    navbarStick: () => {
        let navbar = $('.nav-home');
        let sticky = navbar.offset().top;
        $(window).scroll(function () {
            if ($(window).scrollTop() >= sticky) {
                navbar.addClass("navbarSticky");
                navbar.css("top", "0");
            } else {
                navbar.removeClass("navbarSticky");
                navbar.css("top", "");
            }
        });
    },
    collapseToggle: function () {

    },
>>>>>>> Stashed changes
};
R.init();