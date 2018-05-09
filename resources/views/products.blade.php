@extends('layouts.master')

@section('content')

    <div class='container'>
        <div class='row-fluid'>
                <div class='panel panel-primary'>

                    <div class='panel-heading'>Product Search</div>
                    <div class='panel-body'>

                        <form method='GET' action='/product-search'>

                            <fieldset>

                                <label for='product_code'>Product Type:</label>
                                <select name='product_code' id='product_code'>
                                    <option value='ENGINES' @if($productCode == 'ENGINES') selected='selected' @endif>Engines</option>
                                    <option value='COOLERS' @if($productCode == 'COOLERS') selected='selected' @endif>Coolers</option>
                                    <option value='COMP' @if($productCode == 'COMP') selected='selected' @endif >Compressors</option>
                                    <option value='PANELS' @if($productCode == 'PANELS') selected='selected' @endif >Panels</option>
                                    <option value='MOTORS' @if($productCode == 'MOTORS') selected='selected' @endif>Motors</option>
                                </select>

                                <label for='order_by'>Order By:</label>
                                <select name='order_by' id='order_by'>
                                    <option value='description' @if($orderBy == 'description') selected='selected' @endif>Name</option>
                                    <option value='item_number' @if($orderBy == 'item_number') selected='selected' @endif>Item Number</option>
                                    <option value='quantity' @if($orderBy == 'quantity') selected='selected' @endif>Quantity</option>
                                    <option value='price_per_unit' @if($orderBy == 'price_per_unit') selected='selected' @endif >Price per Unit</option>
                                    <option value='total' @if($orderBy == 'total') selected='selected' @endif >Total</option>
                                </select>


                                <input type='checkbox' name='most_recent' @if($mostRecent) checked='checked' @endif>
                                <label>show most recent</label>
                            </fieldset>

                            <input type='submit' value='Search' class='btn btn-primary btn-small'>

                        </form>

                    </div>
                </div>
        </div>
    </div>

    <div class='container'>
        <div class='row-fluid'>
            <div class='panel panel-default'>

                <div class='panel-heading'> @if($productCode) {{'Search Results for ' . $productCode}} @else {{'Search Results' }} @endif </div>
                <div class='panel-body'>


                    @if($products)
                        <table class='table table-hover'>
                            <tr>
                                <th>Product</th>
                                <th>Item #</th>
                                <th>Quantity</th>
                                <th>Price per Unit</th>
                                <th>Total</th>
                            </tr>

                            @foreach($products as $product)
                                <tr>
                                    <td> {{ $product->description }} </td>
                                    <td> {{ $product->item_number }} </td>
                                    <td> {{ $product->quantity }} </td>
                                    <td> {{ $product->price_per_unit }} </td>
                                    <td> {{ $product->total }} </td>
                                    <td><a href={{'/products/' . $product->item_number . '/edit'}}>edit</a></td>
                                    <td><a href='#' data-toggle='modal' data-product_name='{{$product->description}}' data-item_number='{{$product->item_number}}' data-target='#deleteModal'><i class="fa fa-times fa-lg"></i></a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <h2>No search results</h2>
                    @endif




                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalTitleProduct">Delete Product<div id='productName'></div></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id='deleteForm' method='POST' action=''>
                                        {{method_field('delete')}}
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            Are you sure you want to delete this product?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" value='Delete' class="btn btn-danger">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $('#deleteModal').on('show.bs.modal', function(e) {
            var itemNumber = $(e.relatedTarget).data('item_number');
            var productName = $(e.relatedTarget).data('product_name');
            console.log(itemNumber);
            $(e.currentTarget).find('#deleteForm').attr('action', '/products/' + itemNumber);
            $(e.currentTarget).find('#productName').html(productName);
        });
    </script>

@endsection