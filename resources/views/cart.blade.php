@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">QTY</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td><img src="images/gaming.jpg" width="100"></td>
                <td>laptop</td>
                <td>TK299</td>
                <td>
                    <input type="number" name="qty" placeholder="   Input Qty">
                    <button class="btn btn-secondary btn-sm">
                        <i class="fas fa-sync"></i> update
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger">Remove</button>
                </td>
            </tr>
            </tbody>
        </table>
        <hr>
        <div class="card-footer">
            <button class="btn btn-primary">Continue Shopping</button>
            <span style="margin-left: 300px;">Total Price:999TK</span>
            <button class="btn btn-info float-right">Check-Out</button>
        </div>
    </div>
@endsection
