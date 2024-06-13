<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IncomingProductsFixture
 */
class IncomingProductsFixture extends TestFixture
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
                'product_id' => 1,
                'tanggal_masuk' => '2024-06-13',
                'keterangan' => 'Lorem ipsum dolor sit amet',
                'stock' => 1,
                'created_at' => '2024-06-13 07:34:40',
                'updated_at' => '2024-06-13 07:34:40',
            ],
        ];
        parent::init();
    }
}
