<h2><?= esc($title) ?></h2>

<?php if (! empty($members) && is_array($members)) : ?>
    <?php foreach ($members as $member) : ?>
        <h3><?= esc($member['pseudo']) ?></h3>
        <h3><?= esc($member['password']) ?></h3>

        <div class="main">
            <?= esc($member['mail']) ?>
        </div>
        <p> <a href="/member/<?= esc($member['id'], 'url') ?>">View member </a> </p>

    <?php endforeach; ?>
<?php else : ?>
      <h3>No Member</h3>
      <p>Unable to find any member</p>
<?php endif ?>
