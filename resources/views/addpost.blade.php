@extends('layouts.app')
@section('content')
    <div id="load"></div>
        <div class="container-fluid ">
        <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Add Post Form
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
                            <form action="{{ route('post.store') }}" class="form-horizontal demo-form" id="postform" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- <h6 style="color:red;text-align: center;">Note: Please fill value in Experience field with integer only. ex: 2-5</h6> -->
                                <!-- First Section of form -->
                                <div class="form-section">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Category<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control @if($errors->has('category')){{'error_scroll'}} @endif" value="{{ old('category') }}" name="category" id="category" {{ $errors->has('category') ? 'autofocus' : null}}>
                                                <option value="">Please select</option>
                                                @if($category)
                                                    @foreach ($category as $key => $value)
                                                        <option value="{{ $value['id'] }}">{{ $value['title'] }}</option> 
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('category'))
                                            <div class="help-block text-danger">{{ $errors->first('category') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Title<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" id="title" class="form-control   @if($errors->has('title')){{'error_scroll'}} @endif" value="{{ old('title') }}" >
                                            @if ($errors->has('title'))
                                            <div class="help-block text-danger">{{ $errors->first('title') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Thumbnail<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="thumb" id="thumb" class="form-control @if($errors->has('thumb')){{'error_scroll'}} @endif" value="{{ old('thumb') }}" >
                                            @if ($errors->has('thumb'))
                                            <div class="help-block text-danger">{{ $errors->first('thumb') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Full Image<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="full_img" id="full_img" class="form-control @if($errors->has('full_img')){{'error_scroll'}} @endif" value="{{ old('full_img') }}" >
                                            @if ($errors->has('full_img'))
                                            <div class="help-block text-danger">{{ $errors->first('full_img') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Detail<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="detail" id="detail" class="form-control @if($errors->has('detail')){{'error_scroll'}} @endif"></textarea>
                                            @if ($errors->has('detail'))
                                            <div class="help-block text-danger">{{ $errors->first('detail') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tags<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="tags" id="tags" class="form-control @if($errors->has('tags')){{'error_scroll'}} @endif"></textarea>
                                            @if ($errors->has('tags'))
                                            <div class="help-block text-danger">{{ $errors->first('tags') }}</div>
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
@endsection
                                    
