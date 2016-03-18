@extends('layouts.adminpanel')

@section('notification')

@if(session("status-notification") == "error")
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong class='text-center'><span class='fa fa-lg fa-exclamation-circle'></span> Error !</strong> {{ session('status') }}

    <ul>
        @foreach($errors->getMessages() as $error)
        <li>
            {{ $error[0] }}
        </li>
        @endforeach
    </ul>
</div>
@elseif(session("status-notification") == "success")
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong class='text-center'><span class='fa  fa-lg fa-check'></span> Success!</strong> {{ session('status') }}
</div>
@endif


<script>
</script>
@stop


@section('header-title')
<section class="content-header">
    <h1>
        {{ Lang::get('general.dashboard') }} 
        <small>@lang('general.overall_statistics')  <span class='fa fa-dashboard '></span></small>
    </h1>
</section>
@stop

@section('content')

@yield('notification')
<div class="col-sm-4">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h1 class='box-title'><i class="fa fa-bar-chart-o fa-fw"></i> @lang('general.post_per_category')</h1>
        </div>
        <div class="box-body no-padding">
            <div id='categoryPosts'>
            </div>
        </div>
        <div class='box-footer text-center'>
            <a href="#">@lang('general.category_statistics')</a>
        </div>
        <!-- /.panel-body -->
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    new Morris.Donut({
    // ID of the element in which to draw the chart.
    element: 'categoryPosts',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data:{!!$categoryJsonPostNum!!},
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value'],
            colors: ['#FE763A', '#FF8956', '#FEA077', '#FFB99B', '#FFD4C1'],
    });
</script>
@stop