
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('operational_facilities', function (Blueprint $table) {
            $table->unsignedInteger('quantity')->nullable()->after('type');
            $table->string('capacity')->nullable()->after('quantity');
        });
    }

    public function down(): void
    {
        Schema::table('operational_facilities', function (Blueprint $table) {
            $table->dropColumn(['quantity', 'capacity']);
        });
    }
};
