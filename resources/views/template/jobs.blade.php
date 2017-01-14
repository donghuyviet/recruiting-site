@extends('layouts.app')

@section('content')
<div class="bootstrap-iso">
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Jobs</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('/jobs/store') }}">
                       {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">タイトル</label>
                            <div class="col-md-6">
                                <input id="msg" type="text" class="form-control" name="title" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
	                          <label for="description" class="col-md-3 control-label">求人目的</label>
	                          <div class="col-md-6">
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
                           <label class="col-md-3 control-label" for="end_date">
                             求人開始日
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
                         <input type="hidden" name="orderer_id" value ="1">
                         <button class="btn btn-primary " name="submit" type="submit">
                            Submit
                           </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<script>
  $(document).ready(function(){
    var date_input_create =$('input[name="start_date"]'); //our date input has the name "date"
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

  })
</script>
@endsection