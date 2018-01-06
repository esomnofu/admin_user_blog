@extends('user.layouts.app')
  
  @section('title', 'All Posts')

  @section('headerSection')
    <meta name="csrf-token" content="{{ csrf_token() }}">
  @endsection

    @section('main-content')


    <!-- Main Content -->
    <div class="container">

      <div class="row" id="app">

        <div class="col-lg-8 col-md-10 mx-auto">

          <posts 

          v-for = 'value in blog'

          :title=value.title
          :subtitle=value.subtitle
          :created_at=value.created_at
          :key=value.index
          :post-id=value.id
          :likes=value.likes.length
          :slug = value.slug
          login={{ Auth::check() }}



          ></posts>

          <!-- Pager -->
          <div class="clearfix">
            Older Posts
            {!! $posts->links() !!}
          </div>
        </div>
      </div>

    </div>

    <hr>

@endsection


@section('footerSection')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
