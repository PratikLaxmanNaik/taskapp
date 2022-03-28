<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection("title") ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" integrity="sha256-UDtbUHqpVVfXmdJcQVU/bfDEr9xldf3Dbd0ShD0Uf/Y=" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?= site_url('/css/auto-complete.css') ?>">
  <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>

</head>

<body>
  <section class="section">

    <nav class="navbar" role="navigation" aria-label="main navigation">

      <div class="navbar-menu">

        <div class="navbar-start">

          <a class="navbar-item" href="<?= site_url("/") ?>"><?= lang('App.nav.home') ?></a>

          <a class="navbar-item" href="<?= site_url('/en') ?>">English</a>
                
          <a class="navbar-item" href="<?= site_url('/es') ?>">Español</a>

        </div>

        
        <div class="navbar-end">

            <?php if (current_user()) : ?>

              <!-- <p>User is logged in</p> -->

              <div class="navbar-item"><?= lang('App.nav.hello') ?> <?= esc(current_user()->name) ?></div>

              <a class="navbar-item" href="<?= site_url("/profile/show") ?>"><?= lang('App.nav.profile') ?></a>

              <?php if (current_user()->is_admin) : ?>

                <a class="navbar-item" href="<?= site_url("/admin/users") ?>"><?= lang('App.nav.users') ?></a>

              <?php endif; ?>

              <a class="navbar-item" href="<?= site_url("/tasks") ?>"><?= lang('App.nav.tasks') ?></a>

              <a class="navbar-item" href="<?= site_url("/logout") ?>"> <?= lang('App.nav.logout') ?></a>

            <?php else : ?>
              <!-- <p>User is not logged in</p> -->

              <a class="navbar-item" href="<?= site_url("/$locale/signup") ?>"><?= lang('App.nav.signup') ?></a>

              <a class="navbar-item" href="<?= site_url("/$locale/login") ?>"><?= lang('App.nav.login') ?></a>

            <?php endif; ?>
        </div>
      </div>
    </nav>

    <?php if (session()->has('warning')) : ?>
      <div class="notification is-warning is-light">
          <button class="delete"></button>
          <?php echo session('warning'); ?>
      </div>
    <?php endif; ?>

    <?php if (session()->has('info')) : ?>
      <div class="notification is-info is-light">
          <button class="delete"></button>
          <?php echo session('info'); ?>
      </div>
    <?php endif; ?>


    <?php if (session()->has('error')) : ?>
      <div class="notification is-danger is-light">
          <button class="delete"></button>
          <?php echo session('error'); ?>
      </div>
    <?php endif; ?>

    <?= $this->renderSection("content") ?>


  </section>

  <script src=" <?= site_url('/js/app.js') ?>"></script>
</body>

</html>