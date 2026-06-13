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
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
            $table->string('mobile_number', 20)->nullable()->after('email');
            $table->text('address')->nullable()->after('mobile_number');
            $table->enum('status', [
                'active',
                'inactive',
                'suspended'
            ])->default('active')->after('address');

            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {

            $table->string('name');

            $table->dropColumn([
                'first_name',
                'last_name',
                'mobile_number',
                'address',
                'status'
            ]);
        });
    }
};
