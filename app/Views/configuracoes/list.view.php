<?php $template->title = 'Configurações'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="<?= route('home'); ?>" class="btn btn-info">
                <i class="fa-solid fa-chevron-left"></i> Voltar
            </a>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="<?= route('configuracoes'); ?>" method="POST">
                <div class="card">
                    <div class="card-body">
                        <?php foreach ($configs as $config): ?>
                            <div class="form-group row">
                                <label for="<?= $config->name ?>" class="col-form-label <?= $config->label ?>"></label>
                                <input type="text" class="form-control  " id="<?= $config->name ?>"
                                    value="<?= $config->value ?>" name="<?= $config->name ?>">
                                    
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="card-footer">
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary btn-round"><i class="fa fa-floppy-o"></i> Salvar</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>