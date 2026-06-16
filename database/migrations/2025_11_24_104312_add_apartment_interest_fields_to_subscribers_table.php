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
        Schema::table('subscribers', function (Blueprint $table) {
            $table->boolean('interest_1_5')->default(false)->after('interest');
            $table->boolean('interest_2_5')->default(false)->after('interest_1_5');
            $table->boolean('interest_3_5')->default(false)->after('interest_2_5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscribers', function (Blueprint $table) {
            $table->dropColumn(['interest_1_5', 'interest_2_5', 'interest_3_5']);
        });
    }
};
