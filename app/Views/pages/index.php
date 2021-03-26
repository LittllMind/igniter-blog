
<div class="">
<?= \Config\Services::validation()->listErrors() ?>
  <form action="/member/signin" method="post" id="login">
    <?= csrf_field() ?>
    <div class="form-group">
      <label for="pseudo">Pseudo</label>
      <input  type="text"
              name="pseudo"
              class="form-control"
              placeholder="Pseudo"
              required="true">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input  type="password"
              name="password"
              class="form-control"
              placeholder="Password"
              required="true">
    </div>
    <input type="submit" name="submit" value="Sign in">
    <!-- <button type="submit" name="submit" class="btn btn-primary">Sign in</button> -->
  </form>
  <p> <a href="/members/create">Sign up</a></p>
</div>
