@extends('layouts.app')

@section('content')
    <h1>Налаштування</h1>

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf

        <h4>Змінити пароль</h4>
        <div class="mb-3">
            <label>Старий пароль</label>
            <input type="password" name="current_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Новий пароль</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Підтвердження нового паролю</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>

        <hr>

        <h4>Двофакторна аутентифікація</h4>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" name="two_factor_enabled" id="twoFactorCheckbox"
                {{ auth()->user()->two_factor_enabled ? 'checked' : '' }}>
            <label class="form-check-label" for="twoFactorCheckbox">
                Увімкнути двофакторну аутентифікацію (2FA)
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Зберегти налаштування</button>
    </form>

@endsection
