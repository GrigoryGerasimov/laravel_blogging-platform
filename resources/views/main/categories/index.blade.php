@extends('layouts.main')

@section('main-content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Categories</h1>
            <section class="featured-posts-section">
                <ul class="list-group list-group-flush my-5">
                    @foreach($categoriesList as $category)
                        <li class="list-group-item">
                            <a class="list-item text-decoration-none text-dark" href="{{ route('category.show', $category) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
                {{ $categoriesList->links() }}
            </section>
        </div>
    </main>
@endsection
