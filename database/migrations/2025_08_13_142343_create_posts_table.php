<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('url', 255); // ссылка на картинку
            $table->text('text')->nullable(); // подпись картинки, может отсутствовать
            $table->foreignId('user_id'); // создаём внешний ключ для связи таблиц
            $table->timestamps();

            $table->index('user_id'); // индекс, который б. индексировать таблицу по полю (все посты по конкретному пользователю)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
