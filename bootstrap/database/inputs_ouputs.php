<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;

Manager::schema()->create('input', function (Blueprint $table) {
    $table->increments('id');
    $table->date('date_entree');
    $table->date('date_sortie');
    $table->date('created_at');
    $table->date('updated_at');
    $table->unsignedsmallInteger('status')->default(0);
    $table->unsignedInteger('location_id');
    $table->foreign('location_id')->references('id')->on('location');
});

Manager::schema()->create('output', function (Blueprint $table) {
    $table->increments('id');
    $table->date('date_sortie');
    $table->date('date_retour');
    $table->date('created_at');
    $table->date('updated_at');
    $table->unsignedsmallInteger('status')->default(0);
    $table->unsignedInteger('location_id');
    $table->foreign('location_id')->references('id')->on('location');
});