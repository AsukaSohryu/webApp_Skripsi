
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
        Schema::dropIfExists('report_form');
        Schema::create('report_form', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('report_form_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id');
            $table->string('animal_type');
            $table->text('location');
            $table->text('location_map');
            $table->text('animal_photo');
            $table->text('location_photo');
            $table->text('additional_photo')->nullable();
            $table->longText('description');
            $table->tinyInteger('is_seen');
            $table->text('admin_feedback')->nullable();
            $table->text('admin_feedback_photo')->nullable();

            $table->index(["status_id"], 'fk_report_form_status_configuration1_idx');

            $table->index(["user_id"], 'fk_report_form_user1_idx');
            $table->nullableTimestamps();


            $table->foreign('status_id')
                ->references('status_id')->on('status_configuration')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id')
                ->references('user_id')->on('user')
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
        Schema::dropIfExists('report_form');
    }
};
