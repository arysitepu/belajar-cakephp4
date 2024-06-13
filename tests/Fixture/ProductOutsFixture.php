<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductOutsFixture
 */
class ProductOutsFixture extends TestFixture
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
                'tanggal_keluar' => '2024-06-13',
                'penerima' => 'Lorem ipsum dolor sit amet',
                'keterangan' => 'Lorem ipsum dolor sit amet',
                'stock' => 1,
                'created_at' => '2024-06-13 07:40:53',
                'updated_at' => '2024-06-13 07:40:53',
            ],
        ];
        parent::init();
    }
}
