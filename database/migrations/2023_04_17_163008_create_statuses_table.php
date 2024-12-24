<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('name', 50);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement('ALTER TABLE statuses MODIFY COLUMN id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
