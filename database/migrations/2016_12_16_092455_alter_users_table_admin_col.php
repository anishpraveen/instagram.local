<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableAdminCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {            
            $table->enum('roles', ['user', 'admin'])->default('user')->after('email');	
            $table->enum('blocked', ['false', 'true'])->default('false')->after('roles');	
            $table->integer('block_counter')->default(0)->after('blocked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('roles');
            $table->dropColumn('blocked');
            $table->dropColumn('block_counter');
        });
    }
}
