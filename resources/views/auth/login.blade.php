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

    .forgot-password {
      display: block;
      text-align: right;
      margin-top: 0.5rem;
      font-size: 0.9rem;
      color: #4dd0e1;
      text-decoration: none;
    }

    .forgot-password:hover {
      text-decoration: underline;
    }
  </style>

  <div class="form-container">
    <div class="form-box">
      <h2 class="mb-4 text-center text-white text-2xl font-semibold">Ingia</h2>

      @if(session('status'))
        <div class="alert">
          {{ session('status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
        @csrf

        <div>
          <label for="email" class="form-label">Email</label>
          <input id="email" name="email" type="email" required autofocus
                 class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
          @error('email')
            <p class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</p>
          @enderror
        </div>

        <div class="mt-4">
          <label for="password" class="form-label">Password</label>
          <input id="password" name="password" type="password" required
                 class="form-control @error('password') is-invalid @enderror">
          @error('password')
            <p class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</p>
          @enderror
          <a href="{{ route('password.request') }}" class="forgot-password">Forget Password?</a>
        </div>

        <div class="flex items-center mt-4">
          <input id="remember_me" type="checkbox" name="remember"
                 class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
          <label for="remember_me" class="ml-2 block text-sm text-white">Remember me</label>
        </div>

        <button type="submit" class="btn-primary">Ingia</button>
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
