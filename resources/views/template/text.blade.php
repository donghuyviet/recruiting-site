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
                    text
                </div>
                <div class="box-content">
                    <div class="alert alert-success" role="alert">Well done! You successfully read this important alert message.</div>
                    <div class="alert alert-info" role="alert">Heads up! This alert needs your attention, but it's not super important.</div>
                    <div class="alert alert-warning" role="alert">Warning! Better check yourself, you're not looking too good.</div>
                    <div class="alert alert-danger" role="alert">Oh snap! Change a few things up and try submitting again.</div>
                    <br>
                    <br>
                    <br>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>

                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>











@endsection


