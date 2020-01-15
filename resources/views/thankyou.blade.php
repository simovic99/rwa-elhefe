@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                       Vaša narudžba je zaprimljena.<br>
                        Hvala Vam na povjerenju.<br>
                        <a href="{{ route('welcome') }}"><button class="btn btn-primary">Početna</button></a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






