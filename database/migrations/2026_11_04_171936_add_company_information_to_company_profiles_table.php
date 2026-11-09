
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->text('business_license')->nullable();
            $table->text('address')->nullable();
            $table->string('covered_area')->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('email')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'business_license',
                'address',
                'covered_area',
                'phone',
                'email',
            ]);
        });
    }
};
