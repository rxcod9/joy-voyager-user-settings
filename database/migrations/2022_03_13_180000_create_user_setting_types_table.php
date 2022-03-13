<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSettingTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_setting_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->string('display_name');
            $table->text('details')->nullable()->default(null);
            $table->string('type');
            $table->integer('order')->default('1');
            $table->string('group')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_setting_types');
    }
}
