<h1>Modification du profil "<?=$user->username?>"</h1>

<?= $this->Form->create($user,['enctype'=>'multipart/form-data'])?>

    <?= $this->Form->control('firstname',['label'=>'Prénom']) ?>
    <?= $this->Form->control('lastname',['label'=>'Nom de famille']) ?>
    <?= $this->Form->control('image',['type'=>'file','label'=>'Photo de profil']) ?>
    <?= $this->Form->control('username',['label'=>'Nom d\'utilisateur *']) ?>
    <?= $this->Form->control('description',['label'=>'Description de votre profil']) ?>
    <?= $this->Form->control('musicstyles',['label'=>'Votre style de musique']) ?>
    <?= $this->Form->button('Editer') ?>

<?= $this->Form->end()?>
