<x-app-layout>
  <style scoped>
    .form-container {
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      min-height: 100vh;
      padding: 2rem;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-box {
      background-color: #1a1a2e;
      padding: 2rem;
      border-radius: 1rem;
      max-width: 600px;
      width: 100%;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.05);
    }

    .form-label {
      color: #ccc;
      font-weight: 600;
    }

    .form-control {
      background-color: #2a2a40;
      color: white;
      border: 1px solid #444;
      border-radius: 0.375rem;
      padding: 0.5rem 0.75rem;
      width: 100%;
      margin-top: 0.25rem;
      font-size: 1rem;
    }

    .form-control:focus {
      border-color: #4dd0e1;
      box-shadow: 0 0 0 0.2rem rgba(77, 208, 225, 0.25);
      outline: none;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      width: 100%;
      font-weight: 600;
      font-size: 1.1rem;
      cursor: pointer;
      margin-top: 1rem;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .alert {
      background-color: #661010;
      color: #f1f1f1;
      border: none;
      padding: 0.75rem 1rem;
      margin-bottom: 1rem;
      border-radius: 0.5rem;
      font-weight: 600;
    }

    .login-link {
      display: block;
      text-align: center;
      margin-top: 1rem;
      font-size: 0.9rem;
      color: #4dd0e1;
      text-decoration: none;
    }

    .login-link:hover {
      text-decoration: underline;
    }
  </style>

  <div class="form-container">
    <div class="form-box">
      <h2 class="mb-4 text-center text-white text-2xl font-semibold">Sajili Akaunti Mpya</h2>

      @if ($errors->any())
          <div class="alert">
              <ul class="mb-0 list-disc list-inside">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
        @csrf

        <div>
          <label for="name" class="form-label">Jina</label>
          <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                 class="form-control @error('name') is-invalid @enderror">
          @error('name')
            <p class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</p>
          @enderror
        </div>

        <div class="mt-4">
          <label for="email" class="form-label">Email</label>
          <input id="email" name="email" type="email" value="{{ old('email') }}" required
                 class="form-control @error('email') is-invalid @enderror">
          @error('email')
            <p class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</p>
          @enderror
        </div>

        <div class="mt-4">
          <label for="password" class="form-label">Nywila</label>
          <input id="password" name="password" type="password" required
                 class="form-control @error('password') is-invalid @enderror">
          @error('password')
            <p class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</p>
          @enderror
        </div>

        <div class="mt-4">
          <label for="password_confirmation" class="form-label">Thibitisha Nywila</label>
          <input id="password_confirmation" name="password_confirmation" type="password" required
                 class="form-control @error('password_confirmation') is-invalid @enderror">
          @error('password_confirmation')
            <p class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="btn-primary">Sajili</button>
      </form>

      <a href="{{ route('login') }}" class="login-link">Tayari una akaunti? Ingia hapa</a>
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
