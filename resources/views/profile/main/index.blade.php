@extends('profile.layouts.main')

@section('profile-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row my-3">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profile Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $favouritesCount }}</h3>

                                <p>Total Favourite Posts</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon far fa-heart"></i>
                            </div>
                            <a href="{{ route('profile.favourite.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $postsCount }}</h3>

                                <p>My Total Posts</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon far fa-comment-alt"></i>
                            </div>
                            <a href="{{ route('profile.post.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $commentsCount }}</h3>

                                <p>My Total Comments</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon far fa-comments"></i>
                            </div>
                            <a href="{{ route('profile.comment.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
