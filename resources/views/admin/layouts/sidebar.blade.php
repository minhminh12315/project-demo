<sidebar>
    <logo>
        Logo
    </logo>
    <user class="d-flex align-items-center">
        <img src="{{asset('assets/image/anhDepTrai.jpg')}}" alt="avatar">
        <div class="d-flex align-items-center">{{$name}}</div>
    </user>
    <ul>
        <li><a href="{{ route('admin.gopage') }}">Go Page</a></li>
        <li><a href="#">Product</a></li>
        <li><a href="{{ route('addnew')}}">Add new</a></li>
    </ul>
</sidebar>