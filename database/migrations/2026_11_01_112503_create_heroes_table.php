
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();

            $table->string('subtitle')->nullable();
            $table->string('headline');
            $table->text('description')->nullable();

            $table->string('hero_type')->default('image');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('video_poster')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();

            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
