<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection("title") ?></title>
</head>
<body>

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

    <?= $this->renderSection("content") ?>



</body>
</html>