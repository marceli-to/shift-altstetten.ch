<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Die Gewerbeobjekte liegen nicht in Melon/emonitor – die Objektschnittstelle
 * liefert ausschliesslich die Wohnungen. Sie werden deshalb lokal gehalten und
 * über /admin bewirtschaftet.
 */
return new class extends Migration
{
  public function up(): void
  {
    Schema::create('commercial_objects', function (Blueprint $table) {
      $table->id();
      $table->string('title', 10)->unique();
      $table->string('reference_number', 50)->nullable();
      $table->string('floor', 20);
      $table->tinyInteger('floor_num');
      $table->decimal('area', 8, 1);
      // Mietzinse sind bei der Übergabe noch offen (Excel folgt) – deshalb nullable.
      $table->unsignedInteger('rentalgross_net')->nullable();
      $table->unsignedInteger('incidentals')->nullable();
      $table->string('state', 10)->default('free');
      $table->string('layout_plan')->nullable();
      $table->string('updated_by', 100)->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('commercial_objects');
  }
};
