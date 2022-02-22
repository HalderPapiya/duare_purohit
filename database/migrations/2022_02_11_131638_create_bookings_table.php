<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userId');
            $table->bigInteger('pujaId');
            $table->string('uniqueId');
            $table->decimal('amount', 10, 2);
            $table->decimal('advance_amount', 10, 2);
            $table->decimal('after_service', 10, 2);
            // $table->float('amount', 5, 2);
            // $table->float('advance_amount', 5, 2);
            // $table->float('after_service', 5, 2);
            $table->string('date');
            $table->string('time');
            $table->string('address');
            $table->string('city');
            $table->string('landmark');
            $table->string('pin');
            $table->tinyInteger('status')->default('1')->comment('1 = New, 2 = Purohit Assigned, 3 = Puja Complete, 4 = Complete Payment Receive, 5 = Cancel');
            $table->tinyInteger('is_paid')->default(0)->comment('0 = UnPaid, 1 = Paid');
            $table->string('transaction_id')->nullable();
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}