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
                    form
                </div>
                <div class="box-content">
                    <div class="text-center"><h2>Form add</h2></div>
                    <form class="form-horizontal">


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Ussename">
                            </div>
                            <label for="inputEmail3" class="col-sm-2 control-label">Fullname</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Fullname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Birthday</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Ussename">
                            </div>
                            <label for="inputEmail3" class="col-sm-2 control-label">Live in</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Ussename">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-4">
                                <select class="form-control" style="width: 70px;">
                                    <option>Male</option>
                                    <option>Fmale</option>
                                    <option>Other</option>

                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Note</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" onclick="confirm()">Save</button>
                                <button type="submit" class="btn btn-default">cancel</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>

    <script>
        function confirm(){

            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure',
                buttons: {
                    confirm: function () {
                        $.alert('Confirmed!');
                    },
                    cancel: function () {
                        $.alert('Canceled!');
                    }

                }
            });
        }
    </script>









@endsection


