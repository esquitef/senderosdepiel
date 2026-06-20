<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bolsas', function (Blueprint $table) {
            $table->decimal('valor_fabrica', 10, 2)->default(0)->after('precio');
        });
    }

    public function down(): void
    {
        Schema::table('bolsas', function (Blueprint $table) {
            $table->dropColumn('valor_fabrica');
        });
    }
};