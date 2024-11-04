<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugsToCategoriesAndSubcategories extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->unique()->after('name');
        });

        Schema::table('subcategories', function (Blueprint $table) {
            $table->string('slug')->unique()->after('name');
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}