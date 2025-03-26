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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 50)->unique()->after('id');
            $table->string('phone', 20)->nullable()->after('password');
            $table->text('address')->nullable()->after('phone');
            $table->foreignId('avatar')->nullable()->constrained('upload_files')->onDelete('set null');
            $table->foreignId('role_id')->constrained('roles')->onDelete('restrict');
            $table->enum('status', ['active', 'inactive'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['avatar']);
            $table->dropForeign(['role_id']);
            $table->dropColumn(['username', 'phone', 'address', 'avatar', 'role_id', 'status']);
        });
    }
};
