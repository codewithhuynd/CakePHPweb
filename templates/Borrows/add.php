<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Borrow $borrow
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $books
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Borrows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="borrows form content">
            <?= $this->Form->create($borrow) ?>
            <fieldset>
                <legend><?= __('Add Borrow') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('book_id', ['options' => $books]);
                    echo $this->Form->control('borrow_date');
                    echo $this->Form->control('return_date', ['empty' => true]);
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
