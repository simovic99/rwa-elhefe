
@extends('layouts.app')
@section('title', 'My Orders')



@section('content')

    <div class="container">
        <div class="card"  >
            <div class="card-header"><h1>Moje narudžbe</h1></div>

            <div class="card-body" >


                @foreach ($orders as $order)

                <table  class="tablice table-striped">



                        <tbody>
                        <tr><td>Order ID:</td><td> {{ $order->id }}</td></tr>
                        <tr><td>Ime</td><td> {{ $order->billing_name }}</td></tr>
                        <tr><td>Datum: </td><td>{{($order->created_at) }} </td></tr>
                        <tr><td>Ukupno: </td><td>{{ ($order->billing_total) }} KM </td></tr>
                        <tr><td>Status: </td><td id="id{{$order->id}}"> <?php if(!isset($order->status)){ echo "<div id='x".$order->id."'>NA ČEKANJU </div>"; echo "<script type='text/javascript'>document.getElementById('x".$order->id."').style.color='#347deb'</script>";  } elseif ($order->status==1){ echo  "<div id='x".$order->id."'> POTVRĐENA NARUDŽBA </div>";  echo "<script type='text/javascript'>document.getElementById('x".$order->id."').style.color='green'</script>"; } elseif($order->status==2) {echo "<div id='x".$order->id."' >ODBIJENA NARUDŽBA </div>"; echo "<script type='text/javascript'>document.getElementById('x".$order->id."').style.color='red'</script>";} ?> </td></tr>
                        <tr><td colspan="2"> <a href="{{ route('orders.show', $order->id) }}"><button class="btn btn-primary">Detalji</button></a></td></tr>

                        </tbody>



                    </table>
                    <hr>
                @endforeach
</div>
        </div>
    </div>


@endsection

