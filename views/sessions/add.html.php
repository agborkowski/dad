<h3>Sign in</h3>

<?= $this->form->create(null, ['url' => '/sessions']) ?>
<?= $this->form->field('email_address', ['autofocus' => true]) ?>
<?= $this->form->field('password', ['type' => 'password']) ?>
<?= $this->form->submit('Come on in') ?>
<?= $this->form->end() ?>