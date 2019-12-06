@extends('layouts.app')

@section('content')
    <div class="container"  >
        <div class="row justify-content-center" id="naruci">
            <div class="col-md-12" >
                <div class="card"  >
                    <div class="card-header"><h1>Naruči</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @foreach ($products as $product)
                            <div class="large-3 columns ">
<table class="tablice">
                                  <th><h3>{{$product->product_name}}</h3></th>
                            <tbody><tr><td><img class="slike"  src={{ asset($product->product_img_name)}}/></td></tr>

                                 <tr>     <td><strong>Opis: </strong>{{ $product->product_name }}</td></tr>
                         <tr>  <td>Cijena: {{ $product->price }}</td></tr>
                        <tr> <td>   <button class="btn btn-primary">Naruči</button> </td>  </tr>

                            </tbody>
</table>

                            </div>
                            @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
