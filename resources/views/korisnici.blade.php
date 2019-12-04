@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Korisnici</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @auth
                            @if(Auth::user()->isSuperAdmin())

                            @foreach ($korisnici as $korisnik)
                                <p>ime :{{$korisnik->name}}</p>
                                <p>e-mail:{{$korisnik->email}}</p>
                            <!--    <p><h3> role :{{$korisnik->role}}</h3></p>-->
                                @if($korisnik->role==2)<p>role:superadmin</p>
                                    @elseif($korisnik->role==1)<p>role: admin</p>
                                    @else (korisnik->role==0)<p>role: korisnik</p>
                                    @endif
                                <hr/>
                            @endforeach
                                @else NISTE SUPERADMIN
                            @endif



@endauth




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
