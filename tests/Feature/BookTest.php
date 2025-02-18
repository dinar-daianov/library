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
            'author' => 'Тестовый автор',
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

    public function test_user_can_view_a_book()
    {
        $books = Book::factory()->count(3)->create();

        $response = $this->get('/books');

        $response->assertStatus(200);
        $response->assertSee($books[0]->title);
        $response->assertViewHas('books');
    }

    public function test_user_can_see_create_form()
    {
        $response = $this->get('/books/create');
        $response->assertStatus(200);
        $response->assertSee('Добавить книгу');
    }

    public function test_book_requires_a_title()
    {
        $response = $this->post('/books', [
            'author' => 'Тестовый автор',
            'year' => 2023,
        ]);
        $response->assertSessionHasErrors('title');
    }
    public function test_user_can_view_a_single_book()
    {
        $book = Book::factory()->create();

        $response = $this->get("/books/{$book->id}");
        $response->assertStatus(200);
        $response->assertSee($book->title);
    }

    public function test_user_can_see_edit_form()
    {
        $book = Book::factory()->create();

        $response = $this->get("/books/{$book->id}/edit");
        $response->assertStatus(200);
        $response->assertSee($book->title);
    }

    public function test_user_can_update_a_book()
    {
        $book = Book::factory()->create();

        $newData = [
            'title' => 'Обновленное название',
            'year' => 2023,
        ];

        $response = $this->put("/books/{$book->id}", $newData);
        $response->assertRedirect('/books');
        $this->assertDatabaseHas('books', $newData);
    }

    public function test_user_can_delete_a_book()
    {
        $book = Book::factory()->create();

        $response = $this->delete("/books/{$book->id}");
        $response->assertRedirect('/books');
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function test_show_404_for_invalid_book_id()
    {
        $response = $this->get('/books/9999'); // Несуществующий ID
        $response->assertStatus(404); // Ожидаем 404 Not Found
    }
}
