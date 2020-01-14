@extends('layouts.app')
@section('content')

    <div class="container"  >
        <div class="row justify-content-center" id="naruci">
            <div class="col-md-12" >
                <div class="card"  >
                    <div class="card-header"><h1>Moja narudžba</h1></div>

                    <div class="card-body" >


                        <table class="tablice">
                            <thead>
                            <tr>
                                <th></th>
                                <th >Naziv</th>
                                <th>Količina</th>
                                <th>Cijena</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach(Cart::content() as $row)

                           <td> <?php echo "<img class='slike'  width='150px' src='$row->img'/>"; ?></td>

                                <td>
                                    <p><strong><?php echo $row->name; ?></strong></p>
                                    <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                                </td>
                                <td >
                                    <input type="number"  value="<?php echo $row->qty; ?>"></td>
                                <td><?php echo $row->price; ?>KM</td>

                                <td>                            <form action="{{ route('cart.destroy', $row->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit"  class="btn btn-primary">Izbriši</button>
                                    </form>
                                </td>
                            </tr>

                            <tr><td colspan="5"><hr></td> </tr>
                            </tbody>
                            @endforeach

                            <tfoot>


                            <tr>
                                <td ><a href="./naruci"><button class="btn btn-primary">Povratak na ponudu</button></a></td>
                                <td></td>
                                <td>Ukupno</td>
                                <td><?php echo Cart::subtotal(); ?> KM</td>
                                <td><a href="{{ route('checkout.index') }}" ><button  class="btn btn-primary"> NARUČI</button></a></td>

                            </tr>
                            </tfoot>
                        </table>




                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
