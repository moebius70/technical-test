<?php

namespace WorldOfWonders\DataFixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use WorldOfWonders\Entity\Product;

class ProductData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $handle = fopen(__DIR__ . '/../../products.csv', "r");
        $headers = fgetcsv($handle);

        while (($row = fgetcsv($handle)) !== false) {
            $product = new Product();

            foreach ($row as $idx => $value) {
                $method = 'set' . $headers[$idx];
                $product->$method($value);
            }

            $manager->persist($product);
        }

        $manager->flush();
        fclose($handle);
    }
}