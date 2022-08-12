<?= $this->form->create($add,['enctype'=>'multipart/form-data']); ?>
    <div class="flex justify-center items-center ">
        <div class="py-20 px-20 rounded-2xl shadow-xl z-20 bg-white">
            <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer">
                Ajouter une publication
            </h1>
            <div>
                <?= $this->Form->control('image',['type'=>'file','label'=>'Image']) ?>
            </div>
            <div class="space-y-4">
                <?= $this->form->control('description',['label' => 'Description','class'=>'input--text']); ?>
                <?= $this->form->control('location',['label' => 'Localisation','class'=>'input--text']); ?>
            </div>
            <div class="text-center mt-6">
                    <?= $this->form->button('Publier',['class'=>'mybutton']); ?>
            </div>
        </div>
    </div>
<?= $this->form->end(); ?>
