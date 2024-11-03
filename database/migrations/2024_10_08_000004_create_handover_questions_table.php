
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
        Schema::dropIfExists('handover_questions');
        Schema::create('handover_questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('handover_questions_id');
            $table->longText('questions');
            $table->tinyInteger('is_active');
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('handover_questions');
    }
};
