@extends('layouts.app')
@section('head')
    <title>Types</title>
@endsection

@section('content')

    <h1>Types</h1>
    <div style="width: 400px; margin: 0 auto">
        <ul>
            @foreach ($types as $type)
            <li>
                <strong>{{ $type -> name }} : </strong>
                {{ count($type -> projects) }}
                <br>
                <ul>
                    @foreach ($type -> projects as $project)
                        <li>
                            {{ $project -> name }}
                        </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
@endsection