<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;

Manager::schema()->create('category', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->integer('parent_id')->unsigned()->nullable();
    $table->foreign('parent_id')->references('id')->on('category');
});

Manager::schema()->create('product', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->timestamps();
});

Manager::schema()->create('property', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
});

Manager::schema()->create('item', function (Blueprint $table) {
    $table->increments('id');
    $table->string('code')->unique();
    $table->integer('product_id')->unsigned();
    $table->date('purchased_at');
    $table->date('repaired_at')->nullable();
    $table->timestamps();
    $table->foreign('product_id')->references('id')->on('product');
});

Manager::schema()->create('category_product', function (Blueprint $table) {
    $table->integer('category_id')->unsigned();
    $table->integer('product_id')->unsigned();
    $table->primary(['category_id', 'product_id']);
    $table->foreign('category_id')->references('id')->on('category');
    $table->foreign('product_id')->references('id')->on('product');
});

Manager::schema()->create('product_property', function (Blueprint $table) {
    $table->integer('product_id')->unsigned();
    $table->integer('property_id')->unsigned();
    $table->boolean('required')->default(false);
    $table->primary(['product_id', 'property_id']);
    $table->foreign('product_id')->references('id')->on('product');
    $table->foreign('property_id')->references('id')->on('property');
});

Manager::schema()->create('category_property', function (Blueprint $table) {
    $table->integer('category_id')->unsigned();
    $table->integer('property_id')->unsigned();
    $table->boolean('required')->default(false);
    $table->primary(['category_id', 'property_id']);
    $table->foreign('category_id')->references('id')->on('category');
    $table->foreign('property_id')->references('id')->on('property');
});

Manager::schema()->create('item_property', function (Blueprint $table) {
    $table->integer('item_id')->unsigned();
    $table->integer('property_id')->unsigned();
    $table->string('value');
    $table->primary(['item_id', 'property_id']);
    $table->foreign('item_id')->references('id')->on('item');
    $table->foreign('property_id')->references('id')->on('property');
});
