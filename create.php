<h2><?= esc($title) ?></h2>

<?= \Config\Services::validation()->listErrors() ?>

<form action="/news/create" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title"/><br>

    <label for="body">Text</label>
    <textarea name="body" rows="8" cols="80"></textarea><br>

    <input type="submit" name="submit" value="Create new item">
</form>
