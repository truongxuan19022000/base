<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();

            $table->string('name', 255);
            $table->integer('member_employee');

            $table->string('phone');
            $table->string('postal_code');
            $table->string('province_name');
            $table->string('district_name');
            $table->string('address')->nullable();

            $table->integer('payment_method_id')->nullable();

            $table->string('surname_kana')->nullable();
            $table->string('name_kana')->nullable();
            $table->string('surname_kanji')->nullable();
            $table->string('name_kanji')->nullable();

            $table->integer('manager_same')->default(0);

            $table->string('manager_surname_kana')->nullable();
            $table->string('manager_name_kana')->nullable();
            $table->string('manager_surname_kanji')->nullable();
            $table->string('manager_name_kanji')->nullable();
            $table->string('department')->nullable();
            
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
