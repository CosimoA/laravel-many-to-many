@extends('layouts.app')
@section('head')
    <title>Projects</title>
@endsection

@section('content')

    <h1>Projects</h1>
    <div>
        <a href="{{ route('project.create') }}">Aggiungi Progetto</a>
    </div>
    <ul>
        @foreach ($projects as $project)
        <li>
            <strong>{{ $project -> name }} : </strong>{{ $project -> type -> name }}
            <br>
            <Strong>Technologies: </Strong>
            <ul>
                @foreach ($project -> technologies as $technology)
                    <li>
                        {{ $technology -> name }}
                    </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>

@endsection