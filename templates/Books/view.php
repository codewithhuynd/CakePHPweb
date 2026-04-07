<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Book'), ['action' => 'edit', $book->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Book'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="books view content">
            <h3><?= h($book->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $book->hasValue('category') ? $this->Html->link($book->category->name, ['controller' => 'Categories', 'action' => 'view', $book->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $book->hasValue('user') ? $this->Html->link($book->user->username, ['controller' => 'Users', 'action' => 'view', $book->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($book->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Author') ?></th>
                    <td><?= h($book->author) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($book->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($book->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $book->quantity === null ? '' : $this->Number->format($book->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($book->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($book->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($book->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Borrows') ?></h4>
                <?php if (!empty($book->borrows)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Borrow Date') ?></th>
                            <th><?= __('Return Date') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->borrows as $borrow) : ?>
                        <tr>
                            <td><?= h($borrow->id) ?></td>
                            <td><?= h($borrow->user_id) ?></td>
                            <td><?= h($borrow->borrow_date) ?></td>
                            <td><?= h($borrow->return_date) ?></td>
                            <td><?= h($borrow->status) ?></td>
                            <td><?= h($borrow->created) ?></td>
                            <td><?= h($borrow->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Borrows', 'action' => 'view', $borrow->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Borrows', 'action' => 'edit', $borrow->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Borrows', 'action' => 'delete', $borrow->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $borrow->id),
                                    ]
                                ) ?>
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