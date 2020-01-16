
@extends('layouts.app')
@section('title', 'My Orders')



@section('content')

    <div class="container">
        <div class="card"  >
            <div class="card-header"><h1>Sve narudžbe</h1></div>

            <div class="card-body" >
               <h4> Sortiraj po
                @sortablelink('created_at','Datumu')
                @sortablelink('billing_name','Imenu')
                @sortablelink('billing_total','Cijeni')
               </h4>
            @auth
                @if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())


                @foreach ($orders as $order)

                    <table  class="tablice table-striped">



                        <tbody>
                        <tr><td>Order ID:</td><td> {{ $order->id }}</td></tr>
                        <tr>
                            <td>Korisnik ime:</td>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                        <tr><td>Korisnik ID:</td><td> {{$order->user_id}}</td></tr>
                        <tr><td>Ime</td><td> {{ $order->billing_name }}</td></tr>
                        <tr><td>Datum: </td><td>{{($order->created_at) }} </td></tr>
                        <tr><td>Ukupno: </td><td>{{ ($order->billing_total) }} KM </td></tr>
                        <tr><td colspan="2"> <a href="{{ route('all-orders.show', $order->id) }}"><button class="btn btn-primary">Detalji</button></a></td></tr>

                        </tbody>



                    </table>
                    <hr>
                @endforeach
                    @endif
                @else Nemate dozvolu
                @endauth
            </div>
        </div>
    </div>


@endsection
