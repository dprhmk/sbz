<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <!-- Відображення повідомлення про успіх -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('id'))
        <div class="alert alert-success">
            {{ session('id') }}
        </div>
    @endif

    <form action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>Форма</h2>

        <label for="surname">Прізвище</label>
        <input type="text" id="surname" name="surname" required>

        <label for="name">Ім'я</label>
        <input type="text" id="name" name="name" required>

        <label for="age">Вік</label>
        <input type="number" id="age" name="age" required>

        <label for="photo">Завантажити фото</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>

        <button type="submit">Відправити</button>
    </form>
</div>
</body>
</html>
