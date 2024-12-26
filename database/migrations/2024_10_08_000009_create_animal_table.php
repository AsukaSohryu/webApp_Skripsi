
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
        Schema::dropIfExists('animal');
        Schema::create('animal', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('animal_id');
            $table->unsignedInteger('status_id');
            $table->text('detail_status');
            $table->string('animal_name');
            $table->string('animal_type');
            $table->date('birth_date');
            $table->string('sex');
            $table->string('race');
            $table->string('color');
            $table->decimal('weight');
            $table->text('vaccine');
            $table->tinyInteger('is_sterile');
            $table->tinyInteger('is_active');
            $table->text('source');
            $table->text('characteristics');
            $table->text('description');
            $table->text('medical_note');
            $table->text('photo');

            $table->index(["status_id"], 'fk_animal_status_configuration1_idx');
            $table->nullableTimestamps();


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
        Schema::dropIfExists('animal');
    }
};
