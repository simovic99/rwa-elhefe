@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <form action="{{route('spremi')}}" id="form1"method="post">
                            <table class="table-responsive-xl">
                                <tr>  <td> Naziv </td> <td><input type="text" name="product_name" /> </td></tr>
                                <tr> <td>   Opis     </td> <td>      <input type="text" name="product_desc"/> </td></tr>
                                <tr>    <td>  Slika    </td> <td>   <input type="text" name="product_img_name" /> </td></tr>
                                <tr>  <td>  Cijena   </td> <td>     <input type="number" name="price" /> </td></tr>
                            </table>
                            <input type="submit" form="form1" value="Submit"/>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
