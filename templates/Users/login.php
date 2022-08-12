<?= $this->Form->create() ?>
    <div class="flex justify-center items-center ">
	    <div class="py-20 px-20 rounded-2xl shadow-xl z-20 bg-white">
		    <div>
                <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer">
                    Se connecter
                </h1>
            </div>
		    <div class="space-y-4">
                <?= $this->Form->control('email',['label'=>'Adresse mail','class'=>'input--text']); ?>
                <?= $this->Form->control('password',['label'=>'Mot de passe','type'=>'password','class'=>'input--text']) ?>
            </div>
			<div class="text-center mt-6">
                <?= $this->Form->button('Se connecter',['class'=>'mybutton']) ?>
            </div>
		</div>
	</div>
<?= $this->Form->end() ?>
