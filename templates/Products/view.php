<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="column-responsive">
        <div class="products view content">
            <h3><?= h($product->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Barcode') ?></th>
                    <td><?= h($product->barcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock') ?></th>
                    <td><?= $this->Number->format($product->stock) ?></td>
                </tr>
               
            </table>
            <div class="related">
                <h4><?= __('Related Incoming Products') ?></h4>
                <?php if (!empty($product->incoming_products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Tanggal Masuk') ?></th>
                            <th><?= __('Keterangan') ?></th>
                            <th><?= __('Stock') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->incoming_products as $incomingProducts) : ?>
                        <tr>
                            <td><?= h($incomingProducts->id) ?></td>
                            <td><?= h($incomingProducts->product_id) ?></td>
                            <td><?= h($incomingProducts->tanggal_masuk) ?></td>
                            <td><?= h($incomingProducts->keterangan) ?></td>
                            <td><?= h($incomingProducts->stock) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'IncomingProducts', 'action' => 'view', $incomingProducts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'IncomingProducts', 'action' => 'edit', $incomingProducts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'IncomingProducts', 'action' => 'delete', $incomingProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $incomingProducts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Product Outs') ?></h4>
                <?php if (!empty($product->product_outs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Tanggal Keluar') ?></th>
                            <th><?= __('Penerima') ?></th>
                            <th><?= __('Keterangan') ?></th>
                            <th><?= __('Stock') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->product_outs as $productOuts) : ?>
                        <tr>
                            <td><?= h($productOuts->id) ?></td>
                            <td><?= h($productOuts->product_id) ?></td>
                            <td><?= h($productOuts->tanggal_keluar) ?></td>
                            <td><?= h($productOuts->penerima) ?></td>
                            <td><?= h($productOuts->keterangan) ?></td>
                            <td><?= h($productOuts->stock) ?></td>
                            <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'ProductOuts', 'action' => 'view', $productOuts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ProductOuts', 'action' => 'edit', $productOuts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductOuts', 'action' => 'delete', $productOuts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productOuts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
