<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase; // Очищает базу после каждого теста

    public function test_user_can_create_a_book()
    {
        // 1. Эмулируем отправку формы
        $response = $this->post('/books', [
            'title' => 'Тестовая книга',
            'year' => 2023,
            'description' => 'Это тестовое описание',
        ]);

        // 2. Проверяем, что произошел редирект
        $response->assertRedirect('/books');

        // 3. Проверяем, что книга добавилась в БД
        $this->assertDatabaseHas('books', [
            'title' => 'Тестовая книга'
        ]);
    }
}
