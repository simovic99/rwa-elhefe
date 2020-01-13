@extends('layouts.app')


@section('content')
    <div class="container"  >
        <div class="row justify-content-center" id="naruci">
            <div class="col-md-12" >
                <div class="card"  >
                    <div class="card-header"><h1>Naruči</h1></div>

                    <div class="card-body" >
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}

                            </div>
                        @endif
                        Sortiraj po

                         @sortablelink('price','Cijena')
                        @sortablelink('product_name','Ime')
                        <hr>


                            @foreach ($products as $product)

                            <div class="large-3 columns ">
                                <form action="{{ route('cart.store', $product) }}" method="POST">
<table class="tablice">

                                  <th><h3>{{$product->product_name}}</h3></th>
                            <tbody>
                            <tr><td><img class="slike"  src="{{ asset($product->product_img_name)"}}/></td></tr>
                                {{ csrf_field() }}   <input type="hidden" name="id" value="{{$product->id}}"/>
                                <input type="hidden" name="name" value="{{$product->product_name}}"/>
                                <input type="hidden" name="price" value="{{$product->price}}"/>

                            <input type="hidden" name="slika" value="{{$product->product_img_name}}"/>

                                 <tr>     <td><strong>Opis: </strong>{{ $product->product_name}}</td></tr>
                         <tr>  <td>Cijena: {{ $product->price }} KM</td></tr>
                        <tr> <td>   <input type="submit" value="Naruči" class="btn btn-primary"/> </td>  </tr>


                            </tbody>

</table>

                                </form>
                            </div>
                            <!--  -->

                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
