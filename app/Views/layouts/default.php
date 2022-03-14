<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection("title") ?></title>
</head>
<body>

      
<a href="<?= site_url("/") ?>">Home</a>


      <?php if(current_user()): ?>

          <!-- <p>User is logged in</p> -->

          <p>Hello <?= esc(current_user()->name) ?></p>

          <a href="<?= site_url("/tasks") ?>">Tasks</a>

          <a href="<?= site_url("/logout") ?>">Log out</a>

      <?php else :?>
          <!-- <p>User is not logged in</p> -->

          <a href="<?= site_url("/signup") ?>">Sign up</a>

          <a href="<?= site_url("/login") ?>">Log in</a>

      <?php endif; ?>

    <?php if(session()->has('warning')): ?>
      <div class="warning">
        <?php echo session('warning'); ?>
      </div>
    <?php endif; ?>

    <?php if(session()->has('info')): ?>
      <div class="info">
        <?php echo session('info'); ?>
      </div>
    <?php endif; ?>
    
    
    <?php if(session()->has('error')): ?>
      <div class="error">
        <?php echo session('error'); ?>
      </div>
    <?php endif; ?>

    <?= $this->renderSection("content") ?>



</body>
</html>