<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="text-center mb-4">Thêm Người Dùng</h2>

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
            <?= $this->Form->button('Lưu', [
                'class' => 'btn btn-primary px-4'
            ]) ?>

            <?= $this->Html->link('Quay lại', ['action' => 'index'], [
                'class' => 'btn btn-secondary ms-2'
            ]) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>

</div>