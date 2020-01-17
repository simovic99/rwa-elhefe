@extends('layouts.app')




@section('content')

    <link href="{{ asset('css/stil.css') }}" rel="stylesheet">

    <div class="container">


        <div class="card"  >
            <div class="card-header"><h1>Detalji narudžbe</h1></div>

            <div class="card-body" >
                @auth
                    @if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())

                        <a href="{{ route('all-orders') }}"><button class="btn btn-primary">Povratak na sve narudžbe </button></a>
                    <br>
                    <br>

                <table  class="tablice table-striped">
                    <tbody>
                    <tr><td>Order ID:</td><td> {{ $order->id }}</td></tr>
                    <tr><td>Datum: </td><td>{{($order->created_at) }} </td></tr>
                    <tr><td>Ukupno: </td><td>{{ ($order->billing_total) }} KM</td></tr>
                    <tr>
                        <td>Korisnik ID:</td>
                        <td>{{ $order->user_id }}</td>
                    </tr>
                    <tr>
                        <td>Korisnik ime:</td>
                        <td>{{ $order->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Ime</td>
                        <td>{{ $order->billing_name }}</td>
                    </tr>
                    <tr>
                        <td>Grad</td>
                        <td>{{ $order->billing_city }}</td>
                    </tr>
                    <tr>
                        <td>Adresa</td>
                        <td>{{ $order->billing_address }}</td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                        <td>{{ $order->billing_phone }}</td>
                    </tr>
                    </tbody>
                </table>
                <hr>
                <table class="tablice">
                    <thead>
                    <tr>
                        <th></th>
                        <th >Naziv</th>
                        <th>Količina</th>
                        <th>Cijena</th>

                    </tr>
                    </thead>

                    <tbody>

                    @foreach($products as $product)
                        <tr>
                            <td><img class="slike1"  src="{{ asset($product->product_img_name)}}"/></td>

                            <td>
                                <p><strong>{{$product->product_name}}</p>

                            </td>
                            <td >
                                {{ $product->pivot->quantity}} </td>
                            <td> {{$product->price}} KM</td>
                        </tr>
                        <tr><td colspan="5"><hr></td> </tr>
                    </tbody>
                    @endforeach


                </table>
@endif
                    @else Nemate dozvolu
                    @endauth

            </div>
        </div> <!-- end order-container -->
    </div>

@endsection
