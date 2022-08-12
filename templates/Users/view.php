<div class="flex justify-center items-center ">
	<div class="w-3/4 rounded-2xl shadow-xl z-20 bg-white ">
        <div class="w-32 mx-auto rounded-full -mt-20 border-4 border-white">
            <figure class="items-center">
                <?= $this->Html->image($user->profilphotopath,['class'=>'rounded-full profil--photo']) ?>
            </figure>
        </div>
        <div class="space-y4 mb-8">
            <p class="font-bold text-center tracking-wide"><?= $user->username ?></p>
        </div>
        <div class="space-y4 text-center mb-6">
            <p><?= $user->firstname?> <?= $user->lastname?></p>
        </div>
        <div class="space-y4 text-center mb-6">
            <p><?= $user->description ?></p>
        </div>
        <div class="space-y4 text-center mb-6">
            <p><?= $user->musicstyles ?></p>
        </div>
        <hr class="mt-8 text-center">
        <div class="my-6 flex justify-center w-full">
            <p><?= $this->Html->link('Éditer', ['action' => 'edit', $user->id,'class'=>'mx-auto w-1/2']) ?></p>
            <p><?= $this->Form->postLink('Supprimer', ['action' => 'delete', $user->id,'class'=>'mx-auto w-1/2'],['confirm' => 'Êtes-vous sûr ? Cette action est irréversible.']) ?></p>
        </div>
    </div>
</div>
