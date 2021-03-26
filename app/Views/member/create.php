



<form class="" action="/member/create" method="post" id="login">
    <?= $validation->listErrors() ?>
    <?= form_open('form'); ?>
    <?= csrf_field() ?>

    <div class="form-group">
      <label  for="pseudo">Pseudo</label>
      <input  type="text"
              class="form-control"
              id="pseudo"
              name="pseudo"
              placeholder="Enter Pseudo"
              required="true">
    </div>

    <div class="form-group">
      <label  for="mail">Email address</label>
      <input  type="email"
              class="form-control"
              id="mail"
              name="mail"
              aria-describedby="emailHelp"
              placeholder="Enter email"
              required="true">
      <small id="emailHelp" class="form-text text-muted">
            We'll never share your email with anyone else.
      </small>
    </div>

    <div class="form-group">
        <label  for="password">Password</label>
        <input  type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Password"
                required="true">
      </div>

      <div class="form-group">
        <label for="pass_confirm">Confirm password</label>
        <input  type="password"
                class="form-control"
                id="pass_confirm"
                name="pass_confirm"
                placeholder="Confirm password"
                required="true">
      </div>

      <button type="submit" name="submit" class="btn btn-primary">Inscription</button>

    <!-- <input type="submit" name="submit" value="Create new User"> -->
</form>
