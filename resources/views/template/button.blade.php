@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <div class="box">
                <div class="box-header">
                    Menu
                </div>
                <div class="box-content">
                    <ul>
                        <li><a href="/template/full-page">Full page</a></li>
                        <li><a href="/template/list">List</a></li>
                        <li><a href="/template/form">Form</a></li>
                        <li><a href="/template/button">Button</a></li>
                        <li><a href="/template/text">Text</a></li>
                        <li><a href="/template/ajax">Ajax</a></li>
                        <li><a href="/template/confirm">Confirm</a></li>
                        <li><a href="/template/icon">Icons</a></li>
                        <li><a href="/template/popupmessage">Popup message</a></li>
                        <li><a href="/template/model">model</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-10">
            <div class="box">
                <div class="box-header">
                    button
                </div>
                <div class="box-content">
                    <div>
                        <!-- Standard button -->
                        <button type="button" class="btn btn-default">Default</button>

                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                        <button type="button" class="btn btn-primary">Primary</button>

                        <!-- Indicates a successful or positive action -->
                        <button type="button" class="btn btn-success">Success</button>

                        <!-- Contextual button for informational alert messages -->
                        <button type="button" class="btn btn-info">Info</button>

                        <!-- Indicates caution should be taken with this action -->

                        <!-- Indicates a dangerous or potentially negative action -->
                        <button type="button" class="btn btn-danger">Danger</button>

                        <!-- Deemphasize a button by making it look like a link while maintaining button behavior -->
                        <button type="button" class="btn btn-link">Link</button>

                    </div>
                    <div style="margin-top: 20px">

                        <p>
                            <button type="button" class="btn btn-primary btn-lg">Large button</button>
                            <button type="button" class="btn btn-default btn-lg">Large button</button>
                        </p>
                        <p>
                            <button type="button" class="btn btn-primary">Default button</button>
                            <button type="button" class="btn btn-default">Default button</button>
                        </p>
                        <p>
                            <button type="button" class="btn btn-primary btn-sm">Small button</button>
                            <button type="button" class="btn btn-default btn-sm">Small button</button>
                        </p>
                        <p>
                            <button type="button" class="btn btn-primary btn-xs">Extra small button</button>
                            <button type="button" class="btn btn-default btn-xs">Extra small button</button>
                        </p>
                    </div>

                    <div style="margin-top: 20px">
                        <button type="button" class="btn btn-lg btn-primary" disabled="disabled">Primary button</button>
                        <button type="button" class="btn btn-default btn-lg" disabled="disabled">Button</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>











@endsection


