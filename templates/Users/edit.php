<?= $this->Form->create($user,['enctype'=>'multipart/form-data'])?>
    <div class="flex justify-center items-center ">
	    <div class="py-20 px-20 rounded-2xl shadow-xl mb-20 z-20 bg-white">
		    <div>
                <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer">Modification du profil de "<?=$user->username?>"</h1>
            </div>
            <div class="space-y-4">
                <?= $this->Form->control('firstname',['label'=>'Prénom','class'=>'input--text']) ?>
                <?= $this->Form->control('lastname',['label'=>'Nom de famille','class'=>'input--text']) ?>
                <?= $this->Form->control('image',['type'=>'file','label'=>'Photo de profil']) ?>
                <?= $this->Form->control('username',['label'=>'Nom d\'utilisateur *','class'=>'input--text']) ?>
                <?= $this->Form->control('description',['label'=>'Description de votre profil','class'=>'input--text']) ?>
                <?= $this->Form->control('musicstyles',['label'=>'Votre style de musique','class'=>'input--text']) ?>
            </div>
            <div class="text-center mt-6">
                <?= $this->Form->button('Éditer',['class'=>'mybutton']) ?>
            </div>
        </div>
    </div>
<?= $this->Form->end()?>

