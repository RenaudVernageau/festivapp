<h2>Créer un compte</h2>

<?= $this->Form->create($user,['enctype'=>'multipart/form-data']) ?>

    <?= $this->Form->control('firstname',['label'=>'Prénom']) ?>
    <?= $this->Form->control('lastname',['label'=>'Nom de famille']) ?>
    <?= $this->Form->control('image',['type'=>'file','label'=>'Photo de profil']) ?>
    <?= $this->Form->control('username',['label'=>'Nom d\'utilisateur *']) ?>
    <?= $this->Form->control('description',['label'=>'Description de votre profil']) ?>
    <?= $this->Form->control('musicstyles',['label'=>'Votre style de musique']) ?>
    <?= $this->Form->control('email',['type' => 'email', 'label' => 'E-mail *']) ?>
    <?= $this->Form->control('password',['type' => 'password', 'label' => 'Mot de passe *']) ?>
    <?= $this->Form->control('retype_password',['type' => 'password', 'label' => 'Confirmation du mot de passe *']) ?>
    <div class="checkbox--form"><input type="checkbox" value="check--form"><label>Clique batard</label></div>
    <?= $this->Form->button('Valider') ?>

<?= $this->Form->end() ?>
