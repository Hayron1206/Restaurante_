  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h3>Mesas</h3>
      </div>
    </div>
    <div class="row" id="mesas-container">
      <!-- Os cartões das mesas serão injetados aqui pelo JavaScript -->
    </div>
  </div>

  <script>
    // Gerar cartões das mesas dinamicamente
    for (let i = 1; i <= 10; i++) {
      let cardHTML = `
        <div class="col-sm-4 col-lg-3 mb-4">
          <div class="card">
            <div class="card-header text-white">
              <h5 class="card-title text-center">Mesa ${i}
              </h5>
              </div>
              <img src='../assets/img/mesas/r.png'>
            <div class="card-body">
              <!-- Botão para reservar mesa -->                                  
              <a href="reserva" class="btn btn-outline-warning w-100 mb-2">Reservar a mesa</a>

              <!-- Ações para iniciar atendimento -->   
              <a href="pedido" class="btn btn-outline-success w-100 mb-2">Iniciar Atendimento</a>   

              <!-- Ações para adicionar pedido -->                                 
              <a href="produto" class="btn btn-outline-primary w-100 mb-2">Adicionar Produtos</a>   
            </div>
          </div>
        </div>
      `;
      // Adicionar o cartão gerado ao container de mesas
      document.getElementById('mesas-container').innerHTML += cardHTML;
    }
  </script>

  <!-- Scripts do Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>