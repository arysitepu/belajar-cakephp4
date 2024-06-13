<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IncomingProduct $incomingProduct
 */
?>
<div class="row">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Incoming Product'), ['action' => 'edit', $incomingProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Incoming Product'), ['action' => 'delete', $incomingProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $incomingProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Incoming Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Incoming Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="column-responsive">
        <div class="incomingProducts view content">
            <h3><?= h($incomingProduct->keterangan) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $incomingProduct->has('product') ? $this->Html->link($incomingProduct->product->name, ['controller' => 'Products', 'action' => 'view', $incomingProduct->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Keterangan') ?></th>
                    <td><?= h($incomingProduct->keterangan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($incomingProduct->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock') ?></th>
                    <td><?= $this->Number->format($incomingProduct->stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tanggal Masuk') ?></th>
                    <td><?= h($incomingProduct->tanggal_masuk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($incomingProduct->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($incomingProduct->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
