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
    Schema::create('suppliers', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('phone_number')->nullable();
      $table->string('email')->nullable();
      $table->string('nid')->nullable();
      $table->string('address')->nullable();
      $table->unsignedInteger('country_id')->nullable();
      $table
        ->foreign('country_id')
        ->references('id')
        ->on('countries');
      $table->enum('status', ['Active', 'Inactive'])->default('Active');
      $table
        ->integer('created_by')
        ->unsigned()
        ->nullable();
      $table
        ->integer('updated_by')
        ->unsigned()
        ->nullable();
      $table
        ->integer('deleted_by')
        ->unsigned()
        ->nullable();
      $table->timestamp('deleted_at')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('suppliers');
  }
};
