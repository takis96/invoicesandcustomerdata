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
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 191); // Define the email column with a length of 191 characters
            $table->string('token', 100)->notNull();
            $table->timestamp('created_at')->nullable();

            // Add unique constraint for the email column
            $table->unique('email', 'password_reset_tokens_email_unique');
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
