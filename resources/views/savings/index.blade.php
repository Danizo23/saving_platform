<x-app-layout>
    <div class="container py-5">
        <h2 class="mb-4">Maelezo ya Akiba</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
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
                             <td>{{ \Carbon\Carbon::parse($saving->end_date)->format('d M Y') }}</td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Hakuna akiba iliyopatikana.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

           <h3 class="mt-5">Muhtasari wa Akiba kwa Kila Mpango</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Muda wa Mpango (miezi)</th>
            <th>Jumla ya Akiba (TZS)</th>
            <th>Tarehe ya Kutoa Akiba</th>
            <th>Vitendo</th> {{-- Mpya --}}
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
                        <form action="{{ route('savings.withdrawPlan', $plan->id) }}" method="POST">
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
</x-app-layout>
