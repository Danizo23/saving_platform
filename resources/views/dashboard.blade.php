<x-app-layout>
  <style>
    .dashboard {
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      min-height: 100vh;
      padding: 2rem;
      color: white;
      display: flex;
      flex-direction: column;
    }

    @media (min-width: 768px) {
      .dashboard {
        flex-direction: row;
      }
    }

    .sidebar {
      width: 100%;
      margin-bottom: 2rem;
      padding: 1.5rem;
      background-color: #1a1a2e;
      border: 2px solid rgb(8, 10, 10);
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(226, 230, 231, 0.2);
    }

    @media (min-width: 768px) {
      .sidebar {
        width: 220px;
        margin-right: 2rem;
        margin-bottom: 0;
      }
    }

    .sidebar a,
    .sidebar form button {
      display: block;
      width: 100%;
      margin-bottom: 1rem;
      padding: 0.6rem 1rem;
      border-radius: 8px;
      text-decoration: none;
      color: white;
      background-color: #007bff;
      text-align: center;
      transition: background-color 0.3s ease;
    }

    .sidebar a:hover,
    .sidebar form button:hover {
      background-color: #0056b3;
    }

    .sidebar form button {
      background-color: #f8f9fa;
      color: #000;
      border: none;
    }

    .main-content {
      flex: 1;
    }

    .summary-card {
      background-color: #1a1a2e;
      padding: 1.5rem;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.05);
      text-align: center;
      margin-bottom: 1rem;
    }

    @media (min-width: 768px) {
      .summary-cards-container {
        display: flex;
        gap: 1rem;
      }

      .summary-card {
        flex: 1;
        margin-bottom: 0;
      }
    }

    .summary-card h5 {
      margin-bottom: 0.5rem;
      font-size: 1.2rem;
    }

    .summary-card p {
      font-size: 2rem;
      font-weight: bold;
      color: #4dd0e1;
    }

    .chart-placeholder {
      background-color: #1a1a2e;
      padding: 1rem;
      border-radius: 1rem;
      margin-top: 2rem;
      overflow-x: auto;
    }
  </style>

  <div class="dashboard">
    <!-- Sidebar links -->
    <div class="sidebar">
      <a href="/dashboard">🏠 Dashboard</a>
      <a href="/savings">💰 Angalia Akiba</a>
      <a href="/savings/create">➕ Ongeza Akiba</a>
    <form method="POST" action="{{route('logout') }}">
        @csrf
        <button type="submit">🚪 Toka</button>
      </form>
    </div>

    <!-- Main content -->
    <div class="main-content">
      <div class="text-center mb-5">
        <h1>Karibu, {{ Auth::user()->name }}</h1>
        <p class="lead">Hii ni dashboard yako ya saving platform. Fuatilia akiba zako kwa ufanisi.</p>
      </div>

      <div class="summary-cards-container">
        <div class="summary-card">
          <h5>Jumla ya Akiba</h5>
          <p class="card-text">{{ number_format($totalAmount) }} TZS</p>
        </div>
        <div class="summary-card">
          <h5>Mpango Hai wa Akiba</h5>
          <p class="card-text">{{ number_format($activeAmount) }} TZS</p>
        </div>
        <div class="summary-card">
          <h5>Mpango Uliokamilika</h5>
          <p class="card-text">{{ number_format($completedAmount) }} TZS</p>
        </div>
      </div>

      <!-- Graph area -->
      <div class="chart-placeholder mt-10">
        <canvas id="savingsGraph" width="600" height="300"></canvas>
      </div>
    </div>
  </div>

  <!-- Chart.js CDN + Sample Graph Script -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('savingsGraph').getContext('2d');
    const savingsGraph = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Akiba kwa Mwezi (TZS)',
          data: [50000, 100000, 75000, 90000, 120000, 150000],
          borderColor: '#4dd0e1',
          backgroundColor: 'rgba(77, 208, 225, 0.2)',
          fill: true,
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            labels: {
              color: 'white'
            }
          }
        }
      }
    });
  </script>
</x-app-layout>
