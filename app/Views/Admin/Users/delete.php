<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?><?= lang('AdminUsers.delete_user') ?><?= $this->endSection() ?> 

<?= $this->section('content') ?>

<h1 class="title"><?= lang('AdminUsers.delete_user') ?></h1>

<p>Are you sure?</p>

<?=form_open("/admin/users/delete/". $user->id)?>
    <div class="field is-grouped">
        <div>
            <button class="button is-primary"><?= lang('AdminUsers.yes') ?></button>
        </div>
        <div>
            <a class="button" href="<?= site_url('/admin/users/show/'.$user->id ) ?>"><?= lang('AdminUsers.cancel') ?></a>
        </div>
    </div>
</form>

<?= $this->endSection() ?>