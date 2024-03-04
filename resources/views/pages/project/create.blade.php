@extends('layouts.app')

@section('head')
    <title>Nuovo Progetto</title>
@endsection

@section('content')
    <h1>Nuovo Progetto</h1>
    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Nome Progetto:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="description">Descrizione:</label>
        <textarea id="description" name="description"></textarea>
        <br>
        <label for="type_id">Tipo di Progetto:</label>
        <select name="type_id" id="type_id">
            @foreach($types as $type)
                <option value="{{ $type->id }}">
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="technology_id">Tecnologie:</label>
        @foreach($technologies as $technology)
            <div>
                <input 
                    type="checkbox" 
                    id="technology_{{ $technology->id }}" 
                    name="technology_id[]" 
                    value="{{ $technology->id }}"
                >
                <label for="technology_{{ $technology->id }}">
                    {{ $technology->name }}
                </label>
            </div>
        @endforeach
        <br>
        <label for="image">Image</label>
        <input type="file" name="image" id="image" accept="image/*">
        <br>
        <button type="submit">Crea Progetto</button>
    </form>
@endsection
