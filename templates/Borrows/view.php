<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Borrow $borrow
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Borrow'), ['action' => 'edit', $borrow->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Borrow'), ['action' => 'delete', $borrow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrow->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Borrows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Borrow'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="borrows view content">
            <h3><?= h($borrow->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $borrow->hasValue('user') ? $this->Html->link($borrow->user->username, ['controller' => 'Users', 'action' => 'view', $borrow->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Book') ?></th>
                    <td><?= $borrow->hasValue('book') ? $this->Html->link($borrow->book->title, ['controller' => 'Books', 'action' => 'view', $borrow->book->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($borrow->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($borrow->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Borrow Date') ?></th>
                    <td><?= h($borrow->borrow_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Return Date') ?></th>
                    <td><?= h($borrow->return_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($borrow->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($borrow->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>