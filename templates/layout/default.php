<?php
$cakeDescription = 'Festiv\'App';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://cdn.tailwindcss.com"></script>
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake','style']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/posts') ?>"><?= $this->Html->image('festivapp.png',['class' => 'menu-fa']) ?></a>
        </div>
        <div class="top-nav-links">
            <?php
            if($this->request->getAttribute('identity') == null) : ?>

                <?= $this->Html->link('Créer un compte',['controller' => 'Users','action'=>'signup','class'=>'link--header']) ?>

                <?= $this->Html->link('Se connecter',['controller' => 'Users','action'=>'login','class'=>'link--header']) ?>
            <?php else : ?>

                <?= $this->Html->link('Mon profil',['controller' => 'Users','action'=>'view',$this->request->getAttribute('identity')->id,'class'=>'link--header']) ?>

                <?= $this->Html->link('Se déconnecter',['controller' => 'Users','action'=>'logout','class'=>'link--header']) ?>
            <?php endif; ?>
        </div>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
