@extends('comet.layouts.app.app')

@section('comet-content')
<section>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="blog-posts">

            @foreach ($postsdata as $posts)

                @php
                    $featured_data =  json_decode($posts -> featured);
                    //print_r($featured_data->post_gall);


                @endphp


                <article class="post-single">
                    <div class="post-info">
                    <h2><a href="#">{{$posts -> name  }}</a></h2>
                    <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>28 September 2015</span><span class="dot"></span><a href="#" class="post-tag">Startups</a></h6>
                    </div>

                    @if ($featured_data -> post_type == 'Single')
                        <div class="post-media">
                            <a href="#">
                                <img src="{{ URL::to('') }}/backend/assets/img/posts/{{$featured_data ->  single  }}" alt="">
                            </a>
                        </div>
                    @endif


                     @if ($featured_data -> post_type == 'Gallery')
                        <div class="post-media">
                            <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                            <ul class="slides">

                                @foreach ($featured_data->post_gall  as $gallimage)
                                    <li style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0.912063; display: block; z-index: 1;" class="">
                                    <img src="{{ URL::to('') }}/backend/assets/img/posts/{{ $gallimage }}" alt="" draggable="false">
                                  </li>
                                @endforeach

                            </ul>
                            </div>
                        </div>
                    @endif


                    <div class="post-body">

                        {!! Str::of(htmlspecialchars_decode($posts -> content))-> words(40) !!}

                    <p><a href="#" class="btn btn-color btn-sm">Read More</a>
                    </p>
                    </div>
                </article>
            @endforeach

            <!-- end of article-->
          </div>


          {{ $postsdata -> links('comet.layouts.app.paginate') }}





          <!-- end of pagination-->
        </div>


        @include('comet.layouts.app.post-sidebar')



      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->
  </section>
@endsection
