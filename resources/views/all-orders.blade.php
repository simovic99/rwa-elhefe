
@extends('layouts.app')
@section('title', 'My Orders')



@section('content')

    <div class="container">
        <div class="card"  >
            <div class="card-header"><h1>Sve narudžbe</h1></div>

            <div class="card-body" ><div class="links">
               <h4> Sortiraj po
                @sortablelink('created_at','Datumu')
                @sortablelink('billing_name','Imenu')
                @sortablelink('billing_total','Cijeni')
               </h4>
                </div>
            @auth
                @if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())


                @foreach ($orders as $order)

                    <table  class="tablice table-striped">



                        <tbody>
                        <tr><td>Order ID:</td><td> {{ $order->id }}</td></tr>
                        <tr>
                            <td>Korisnik ime:</td>
                            <td>@if(isset($order->user->name)) {{$order->user->name}} @else Korisnik izbrisan @endif</td>
                        </tr>
                        <tr><td>Korisnik ID:</td><td> {{$order->user_id}}</td></tr>
                        <tr><td>Ime</td><td> {{ $order->billing_name }}</td></tr>
                        <tr><td>Datum: </td><td>{{($order->created_at) }} </td></tr>
                        <tr><td>Ukupno: </td><td>{{ ($order->billing_total) }} KM </td></tr>
                        <tr><td>Status: </td><td id="id{{$order->id}}"> <?php if(!isset($order->status)){ echo "<div id='x".$order->id."'>NA ČEKANJU </div>"; echo "<script type='text/javascript'>document.getElementById('x".$order->id."').style.color='#347deb'</script>";  } elseif ($order->status==1){ echo  "<div id='x".$order->id."'> POTVRĐENA NARUDŽBA </div>";  echo "<script type='text/javascript'>document.getElementById('x".$order->id."').style.color='green'</script>"; } elseif($order->status==2) {echo "<div id='x".$order->id."' >ODBIJENA NARUDŽBA </div>"; echo "<script type='text/javascript'>document.getElementById('x".$order->id."').style.color='red'</script>";} ?> </td></tr>
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
<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', 10000);

</script>
