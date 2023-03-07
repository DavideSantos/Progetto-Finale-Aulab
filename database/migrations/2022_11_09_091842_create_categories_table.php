<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        // array per le categorie
        $categories = [
            'Arredamento',
            'Libri',
            'Elettronica',
            'Musica',
            'Collezionismo',
            'Casa e Giardino',
            'Giochi',
            'Generi Alimentari',
            'Abbigliamento',
            'Motori',
        ];
        // funzione di ciclo per compilare tutte le colonne della tabella 
        foreach($categories as $category)
        {
            Category::create(['name'=>$category]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
