<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Registration') ?></legend>
                <?php
                    echo $this->Form->control('email', [
                        'placeholder' => 'arysitepu@gmail.com'
                    ]);
                    echo $this->Form->control('username');
                    echo $this->Form->control('password', [
                        'placeholder' => 'input password'
                    ]);
                    echo $this->Form->control('phone', [
                        'placeholder' => 'input whatsapp'
                    ]);
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Registrasi')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
