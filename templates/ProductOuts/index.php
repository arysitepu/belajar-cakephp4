<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ProductOut> $productOuts
 */
?>
<div class="productOuts index content">
    <?= $this->Html->link(__('New Product Out'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Product Outs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('tanggal_keluar') ?></th>
                    <th><?= $this->Paginator->sort('penerima') ?></th>
                    <th><?= $this->Paginator->sort('keterangan') ?></th>
                    <th><?= $this->Paginator->sort('stock') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productOuts as $productOut): ?>
                <tr>
                    <td><?= $this->Number->format($productOut->id) ?></td>
                    <td><?= $productOut->has('product') ? $this->Html->link($productOut->product->name, ['controller' => 'Products', 'action' => 'view', $productOut->product->id]) : '' ?></td>
                    <td><?= h($productOut->tanggal_keluar) ?></td>
                    <td><?= h($productOut->penerima) ?></td>
                    <td><?= h($productOut->keterangan) ?></td>
                    <td><?= $this->Number->format($productOut->stock) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $productOut->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productOut->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productOut->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productOut->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
