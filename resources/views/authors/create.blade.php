<h1>Добвить автора</h1>

<form method="POST" action="/authors">
    @csrf
    <label for="name">Имя автора:</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="country">Название страны:</label>
    <input type="text" name="country" id="country" required>
    <br>
    <label for="brithday">День рождение автора:</label>
    <input type="date" name="brithday" id="brithday" required>
    <br>
    <label for="gender">Пол мужской\женский?:</label>
    <br>
    <label>
        <input type="radio" name="gender" value="Мужской" required>
    </label>
    <label>
        <input type="radio" name="gender" value="Мужской" required>
    </label>
    <br>
    <button type="submit">Сохранить</button>
</form>
