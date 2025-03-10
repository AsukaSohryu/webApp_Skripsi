
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
        Schema::dropIfExists('adoption_questions');
        Schema::create('adoption_questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('adoption_question_id');
            $table->text('questions');
            $table->tinyInteger('is_active');
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('adoption_questions');
    }
};
