@if(isset($breadcrumb) && is_array($breadcrumb))
<section class="content-header">
    <h1>
        {{ $breadcrumb['title'] }}
        <small>{{ $breadcrumb['description'] }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">{{ $breadcrumb['title'] }}</a></li>
        <li class="active">{{ $breadcrumb['page'] }}</li>
    </ol>
</section>
@endif