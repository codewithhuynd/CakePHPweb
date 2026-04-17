<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="books form content">
            <?= $this->Form->create($book) ?>
            <fieldset>
                <legend><?= __('Add Book') ?></legend>
                <?php
                    echo $this->Form->control('category_id', ['options' => $categories]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('author');
                    echo $this->Form->control('description');
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
<<<<<<< Updated upstream
=======

        <div class="row">
            <div class="col-md-4 mb-3">
                <?= $this->Form->control('category_id', [
                    'label' => 'Danh mục',
                    'options' => $categories,
                    'class' => 'form-select'
                ]) ?>
            </div>

            <div class="col-md-4 mb-3">
                <?= $this->Form->control('quantity', [
                    'label' => 'Số lượng',
                    'class' => 'form-control'
                ]) ?>
            </div>

            <div class="col-md-4 mb-3">
                <?= $this->Form->control('status', [
                    'label' => 'Trạng thái',
                    'options' => [
                        'available' => 'Có sẵn',
                        'unavailable' => 'Hết'
                    ],
                    'class' => 'form-select'
                ]) ?>
            </div>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('user_id', [
                'label' => 'Người thêm (tuỳ chọn)',
                'options' => $users,
                'empty' => '--- Không chọn ---',
                'class' => 'form-select'
            ]) ?>
        </div>

        <div class="text-center mt-4">
            <?= $this->Form->button('Lưu sách', [
                'class' => 'btn btn-primary px-4'
            ]) ?>

            <?= $this->Html->link('Quay lại', ['action' => 'index'], [
                'class' => 'btn btn-secondary ms-2'
            ]) ?>
        </div>

        <?= $this->Form->end() ?>
>>>>>>> Stashed changes
    </div>
</div>
