@extends('layouts.master')

@push('head')
    <link href='/css/edit.css' type='text/css' rel='stylesheet'>
@endpush

@section('content')

    <div class='container'>
        <div class='row-fluid'>
            <div class='panel panel-primary'>

                <div class='panel-heading'><h2>Add Product</h2></div>
                <div class='panel-body'>

                    <form method='POST' action='/products'>
                        {{ csrf_field() }}
                        <fieldset>



                            <table>
                                <tr>
                                    <td>
                                        <label>Item Number:</label>
                                    </td>

                                    <td>
                                        <input type='number'
                                               name='item_number'
                                               value='{{ old('item_number') }}'
                                               placeholder='Required*'/>
                                    </td>
                                    <td>
                                        @include('modules.error-field', ['field' => 'item_number'])
                                    </td>

                                <tr>
                                <tr>
                                    <td>
                                        <label>Description:</label>
                                    </td>

                                    <td>
                                        <input type='text'
                                               name='description'
                                               value='{{ old('description') }}'
                                               placeholder='Required*'/>
                                    </td>
                                    <td>
                                        @include('modules.error-field', ['field' => 'description'])
                                    </td>

                                <tr>
                                    <td>
                                        <label>Quantity:</label>
                                    </td>
                                    <td>
                                        <input type='number'
                                               name='quantity'
                                               value='{{ old('quantity') }}'
                                               placeholder='Required*'/>
                                    </td>
                                    <td>
                                        @include('modules.error-field', ['field' => 'quantity'])
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>On Order:</label>
                                    </td>

                                    <td>
                                        <input type='number'
                                               name='on_order'
                                               value='{{ old('on_order') }}'
                                               placeholder='Required*'/>
                                    </td>
                                    <td>
                                        @include('modules.error-field', ['field' => 'on_order'])
                                    </td>

                                <tr>
                                <tr>
                                    <td>
                                        <label>Price Per Unit:</label>
                                    </td>
                                    <td>
                                        <input type='number'
                                               name='price_per_unit'
                                               value='{{ old('price_per_unit') }}'
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
                                            <option value='ENGINES' selected >Engines</option>
                                            <option value='COOLERS'  > Coolers</option>
                                            <option value='COMP'  >Compressors</option>
                                            <option value='PANELS' >Panels</option>
                                            <option value='MOTORS' >Motors</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                        </fieldset>

                        <input type='submit' value='Add Product' class='btn btn-primary btn-small'>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection