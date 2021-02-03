@extends('layouts.app')

@section('content')
    <style>
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($cart)
                        @php
                            $i = 1;
                        @endphp
                        @foreach($cart->items as $product)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td><img src="{{Storage::url($product['image'])}}" width="100"></td>
                                <td>{{$product['name']}}</td>
                                <td>{{$product['qty']}}</td>
                                <td>TK {{$product['price']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="card-footer">
                    <button class="btn btn-primary">Continue Shopping</button>
                    <span style="margin-left: 250px;">Total Price: {{$cart->totalPrice}} TK</span>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Check-Out
                    </div>
                    <div class="card-body">
                        <form action="/charge" method="post" id="">@csrf {{--id="payment-form"--}}
                            <div class="form-group">

                                <label>Name</label>
                                <input type="text" name="name" id="" class="form-control" required=""> {{--id="name"--}}
                            </div>

                            <div class="form-group">

                                <label>Adress</label>
                                <input type="text" name="address" id="" class="form-control" required=""> {{--id="address"--}}
                            </div>
                            <div class="form-group">

                                <label>City</label>
                                <input type="text" name="city" id="" class="form-control" required=""> {{--id="city"--}}
                            </div>
                            <div class="form-group">

                                <label>State</label>
                                <input type="text" name="state" id="" class="form-control" required=""> {{--id="state"--}}
                            </div>
                            <div class="form-group">

                                <label>Postal code</label>
                                <input type="text" name="postalcode" id="" class="form-control" required=""> {{--id="postalcode"--}}
                            </div>
                            <div class="">
                                <input type="hidden" name="amount" value="{{$amount}}">


                                {{--                            <button class="btn btn-primary mt-3">Submit Payment</button>--}}

                                <div class="">
                                    <label for="card-element">
                                        Credit or debit card
                                    </label>
                                    <div id=""> {{--id="card-element"--}}
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="" role="alert"></div> {{--id="card-errors"--}}
                                </div>

                                <button class="btn btn-primary mt-4" type="submit">Submit Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
{{--    <script type="text/javascript">--}}
{{--        // Create a Stripe client.--}}
{{--        window.onload=function(){--}}
{{--            var stripe = Stripe('pk_test_51IFyyNLCb6PAl6RBQ13hlygPhXX9Vek7iCzC850CQTBC8ILjseO68f3C8TnPRc151NnerMtIun4bNdNRFwAMccJ100u1FlbXfQ');--}}

{{--        // Create an instance of Elements.--}}
{{--            var elements = stripe.elements();--}}

{{--        // Custom styling can be passed to options when creating an Element.--}}
{{--        // (Note that this demo uses a wider set of styles than the guide below.)--}}
{{--            var style = {--}}
{{--                base: {--}}
{{--                    color: '#32325d',--}}
{{--                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',--}}
{{--                    fontSmoothing: 'antialiased',--}}
{{--                    fontSize: '16px',--}}
{{--                    '::placeholder': {--}}
{{--                        color: '#aab7c4'--}}
{{--                    }--}}
{{--                },--}}
{{--                invalid: {--}}
{{--                    color: '#fa755a',--}}
{{--                    iconColor: '#fa755a'--}}
{{--                }--}}
{{--            };--}}

{{--        // Create an instance of the card Element.--}}
{{--            var card = elements.create('card', {style: style});--}}

{{--        // Add an instance of the card Element into the `card-element` <div>.--}}
{{--            card.mount('#card-element');--}}

{{--        // Handle real-time validation errors from the card Element.--}}
{{--            card.addEventListener('change', function(event) {--}}
{{--                var displayError = document.getElementById('card-errors');--}}
{{--                if (event.error) {--}}
{{--                    displayError.textContent = event.error.message;--}}
{{--                } else {--}}
{{--                    displayError.textContent = '';--}}
{{--                }--}}
{{--            });--}}

{{--        // Handle form submission.--}}
{{--            var form = document.getElementById('payment-form');--}}
{{--            form.addEventListener('submit', function(event) {--}}
{{--                event.preventDefault();--}}

{{--                var options={--}}
{{--                    name:document.getElementById('name').value,--}}
{{--                    address_line1:document.getElementById('address').value,--}}
{{--                    address_city:document.getElementById('city').value,--}}
{{--                    address_state:document.getElementById('state').value,--}}
{{--                    address_zip:document.getElementById('postalcode').value--}}
{{--                }--}}

{{--                stripe.createToken(card,options).then(function(result) {--}}
{{--                    if (result.error) {--}}
{{--                        // Inform the user if there was an error.--}}
{{--                        var errorElement = document.getElementById('card-errors');--}}
{{--                        errorElement.textContent = result.error.message;--}}
{{--                    } else {--}}
{{--                        // Send the token to your server.--}}
{{--                        stripeTokenHandler(result.token);--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--        // Submit the form with the token ID.--}}
{{--            function stripeTokenHandler(token) {--}}
{{--                // Insert the token ID into the form so it gets submitted to the server--}}
{{--                var form = document.getElementById('payment-form');--}}
{{--                var hiddenInput = document.createElement('input');--}}
{{--                hiddenInput.setAttribute('type', 'hidden');--}}
{{--                hiddenInput.setAttribute('name', 'stripeToken');--}}
{{--                hiddenInput.setAttribute('value', token.id);--}}
{{--                form.appendChild(hiddenInput);--}}

{{--                // Submit the form--}}
{{--                form.submit();--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}

@endsection
