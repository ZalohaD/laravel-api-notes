{{-- resources/views/admin/user_profile.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1>Профіль користувача</h1>

        <div class="mb-4">
            <h3>Інформація про користувача</h3>
            <p><strong>Ім'я:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Телефон:</strong> {{ $user->phone }}</p>
            <p><strong>Статус:</strong>
                @if($user->is_active != 1)
                    <span class="text-danger">Видалений</span>
                @else
                    <span class="text-success">Активний</span>
                @endif
            </p>
        </div>

        <div>
            <h3>Заметки користувача</h3>

            @if($user->notes->isEmpty())
                <p>Заметок немає.</p>
            @else
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Назва</th>
                        <th>Текст</th>
                        <th>Створено</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user->notes as $index => $note)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $note->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($note->body, 50) }}</td>
                            <td>{{ $note->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            <a href="{{ route('deactivate.user', ['user_id' => $user->id]) }}"
               onclick="event.preventDefault(); document.getElementById('deactivate-form-{{ $user->id }}').submit();">
                Вимкнути користувача
            </a>

            <form id="deactivate-form-{{ $user->id }}" action="{{ route('deactivate.user', ['user_id' => $user->id]) }}" method="POST" style="display: none;">
                @csrf
            </form>        </div>
    </div>
@endsection
