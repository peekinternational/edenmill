<!-- jQuery 2.1.4 -->
<script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('assets/backend/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/plugins/fastclick/fastclick.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{  asset('assets/plugins/iCheck/icheck.min.js')  }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/backend/dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/backend/dist/js/demo.js') }}"></script>
<!-- JqueryConfirm -->
<script src="{{ asset('assets/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
<!-- Notify -->
<script src="{{ asset('assets/plugins/notify.js') }}"></script>
@if(Session::has('__response') && isset(Session::get('__response')['notify']))
    <script>
        $(document).ready(function () {
            $.notify('{!! Session::get('__response')['notify'] !!}', "{{Session::get('__response')['type']}}");
        });
    </script>
@endif
