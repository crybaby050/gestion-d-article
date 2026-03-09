<?php
// Démarrer la session
session_start();

// Initialiser les tableaux s'ils n'existent pas encore
if (!isset($_SESSION['categories'])) {
    $_SESSION['categories'] = [
        [
            'id' => 1,
            'libelle' => 'Informatique',
            'description' => 'Ordinateurs, smartphones et accessoires'
        ],
        [
            'id' => 2,
            'libelle' => 'Mobilier',
            'description' => 'Meubles de bureau et chaises'
        ],
        [
            'id' => 3,
            'libelle' => 'Fournitures',
            'description' => 'Fournitures de bureau et papeterie'
        ],
        [
            'id' => 4,
            'libelle' => 'Électronique',
            'description' => 'Appareils électroniques divers'
        ]
    ];
}

if (!isset($_SESSION['articles'])) {
    $_SESSION['articles'] = [
        [
            'id' => 1,
            'libelle' => 'Ordinateur Portable HP',
            'prix' => 750000,
            'quantite' => 12,
            'categorie_id' => 1
        ],
        [
            'id' => 2,
            'libelle' => 'Smartphone Samsung Galaxy',
            'prix' => 350000,
            'quantite' => 25,
            'categorie_id' => 1
        ],
        [
            'id' => 3,
            'libelle' => 'Chaise de Bureau Ergonomique',
            'prix' => 85000,
            'quantite' => 8,
            'categorie_id' => 2
        ],
        [
            'id' => 4,
            'libelle' => 'Cahier 200 pages',
            'prix' => 2500,
            'quantite' => 150,
            'categorie_id' => 3
        ],
        [
            'id' => 5,
            'libelle' => 'Stylo Bille (paquet de 12)',
            'prix' => 3000,
            'quantite' => 200,
            'categorie_id' => 3
        ],
        [
            'id' => 6,
            'libelle' => 'Tablette Graphique',
            'prix' => 125000,
            'quantite' => 5,
            'categorie_id' => 1
        ],
        [
            'id' => 7,
            'libelle' => 'Bureau en bois',
            'prix' => 250000,
            'quantite' => 3,
            'categorie_id' => 2
        ],
        [
            'id' => 8,
            'libelle' => 'Lampe de Bureau LED',
            'prix' => 15000,
            'quantite' => 30,
            'categorie_id' => 4
        ]
    ];
}
