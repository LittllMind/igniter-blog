
<div class="">
<?= \Config\Services::validation()->listErrors() ?>





  <form action="/index/signin" method="post" id="login">
    <?= csrf_field() ?>
    <div class="form-group">
      <label for="pseudo">Pseudo</label>
      <input type="text" class="form-control" id="pseudo" placeholder="enter pseudo">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
    <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
  </form>
  <p> <a href="/members/create">Sign up</a>  </p>
</div>
