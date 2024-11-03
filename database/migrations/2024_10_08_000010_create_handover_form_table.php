
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
        Schema::dropIfExists('handover_form');
        Schema::create('handover_form', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('handover_form_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id');
            $table->text('photo');
            $table->tinyInteger('is_seen');

            $table->index(["user_id"], 'fk_handover_form_user_idx');

            $table->index(["status_id"], 'fk_handover_form_status_configuration1_idx');
            $table->nullableTimestamps();


            $table->foreign('user_id')
                ->references('user_id')->on('user')
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
        Schema::dropIfExists('handover_form');
    }
};
