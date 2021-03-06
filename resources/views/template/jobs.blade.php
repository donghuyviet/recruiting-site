@extends('layouts.app')
<link href="/{{ config('app.source') }}/css/chosen.min.css" rel="stylesheet">
@section('content')
<div class="bootstrap-iso">
 <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
            @include('sidebar.index')
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">求人登録</div>
                <div class="panel-body">
                    <form class="form-horizontal" id = "post_jobs" method="POST" action="{{ url('/jobs/entry') }}">
                       {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">タイトル</label>
                            <div class="col-sm-6">
                                <input id="msg" type="text" class="form-control" name="title" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
	                          <label for="description" class="col-sm-3 control-label">求人目的</label>
	                          <div class="col-sm-6">
	                              <textarea class="form-control" rows="5" name="description" required autofocus></textarea>
	                          </div>
                        </div>
                        <div class="form-group ">
	                          <label class="control-label col-sm-3" for="start_date">
	                           求人開始日
	                          </label>
	                          <div class="col-sm-3">
		                           <div class="input-group">
		                            	<div class="input-group-addon">
				                             <i class="fa fa-calendar">
				                             </i>
			                            </div>
			                            <input class="form-control" id="start_date" name="start_date" placeholder="MM/DD/YYYY" required autofocus type="text"/>
		                           </div>
	                          </div>
	                     </div>
                       <div class="form-group">
                           <label class="col-sm-3 control-label" for="end_date">
                             求人完了日
                            </label>
                            <div class="col-sm-3">
                               <div class="input-group">
                                  <div class="input-group-addon">
                                   <i class="fa fa-calendar">
                                   </i>
                                  </div>
                                <input class="form-control" id="end_date" name="end_date" placeholder="MM/DD/YYYY" required autofocus type="text"/>
                               </div>
                            </div>
                       </div>
                       <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Location</label>
                            <div class="col-sm-6">
                               <select class="html-multi-chosen-select" id = "location_id" data-placeholder="Choose a Country..." multiple="multiple" name="location[]">
                                   @foreach($locations as $item)
                                      <option value="{{$item->id}}">{{$item->name_location}}</option>
                                   @endforeach
                                </select>
                            </div>
                       </div>
                       <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Station</label>
                            <div class="col-sm-6">
                               <select class="html-multi-chosen-select" id = "station" data-placeholder="Choose station..." multiple="multiple" name="station[]">                                 
                               </select>
                            </div>
                       </div>
                       <div class="form-group">
                              <label for="title" class="col-sm-3 control-label">Specializations</label>
                              <div class="col-sm-6">
                                 <select class="html-multi-chosen-select" data-placeholder="Choose a Specializations..." multiple="multiple" name="specializations[]">
                                     @foreach($specializations as $item)
                                        <option value="{{$item->id}}">{{$item->name_specializations}}</option>
                                     @endforeach
                                  </select>
                              </div>
                         </div>
                         <div class="form-group">
                              <label for="title" class="col-sm-3 control-label">Benefit</label>
                              <div class="col-sm-6">
                                 <select class="html-multi-chosen-select" data-placeholder="Choose a Benefit..." multiple="multiple" name="benefit[]">
                                     @foreach($benefits as $item)
                                        <option value="{{$item->id}}">{{$item->name_benefit}}</option>
                                     @endforeach
                                  </select>
                              </div>
                         </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Salary</label>
                            <div class="col-sm-2">
                                <input id="msg" type="text" class="form-control" name="price" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Time Unit</label>
                            <div class="col-sm-6">
                                <label class="radio-inline"><input type="radio" name="salary_unit" value = "1">Hour</label>
                                <label class="radio-inline"><input type="radio" name="salary_unit" value = "2" >Day</label>
                                <label class="radio-inline"><input type="radio" name="salary_unit" value = "3" >Week</label>
                                <label class="radio-inline"><input type="radio" name="salary_unit" value = "4" checked="checked" >Month</label>
                                <label class="radio-inline"><input type="radio" name="salary_unit" value = "5">Year</label>
                            </div>
                        </div>
                         <input type="hidden" name="orderer_id" value ="1">
                         @if($status === 1 || $status === 2)
                            @if($status === 1)
                              <div class="alert alert-success" role="alert">{{$message}}.</div>
                            @else
                              <div class="alert alert-danger" role="alert">{{$message}}</div>
                            @endif
                         @endif
                         <button class="btn btn-primary " name="submit" type="submit">
                            登録する
                           </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<script src="/{{ config('app.source') }}/js/chosen.jquery.min.js"></script>
<script>
  $(document).ready(function(){
    document.getElementById("post_jobs").reset();
    $('.html-multi-chosen-select').chosen({ width: "95%" });
    var date_input_create =$('input[name="start_date"]');
    var date_input_complete =$('input[name="end_date"]'); 
    var container='body';
     date_input_create.datepicker({
        format: 'mm/dd/yyyy',
        container:container,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        date_input_complete.datepicker('setStartDate', minDate);
    });

    date_input_complete.datepicker({
      format: 'mm/dd/yyyy',
        container:container,
        autoclose: true,
    }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            date_input_create.datepicker('setEndDate', minDate);
        });
    $("#location_id").change(function(){
         var array_id = $("#location_id").val();
         $("#station").empty(); 
         $.get('/api/get_station?array_location=' + array_id, function (data) {
            //success data
            jQuery.each( data.stations, function( i, val ) {
             $('#station').append('<option value="'+val['id']+'">'+val['name_station']+'</option>');
          });
            $("#station").trigger("chosen:updated");
             $("#station").trigger("liszt:updated");
        })          
    });
  })
</script>
@endsection