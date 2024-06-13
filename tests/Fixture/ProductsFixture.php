<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'barcode' => 'Lorem ipsum dolor sit amet',
                'stock' => 1,
                'created_at' => '2024-06-13 07:32:52',
                'updated_at' => '2024-06-13 07:32:52',
            ],
        ];
        parent::init();
    }
}
