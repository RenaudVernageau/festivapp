<div class="wrapper">
    <div class="article">
        <div class="article__img">
            <img src="<?=$post->img ?>" alt="" width="700px">
        </div>
        <div class="article__content">
            <div class="article__location"><?= $post->location ?></div>
            <div class="article__description"><?= $post->description ?></div>
            <div class="article__date"><?= $post->created_at->format(DATE_RFC850) ?></div>
        </div>
    </div>
</div>
