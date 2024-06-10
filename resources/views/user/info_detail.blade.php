@extends('user.info')

@section('info-content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Info</h1>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Username: {{ $user->name }}</div>
                        <div class="card-text">Email: {{ $user->email }}</div>
                        <div class="card-text">@if ($user->phone)
                            Phone: {{ $user->phone }}
                            @endif
                        </div>
                        <div class="card-text">@if ($user->address)
                            Address: {{ $user->address }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection