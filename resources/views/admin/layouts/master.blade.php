@include('admin.layouts.sidebar')
                <div class="col-10 right-site">
                        <div class="ps-3">
                                <header >
                                        <nav>
                                                <div>Here is the admin page</div>
                                        </nav>
                                </header>
                        </div>
                        <div class="content-wrapper">
                                @yield('content')
                        </div>
                </div>
        </div>
        <script src="{{asset('assets/js/app.js')}}"></script>
</body>

</html>