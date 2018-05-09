@extends('layouts.master')

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    <link href='/css/splitterForm.css' type='text/css' rel='stylesheet'>
@endpush

@section('form')
    <div class="title">Bill Splitter</div>

    <div class='container-fluid'>
        <div class='billSplitterForm'>
            <form method='GET' action='/split-bill'>
                <div class='row-fluid'>
                    <label>Split how many ways?</label>
                    <input type='text'
                           name='splitTerm'
                           placeholder='Required*'
                           value='{{ ($errors->has('splitTerm')) ? old('splitTerm') : $splitTerm }}'/>
                    @include('modules.error-field', ['field' => 'splitTerm'])
                </div>
                <div class='row-fluid'>
                    <label>How much was the tab?</label>
                    <input type='text'
                           name='billAmount'
                           placeholder='Required*'
                           value='{{ ($errors->has('billAmount')) ? old('billAmount') : $billAmount }}'/>
                    @include('modules.error-field', ['field' => 'billAmount'])
                </div>

                <div class='row-fluid'>
                    <label>How was the the service?</label>
                    <select name='tipAmount'>
                        <!-- echo selected on appropriate tip amount selected for refresh -->

                        {{-- }}{{ (($tipTest == 0) ? 'selected' : '' }} --}}

                        <option value='0' @if($tipAmount == '0') selected='selected' @endif >Choose tip...</option>
                        <option value='15' @if($tipAmount == '15') selected='selected' @endif >Poor (15%)</option>
                        <option value='18' @if($tipAmount == '18') selected='selected' @endif>Good (18%)</option>
                        <option value='20' @if($tipAmount == '20') selected='selected' @endif>Excellent (20%)</option>
                        <option value='25' @if($tipAmount == '25') selected='selected' @endif>Outstanding (25%)</option>
                    </select>

                </div>

                <div class='row-fluid'>
                    <label>Round up?</label>
                    <input type='checkbox' name='roundUp' @if($roundUp) checked='checked' @endif/>
                </div>


                <input type='submit' value='Calculate'>
            </form>
        </div>
    </div>


    @if($result or 0)
        @include('modules.alert', ['field' => 'result'])
    @else
        @include('modules.alert', ['field' => 'welcome'])
    @endif