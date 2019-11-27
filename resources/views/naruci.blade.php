@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Naruči</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="large-4 columns">
                                @foreach ($products as $product)
                                    <p><h3>{{$product->product_name}}</h3></p>
                                    <img width="250px" src={{ asset($product->product_img_name)}}/>

                                        <p><strong>Opis: </strong>{{ $product->product_name }}</p>
                                        <p>Cijena: {{ $product->price }}</p>


                                @endforeach
                            </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
