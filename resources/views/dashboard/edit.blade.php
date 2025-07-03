@extends('layouts.app')

@section('content')
    <h1>Редагувати нотатку</h1>

    <form action="{{ route('notes.edit', ['noteId' => $note->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input type="text" name="title" class="form-control" value="{{ $note->title }}" required>
        </div>
        <div class="mb-3">
            <textarea name="body" class="form-control" rows="5" required>{{ $note->body }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Зберегти</button>
        <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Назад</a>
    </form>

@endsection
