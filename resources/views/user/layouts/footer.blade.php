<footer>
    <div class="container p-3">
        <div class=" pt-3">
            <div class="row g-3 row-cols-md-4 row-cols-sm-2 row-cols-1">
                <div class="col">
                    <div class="d-flex justify-content-center align-items-start flex-column gap-2">
                        <h3>Logo</h3>
                        <div>
                            <p>Address</p>
                            <p>Phone</p>
                            <p>Email</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center align-items-start flex-column gap-2">
                        <h3>Information</h3>
                        <div>
                            <ul class="d-flex flex-column align-items-start">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Shop</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center align-items-start flex-column gap-2">
                        <h3>Follow Us</h3>
                        <div>
                            <ul>
                                <li><a href="https://www.facebook.com/minhminh12315">Facebook</a></li>
                                <li><a href="https://www.instagram.com/">Instagram</a></li>
                                <li><a href="#">Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center align-items-start flex-column gap-2">
                        <h3>Legal</h3>
                        <div>
                            <ul>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            @copy right
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