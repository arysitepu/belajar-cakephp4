<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IncomingProduct $incomingProduct
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="row">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $incomingProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $incomingProduct->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Incoming Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="column-responsive">
        <div class="incomingProducts form content">
            <?= $this->Form->create($incomingProduct) ?>
            <fieldset>
                <legend><?= __('Edit Incoming Product') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('tanggal_masuk');
                    echo $this->Form->control('keterangan');
                    echo $this->Form->control('stock');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('update data')) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'button float-right']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
