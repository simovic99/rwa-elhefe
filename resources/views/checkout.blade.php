
@extends('layouts.app')

@section('title', 'Checkout')



@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card"  >
            <div class="card-header"><h1>Detalji narudžbe</h1></div>

            <div class="card-body" >
        <div class="checkout-section">
            <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">E-mail adresa</label>
                    @if (auth()->user())
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                    @else
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Ime</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Adresa</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                </div>

                <div class="half-form">
                    <div class="form-group">
                        <label for="city">Grad</label>
                        <input type="text" class="form-control" id="city" name="city" value="Ljubuški" readonly>
                    </div>

                </div> <!-- end half-form -->

                <div class="half-form">

                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        <input type="hidden" class="form-control" name="total" value="{{Cart::Subtotal()}}"/>
                    </div>
                </div> <!-- end half-form -->

                <div class="spacer"></div>





                <!-- Used to display form errors -->
                <div id="card-errors" role="alert"></div>
                <div class="spacer"></div>

                    <input type="submit" id="complete-order" class="btn btn-primary" value="Dovrši narudžbu"/>


                </form>

<hr>
            </div>



            <div class="checkout-table-container">
                <h2>Vaša narudžba</h2>
                <hr>
                @foreach(Cart::content() as $row)
                <table class="tablice">
<tr>
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
                </table>
                 @endforeach

                <div class="checkout-totals">
                  <h4>  <div class="checkout-totals-left">
                   Ukupno <br></h4>

                    </div>

                    <div class="checkout-totals-right">
                     <h4>   {{ Cart::subtotal()}} KM<br></h4>



                    </div>
                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
        </div>
    </div>
</div>
    </div>

@endsection
@section('extra-js')


    <script>



            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                // Disable the submit button to prevent repeated clicks
                document.getElementById('complete-order').disabled = true;
                var options = {
                    name: document.getElementById('name').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,

                }
                document.getElementById('complete-order').disabled = false;
               form.submit();
            });


    </script>
@endsection
