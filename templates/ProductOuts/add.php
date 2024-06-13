<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductOut $productOut
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<div class="row">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Product Outs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="column-responsive">
        <div class="productOuts form content">
            <?= $this->Form->create($productOut) ?>
            <fieldset>
                <legend><?= __('Add Product Out') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('tanggal_keluar');
                    echo $this->Form->control('penerima');
                    echo $this->Form->control('keterangan');
                    echo $this->Form->control('stock');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Add data')) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'button float-right']) ?>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
