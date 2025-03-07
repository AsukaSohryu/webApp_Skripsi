
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
        Schema::dropIfExists('handover_answers');
        Schema::create('handover_answers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('handover_form_id');
            $table->unsignedInteger('handover_questions_id');
            $table->longText('answer');
            $table->nullableTimestamps();

            $table->index(["handover_form_id"], 'fk_handover_questions_has_handover_form_handover_form1_idx');

            $table->index(["handover_questions_id"], 'fk_handover_questions_has_handover_form_handover_questions1_idx');


            $table->foreign('handover_questions_id')
                ->references('handover_questions_id')->on('handover_questions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('handover_form_id')
                ->references('handover_form_id')->on('handover_form')
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
        Schema::dropIfExists('handover_answers');
    }
};
