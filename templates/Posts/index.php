<header class="flex justify-center">
    <button class="py-2 px-4 rounded-full bg-white shadow-xl mb-10">
        <?= $this->Html->link('+', ['action'=>'add','class'=>'mybutton']) ?>
    </button>
</header>

<?php foreach($posts as $post): ?>

    <section class="flex justify-center mb-20">
        <div class="w-3/4 rounded-2xl shadow-xl z-20 bg-white ">
            <div class="px-4 py-3">
                <div class="flex items-center font-bold mb-4">
                    <?php if($post->user->profilphoto == null){  ?>
                        <?= $this->Html->image('defaultprofil.png',['class' => 'w-20 h-20 rounded-full mr-6']) ?>
        <?php            }else{ ?>
                        <?= $this->Html->image($post->user->profilphoto,['class' => 'w-20 h-20 rounded-full mr-6']) ?>
        <?php            }   ?>
                    <p class="text-black"><?= $post->user->username ?></p>
                </div>
                <div class="mb-4">
                <?= $this->Html->link($this->Html->image($post->img),
                            ['action' => 'view', $post->id],
                            ['escape' => false ],
                            ['class' => 'w-full']);?>
                </div>
                <div class="">
                        <p class="text-black font-semibold mb-2"><?= $post->location ?></p>
                        <p class="text-black mb-4"><?= $post->description ?></p>
                        <p><?= $post->created->format(DATE_RFC850) ?></p>
                </div>
            </div>
        </div>

    </section>
<?php endforeach ?>






