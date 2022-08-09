<?= $this->Form->create() ?>

    <h1>Se connecter</h1>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password',['type'=>'password']) ?>
    <?= $this->Form->button('Valider') ?>

<?= $this->Form->end() ?>
