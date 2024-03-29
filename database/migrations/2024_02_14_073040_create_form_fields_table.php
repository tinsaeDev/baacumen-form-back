<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("type");


            $table->json("options")->default("[]");

            // Validation
            $table->boolean("required_field")->default(true);
            $table->string("regex")->nullable();
            $table->integer("min")->nullable();
            $table->integer("max")->nullable();


            // Relations
            $table->foreignId('form_id')->constrained();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_fields');
    }
};
