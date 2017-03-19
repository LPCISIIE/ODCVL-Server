<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;

Manager::schema()->create('client', function (Blueprint $table) {
    $table->increments('id');

    $table->string('nom')->nullable();
    $table->string('prenom')->nullable();
    $table->string('organisme')->nullable();
    $table->string('adresse')->nullable();
    $table->string('telephone')->nullable();
    $table->string('email')->unique();
    $table->timestamps();
});

Manager::schema()->create('location', function (Blueprint $table) {
    $table->increments('id');
    $table->unsignedInteger('client_id');

    $table->date('date_debut');
    $table->date('date_fin');
    $table->date('created_at');
    $table->date('updated_at');

    $table->enum('status', ['active','inactive','completed'])->default('inactive');
    $table->decimal('prix',9,2);
    $table->unsignedInteger('client_id');

    $table->foreign('client_id')->references('id')->on('client');
});

Manager::schema()->create('item_location', function (Blueprint $table) {
    $table->unsignedInteger('location_id');
    $table->unsignedInteger('item_id');

    $table->primary(['location_id', 'item_id']);
    $table->foreign('location_id')->references('id')->on('location')->onDelete('cascade');;
    $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade');
});
