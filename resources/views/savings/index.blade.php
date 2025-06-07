<x-app-layout>
  <style scoped>
    .view-container {
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      min-height: 100vh;
      padding: 2rem;
      color: white;
    }

    .content-box {
      background-color: #1a1a2e;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.05);
    }

    .table-dark thead {
      background-color: #2c3e50;
    }

    .table {
      background-color: #121212;
      color: white;
    }

    .table th,
    .table td {
      border-color: #444;
    }

    .badge {
      font-size: 0.9rem;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
    }

    .btn-secondary {
      background-color: #6c757d;
      border: none;
    }

    .btn-success {
      background-color: #28a745;
      border: none;
    }

    .btn-sm {
      padding: 0.25rem 0.5rem;
    }

    .alert-success {
      background-color: #155724;
      color: #d4edda;
      border: none;
    }
  </style>

  <div class="view-container">
    <div class="content-box">
      <h2 class="mb-4 text-center">Maelezo ya Akiba</h2>

      @if (session('success'))
          <div class="alert alert-success text-center">{{ session('success') }}</div>
      @endif

      <div class="mb-3">
        <strong>Jumla ya Akiba:</strong> TZS {{ number_format($totalAmount) }}
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Kiasi (TZS)</th>
              <th>Muda (Miezi)</th>
              <th>Status</th>
              <th>Tarehe ya Kuundwa</th>
              <th>Tarehe ya Kuondoa Akiba</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($savings as $index => $saving)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ number_format($saving->amount) }}</td>
                <td>{{ $saving->duration }}</td>
                <td>
                  @if($saving->status === 'active')
                      <span class="badge bg-success">Hai</span>
                  @elseif($saving->status === 'pending')
                      <span class="badge bg-warning text-dark">Inasubiri</span>
                  @else
                      <span class="badge bg-secondary">Haifanyi kazi</span>
                  @endif
                </td>
                <td>{{ $saving->created_at->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($withdrawDates[$saving->duration])->format('d M Y') }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center">Hakuna akiba iliyopatikana.</td>
              </tr>
            @endforelse
          </tbody>
        </table>

        <h3 class="mt-5 text-center">Muhtasari wa Akiba kwa Kila Mpango</h3>
        <table class="table table-striped table-bordered text-white">
          <thead class="table-dark">
            <tr>
              <th>Muda wa Mpango (miezi)</th>
              <th>Jumla ya Akiba (TZS)</th>
              <th>Tarehe ya Kutoa Akiba</th>
              <th>Vitendo</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($totalsByPlan as $plan)
              <tr>
                <td>{{ $plan->duration }}</td>
                <td>{{ number_format($plan->total_amount) }}</td>
                <td>{{ \Carbon\Carbon::parse($plan->withdraw_date)->format('d M Y') }}</td>
                <td>
                  @if(\Carbon\Carbon::now()->greaterThanOrEqualTo($plan->withdraw_date))
                      <form action="{{  route('savings.withdrawPlan', ['duration' => $plan->duration]) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-sm btn-success">Toa Akiba</button>
                      </form>
                  @else
                      <button class="btn btn-sm btn-secondary" disabled>Subiri</button>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('savings.create') }}" class="btn btn-primary">Ongeza Akiba</a>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Rudi</a>
      </div>
    </div>
  </div>
</x-app-layout>
