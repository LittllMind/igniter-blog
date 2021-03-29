
<div class="">
<?= \Config\Services::validation(); ?>
  <form action="/signin" method="post" id="login">
    <?= csrf_field() ?>

    <div class="form-group">
      <label for="mail">Pseudo</label>
      <input  type="email"
              name="mail"
              class="form-control"
              placeholder="E-mail"
              required="true">
        <!-- Error -->
        <?php if ($validation->getError('mail')) {?>
            <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError('mail'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input  type="password"
              name="password"
              class="form-control"
              placeholder="Password"
              required="true">
              <!-- Error -->
      <?php if ($validation->getError('password')) {?>
          <div class="alert alert-danger mt-2">
            <?= $error = $validation->getError('password'); ?>
          </div>
      <?php }?>
    </div>
    <input type="submit" name="submit" value="Sign in">
    <!-- <button type="submit" name="submit" class="btn btn-primary">Sign in</button> -->
  </form>
  <p> <a href="/members/create">Sign up</a></p>
</div>
