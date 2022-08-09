<div class="container-form">
    <div class="form-add__post">
        <h1>Ajouter une publication</h1>
        <?= $this->form->create($add,['enctype'=>'multipart/form-data']); ?>
        <div class="form-img">
            <?= $this->Form->control('image',['type'=>'file','label'=>'Image']) ?>
        </div>
        <div class="form__info">
            <?= $this->form->control('description',['label' => 'Description','class'=>'input--text']); ?>
            <?= $this->form->control('location',['label' => 'Localisation','class'=>'input--text']); ?>
        </div>
        <div class="form__btn">
            <?= $this->form->button('Publier'); ?>
        </div>
        <?= $this->form->end(); ?>
    </div>
</div>




