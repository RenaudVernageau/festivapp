<?= $this->form->create($post,['enctype'=>'multipart/form-data']); ?>
    <div class="flex justify-center items-center ">
        <div class="py-2 px-4 rounded-2xl shadow-xl mb-20 z-20 bg-white">
            <div>
                <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer">
                    Modification des informations de la publication <?= $post->id ?>
                </h1>
            </div>
            <figure>
                <?= $this->Html->image($post->img) ?>
            </figure>
            <div class="space-y-4 mb-12">
                <?= $this->form->control('description',['label' => 'Description','class'=>'input--text']); ?>
                <?= $this->form->control('location',['label' => 'Localisation','class'=>'input--text']); ?>
            </div>
            <div class="text-center mt-6 mb-8">
                <?= $this->form->button('Modifier',['class'=>'mybutton']); ?>
            </div>
<?= $this->form->end(); ?>




