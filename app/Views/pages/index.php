
<div class="col-12">
  <h1>Sign in</h1>
  <?= \Config\Services::validation()->listErrors() ?>
  <?php if (session()->getFlashdata('msg')) :?>
    <div class="alert alert-danger"><?= session()->getFlashData('msg') ?></div>
  <?php endif; ?>
  <form action="/login/auth" method="post" id="login">
    <?= csrf_field() ?>
    <div class="form-group">
      <label for="email" class="form-label">Email address</label>
      <input  type="email"
              name="mail"
              class="form-control"
              required="true"
              id="InputForEmail"
              placeholder="E-mail">
    </div>

    <div class="form-group">
      <label for="password" class="form-label">Password</label>
      <input  type="password"
              name="password"
              class="form-control"
              required="true"
              id="InputForPassword"
              placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary" name="submit" value="Sign in">Sign in</button>
    <!-- <button type="submit" name="submit" class="btn btn-primary">Sign in</button> -->
  </form>
  <p> <a href="/members/create">Sign up</a></p>
</div>
