<div class="flex justify-center items-center ">
        <div class="py-2 px-4 rounded-2xl shadow-xl z-20 bg-white">
            <figure><?= $this->Html->image($post->img) ?></figure>
            <div class="space-y-4">
                <p class="text-black font-semibold mb-2"><?= $post->location ?></p>
                <p class="text-black mb-4"><?= $post->description ?></p>
            </div>
        <hr class="mt-8 text-center">
        <div class="my-6 flex border-2">
            <div class="border-2 place-content-start w-1/2">
                <p><?= $this->Html->link('Éditer', ['action' => 'edit', $post->id]) ?></p>
            </div>
            <div class="border-2 w-1/2">
                <p><?= $this->Form->postLink('Supprimer', ['action' => 'delete', $post->id],['confirm' => 'Êtes-vous sûr ? Cette action est irréversible.']) ?></p>
            </div>
        </div>
</div>





