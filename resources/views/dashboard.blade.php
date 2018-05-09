@extends('layouts.master')

@push('head')
    <link href='/css/dashboard.css' type='text/css' rel='stylesheet'>
@endpush


@section('content')

    <div class='container'>
        <div class='row-fluid'>
            <div class='col-sm-4'>
                <div class='panel panel-info'>

                    <div class='panel-heading'>Total Products</div>
                    <div class='panel-body'>
                        <div class='productCount'> {{ $products->count() }} </div>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='panel panel-warning'>

                    <div class='panel-heading'>Needs Update</div>
                    <div class='panel-body'>
                        <div class='needsUpdateCount'> {{ $needsUpdate }} </div>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='panel panel-success'>

                    <div class='panel-heading'>Ready For Use</div>
                    <div class='panel-body'>
                        <div class='readyForUseCount'> {{ $readyForUse }} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='container'>
        <div class='row-fluid'>
            <div class='panel panel-default'>

                <div class='panel-heading'>Recent Products</div>
                <div class='panel-body'>

                @if(count($recentProducts) > 0)
                    <table class='table table-hover'>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price per Unit</th>
                        </tr>

                        @foreach($recentProducts as $product)
                            <tr>
                                <td> {{ $product->description }} </td>
                                <td> {{ $product->quantity }} </td>
                                <td> {{ $product->price_per_unit }} </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <h2>No recent products</h2>
                @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer')
@endpush