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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('doc_title')->nullable();
            $table->string('doc_type')->nullable();
            $table->string('emp_name')->nullable();
            $table->string('year')->nullable();
            $table->string('upload_file')->nullable();
            $table->integer('current_version')->default(1);
            $table->string('authorize')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};