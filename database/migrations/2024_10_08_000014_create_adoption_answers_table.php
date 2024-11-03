
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
        Schema::dropIfExists('adoption_answers');
        Schema::create('adoption_answers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('adoption_form_id');
            $table->unsignedInteger('adoption_questions_id');
            $table->text('answer');

            $table->index(["adoption_questions_id"], 'fk_adoption_form_has_adoption_questions_adoption_questions1_idx');

            $table->index(["adoption_form_id"], 'fk_adoption_form_has_adoption_questions_adoption_form1_idx');


            $table->foreign('adoption_form_id')
                ->references('adoption_form_id')->on('adoption_form')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('adoption_questions_id')
                ->references('adoption_question_id')->on('adoption_questions')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('adoption_answers');
    }
};
