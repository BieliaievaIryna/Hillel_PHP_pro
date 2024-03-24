@extends('main')
@section('title') {{ $title }} @endsection
@section('content')
        <section id="navArea">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav main_nav">
                        <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                        <li><a href="#">Category</a></li>
                        <li> <a>Post</a> </li>
                    </ul>
                </div>
            </nav>
        </section>
        <section id="contentSection">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="left_content">
                        <div class="single_post_content">
                            <h2><span>Post and last comments</span></h2>
                            <div class="single_post_content_left">
                                <ul class="business_catgnav  wow fadeInDown">
                                    <li>
                                        <figure class="bsbig_fig"> <a href="#" class="featured_img"> <img alt="" src="{{ Vite::image("featured_img1.jpg") }}"> <span class="overlay"></span> </a>
                                            <figcaption> <a href="#">{{ $post->title }}</a> </figcaption>
                                            <p>{{ $post->content }}</p>
                                        </figure>
                                    </li>
                                </ul>
                            </div>
                            <div class="single_post_content_right">
                                <ul class="spost_nav">
                                    @foreach ($comments as $comment)
                                         <li>
                                            <div class="media wow fadeInDown"> <div class="media-left"> <img alt="" src="{{ Vite::image("post_img2.jpg") }}"> </div>
                                                <div class="media-body">
                                                    <h5 class="catg_title">{{ $comment->comment }}</h5>
                                                    <p>{{ $comment->created_at }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

