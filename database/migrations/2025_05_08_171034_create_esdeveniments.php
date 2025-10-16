<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
        //         public function up(): void
        // {
        //     Schema::create('esdeveniments', function (Blueprint $table) {
        //         $table->id();
        //         $table->string('nom');
        //         $table->foreignId('categorie_id')->nullable() ->constrained('categories') ->cascadeOnUpdate() ->nullOnDelete();
        //         $table->text('descripcio')->nullable();
        //         $table->date('data');
        //         $table->time('hora');
        //         $table->integer('reserves')->default(0); 
        //         $table->integer('num_max_assistents');
        //         $table->integer('edat_minima')->default(0);
        //         $table->string('imatge')->nullable();
        //         $table->timestamps();
        //     });
        
        // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esdeveniment');
    }
};
