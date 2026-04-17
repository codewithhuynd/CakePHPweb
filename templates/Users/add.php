<<<<<<< HEAD
<<<<<<< Updated upstream
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
=======
<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="text-center mb-4">Thêm Người Dùng</h2>
=======
<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="text-center mb-4">👤 Thêm Người Dùng</h2>
>>>>>>> main

        <?= $this->Form->create($user) ?>

        <div class="mb-3">
            <?= $this->Form->control('username', [
                'label' => 'Tên đăng nhập',
                'class' => 'form-control',
                'placeholder' => 'Nhập username...'
            ]) ?>
<<<<<<< HEAD
>>>>>>> Stashed changes
=======
>>>>>>> main
        </div>

        <div class="mb-3">
            <?= $this->Form->control('email', [
                'label' => 'Email',
                'class' => 'form-control',
                'placeholder' => 'Nhập email...'
            ]) ?>
        </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
=======
=======
>>>>>>> main

        <div class="mb-3">
            <?= $this->Form->control('password', [
                'label' => 'Mật khẩu',
                'class' => 'form-control',
                'placeholder' => 'Nhập mật khẩu...'
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('role', [
                'label' => 'Vai trò',
                'class' => 'form-select',
                'options' => [
                    'admin' => '👑 Admin',
                    'user' => '👤 User'
                ]
            ]) ?>
        </div>

        <div class="text-center mt-4">
<<<<<<< HEAD
            <?= $this->Form->button('Lưu', [
                'class' => 'btn btn-primary px-4'
            ]) ?>

            <?= $this->Html->link('Quay lại', ['action' => 'index'], [
=======
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