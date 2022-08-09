<div class="user-card">
        <div class="user-imgBox">
            <?= $this->Html->image($user->profilephoto) ?>
        </div>
        <div class="user-username-head">
        <p><?= $user->username ?></p>
        </div>
        <div class="user-name-head">
        <p><?= $user->firstname?> <?= $user->lastname?></p>
        </div>
        <div class="user-desc">
        <p><?= $user->description ?></p>
        </div>
        <div class="user-musicstyles"><?= $user->musicstyles ?></div>
  </div>

  <p>
    <?= $this->Html->link('Éditer', ['action' => 'edit', $user->id], ['class' => 'button']) ?>
</p>
