@extends('_layouts.main')

@section('body')

    <h1>Articoli</h1>

    <p>Total of {{ $articoli->count() }} posts</p>

    <ul>
        @foreach ($articoli as $post)
            <li>
                <a href="{{ $post->getPath() }}">
                    {{ $post->title }}
                </a>
            </li>
        @endforeach
    </ul>

@endsection
