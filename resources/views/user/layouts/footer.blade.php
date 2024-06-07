<footer class="mt-5">
    <div class="container pt-3">
        <div class="row">
            <div class="col-3">
                <h3>Logo</h3>
                <p>Address</p>
                <p>Phone</p>
                <p>Email</p>
            </div>
            <div class="col-3">
                <h3>Information</h3>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Shop</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="https://www.facebook.com/minhminh12315">Facebook</a></li>
                    <li><a href="https://www.instagram.com/">Instagram</a></li>
                    <li><a href="#">Twitter</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h3>Legal</h3>
                <ul>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/app.js') }}"></script>
<script>
    $(document).ready(function(event) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        document.getElementById('cart-item-count').textContent = cart.length;
    });
</script>
</body>

</html>