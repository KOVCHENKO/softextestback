<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_chimp_members', function (Blueprint $table) {
            $table->string('id');
            $table->string('email_address');
            $table->string('email_type')->nullable();
            $table->string('status');
            $table->text('merge_fields')->nullable();
            $table->text('interests')->nullable();
            $table->string('language')->nullable();
            $table->string('vip')->nullable();
            $table->text('location')->nullable();
            $table->string('list_id');
            $table->string('mail_chimp_id');
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
        Schema::dropIfExists('members');
    }
}
