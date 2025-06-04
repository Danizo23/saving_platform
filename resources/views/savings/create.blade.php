<x-app-layout>
    <div class="container py-5">
        <h2 class="mb-4">Weka Akiba Mpya</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('savings.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="amount" class="form-label">Kiasi cha Kuweka (TZS)</label>
                <input type="number" name="amount" id="amount"
                       class="form-control @error('amount') is-invalid @enderror"
                       min="{{ $plans->first()->min_amount }}"
                       max="{{ $plans->first()->max_amount }}"
                       required>
                @error('amount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="savings_plan_id" class="form-label">Chagua Mpango wa Akiba</label>
                <select name="savings_plan_id" id="savings_plan_id"
                        class="form-select @error('savings_plan_id') is-invalid @enderror"
                        required>
                    <option value="" disabled selected>-- Chagua Mpango --</option>
                    @foreach ($plans as $plan)
                        <option value="{{ $plan->id }}">
                            {{ $plan->name }} - {{ $plan->duration_months }} miezi
                            (Min: {{ number_format($plan->min_amount) }} / Max: {{ number_format($plan->max_amount) }})
                        </option>
                    @endforeach
                </select>
                @error('savings_plan_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
    <label for="network" class="form-label">Chagua Mtandao wa Simu</label>
    <select name="network" id="network"
            class="form-select @error('network') is-invalid @enderror" required>
        <option value="" disabled selected>-- Chagua Mtandao --</option>
        <option value="Tigo">Tigo</option>
        <option value="Vodacom">Vodacom</option>
        <option value="Airtel">Airtel</option>
        <option value="Halotel">Halotel</option>
    </select>
    @error('network')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


            <button type="submit" class="btn btn-primary">Weka Akiba</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Rudi</a>

        </form>
    </div>

    <script>
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    alert('Tafadhali jaza sehemu zote kabla ya kuwasilisha!')
                }
                form.classList.add('was-validated')
            }, false)
        })
})()
</script>

</x-app-layout>
