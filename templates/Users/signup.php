<?= $this->Form->create($user,['enctype'=>'multipart/form-data']) ?>
    <div class="flex justify-center items-center ">
	    <div class="py-20 px-20 m-6 rounded-2xl shadow-xl z-20 bg-white">
		    <div>
                <h1 class="text-3xl font-bold text-center mb-8 cursor-pointer">
                    S'inscrire
                </h1>
            </div>
		    <div class="space-y-4">
                <div class="mb-6">
                    <?= $this->Form->control('image',['type'=>'file','label'=>'Photo de profil','class'=>'text-center']) ?>
                </div>
                <?= $this->Form->control('username',['label'=>'Nom d\'utilisateur *','class'=>'input--text']) ?>
                <?= $this->Form->control('email',['type' => 'email', 'label' => 'E-mail *','class'=>'input--text']) ?>
                <?= $this->Form->control('password',['type' => 'password', 'label' => 'Mot de passe *','class'=>'input--text']) ?>
                <?= $this->Form->control('retype_password',['type' => 'password', 'label' => 'Confirmation du mot de passe *','class'=>'input--text']) ?>
            </div>
			<div class="text-center mt-6"><?= $this->Form->button('S\'inscrire',['class'=>'mybutton']) ?></div>
		</div>
	</div>
<?= $this->Form->end() ?>
