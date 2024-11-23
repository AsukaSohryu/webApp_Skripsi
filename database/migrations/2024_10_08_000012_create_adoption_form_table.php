
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
        Schema::dropIfExists('adoption_form');
        Schema::create('adoption_form', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('adoption_form_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('animal_id');
            $table->unsignedInteger('status_id');
            $table->tinyInteger('is_seen');
            $table->text('admin_feedback')->nullable();

            $table->index(["user_id"], 'fk_adoption_form_user1_idx');

            $table->index(["animal_id"], 'fk_adoption_form_animal1_idx');

            $table->index(["status_id"], 'fk_adoption_form_status_configuration1_idx');
            $table->nullableTimestamps();


            $table->foreign('user_id')
                ->references('user_id')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('animal_id')
                ->references('animal_id')->on('animal')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('status_id')
                ->references('status_id')->on('status_configuration')
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
        Schema::dropIfExists('adoption_form');
    }
};
