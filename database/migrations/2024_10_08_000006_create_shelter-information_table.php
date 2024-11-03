
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
        Schema::dropIfExists('shelter_information');
        Schema::create('shelter_information', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('shelter_id');
            $table->string('shelter_name')->nullable();
            $table->text('shelter_logo')->nullable();
            $table->text('address')->nullable();
            $table->text('email')->nullable();
            $table->timestamp('operational_hour')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('donation_information')->nullable();
            $table->text('shelter_photo')->nullable();
            $table->text('about_shelter')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('founder_photo')->nullable();
            $table->text('history')->nullable();
            $table->text('additional_information')->nullable();
            $table->tinyInteger('is_accepting_report')->nullable();
            $table->tinyInteger('is_accepting_handover')->nullable();
            $table->tinyInteger('is_accepting_adoption')->nullable();
            $table->longText('report_information')->nullable();
            $table->longText('handover_information')->nullable();
            $table->longText('adoption_information')->nullable();
            $table->nullableTimestamps();
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('shelter_information');
    }
};
