<div class="card card-user">
  <form action="<?= route('produto.storage') ?>" method="POST">
    <div class="card-header">
      <h5 class="card-title">Cadastro de Produtos</h5>
    </div>
    <div class="card-body px-4">

      <?= CSRF(); ?>
      <input type="hidden" name="id" value="<?= $id ?? '' ?>">
      
      <div class="row">
        <!-- Nome do produto -->
        <div class="col-md-4">
          <div class="form-group">
            <label for="nome">Nome do produto</label>
            <input type="text" id="nome" name="nome" class="form-control <?= has_error('nome', 'is-invalid') ?>" 
              placeholder="Nome" value="<?= old('nome', $nome ?? '') ?>" required>
            <div class="invalid-feedback">
              <ul>
                <?php foreach (errors('nome') as $erro): ?>
                  <li><?= $erro ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>

        <!-- Valor -->
        <div class="col-md-4 pl-1">
          <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" id="valor" name="valor_un" class="form-control <?= has_error('valor_un', 'is-invalid') ?>" 
              placeholder="Insira o valor" value="<?= old('valor_un', $valor_un ?? '') ?>" required>
            <div class="invalid-feedback">
              <ul>
                <?php foreach (errors('valor_un') as $erro): ?>
                  <li><?= $erro ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Unidade de medida -->
        <div class="col-md-4">
          <div class="form-group">
            <label for="unidade_medida">Unidade</label>
            <input type="text" id="unidade_medida" name="unidade_medida" class="form-control <?= has_error('unidade_medida', 'is-invalid') ?>" 
              placeholder="Inserir unidade de medida" value="<?= old('unidade_medida', $unidade_medida ?? '') ?>">
            <div class="invalid-feedback">
              <ul>
                <?php foreach (errors('unidade_medida') as $erro): ?>
                  <li><?= $erro ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>

        <!-- Quantidade em estoque -->
        <div class="col-md-4 pl-1">
          <div class="form-group">
            <label for="qtd_estoque">Quantidade em estoque</label>
            <input type="number" id="qtd_estoque" name="qtd_estoque" class="form-control <?= has_error('qtd_estoque', 'is-invalid') ?>" 
              placeholder="Inserir quantidade" value="<?= old('qtd_estoque', $qtd_estoque ?? '') ?>">
            <div class="invalid-feedback">
              <ul>
                <?php foreach (errors('qtd_estoque') as $erro): ?>
                  <li><?= $erro ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Descrição do Produto -->
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label for="descricao">Descrição do Produto</label>
            <input type="text" id="descricao" name="descricao" class="form-control <?= has_error('descricao', 'is-invalid') ?>" 
              placeholder="Descrição do produto" value="<?= old('descricao', $descricao ?? '') ?>">
            <div class="invalid-feedback">
              <ul>
                <?php foreach (errors('descricao') as $erro): ?>
                  <li><?= $erro ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="card-footer text-right">
      <button type="submit" class="btn btn-primary btn-round"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>
  </form>
</div>
