<?php

use App\Model\Category;
use App\Model\Product;
use App\Model\Item;
use App\Model\Location;
use App\Model\Client;

$categories = [
    'Chaussure' => [
        'Chaussure de ski',
        'Chaussure de randonnée'
    ],
    'Ski' => [
        'Ski de fond',
        'Ski de piste'
    ],
    'Vélo' => [
        'VTT',
        'BMX',
        'Vélo de route',
        'Tandem'
    ],
    'Divers' => [

    ]
];

$products = [
    'HAWX MAGNA 110 ATOMIC',
    'ADVANTEDGE 105 HEAD',
    'ALLTRACK 120 ROSSIGNOL'
];

$items = [
    [
        'code' => 'BHVHV45',
        'product' => 1
    ],
    [
        'code' => 'IKNBG78',
        'product' => 2
    ],
    [
        'code' => 'FPHOI88',
        'product' => 1
    ],
];


$clients = [
    [
        'nom' => 'zakaria',
        'prenom' => 'elouarchi',
        'organisme' => 'UNIV LORRAINE',
        'adresse' => '17 rue du sangl',
        'telephone' => '0767767867',
        'email' => 're@gmail.com'
    ],
    [
        'nom' => 'kamel',
        'prenom' => 'remaki',
        'organisme' => 'IUT nancy',
        'adresse' => '8 rue aristid briand',
        'telephone' => '0667767867',
        'email' => 'kamel@gmail.com'
    ],
];

$locations = [
    [
        'date_debut' => '2017-03-09',
        'date_fin' => '2017-03-09',
        'status' => 0,
        'client_id' => 1
    ],
    [
        'date_debut' => '2017-03-09',
        'date_fin' => '2017-03-09',
        'status' => 0,
        'client_id' => 1
    ],
    [
        'date_debut' => '2017-03-09',
        'date_fin' => '2017-03-09',
        'status' => 0,
        'client_id' => 2
    ],
];



foreach ($categories as $category => $subCategories) {
    $c = new Category([
        'name' => $category
    ]);
    $c->save();

    foreach ($subCategories as $subCategory) {
        $sub = new Category([
            'name' => $subCategory
        ]);
        $sub->parent()->associate($c);
        $sub->save();
    }
}

foreach ($products as $product) {
    $p = new Product([
        'name' => $product
    ]);
    $p->save();

    $p->categories()->attach(2);
}

foreach ($items as $item) {
    $i = new Item([
        'code' => $item['code'],
        'purchased_at' => new \DateTime()
    ]);
    $i->product()->associate($item['product']);
    $i->save();
}

foreach ($clients as $client) {
    $cl = new client($client);
    $cl->save();
}


foreach ($locations as $location) {
    $l = new Location([
        'date_debut' => $location['date_debut'],
        'date_fin' => $location['date_fin'],
        'status' => $location['status']
    ]);

    $l->client()->associate($location['client_id']);
    $l->save();
    $l->items()->attach([1,2]);
}
