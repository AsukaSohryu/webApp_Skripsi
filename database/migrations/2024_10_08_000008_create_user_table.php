
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
        Schema::dropIfExists('user');
        Schema::create('user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('user_id');
            $table->unsignedInteger('shelter_id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->text('address');
            $table->string('job');
            $table->date('birth_date');
            $table->string('whatsapp_number');
            $table->string('phone_number');
            $table->text('photo');
            $table->string('role');
            $table->text('otp')->nullable();

            $table->index(["shelter_id"], 'fk_user_shelter_information1_idx');
            $table->nullableTimestamps();


            $table->foreign('shelter_id')
                ->references('shelter_id')->on('shelter_information')
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
        Schema::dropIfExists('user');
    }
};
