<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;

Manager::schema()->create('category', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->unsignedInteger('parent_id')->nullable();
    $table->foreign('parent_id')->references('id')->on('category');
});

Manager::schema()->create('product', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->decimal('prix',9,2);
    $table->timestamps();
});

Manager::schema()->create('item', function (Blueprint $table) {
    $table->increments('id');
    $table->string('code')->unique();
    $table->enum('status', ['loué','disponible','indisponible']);
    $table->string('reparations')->nullable();
    $table->string('remarques')->nullable();
    $table->date('purchased_at');
    $table->unsignedInteger('product_id');
    $table->timestamps();
    $table->foreign('product_id')->references('id')->on('product');
});

Manager::schema()->create('category_product', function (Blueprint $table) {
    $table->unsignedInteger('category_id');
    $table->unsignedInteger('product_id');
    $table->primary(['category_id', 'product_id']);
    $table->foreign('category_id')->references('id')->on('category');
    $table->foreign('product_id')->references('id')->on('product');
});
