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
            <?= $this->Form->postLink(
                __('Delete'),
=======
<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="text-center mb-4">Chỉnh sửa Người Dùng</h2>

        <?= $this->Form->create($user) ?>

        <div class="mb-3">
            <?= $this->Form->control('username', [
                'label' => 'Tên đăng nhập',
                'class' => 'form-control',
                'placeholder' => 'Nhập username...'
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('email', [
                'label' => 'Email',
                'class' => 'form-control',
                'placeholder' => 'Nhập email...'
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('password', [
                'label' => 'Mật khẩu (để trống nếu không đổi)',
                'class' => 'form-control',
                'required' => false,
                'placeholder' => 'Nhập mật khẩu mới...'
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
            <?= $this->Form->button('Cập nhật', [
                'class' => 'btn btn-primary px-4'
            ]) ?>

            <?= $this->Html->link('Quay lại', ['action' => 'index'], [
                'class' => 'btn btn-secondary ms-2'
            ]) ?>

            <?= $this->Form->postLink(
                'Xóa',
>>>>>>> Stashed changes
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('role');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
