@extends('admin.adminlayouts.adminlayout')

@section('head')
	<!-- BEGIN PAGE LEVEL STYLES -->
	{{HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css")}}
	<!-- END PAGE LEVEL STYLES -->

@stop


@section('mainarea')


			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			{{$pageTitle}}
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{route('admin.dashboard.index')}}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Leave Applications</a>
						<i class="fa "></i>
					</li>

				</ul>

			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
						<div class="row">
            				<div class="col-md-6">

                            </div>
            				<div class="col-md-6 form-group text-right">

            				<span id="load_notification"></span>
            					 <input  type="checkbox"  onchange="ToggleEmailNotification('leave_notification');return false;" class="make-switch" name="leave_notification" @if($setting->leave_notification==1)checked	@endif data-on-color="success" data-on-text="Yes" data-off-text="No" data-off-color="danger">
            					<strong>Email Notification</strong><br>


            				</div>
                         </div>

			<div class="row">
				<div class="col-md-12">

					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div id="load">

					  @include('admin.common.error')

					</div>
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-rocket"></i>Applications
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body">


							<table class="table table-striped table-bordered table-hover" id="applications">
                                     <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Leave Type</th>
                                        <th>Reason</th>
                                        <th>Applied on</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                         <td> {{-- ID from Contoller ajaxload------}} </td>
                                         <td> {{-- Name from Contoller ajaxload----}} </td>
                                         <td> {{-- Date from Contoller ajaxload----}} </td>
                                         <td> {{-- Leavetype from Contoller ajaxload--}} </td>
                                         <td> {{-- Reason from Contoller ajaxload----}} </td>
                                         <td> {{-- Applied on from Contoller ajaxload---}} </td>
                                         <td> {{-- Status from Contoller ajaxload----}} </td>
                                         <td> {{-- Action from Contoller ajaxload----}} </td>
                                    </tr>

                                        </tbody>

							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

				</div>
			</div>
			<!-- END PAGE CONTENT-->


{{--Leave Application view MODALS--}}
{{Form::open(['url'=>'','id'=>'edit_form_application','method'=>'PATCH'])}}
<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <span class="caption-subject font-red-sunglo bold uppercase">Leave Application</span>
                    </div>
                    <div class="modal-body" id="modal-data-application">
                        {{--Ajax data call for form--}}
                    </div>
                </div>

            </div>
        </div>
</div>
{{Form::close()}}
{{--Leave Application view MODALS--}}

			{{--DELETE MODAL CALLING--}}
                @include('admin.common.delete')
            {{--DELETE MODAL CALLING END--}}
@stop



@section('footerjs')


<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
	{{ HTML::script("assets/global/plugins/select2/select2.min.js")}}
	  {{HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
	{{ HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js")}}
	{{ HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js")}}
    {{ HTML::script("assets/admin/pages/scripts/table-managed.js")}}
<!-- END PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->





 <script>
        $('#applications').dataTable( {
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "{{ URL::route('admin.leave_applications') }}",
            "aaSorting": [[ 1, "asc" ]],
            "aoColumns": [
                { 'sClass': 'center', "bSortable": true  },
                { 'sClass' : 'center',  "bSortable": true },
                { 'sClass': 'center', "bSortable": true },
                { 'sClass': 'center', "bSortable": true },
                { 'sClass': 'center', "bSortable": true },
                { 'sClass': 'center', "bSortable": true },
                { 'sClass': 'center', "bSortable": true },
                { 'sClass': 'center', "bSortable": false }
            ],
            "lengthMenu": [
                            [5, 15, 20, -1],
                            [5, 15, 20, "All"] // change per page values here
                        ],
            "sPaginationType": "full_numbers",
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                var row = $(nRow);
                row.attr("id", 'row'+aData['0']);
            }

        });



        function del(id)
		{

			$('#deleteModal').appendTo("body").modal('show');
			$('#info').html('Are you sure ! You want to delete?');
			$("#delete").click(function()
			{
						var url = "{{ route('admin.leave_applications.destroy',':id') }}";
						url = url.replace(':id',id);
					 $.ajax({
						type: "DELETE",
						url : url,
						dataType: 'json',
						data: {"id":id}
						}).done(function(response)
						  {
							 if(response.success == "deleted")
							 {
									$("html, body").animate({ scrollTop: 0 }, "slow");
									$('#deleteModal').modal('hide');
									$('#row'+id).fadeOut(500);
									$('#load').html("<p class='alert alert-success text-center'><strong>"+name +"</strong> Successfully Deleted</p>");
							 }
						 });
				})
			}

       function show_application(id)
       {
        	$("#modal-data-application").html('<div class="text-center">{{HTML::image('assets/admin/layout/img/loading-spinner-blue.gif')}}</div>');
            $('#edit_form_application').attr('action',"{{ URL::to('admin/leave_applications/"+id+"') }}" );
			var url = "{{ route('admin.leave_applications.show',':id') }}";
			url = url.replace(':id',id);
            $.ajax({
                    type: "GET",
                    url : url

                    }).done(function(response)
                    {
                                $('#modal-data-application').html(response);
//
                     });
       }
    </script>

</script>
@stop
	