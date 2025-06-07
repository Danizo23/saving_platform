<x-app-layout>
  <style scoped>
    .form-container {
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      min-height: 100vh;
      padding: 2rem;
      color: white;
    }

    .form-box {
      background-color: #1a1a2e;
      padding: 2rem;
      border-radius: 1rem;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.05);
    }

    .form-label {
      color: #ccc;
    }

    .form-control, .form-select {
      background-color: #2a2a40;
      color: white;
      border: 1px solid #444;
    }

    .form-control:focus, .form-select:focus {
      border-color: #4dd0e1;
      box-shadow: 0 0 0 0.2rem rgba(77, 208, 225, 0.25);
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
    }

    .btn-secondary {
      background-color: #6c757d;
      border: none;
    }

    .btn-primary:hover, .btn-secondary:hover {
      opacity: 0.9;
    }

    .alert {
      background-color: #661010;
      color: #f1f1f1;
      border: none;
    }
  </style>

  <div class="form-container">
    <div class="form-box">
      <h2 class="mb-4 text-center">Weka Akiba Mpya</h2>

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

          <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-primary">Weka Akiba</button>
              <a href="{{ route('dashboard') }}" class="btn btn-secondary">Rudi</a>
          </div>
      </form>
    </div>
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
