
<div class="">
<?= \Config\Services::validation()->listErrors() ?>
  <form action="/member/signin" method="post" id="login">
    <?= csrf_field() ?>
    <div class="form-group">
      <label for="pseudo">Pseudo</label>
      <input type="text" name="pseudo" class="form-control" placeholder="Pseudo">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
    <input type="submit" name="submit" value="Sign in">
    <!-- <button type="submit" name="submit" class="btn btn-primary">Sign in</button> -->
  </form>
  <p> <a href="/members/create">Sign up</a></p>
</div>

<form class="" action="/member/signin" method="post">
    <?= csrf_field() ?>

    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" placeholder="pseudo">


    <label for="password">Password</label>
    <input type="password" name="password" placeholder="password">

    <input type="submit" name="submit" value="Create new User">
</form>
