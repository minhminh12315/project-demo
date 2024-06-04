<sidebar>
    <logo>
        Logo
    </logo>
    <user class="d-flex">
        <img src="{{asset('assets/image/anhDepTrai.jpg')}}" alt="avatar">
        <div>{{$name}}</div>
    </user>
    <ul>
        <li><a href="#">Product</a></li>
        <li><a href="{{ route('addnew')}}">Add new</a></li>
    </ul>
</sidebar>