@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">New Gift Vouchers</h3>
                <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::open(['action'=>['UserController@store'],'method'=>'post','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-sm-3 control-label">First Name </label>
                            <div class="col-sm-9">
                                {!! Form::text('title',$value= null, $attributes = ['class'=>'form-control','id'=>'title','placeholder'=>'Title','autofocus'=>true])  !!}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-sm-3 control-label">Price <span>*</span></label>
                            <div class="col-sm-9">
                                {!! Form::text('price',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Price','required'=>true])  !!}
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-8">
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



        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Gift Vouchers</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--@if($gift_vouchers->count()>0)
                            @foreach($gift_vouchers as $key=>$gift_voucher)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{$gift_voucher->title}}</td>
                                    <td>&euro; {{ $gift_voucher->price }}</td>
                                    <td><a href="#" class="text-danger"><i class="fa fa-trash-o"></i></a> </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    <p class="alert alert-info">
                                        No Gift vouchers found.
                                    </p>
                                </td>
                            </tr>
                        @endif--}}
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box -->
    </section>
@stop
@section('footer')

    <script>

        $(function () {



        });
    </script>
@stop
