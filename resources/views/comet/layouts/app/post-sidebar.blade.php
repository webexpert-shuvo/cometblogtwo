<div class="col-md-3 col-md-offset-1">
    <div class="sidebar hidden-sm hidden-xs">
      <div class="widget">
        <h6 class="upper">Search blog</h6>
        <form>
          <input type="text" placeholder="Search.." class="form-control">
        </form>
      </div>
      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Categories</h6>
        <ul class="nav">

            @php
                $category =  App\Models\Category::where('status' , 'Active')->latest()->get();
            @endphp


            @foreach ($category  as $cate)
                <li>
                    <a href="#">{{ $cate -> name }}</a>
                </li>
            @endforeach



        </ul>
      </div>
      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Popular Tags</h6>
        <div class="tags clearfix">

            @php
                $alltags  = App\Models\Tag::where('status','Active')->latest()->get();
            @endphp

            @foreach ($alltags as $tags)
                <a href="#">{{ $tags -> name }}</a>
            @endforeach


        </div>
      </div>
      <!-- end of widget      -->
      <div class="widget">
        <h6 class="upper">Latest Posts</h6>
        <ul class="nav">


            @php
                $allPosts =  App\Models\Post::where('status' , 'Active')->take(5)->latest()->get();
            @endphp

            @foreach ($allPosts as $posts)
                <li>
                    <a href="#">{{ $posts -> name }}<i class="ti-arrow-right"></i><span>{{ date('d , M Y' , strtotime($posts -> created_at)) }}</span></a>
                </li>
            @endforeach








        </ul>
      </div>
      <!-- end of widget          -->
    </div>
    <!-- end of sidebar-->
  </div>
