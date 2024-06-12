var R = {
    init: function () {
        R.registerEvents();
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
};
R.init();
