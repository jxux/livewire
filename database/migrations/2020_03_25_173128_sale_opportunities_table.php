<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SaleOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_opportunities', function (Blueprint $table) {
           
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->uuid('external_id');
            $table->unsignedBigInteger('establishment_id');
            $table->json('establishment');
            $table->char('soap_type_id', 2);
            $table->char('state_type_id', 2);   
            $table->string('prefix'); 
            $table->date('date_of_issue');
            $table->time('time_of_issue');
            $table->unsignedBigInteger('customer_id');
            $table->json('customer');
            $table->string('currency_type_id');
            $table->decimal('exchange_rate_sale', 13, 3);
            $table->decimal('total_exportation', 12, 2)->default(0);
            $table->decimal('total_free', 12, 2)->default(0);
            $table->decimal('total_taxed', 12, 2)->default(0);
            $table->decimal('total_unaffected', 12, 2)->default(0);
            $table->decimal('total_exonerated', 12, 2)->default(0);
            $table->decimal('total_igv', 12, 2)->default(0);
            $table->decimal('total_taxes', 12, 2)->default(0);
            $table->decimal('total_value', 12, 2)->default(0);
            $table->decimal('total', 12, 2);
            $table->string('filename')->nullable(); 
            $table->text('detail')->nullable(); 
            $table->text('observation')->nullable(); 

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->foreign('customer_id')->references('id')->on('persons');
            $table->foreign('soap_type_id')->references('id')->on('soap_types');
            $table->foreign('state_type_id')->references('id')->on('state_types');  
            $table->foreign('currency_type_id')->references('id')->on('cat_currency_types');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_opportunities');        
    }
}
