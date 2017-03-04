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
});
Manager::schema()->create('location', function (Blueprint $table) {
    $table->increments('id');
    $table->date('date_debut');
    $table->date('date_fin');
    $table->unsignedInteger('client_id');
    $table->foreign('client_id')->references('id')->on('client');
});

Manager::schema()->create('location_item', function (Blueprint $table) {
    $table->increments('id');
    $table->unsignedInteger('location_id');
    $table->unsignedInteger('item_id');
    $table->foreign('location_id')->references('id')->on('location');
    $table->foreign('item_id')->references('id')->on('item');
});
