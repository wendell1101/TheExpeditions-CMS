@extends('layouts.blog')

@section('title')
The Expeditions | Dashboard
@endsection


  <!-- Header -->
  @section('header')
  <header class="header text-center text-white banner">
    <div class="container">

      <div class="row">
        <div class="col-md-8 mx-auto">

          <h1 class="text-light banner-text">Sometimes it's the journey that teaches you a lot about your destination.</h1>
          <p class="lead-2 opacity-90 mt-6 banner-text-sub">Share your fantastic stories to inspire others</p>

        </div>
      </div>

    </div>
  </header><!-- /.header -->
  @endsection

  <!-- Main Content -->
  @section('content')
  <main class="main-content">
    <div class="section bg-gray">
      <div class="container">
        <div class="row">


          <div class="col-md-8 col-xl-9">
            <div class="row gap-y">
              @forelse($posts as $post)
              <div class="col-md-6">
                <div class="card border hover-shadow-6 mb-6">
                  <div >
                    <a href="{{ route('blog.show', $post->slug) }}" >
                      <img class="img-fluid " src="{{ asset('storage/'.$post->image) }}" alt="Card image" style="width:100%; min-height:200px!important">
                    </a>
                  </div>

                  <div class="p-6 text-center" style="z-index:10!important">
                    <p><span class="small-5 text-uppercase">{{ $post->category->name}}</span></p>
                    <h5 class="mb-0"><a class="text-dark" href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h5>
                  </div>
                </div>
              </div>
              @empty
                @if(request()->query('search'))
                <h2 class="text-muted text-center">No posts found for "{{request()->query('search')}}"</h2>
                @else
                <h2 class="text-muted text-center">No Post Yet</h2>
                @endif
              @endforelse


            </div>
            <span style="z-index:10!important">
            {{ $posts->appends(['search' => request()->query('search')])->links() }}
            </span>




          </div>



          <div class="col-md-4 col-xl-3">
            <div class="sidebar px-4 py-md-0">

              <h6 class="sidebar-title">Search</h6>
              <form class="input-group" action="{{ route('welcome.index')}}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Search"
                  value="{{ request()->query('search') }}"
                >
                <div class="input-group-addon">
                  <span class="input-group-text"><i class="ti-search"></i></span>
                </div>
              </form>

              <hr>

              <h6 class="sidebar-title">Categories</h6>
              <div class="row link-color-default fs-14 lh-24">
                @foreach($categories as $category)
                <div class="col-6"><a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a></div>
                @endforeach


              </div>

              <hr>

              <!-- <h6 class="sidebar-title">Top posts</h6>
                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/4.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Thank to Maryam for joining our team</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/3.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Best practices for minimalist design</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/5.jpg">
                  <p class="media-body small-2 lh-4 mb-0">New published books for product designers</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/2.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Top 5 brilliant content marketing strategies</p>
                </a>

                <hr> -->

              <h6 class="sidebar-title">Tags</h6>
              <div class="gap-multiline-items-1">
                @foreach($tags as $tag)
                <a class="badge badge-secondary" href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
                @endforeach
              </div>

              <hr>

              <h6 class="sidebar-title">About</h6>
              <p class="small-3">This website was built to inspire everyone to enjoy their journey no matter what the outcome will be</p>


            </div>
          </div>

        </div>
      </div>
    </div>
  </main>
  @endsection


</body>

</html>