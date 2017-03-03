<?php
use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Native\SentinelBootstrapper;

$sentinel = (new Sentinel(new SentinelBootstrapper(__DIR__ . '/../sentinel.php')))->getSentinel();
Manager::schema()->create('location', function (Blueprint $table) {
    $table->increments('id');
    $table->date('date_debut');
    $table->date('date_fin');
    $table->integer('client_id')->unsigned();
    $table->foreign('client_id')->references('id')->on('client');
});

Manager::schema()->create('location_item', function (Blueprint $table) {
    $table->integer('location_id')->unsigned();
    $table->integer('item_id')->unsigned();
    $table->primary(['location_id', 'item_id']);
    $table->foreign('location_id')->references('id')->on('location');
    $table->foreign('item_id')->references('id')->on('item');
});
Manager::schema()->create('client', function (Blueprint $table) {
$table->increments('id');
$table->string('nom')->nullable();
$table->string('prenom')->nullable();
$table->string('organisme')->nullable();
$table->string('adresse')->nullable();
$table->string('telephone')->nullable();
$table->string('email')->unique();
});