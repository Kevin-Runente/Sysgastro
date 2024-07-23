<?php include'../includes/' ?>
  <div class="dashboard">
    <div class="sidebar">
      <h2>Dashboard</h2>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Pedidos</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Clientes</a></li>
        <li><a href="#">Estadísticas</a></li>
      </ul>
    </div>
    <div class="main-content">
      <h2>Resumen</h2>
      <div class="summary">
        <div class="summary-card">
          <h3>Total de Pedidos</h3>
          <p>120</p>
        </div>
        <div class="summary-card">
          <h3>Productos Vendidos</h3>
          <p>350</p>
        </div>
        <div class="summary-card">
          <h3>Clientes Registrados</h3>
          <p>200</p>
        </div>
      </div>
      <div class="recent-orders">
        <h2>Pedidos Recientes</h2>
        <table>
          <thead>
            <tr>
              <th>ID Pedido</th>
              <th>Cliente</th>
              <th>Total</th>
              <th>Fecha</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>001</td>
              <td>Cliente A</td>
              <td>$100.00</td>
              <td>01/07/2024</td>
            </tr>
            <tr>
              <td>002</td>
              <td>Cliente B</td>
              <td>$150.00</td>
              <td>02/07/2024</td>
            </tr>
            <!-- Aquí irían más filas de pedidos recientes -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
