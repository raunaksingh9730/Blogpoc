@extends('layouts.app')

@section('content')
<div class="">
  <div id="load"></div>
  <div class="container">
  <!-- Info boxes -->
      <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">
                          @if($data)
                            {{$data->title}}
                          @endif
                      </h3>
                      @role('writer')
                        @if(auth()->user()->id == $data->user_id)
                          <h2><a class="float-right" role="button" href="{{route('post.edit',$data->id)}}" >Edit</a></h2>
                        @endif
                      @endrole
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="text-center">
                          <img src="{{asset('/posts/images/fullimage/'.$data->full_img)}}" alt="No image found" sizes="" srcset="">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <p>{{$data->detail}}</p>
                    </div>
                    <div class="row">
                      @if($data->comments)
                      <div class="">Comments:</div>
                      <ul>
                        @foreach ($data->comments as $key => $value) 
                          <li> 
                              <p>{{$value->comment}}</p>
                          </li>
                        @endforeach
                      </ul>
                      @endif
                    </div>
                    @auth
                    <div class="row">
                      <form action="{{route('comment.store')}}" method="POST">
                        @csrf
                        <div class="col-sm-12">
                          <div class="row">
                            <label for="comment" class="col-sm-4">Comment</label>
                            <input type="text" name="comment" class="col-sm-8">
                            <input type="hidden" name="post_id" value="{{$data->id}}">
                          </div>
                        </div>
                        <button type="submit">Submit</button>
                      </form>
                    </div>
                  </div>
                  @endauth
                  <div class="card-footer">
                    <strong>By:</strong>@if ($data)
                      {{$data->user->name}}
                    @endif
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
  {{-- @include('includes.aside') --}}
@endsection