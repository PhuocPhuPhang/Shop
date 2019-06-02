@extends('admin.layouts.master')
@section('content')
<div class="">
<div class="page-title">
<div class="title_left">
<h3></h3>
</div>
<div class="title_right">
<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
<div class="input-group">
<input type="text" class="form-control" placeholder="Search for...">
<span class="input-group-btn">
    <button class="btn btn-default" type="button">Go!</button>
</span>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Thêm tin tức</h2>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="ten" required="required" class="form-control col-md-7 col-xs-12">
                </div>
                </div>

                <div class="form-group">
                <label  class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea  class="form-control col-md-7 col-xs-12" name="mota"></textarea>
                </div>
                </div>


                <div class="form-group">
                <label  class="control-label col-md-3 col-sm-3 col-xs-12">Keywords</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea  class="form-control col-md-7 col-xs-12" name="keywords"></textarea>
                </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nổi bật</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <label>
                              <input type="checkbox" class="js-switch" checked />
                            </label>
                        </div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="button">Cancel</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
