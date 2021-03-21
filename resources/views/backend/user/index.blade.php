@extends('backend.layouts.master')

@section('title','User List')

@section('content')
    <div class="content-wrapper mt-5">
        <div class="table-responsive">
            <div class="card-body">
            <table id='usertable' class="display table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data)
                        @foreach ($data as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['created_at']}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
