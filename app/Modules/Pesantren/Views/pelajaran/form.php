<?php $this->extend('master'); ?>

<?php $this->section('main'); ?>
    <x-page-head>
        <a href="<?php echo $backUrl ?>" class="back">&larr; <?= lang('crud.pelajaran') ?></a>
        <h4><?php echo isset($data) ? '<i class="fa fa-pencil"></i>' : '<i class="fa fa-plus"></i>' ?>  <?= lang('crud.pelajaran') ?></h4>
    </x-page-head>

    <?php if (isset($data) && null !== $data->deleted_at) { ?>
        <div class="alert danger">
            This <?= lang('crud.pelajaran') ?> was deleted on <?php echo $data->deleted_at->humanize(); ?>.
            <a href="#">Restore <?= lang('crud.pelajaran') ?>?</a>
        </div>
    <?php } ?>


    <x-admin-box>


        <form action="<?php echo $actionUrl; ?>" method="post" enctype="multipart/form-data">

            <?php echo csrf_field(); ?>

            <?php if (isset($data) && null !== $data) { ?>
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="id" value="<?php echo $data->id; ?>">
            <?php } ?>

            <fieldset>
                                <div class="row mb-3">
                    <?= form_label(lang('crud.class_id'),'',['for' => 'class_id', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_dropdown('class_id',$kelasItems ,old('class_id', $data->class_id ?? ''), "class='form-control select2' required placeholder='".lang('crud.class_id')."' ") ?>
                        <?php if (has_error('class_id')) { ?>
                        <p class="text-danger"><?php echo error('class_id'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label(lang('crud.name'),'',['for' => 'name', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('name', old('name', $data->name ?? ''), "class='form-control varchar' required placeholder='".lang('crud.name')."' ") ?>
                        <?php if (has_error('name')) { ?>
                        <p class="text-danger"><?php echo error('name'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label(lang('crud.kategori_pelajaran_id'),'',['for' => 'category_id', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_dropdown('category_id',$kategori_pelajaranItems ,old('category_id', $data->category_id ?? ''), "class='form-control select2' required placeholder='".lang('crud.category_id')."' ") ?>
                        <?php if (has_error('category_id')) { ?>
                        <p class="text-danger"><?php echo error('category_id'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label(lang('crud.duration'),'',['for' => 'duration', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('duration', old('duration', $data->duration ?? ''), "class='form-control int'  placeholder='".lang('crud.duration')."' ") ?>
                        <?php if (has_error('duration')) { ?>
                        <p class="text-danger"><?php echo error('duration'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label(lang('crud.uom_id'),'',['for' => 'uom_id', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_dropdown('uom_id',$uomItems ,old('uom_id', $data->uom_id ?? ''), "class='form-control select2' required placeholder='".lang('crud.uom_id')."' ") ?>
                        <?php if (has_error('uom_id')) { ?>
                        <p class="text-danger"><?php echo error('uom_id'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label(lang('crud.sequence'),'',['for' => 'sequence', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('sequence', old('sequence', $data->sequence ?? ''), "class='form-control int'  placeholder='".lang('crud.sequence')."' ") ?>
                        <?php if (has_error('sequence')) { ?>
                        <p class="text-danger"><?php echo error('sequence'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <?= form_label(lang('crud.created_by'),'',['for' => 'created_by', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('created_by', old('created_by', $data->created_by ?? ''), "class='form-control int'  placeholder='".lang('crud.created_by')."' ") ?>
                        <?php if (has_error('created_by')) { ?>
                        <p class="text-danger"><?php echo error('created_by'); ?></p>
                        <?php } ?>
                    </div>
                </div> -->
            </fieldset>

            <div class="text-end py-3">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> <?= lang('crud.pelajaran') ?></button>
            </div>

        </form>

    </x-admin-box>

<?php $this->endSection(); ?>