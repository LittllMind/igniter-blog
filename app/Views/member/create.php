<h2><?= esc($title) ?></h2>

<?= \Config\Services::validation()->listErrors() ?>

<form class="" action="/member/create" method="post">
    <?= csrf_field() ?>

    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" placeholder="pseudo">


    <label for="mail">Pseudo</label>
    <input type="mail" name="mail" placeholder="e-mail">


    <label for="password">Password</label>
    <input type="password" name="password" placeholder="password">

    <input type="submit" name="submit" value="Create new User">
</form>


<div class="">
<?= \Config\Services::validation()->listErrors() ?>
