@if(Session::has('__response') && isset(Session::get('__response')['message']))
    <p class="col-sm-offset-3 alert alert-{{Session::get('__response')['type']}}">{{Session::get('__response')['message']}} <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>
@endif