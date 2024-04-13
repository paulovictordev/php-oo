<section class="row">
    <div class="col">
        <img src="/assets/img/add_course.svg" width="100%">
    </div>
    <div class="col">
        <form action=<?php echo "/cursos/editar?id={$curso->id}" ?> method="post">
            <label for="name"><?= translate('course-name') ?></label>
            <input value="<?php echo $curso->name; ?>" id="name" type="text" class="form-control mb-3" name="name" placeholder="<?= translate('input-type-here') ?>">


            <label for="description"><?= translate('course-description') ?></label>
            <input value="<?php echo $curso->description; ?>" id="description" type="text" class="form-control mb-3" name="description" placeholder="<?= translate('input-type-here') ?>">

            <select id="status" name="status" class="form-select" aria-label="Default select example">
                <option <?php echo $curso->status === true ?'selected':'' ?> value="1">Ativo</option>
                <option <?php echo $curso->status === false ?'selected':'' ?> value="0">Inativo</option>
            </select>

            <button type="submit" class="btn btn-outline-success w-100 mt-3">
                <?= translate('text-save') ?>
            </button>
        </form>
    </div>
</section>