<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Tasks<?= $this->endSection() ?> 

<?= $this->section('content') ?>

<h1>Task</h1>

<a href="<?=site_url("/tasks") ?>">&laquo; back to index</a>

<dl>
    <dt>ID</dt>
    <dd><?= $task['id'] ?></dd>

    <dt>Description</dt>
    <dd><?= esc($task['description']) ?></dd>

    <dt>created_at</dt>
    <dd><?= $task['created_at'] ?></dd>

    <dt>updated_at</dt>
    <dd><?= $task['updated_at'] ?></dd>
</dl>

<?= $this->endSection() ?>
