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
                            <table border = "1">
                                <tr>
                                    <td>naziv</td>
                                    <td>opis</td>
                                    <td>cijena</td>
                                    <td>slika</td>


                                </tr>
                                @foreach ($products as $product)
                                    <tr>

                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_desc }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td><img src={{ asset('images/'.$product->product_img_name)}}</td>

                                    </tr>
                                @endforeach
                            </table>




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
