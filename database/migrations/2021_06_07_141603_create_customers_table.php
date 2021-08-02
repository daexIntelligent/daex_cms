<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('customers')) {
            Schema::create('customers', function (Blueprint $table) {
                $table->increments('customer_id');
                $table->string('company_name_tw', 64);
                $table->string('company_name_en', 64);
                $table->string('company_code', 64);
                $table->string('vat_no', 64);
                $table->string('industry_id', 64);
                $table->string('company_address_tw', 64)->nullable();
                $table->string('company_address_en', 64)->nullable();
                $table->string('contact', 64);
                $table->string('email', 64);
                $table->string('mobile', 64)->nullable();
                $table->string('tel', 64)->nullable();
                $table->string('ext', 64)->nullable();
                $table->string('cloud_link', 64);
                $table->integer('status')->default(0);
                $table->json('service')->nullable();
                $table->integer('created_by');
                $table->integer('updated_by');
                $table->timestamps();
                $table->softDeletes();
                $table->unique('email');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
