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
    Schema::create('providers', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->string('base_url');
      $table->string('base_api_url')->nullable();
      $table->text('account_id')->nullable();
      $table->text('client_id')->nullable();
      $table->text('client_secret')->nullable();
      $table->text('secret_token')->nullable();
      $table->boolean('active')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('providers');
  }
};
