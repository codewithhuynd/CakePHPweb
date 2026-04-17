<<<<<<< HEAD
<<<<<<< Updated upstream
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
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
        <h2 class="text-center mb-4">Chỉnh Sửa Danh Mục</h2>

        <?= $this->Form->create($category) ?>

        <div class="mb-3">
            <?= $this->Form->control('name', [
                'label' => 'Tên danh mục',
                'class' => 'form-control',
                'placeholder' => 'Nhập tên danh mục...'
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('description', [
                'label' => 'Mô tả',
                'class' => 'form-control',
                'rows' => 3,
                'placeholder' => 'Nhập mô tả...'
            ]) ?>
        </div>

        <div class="d-flex justify-content-between mt-4">

            <?= $this->Form->postLink(
                'Xóa',
>>>>>>> Stashed changes
=======
<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="text-center mb-4">✏️ Chỉnh Sửa Danh Mục</h2>

        <?= $this->Form->create($category) ?>

        <div class="mb-3">
            <?= $this->Form->control('name', [
                'label' => 'Tên danh mục',
                'class' => 'form-control',
                'placeholder' => 'Nhập tên danh mục...'
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('description', [
                'label' => 'Mô tả',
                'class' => 'form-control',
                'rows' => 3,
                'placeholder' => 'Nhập mô tả...'
            ]) ?>
        </div>

        <div class="d-flex justify-content-between mt-4">

            <!-- Nút xóa -->
            <?= $this->Form->postLink(
                '🗑 Xóa',
>>>>>>> main
                ['action' => 'delete', $category->id],
                [
                    'confirm' => 'Bạn chắc chắn muốn xóa danh mục này?',
                    'class' => 'btn btn-danger'
                ]
            ) ?>
<<<<<<< HEAD
<<<<<<< Updated upstream
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="categories form content">
            <?= $this->Form->create($category) ?>
            <fieldset>
                <legend><?= __('Edit Category') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
=======

            <div>
                <?= $this->Html->link('Quay lại', ['action' => 'index'], [
                    'class' => 'btn btn-secondary me-2'
                ]) ?>

                <?= $this->Form->button('Cập nhật', [
=======

            <div>
                <?= $this->Html->link('⬅ Quay lại', ['action' => 'index'], [
                    'class' => 'btn btn-secondary me-2'
                ]) ?>

                <?= $this->Form->button('💾 Cập nhật', [
>>>>>>> main
                    'class' => 'btn btn-primary'
                ]) ?>
            </div>

<<<<<<< HEAD
>>>>>>> Stashed changes
=======
>>>>>>> main
        </div>

        <?= $this->Form->end() ?>
    </div>

</div>