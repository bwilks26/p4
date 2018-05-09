@extends('layouts.master')

@push('head')
    <link href='/css/edit.css' type='text/css' rel='stylesheet'>
@endpush

@section('content')

    <div class='container'>
        <div class='row-fluid'>
            <div class='panel panel-primary'>

                <div class='panel-heading'><h2>Edit Product: {{ $product->description }}</h2></div>
                <div class='panel-body'>

                    <form method='POST' action='/products/{{ $product->item_number }}'>
                        {{ method_field('put') }}
                        {{ csrf_field() }}


                        <fieldset>


                            <div class='col-lg-6'>
                                <table>
                                    <tr>
                                        <td>
                                            <label>Edit Description:</label>
                                        </td>

                                        <td>
                                            <input type='text'
                                                   name='description'
                                                   value='{{ old('description', $product->description) }}'
                                                   placeholder='Required*'/>
                                        </td>
                                        <td>
                                            @include('modules.error-field', ['field' => 'description'])
                                        </td>

                                    <tr>
                                        <td>
                                            <label>Edit Quantity:</label>
                                        </td>
                                        <td>
                                            <input type='number'
                                                   name='quantity'
                                                   value='{{ old('quantity', $product->quantity) }}'
                                                   placeholder='Required*'/>
                                        </td>
                                        <td>
                                            @include('modules.error-field', ['field' => 'quantity'])
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>Edit Price Per Unit:</label>
                                        </td>
                                        <td>
                                            <input type='number'
                                                   name='price_per_unit'
                                                   value='{{ old('price_per_unit', $product->price_per_unit) }}'
                                                   placeholder='Required*'/>
                                        </td>
                                        <td>
                                            @include('modules.error-field', ['field' => 'price_per_unit'])
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for='product_code'>Product Type:</label>
                                        </td>
                                        <td>
                                            <select name='product_code' id='product_code'>
                                                <option value='ENGINES'
                                                        @if($product->product_code == 'ENGINES') selected='selected' @endif >Engines
                                                </option>
                                                <option value='COOLERS'
                                                        @if($product->product_code == 'COOLERS') selected='selected' @endif > Coolers
                                                </option>
                                                <option value='COMP'
                                                        @if($product->product_code == 'COMP') selected='selected' @endif >Compressors
                                                </option>
                                                <option value='PANELS'
                                                        @if($product->product_code == 'PANELS') selected='selected' @endif >Panels
                                                </option>
                                                <option value='MOTORS'
                                                        @if($product->product_code == 'MOTORS') selected='selected' @endif >Motors
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>


                            <div class='col-lg-6 '>
                                <div class='panel panel-info'>

                                    <div class='panel-heading'><h3>Status Selection</h3></div>
                                    <div class='panel-body'>
                                        <ul class='statusSelection'>
                                            @foreach($statusSelection as $statusId => $statusCode)
                                                <li>
                                                    <label>
                                                        <input {{ (in_array($statusCode, $statuses)) ? 'checked' : '' }}
                                                               type='checkbox'
                                                               name='statusCodes[]'
                                                               value='{{ $statusId }}'>
                                                        {{ $statusCode }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </fieldset>


                        <input type='submit' value='Edit Product' class='btn btn-primary btn-small'>

                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection