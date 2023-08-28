<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<div class="col-md-3 ms-3">
    <form action="/news/create" method="post">
    <?= csrf_field() ?>
    <fieldset>
        <legend>Create a news item</legend>
        <div class="form-group">
            <label for="title" class="form-label mt-4">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="<?= set_value('title') ?>">
        </div>
        <div class="form-group">
            <label for="body" class="form-label mt-4">Text</label>
            <textarea class="form-control" name="body" id="body" cols="45" rows="4"><?= set_value('body') ?></textarea>
        </div>
        <div class="text-center mt-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </fieldset>
    </form>
</div>