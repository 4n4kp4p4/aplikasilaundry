<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id')->autoIncrement()->unique();
            $table->string('no_identitas')->unique();
            $table->string('nama_member');
            $table->text('alamat');
            $table->string('no_hp');
            $table->date('tgl_join');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
