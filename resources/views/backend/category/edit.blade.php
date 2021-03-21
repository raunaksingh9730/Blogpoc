@extends('backend.layouts.master')

@section('title','add category')

@section('content')
    <div class="content-wrapper">
        <div id="load"></div>
        <div class="container-fluid ">
        <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Edit Categories Form
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(Session::has('fail'))
                                <div class="callout callout-danger text-danger alert-dismissible">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            @if(Session::has('success'))
                                <div class="callout callout-danger alertgreen alert-dismissible">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <form action="{{url('admin/category/'.$data->id)}}" class="form-horizontal demo-form" id="postform" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <!-- <h6 style="color:red;text-align: center;">Note: Please fill value in Experience field with integer only. ex: 2-5</h6> -->
                                <!-- First Section of form -->
                                <div class="form-section">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Title<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" id="title" class="form-control   @if($errors->has('title')){{'error_scroll'}} @endif" value="{{$data->title}}" >
                                            @if ($errors->has('title'))
                                            <div class="help-block">{{ $errors->first('title') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Full Image<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <p class="my-2"><img width="80" src="{{asset('/category/images')}}/{{$data->image}}" /></p>
                                            <input type="file" name="image" id="image" class="form-control @if($errors->has('image')){{'error_scroll'}} @endif" value="{{ $data->image }}" >
                                            @if ($errors->has('image'))
                                            <div class="help-block">{{ $errors->first('image') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Detail<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="detail" id="detail" class="form-control @if($errors->has('detail')){{'error_scroll'}} @endif">{{$data->detail}}</textarea>
                                            @if ($errors->has('detail'))
                                            <div class="help-block">{{ $errors->first('detail') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button type="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
