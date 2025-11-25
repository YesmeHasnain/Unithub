<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('id');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('location')->nullable()->after('email');
            $table->text('bio')->nullable()->after('location');
            $table->string('website')->nullable()->after('bio');
            $table->string('phone')->nullable()->after('website');
            $table->boolean('phone_private')->default(false)->after('phone');
            $table->string('profile_photo_path', 2048)->nullable()->after('phone_private');
        });

    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'first_name',
                'last_name',
                'location',
                'bio',
                'website',
                'phone',
                'phone_private',
                'profile_photo_path',
            ]);
        });
    }
};
