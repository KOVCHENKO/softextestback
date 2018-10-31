<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_chimp_lists', function (Blueprint $table) {
            $table->string('id');
            $table->text('campaign_defaults');
            $table->text('contact');
            $table->string('email_type_option');
            $table->string('mail_chimp_id');
            $table->string('name');
            $table->string('notify_on_subscribe')->nullable();
            $table->string('notify_on_unsubscribe')->nullable();
            $table->string('permission_reminder');
            $table->string('use_archive_bar')->nullable();
            $table->string('visibility')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists');
    }
}
