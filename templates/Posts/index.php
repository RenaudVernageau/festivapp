<div class="container__post">
    <div class="btn-add__post"><?= $this->Html->link('+', ['action'=>'add']) ?></div>

    <?php foreach($posts as $post): ?>
            <div class="article">
                <div class="article__profile">
                    <?= $this->Html->image($post->user->profilephoto,['class' => 'profile__photo']) ?>
                    <?= $post->user->username ?>
                </div>
                <div class="article__img">
                    <?= $this->Html->image($post->img) ?>
                </div>
                <div class="article__content">
                    <div class="article__location"><?= $post->location ?></div>
                    <div class="article__description"><?= $post->description ?></div>
                    <div class="article__date"><?= $post->created_at ?></div>
                </div>
            </div>
    <?php endforeach ?>
</div>






