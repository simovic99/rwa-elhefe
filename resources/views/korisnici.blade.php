@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                                        <div class="large-3 columns ">
                                    <table class="table table-bordered" id="tablice" >
                                        <thead>
                                        <tr>
                                            <th>{{$korisnik->name}} </th></tr>

                                        <tbody>

                                <tr>

                                    <td><strong>E-mail: </strong> {{$korisnik->email}}</td></tr>
                            <!--    <p><h3> role :{{$korisnik->role}}</h3></p>-->
                                <tr><td> <strong> Uloga: </strong>
                                @if($korisnik->role==2) superadmin
                                    @elseif($korisnik->role==1)admin
                                    @else (korisnik->role==0) korisnik
                                        @endif</td>
                                    </tr>
                                 <tr> <td><a href="edit/{{ $korisnik->id }}"><button class="btn btn-primary">Ažuriraj</button> </a></td>
                                 </tr>
                                 <tr><td>       <a href="delete/{{ $korisnik->id }}"><button class="btn btn-primary">Izbriši</button> </a>

                                    </td>
                                </tr>
                                        </tbody>
                                    </table></div>
                            @endforeach
                                @else nedam uci
                            @endif



@endauth




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
