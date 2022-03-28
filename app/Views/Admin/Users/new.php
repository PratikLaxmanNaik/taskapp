<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?> <?= lang('AdminUsers.new') ?><?= $this->endSection() ?> 

<?= $this->section('content') ?>

<h1 class="title"><?= lang('AdminUsers.new') ?></h1>

<?php if(session()->has('errors')): ?>
    <ul>
        <?php foreach(session('errors') as $error): ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="container">
    <?= form_open("/admin/users/create")?>

        <?= $this->include('/admin/users/form') ?>

        <div class="field is-grouped">
            <div class="control">
                <button><?= lang('AdminUsers.save') ?></button>
            </div>
            <div class="control">
                <a href="<?=site_url("/admin/users") ?>"><?= lang('AdminUsers.cancel') ?></a>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>