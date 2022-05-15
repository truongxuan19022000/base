<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableApplicationsDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('application_id')->unsigned();
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('subsidy_id')->unsigned();
            $table->foreign('subsidy_id')->references('id')->on('subsidies')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('negotiation_date')->nullable();
            $table->string('notes')->nullable();
            $table->double('price')->nullable();
            $table->string('price_interest')->nullable();
            $table->string('deadline_invoice')->nullable();
            $table->string('deadline_document')->nullable();
            $table->string('working_date_document')->nullable();
            $table->string('noti_delivery_file')->nullable();
            $table->string('display')->nullable();
            $table->string('memo')->nullable();
            $table->string('working_date_billing')->nullable();
            $table->string('deadline_preparation')->nullable();
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
        Schema::dropIfExists('applications_details');
    }
}
