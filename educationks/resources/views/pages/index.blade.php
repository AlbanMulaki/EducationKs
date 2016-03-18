@extends('layouts.default')


@section('content')
<div class="col-md-12  box" style='background:#573e81 url({{ asset('assets/img/paisley-bg.png') }}) repeat;'>
    <div class="col-md-12">
        <br>
        <h1 class="text-center text-white">What is Lorem Ipsum</h1>
        <br>
        <h3 class='text-center text-white'>Mesohuni duke perdorur format praktike, moderne, dhe video</h3>
        <br>
        <br>
        <br>
        <br>
    </div>
    <div class="col-md-12 text-center text-uppercase">
        <a href="#" class="btn btn-info btn-lg text-bold">Bashkangjitu </a> 
        <a href="#" class="btn  btn-flat btn-lg text-bold">Shiko video </a>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>
<div class="col-md-12">
    <h1 class="text-center text-muted">What is Lorem Ipsum</h1>
</div>

<div class="container">
    <div class="col-md-12 "><br><br>
        <div class="horizontal-line"> </div>
        <br><br><br><br>
    </div>
    @for($i=0;$i<8;$i++)
    <div class="col-md-3">
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="cursor: pointer; background: url('{{ asset('assets/img/vim-series.jpg') }}')  center;     height: 250px;">
                <h5 class="widget-user-desc">
                    <label class="label-default label label-lg">Advanced</label>
                </h5>
            </div>
            <div class="box-footer" style="padding-top: 0px;">
                <div class="row">
                    <div class="col-sm-8 border-right">
                        <div class="description-block h3" style="word-wrap: break-word;">
                            Lorem ipsum title of video blah blah
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                            <span class="h3">
                                153
                            </span><br>
                            videos
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    @endfor
</div>


@endsection