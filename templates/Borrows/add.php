<<<<<<< Updated upstream
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
=======
<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="text-center mb-4">Tạo phiếu mượn</h2>

        <?= $this->Form->create($borrow) ?>

        <div class="mb-3">
            <?= $this->Form->control('user_id', [
                'label' => 'Người dùng',
                'class' => 'form-select',
                'options' => $users,
                'empty' => 'Chọn người dùng...'
            ]) ?>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======

        <div class="mb-3">
            <?= $this->Form->control('borrow_date', [
                'label' => 'Ngày mượn',
                'class' => 'form-control',
                'type' => 'date'
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('return_date', [
                'label' => 'Ngày trả',
                'class' => 'form-control',
                'type' => 'date',
                'empty' => true
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('status', [
                'label' => 'Trạng thái',
                'class' => 'form-select',
                'options' => [
                    'borrowing' => '📖 Đang mượn',
                    'returned' => '✅ Đã trả',
                    'late' => '⚠️ Quá hạn'
                ]
            ]) ?>
        </div>

        <div class="text-center mt-4">
            <?= $this->Form->button('Lưu', [
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
