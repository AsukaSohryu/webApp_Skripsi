
<?php
        /**
     *namespace Database\Migrations;
     */


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends Migration
{
        /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('status_configuration');
        Schema::create('status_configuration', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('status_id');
            $table->string('config');
            $table->string('key');
            $table->string('status');
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('status_configuration');
    }
};
