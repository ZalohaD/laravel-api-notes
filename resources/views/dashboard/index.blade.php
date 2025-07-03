@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Заметки</h1>
    <a href="{{route('notes.settings')}}">
        Налаштування
    </a>


    <!-- Форма додавання нотатки -->
    <form action="{{ route('notes.create') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <input type="text" name="title" class="form-control" placeholder="Назва нотатки" required>
        </div>
        <div class="mb-3">
            <textarea name="body" class="form-control" rows="3" placeholder="Текст нотатки" required></textarea>
        </div>
        <button class="btn btn-success" type="submit">Додати нотатку</button>
    </form>
    <!-- Таблиця нотаток -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Назва</th>
            <th>Текст</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($notes as $note)
            <tr>
                <td>{{ $note->title }}</td>
                <td>{{ Str::limit($note->body, 50) }}</td>
                <td>
                    <a href="{{ route('notes.edit', $note) }}" class="btn btn-primary btn-sm">Редагувати</a>
                    <form action="{{ route('notes.delete', $note->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Видалити нотатку?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Видалити</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection
