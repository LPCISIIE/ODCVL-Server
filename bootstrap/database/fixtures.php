<?php

use App\Model\Category;
use App\Model\Product;
use App\Model\Item;

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
