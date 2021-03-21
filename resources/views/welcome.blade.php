@extends('layouts.app')

@section('content')
    {{-- {{dd($data)}} --}}
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
          <div class="container">
            <div class="row mt-5">
              <!-- Latest Posts -->
              <main class="posts-listing col-lg-8"> 
                <div class="container">
                  <div class="row">
                    <!-- post -->
                    @if($data)
                      @foreach ($data as $key => $value)
                      <div class="post col-xl-6 mt-3">
                        <div class="post-thumbnail"><a href="{{route('post.show',$value->id)}}"><img src="{{url('/posts/images/fullimage/'.$value->full_img)}}" alt="..." class="img-fluid"></a></div>
                        <div class="post-details">
                          <div class="post-meta d-flex justify-content-between">
                            <div class="date meta-last">{{$value->created_at->diffForHumans()}}</div>
                            <div class="category"><a href="#">{{$value->category->title}}</a></div>
                          </div><a href="{{route('post.show',$value->id)}}">
                                  <h3 class="h4">{{$value->title}}</h3></a>
                                  <p class="text-muted">{{$value->detail}}</p>
                          <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                              <div class="avatar"><img src="{{url('/postimage/avatar-3.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
                              <div class="title"><span>{{$value->user->name}}</span></div></a>&nbsp;&nbsp;
                            <div class="date"><i class="icon-clock"></i>{{$value->updated_at->diffForHumans()}}</div>
                            <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                          </footer>
                        </div>
                      </div>
                     @endforeach
                    @endif
                  </div>
                  <!-- Pagination -->
                     <div class="d-flex justify-content-center">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                {{ $data->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>  
                    </div>
                  {{-- <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-template d-flex justify-content-center">
                      <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
                      <li class="page-item"><a href="#" class="page-link active">1</a></li>
                      <li class="page-item"><a href="#" class="page-link">2</a></li>
                      <li class="page-item"><a href="#" class="page-link">3</a></li>
                      <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
                    </ul>
                  </nav> --}}
                </div>
              </main>
              @include('includes.aside')
            </div>
          </div>
        </div>
    </body>
@endsection
