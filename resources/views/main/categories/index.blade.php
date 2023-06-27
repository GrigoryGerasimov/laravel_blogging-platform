@extends('layouts.main')

@section('main-content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Categories</h1>
            <section class="featured-posts-section">
                <ul class="navbar-nav">
                    @foreach($categoriesList as $category)
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="{{ route('category.show', $category) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
                {{ $categoriesList->links() }}
            </section>
        </div>
    </main>
@endsection
