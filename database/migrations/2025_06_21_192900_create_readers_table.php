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
        Schema::create('readers', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();            
            $table->char('cpf', 11);
            $table->string('full_name', 100);
            $table->date('birthday');
            $table->char('cellphone', 11);
            $table->char('zip_code', 9);
            $table->string('street');
            $table->string('neighborhood');
            $table->string('city');
            $table->enum('state', [
                'AC', 
                'AL', 
                'AP', 
                'AM', 
                'BA', 
                'CE', 
                'DF', 
                'ES', 
                'GO', 
                'MA', 
                'MT', 
                'MS', 
                'MG', 
                'PA', 
                'PB', 
                'PR', 
                'PE', 
                'PI', 
                'RJ', 
                'RN', 
                'RS', 
                'RO', 
                'RR', 
                'SC', 
                'SP', 
                'SE', 
                'TO'
            ]);
            $table->string('number', 10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readers');
    }
};
