@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Users</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('UserController@index') }}" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="User list">
                        <i class="fa fa-list"></i></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::open(['action'=>['UserController@store'],'method'=>'post','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        @include('dashboard.users._formCreateEdit')
                        <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-sm-3 control-label">User Roles <span>*</span></label>
                            <div class="col-sm-9">
                                {!! Form::select('role[]',$roles,old('role'),['class'=>'form-control select2','multiple']) !!}
                                @if ($errors->has('role'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> Gender</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ old('gender')!='O' && old('gender')!='F'  ?'checked':'' }} name="gender" value="M" class="minimal" >
                                    Male
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ old('gender')=='F'?'':'' }} name="gender" value="F" class="minimal" >
                                    Female
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ old('gender')=='O'?'':'' }} name="gender" value="O" class="minimal" >
                                    Other
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> Status</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    {!! Form::radio('status','1', (old('status')!=1) ,$attributes = ['class'=>'minimal'])  !!}
                                    Active
                                </label>
                                &nbsp;
                                <label>
                                    {!! Form::radio('status','0', (old('status')==='0') ,$attributes = ['class'=>'minimal'])  !!}
                                    In-Active
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<hr>

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <h4 class="text-center">Billing Address</h4>
                        <hr>

                    </div>
                    <div class="col-sm-4 col-sm-offset-1">
                        <h4 class="text-center">Shipping Address</h4>
                        <hr>

                    </div>
                </div>--}}
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-11">
                        <span class="pull-right">
                             <button type="reset" class="btn btn-default">Cancel</button>
                             &nbsp;
                             <button type="submit" class="btn btn-info ">Create</button>
                        </span>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
                    <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
@stop
@section('footer')

    <script>

        $(function () {
            //Initialize Select2 Elements
            try {
                $(".select2").select2({
                    placeholder:'Select User Roles'
                });
            }catch (e){
                console.error(e);
            }
            try {
                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
            }catch (e){
                console.error(e);
            }

        });
    </script>
@stop
