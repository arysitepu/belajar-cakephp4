<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\IncomingProduct> $incomingProducts
 */
?>
<div class="incomingProducts index content">
    <?= $this->Html->link(__('New Incoming Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Incoming Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('tanggal_masuk') ?></th>
                    <th><?= $this->Paginator->sort('keterangan') ?></th>
                    <th><?= $this->Paginator->sort('stock') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($incomingProducts as $incomingProduct): ?>
                <tr>
                    <td><?= $this->Number->format($incomingProduct->id) ?></td>
                    <td><?= $incomingProduct->has('product') ? $this->Html->link($incomingProduct->product->name, ['controller' => 'Products', 'action' => 'view', $incomingProduct->product->id]) : '' ?></td>
                    <td><?= h($incomingProduct->tanggal_masuk) ?></td>
                    <td><?= h($incomingProduct->keterangan) ?></td>
                    <td><?= $this->Number->format($incomingProduct->stock) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $incomingProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $incomingProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $incomingProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $incomingProduct->id)]) ?>
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
