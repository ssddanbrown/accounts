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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('short_name', 10)->default('🏷️');
        });

        Category::query()->chunk(100, function ($categories) {
            foreach ($categories as $category) {
                $parts = explode(' ', $category->name, 2);
                $category->name = $parts[1] ?? $parts[0];
                $category->short_name = $parts[0];
                $category->save();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('short_name');
        });
    }
};
