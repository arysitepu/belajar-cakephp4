<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
 
    <div class="column-responsive">
        <div class="products form content">
            <?= $this->Form->create($product) ?>
            <fieldset>
                <legend><?= __('Add Product') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('barcode');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Add product')) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'button float-right']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
