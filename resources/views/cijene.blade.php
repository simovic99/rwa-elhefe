@extends('layouts.app')

@section('content')
    <div class="container"  >
        <div class="row justify-content-center" id="naruci">
            <div class="col-md-12" >
                <div class="card"  >
                    <div class="card-header"><h1>Ponuda</h1>
                    <a href="./create">Novi </a></div>

                    <div class="card-body" >
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($products as $product)
                            <div class="large-3 columns ">
                                <table class="tablice">
                                    <tr><td><h3>{{$product->product_name}}</h3></td></tr>
                                    <tbody><tr><td><img class="slike"  src="{{ asset($product->product_img_name)}}"/></td></tr>

                                    <tr>     <td><strong>Opis: </strong>{{ $product->product_name}}</td></tr>
                                    <tr>  <td>  Cijena:</td> </tr>
                                    <tr> <td><form action="cijene"  method = "post">
                                                {{ csrf_field() }}
                                                <input type="number" class="cijena" name="price" value={{ $product->price }}><input type="hidden" name="id" value={{$product->id}}> </input>KM
                                             <hr>

                                      <input type="submit" class="btn btn-primary potvrdi"  value="Promjeni"/></form> </td>  </tr>
                                    <tr><td> <form id="forma2" method="POST" action="{{route('izbrisi',$product)}}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id1" value={{$product->id}}>
                                                <input type="submit" class="btn btn-primary odbij" value="Izbriši "/></form> </td> </tr>
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
