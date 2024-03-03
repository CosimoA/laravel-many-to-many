@extends('layouts.app')

@section('head')
    <title>Modifica Progetto</title>
@endsection

@section('content')
    <h1>Modifica Progetto</h1>
    <form action="{{ route('project.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome Progetto:</label>
        <input type="text" id="name" name="name" value="{{ $project->name }}">
        <br>
        
        <label for="description">Descrizione:</label>
        <textarea id="description" name="description">{{ $project->description }}</textarea>
        <br>

        <label for="type_id">Tipo di Progetto:</label>
        <select name="type_id" id="type_id">
            @foreach($types as $type)
                <option value="{{ $type->id }}" {{ $type->id == $project->type_id ? 'selected' : '' }}>
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
                    name="technology_ids[]"
                    value="{{ $technology->id }}"
                    id="technology_{{ $technology->id }}"
                    {{ $project->technologies->contains($technology) ? 'checked' : '' }}
                >
                <label for="technology_{{ $technology->id }}">{{ $technology->name }}</label>
            </div>
        @endforeach
        
        
        <br>
        
        <button type="submit">Aggiorna Progetto</button>
    </form>
@endsection
