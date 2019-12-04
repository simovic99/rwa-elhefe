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
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Ime</th>
                                            <th>Email</th>
                                            <th>Uloga</th>
                                            <th>Ažuriraj</th>
                                            <th>Izbriši</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                            @foreach ($korisnici as $korisnik)
                                <tr>
                                <td>{{$korisnik->name}}</td>
                                <td>{{$korisnik->email}}</td>
                            <!--    <p><h3> role :{{$korisnik->role}}</h3></p>-->
                                @if($korisnik->role==2)<td>superadmin</td>
                                    @elseif($korisnik->role==1)<td>admin</td>
                                    @else (korisnik->role==0)<td>korisnik</td>
                                    @endif
                                    <td><a href="edit/{{ $korisnik->id }}"><button class="btn btn-primary">Ažuriraj</button> </a></td>
                                    <td>
                                        <a href="delete/{{ $korisnik->id }}"><button class="btn btn-primary">Izbriši</button> </a></td>

                                    </td>
                                </tr>

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
