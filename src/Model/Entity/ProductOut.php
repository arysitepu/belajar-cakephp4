<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductOut Entity
 *
 * @property int $id
 * @property int $product_id
 * @property \Cake\I18n\FrozenDate $tanggal_keluar
 * @property string $penerima
 * @property string $keterangan
 * @property int $stock
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Product $product
 */
class ProductOut extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'product_id' => true,
        'tanggal_keluar' => true,
        'penerima' => true,
        'keterangan' => true,
        'stock' => true,
        'created_at' => true,
        'updated_at' => true,
        'product' => true,
    ];
}
