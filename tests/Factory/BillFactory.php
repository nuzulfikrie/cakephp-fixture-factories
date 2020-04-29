<?php

namespace CakephpFixtureFactories\Test\Factory;

use CakephpFixtureFactories\Factory\BaseFactory;
use Faker\Generator;

class BillFactory extends BaseFactory
{
    protected function getRootTableRegistryName(): string
    {
        return 'TestPlugin.Bills';
    }

    protected function setDefaultTemplate(): void
    {
        $this->setDefaultData(function(Generator $faker) {
            return [
                'amount' => $faker->numberBetween(0, 1000),
            ];
        })
        ->withArticle()
        ->withCustomer();
    }

    public function withArticle($parameter = null)
    {
        return $this->with('Article', ArticleFactory::make($parameter));
    }

    public function withCustomer($parameter = null)
    {
        return $this->with('Customer', CustomerFactory::make($parameter));
    }
}
