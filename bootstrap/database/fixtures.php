<?php

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

$properties = [
    'Pointure',
    'Diamètre des roues',
    'Taille'
];

$items = [
    [
        'code' => 'BHVHV45',
        'product' => 1,
        'pointure' => 42
    ],
    [
        'code' => 'IKNBG78',
        'product' => 2,
        'pointure' => 39
    ],
    [
        'code' => 'FPHOI88',
        'product' => 1,
        'pointure' => 43
    ],
];

foreach ($categories as $category => $subCategories) {
    $c = new \App\Model\Category([
        'name' => $category
    ]);
    $c->save();

    foreach ($subCategories as $subCategory) {
        $sub = new \App\Model\Category([
            'name' => $subCategory
        ]);
        $sub->parent()->associate($c);
        $sub->save();
    }
}

foreach ($products as $product) {
    $p = new \App\Model\Product([
        'name' => $product
    ]);
    $p->save();

    $p->categories()->attach(2);
}

foreach ($properties as $property) {
    $p = new \App\Model\Property([
        'name' => $property
    ]);
    $p->save();
}

foreach ($items as $item) {
    $i = new \App\Model\Item([
        'code' => $item['code'],
        'purchased_at' => new \DateTime()
    ]);
    $i->product()->associate($item['product']);
    $i->save();

    $i->properties()->attach(1, ['value' => $item['pointure']]);
}
