@extends('layouts.app')

@section('content')

    <h1 class="text-center pt-4">Всі нотатки користувачів</h1>

    <div class="container table-responsive py-5">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ім’я користувача</th>
                <th scope="col">Назва нотатки</th>
                <th scope="col">Текст</th>
                <th scope="col">Дата створення</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($notes as $index => $note)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td><a href="{{ route('user.profile', $note->user) }}">{{ $note->user->name ?? 'Невідомо' }}</a></td>

                    <td>{{ $note->title }}</td>
                    <td>{{ Str::limit($note->body, 50) }}</td>
                    <td>{{ $note->created_at->format('d.m.Y H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <p class="text-center">Список нотаток усіх користувачів</p>

@endsection
