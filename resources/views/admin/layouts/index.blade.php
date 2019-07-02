@extends('admin.layouts.master')
@section('content')
    <!-- top tiles -->
    <div class="row tile_count">

    </div>
    <!-- /top tiles -->

    <div class="row">
    <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Chart Demo</div> -->

                <div class="panel-body">
                    {!! $chart->html() !!}
                </div>
            </div>
        </div>
    </div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
@endsection
