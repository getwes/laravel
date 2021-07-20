<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaSeries extends Migration
{
    /** // php artisan list
     * //php artisan make:migration criar_tabela_series
     * Run the migrations. //php artisan migrate
     *
     * @return void
     */
    public function up()
    {
        schema::create('series', function (blueprint $table){});
        $table-> string ('nome');
    });

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('series');
    }
}
