@extends('layout.layout')

@section('styles')
    <style>
        img {
            max-width: 200px;
            max-height: 200px;
        }

    </style>
@endsection

@section('title')
    Article
@endsection

@section('content')
    <main class="container mt-5 px-5">
        <a href="{{ route('articles.create') }}" class="btn btn-success mb-3">Add Article</a>
        <section class="container border rounded px-0">
            <h4 class="border-bottom px-4 py-2 bg-secondary bg-opacity-10">Articles</h4>
            @foreach ($articles as $article)
                <div class="border-bottom mb-3 p-3">
                    <div>Title: <b>{{ $article->title }}</b>
                    </div>
                    @if ($article->image != null)
                        <img src="{{ asset('storage/uploads/' . $article->image) }}" alt="">
                    @endif
                    <p>Category: {{ $article->category->name }}</p>
                    <p>Body: {{ substr($article->body, 0, 50) }}...
                        <a href="{{ route('articles.show', ['article' => $article->id]) }}">Read More</a>
                    </p>
                    <div class="d-flex gap-2">
                        <div>
                            <a href="{{ route('articles.edit', ['article' => $article->id]) }}"
                                class="btn btn-primary">Edit</a>
                        </div>
                        <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
            {{ $articles->links() }}
        </section>
    </main>
@endsection