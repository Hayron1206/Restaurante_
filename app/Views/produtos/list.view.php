<div class="container-fluid">
<h3>Produtos</h3>

    <div class="row d-flex justify-content-end">
        <div class="col-6 col-md-4 col-sm-2 text-right">
            <a href="<?= route('produto.create') ?>" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> Adicionar Produto</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th title="Descrição do Produto">Nome</th>
                        <th>Valor</th>
                        <th>Disponível</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?= $produto->nome ?></td>
                            <td><?= $produto->valor_un ?></td>
                            <td><?= $produto->disponivel ?></td>
                            <td class="d-flex">
                                <a href="<?= route('produto.edit', ['id' => $produto->id]) ?>"
                                    class="mr-3"><i class="fa fa-edit"></i></a>
                                <form action="<?= route('produto.delete') ?>" method="post">
                                    <?= CSRF() ?>
                                    <input type="hidden" name="id" value="<?= $produto->id ?>">
                                    <button type="submit" class="link btn btn-link p-0">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr> 
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>  