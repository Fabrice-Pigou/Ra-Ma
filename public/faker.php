<?php
//  Notice
//  https://fakerphp.github.io/

ini_set('display_errors',1);

require_once '../vendor/autoload.php';
use  App\Sql\Table;
$oPdo = new Table;
$numberOfNews = 100;

$pdo = $oPdo->getPDO();

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE news');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$faker = Faker\Factory::create('fr_FR');

for ($i = 0; $i < $numberOfNews; $i++) {
    $title = $faker->sentence(rand(5, 15));
    $content = $faker->sentence(rand(200, 2000));
    $creation_date = $faker->dateTimeThisYear()->format('Y-m-d');

    $req = $pdo->prepare("
    INSERT INTO news (title, content, creation_date)
    VALUES(:title, :content, :creation_date)
    ");
    $req->execute([
        'title'  => $title,
        'content'  => $content,
        'creation_date' => $creation_date
    ]);
}

echo '<h1>Ça marche</h1>';
