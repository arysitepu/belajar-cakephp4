<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductOut $productOut
 */
?>
<div class="row">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product Out'), ['action' => 'edit', $productOut->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product Out'), ['action' => 'delete', $productOut->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productOut->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Product Outs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product Out'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="column-responsive column-80">
        <div class="productOuts view content">
            <h3><?= h($productOut->penerima) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $productOut->has('product') ? $this->Html->link($productOut->product->name, ['controller' => 'Products', 'action' => 'view', $productOut->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Penerima') ?></th>
                    <td><?= h($productOut->penerima) ?></td>
                </tr>
                <tr>
                    <th><?= __('Keterangan') ?></th>
                    <td><?= h($productOut->keterangan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productOut->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock') ?></th>
                    <td><?= $this->Number->format($productOut->stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tanggal Keluar') ?></th>
                    <td><?= h($productOut->tanggal_keluar) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($productOut->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($productOut->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
