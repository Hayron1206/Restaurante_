<?php $template->title = 'Mesas' ?>
<div class="container-fluid">
    <div class="row">
        <?php foreach ($mesas as $key => $mesa):
            $color = ($mesa) ? 'success' : 'danger';
            $img = ($mesa) ? 'ocupada' : 'livre';
        ?>
            <div class="col-md-4 col-lg-3">
                <div class="card border-<?= $color ?>">
                    <div class="card-header">
                        <div class="card title h3 text-center text-<?= $color ?>">
                            Mesa <?= $key ?>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <img src="<?= assets("img/mesas/$img.png") ?>" alt="">
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="" class="btn btn-<?= $color ?>">
                        <i class="fa-solid fa-list"></i>
                    </a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</div>