<div class="card shadow p-4" style="width: 350px;">
    <h3 class="text-center mb-4">Đăng nhập</h3>

    <?= $this->Form->create() ?>

    <div class="mb-3">
        <?= $this->Form->control('username', [
            'label' => 'Tên đăng nhập',
            'class' => 'form-control'
        ]) ?>
    </div>

    <div class="mb-3">
        <?= $this->Form->control('password', [
            'type' => 'password',
            'label' => 'Mật khẩu',
            'class' => 'form-control'
        ]) ?>
    </div>

    <button class="btn btn-primary w-100">Đăng nhập</button>

    <?= $this->Form->end() ?>
</div>