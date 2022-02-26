<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('description', 500)->nullable()->change();
            $table->text('notes')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('transactions')
            ->whereNull('description')
            ->update(['description' => '']);

        DB::table('transactions')
            ->whereNull('notes')
            ->update(['notes' => '']);

        Schema::table('transactions', function (Blueprint $table) {
            $table->string('description', 500)->change();
            $table->text('notes')->change();
        });
    }
};
