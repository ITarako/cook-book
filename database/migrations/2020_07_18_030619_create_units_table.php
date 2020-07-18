<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUnitsTable extends Migration
{
    private $list = [
        'мг',
        'мл',
        'чайная ложка',
        'столовая ложка',
        'стакан',
        'щепотка',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        foreach ($this->list as $item) {
            DB::table('units')->insert([
                'name' => $item,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
