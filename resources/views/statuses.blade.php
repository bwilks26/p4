@extends('layouts.master')

@push('head')
    <link href='/css/statuses.css' type='text/css' rel='stylesheet'>
@endpush

@section('content')

    <div class='container'>
        <div class='row-fluid'>
            <div class='panel panel-default'>
                <div class='panel-heading'>Global Status Center</div>
                <div class='panel-body'>
                <div class='col-sm-3'>
                    <div class='panel panel-warning'>

                        <div class='panel-heading'>Needs Update</div>
                        <div class='panel-body'>
                            <div class='needsUpdateCount'> {{ $needsUpdate }} </div>
                        </div>
                    </div>
                </div>
                <div class='col-sm-3'>
                    <div class='panel panel-danger'>

                        <div class='panel-heading'>Marked For Deletion</div>
                        <div class='panel-body'>
                            <div class='markedForDeletionCount'> {{ $markedForDeletion }} </div>
                        </div>
                    </div>
                </div>
                <div class='col-sm-3'>
                    <div class='panel panel-primary'>

                        <div class='panel-heading'>In Progress</div>
                        <div class='panel-body'>
                            <div class='inProgressCount'> {{ $inProgress }} </div>
                        </div>
                    </div>
                </div>
                <div class='col-sm-3'>
                    <div class='panel panel-success'>

                        <div class='panel-heading'>Ready For Use</div>
                        <div class='panel-body'>
                            <div class='readyForUseCount'> {{ $readyForUse }} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='container'>
        <div class='row-fluid'>
            <div class='panel panel-info'>

                <div class='panel-heading'>Status Search</div>
                <div class='panel-body'>

                    <form method='GET' action='/status-search'>

                        <fieldset>

                            <label for='product_code'>Browse Statuses by Type:</label>
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

                <div class='panel-heading'> @if($productCode) {{'Status Search Results for ' . $productCode}} @else {{'Status Search Results' }} @endif </div>
                <div class='panel-body'>


                    @if($products)
                        <table class='table table-hover'>
                            <tr>
                                <th>Product</th>
                                <th>Item #</th>
                                <th>Action</th>

                            </tr>

                            @foreach($products as $product)
                                <tr>
                                    <td> {{ $product->description }} </td>
                                    <td> {{ $product->item_number }} </td>
                                    <td><a href={{'/products/' . $product->item_number . '/edit'}}>edit</a></td>
                                    @foreach($product->statuses as $status)
                                        @if ($status->status_code == 'Needs Update')
                                            <td> <div class='needsUpdate'> {{ $status->status_code }}</div> </td>
                                        @elseif ($status->status_code == 'Marked For Deletion')
                                            <td> <div class='markedForDeletion'> {{$status->status_code}}</div> </td>
                                        @elseif ($status->status_code == 'In Progress')
                                            <td> <div class='inProgress'> {{$status->status_code}}</div> </td>
                                        @elseif ($status->status_code == 'Ready For Use')
                                            <td> <div class='readyForUse'> {{$status->status_code}}</div> </td>
                                        @endif
                                    @endforeach

                                </tr>

                            @endforeach
                        </table>
                    @else
                        <h2>No search results</h2>
                    @endif



                </div>
            </div>
        </div>
    </div>

@endsection