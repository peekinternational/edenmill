@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Users</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::model($user,['action'=>['UserController@update',$user->id],'method'=>'PATCH','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        @include('dashboard.partials.formErrorMessage')
                        @include('dashboard.users._formCreateEdit')
                        <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                            {!! Form::label('role', 'User Roles *', ['class' => 'col-sm-3 control-label'])  !!}
                            <div class="col-sm-9">
                                <select name="role[]" id="role" class="form-control select2" multiple>
                                    @foreach($roles as $role_id=>$role)
                                        <option {{ $user->roles->contains($role_id)?'selected="selected"':'' }} value="{{ $role_id }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('gender', 'Gender', ['class' => 'col-sm-3 control-label'])  !!}
                                <div class="col-sm-9" style="padding-top: 5px;">
                                    <label>
                                        {!! Form::radio('gender','M', (trim($user->gender)!='M' || trim($user->gender!='O')) ,$attributes = ['class'=>'minimal'])  !!}
                                        Male
                                    </label>
                                    &nbsp;
                                    <label>
                                        {!! Form::radio('gender','F', (trim($user->gender)=='F') ,$attributes = ['class'=>'minimal'])  !!}
                                        Female
                                    </label>
                                    &nbsp;
                                    <label>
                                        {!! Form::radio('gender','O', (trim($user->gender)=='O') ,$attributes = ['class'=>'minimal'])  !!}
                                        Other
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        <span class="pull-right">
                             <a href="{{ action('UserController@index') }}" class="btn btn-default">Cancel</a>
                             &nbsp;
                             <button type="submit" class="btn btn-info ">Update</button>
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_upload_preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".input-photo").change(function () {
            readURL(this);
        });
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
