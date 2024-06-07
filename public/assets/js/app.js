var R = {
    init: function() {
        R.registerEvents();
    },
    registerEvents: function() {
        $('#addToCart').click(function() {
            let priceText = document.querySelector('#price').textContent;
            let priceValue = priceText.replace('$', '').trim();
            let priceNumber = parseFloat(priceValue).toFixed(2);
            var item = {
                id: document.querySelector('#id').textContent,
                name: document.querySelector('#name').textContent,
                color: document.querySelector('input[name="color"]:checked').value,
                size: document.querySelector('input[name="size"]:checked').value,
                quantity: document.querySelector('input[name="quantity"]').value,
                price: priceNumber,
                img: document.querySelector('#image').src
            };
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart.length > 0) {
                let check = false;
                cart.map((prd) => {
                    if (prd.name === item.name && prd.color === item.color && prd.size === item.size) {
                        prd.quantity = parseInt(prd.quantity) + parseInt(item.quantity);
                        check = true;
                    }
                });
                if (!check) {
                    cart.push(item);
                }
            } else {
                cart.push(item);
            }
    
            document.getElementById('cart-item-count').textContent = cart.length;
    
            localStorage.setItem('cart', JSON.stringify(cart));
        });
    },
    addToCart: () => {
        
    }
}
R.init();