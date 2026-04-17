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
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
=======
<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="text-center mb-4">Thêm Danh Mục</h2>
=======
<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="text-center mb-4">📂 Thêm Danh Mục</h2>
>>>>>>> main

        <?= $this->Form->create($category) ?>

        <div class="mb-3">
            <?= $this->Form->control('name', [
                'label' => 'Tên danh mục',
                'class' => 'form-control',
                'placeholder' => 'Nhập tên danh mục...'
            ]) ?>
<<<<<<< HEAD
>>>>>>> Stashed changes
=======
>>>>>>> main
        </div>

        <div class="mb-3">
            <?= $this->Form->control('description', [
                'label' => 'Mô tả',
                'class' => 'form-control',
                'rows' => 3,
                'placeholder' => 'Nhập mô tả...'
            ]) ?>
        </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
=======

        <div class="text-center mt-4">
            <?= $this->Form->button('Lưu', [
                'class' => 'btn btn-primary px-4'
            ]) ?>

            <?= $this->Html->link('Quay lại', ['action' => 'index'], [
=======

        <div class="text-center mt-4">
            <?= $this->Form->button('💾 Lưu', [
                'class' => 'btn btn-primary px-4'
            ]) ?>

            <?= $this->Html->link('⬅ Quay lại', ['action' => 'index'], [
>>>>>>> main
                'class' => 'btn btn-secondary ms-2'
            ]) ?>
        </div>

        <?= $this->Form->end() ?>
<<<<<<< HEAD
>>>>>>> Stashed changes
=======
>>>>>>> main
    </div>

</div>