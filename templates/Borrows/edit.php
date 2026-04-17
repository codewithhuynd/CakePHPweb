<<<<<<< Updated upstream
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Borrow $borrow
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $books
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
=======
<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="text-center mb-4">Chỉnh sửa phiếu mượn</h2>

        <?= $this->Form->create($borrow) ?>

        <div class="mb-3">
            <?= $this->Form->control('user_id', [
                'label' => 'Người dùng',
                'class' => 'form-select',
                'options' => $users,
                'empty' => 'Chọn người dùng...'
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('book_id', [
                'label' => 'Sách',
                'class' => 'form-select',
                'options' => $books,
                'empty' => 'Chọn sách...'
            ]) ?>
        </div>

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
            <?= $this->Form->button('Cập nhật', [
                'class' => 'btn btn-primary px-4'
            ]) ?>

            <?= $this->Html->link('Quay lại', ['action' => 'index'], [
                'class' => 'btn btn-secondary ms-2'
            ]) ?>

            <?= $this->Form->postLink(
                'Xóa',
>>>>>>> Stashed changes
                ['action' => 'delete', $borrow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $borrow->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Borrows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="borrows form content">
            <?= $this->Form->create($borrow) ?>
            <fieldset>
                <legend><?= __('Edit Borrow') ?></legend>
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
