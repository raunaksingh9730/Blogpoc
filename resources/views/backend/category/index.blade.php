@extends('backend.layouts.master')

@section('title','Index List')

@section('content')
    <div class="content-wrapper mt-5">
        <div class="card-body">
            <div class="table-responsive">
                <table id='usertable' class="display table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data)
                            @foreach ($data as $key => $category)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$category['title']}}</td>
                                    <td><img src="{{ asset('/category/images').'/'.$category->image }}" width="100" /></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{url('admin/category/'.$category->id.'/edit')}}">Update</a>
                                        <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/category/'.$category->id.'/delete')}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
