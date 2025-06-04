<x-app-layout>
  <style scoped>
.dashboard {
  position: relative;
  height: 100vh;
  overflow: hidden;
}

.background-video {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: -1;
}

.top-right-buttons {
  position: absolute;
  top: 20px;
  right: 20px;
  display: flex;
  gap: 10px;
}

.center-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.glow-text {
  color: #C0C0C0;
  text-shadow:
    0 0 5px #fff,
    0 0 10px #ccc,
    0 0 20px #aaa,
    0 0 30px #999,
    0 0 40px #888;
  animation: glow 1.5s ease-in-out infinite alternate;
}

@keyframes glow {
  from {
    text-shadow:
      0 0 5px #fff,
      0 0 10px #ccc,
      0 0 20px #aaa,
      0 0 30px #999,
      0 0 40px #888;
  }
  to {
    text-shadow:
      0 0 10px #fff,
      0 0 20px #ccc,
      0 0 30px #aaa,
      0 0 40px #999,
      0 0 50px #888;
  }
}
</style>


  <div class="container py-5">
    <div class="text-center mb-4">
      <h3 class="display-5 fw-bold glow-text">Karibu, {{ Auth::user()->name }}!</h3>
      <p class="lead text-light">Hii ni dashboard yako ya Saving Platform. Anza kuokoa sasa!</p>
    </div>
     <div class="top-right-buttons">

    
      <a href="/savings" class="btn btn-primary me-2">Angalia Akiba</a>


      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-light">Toka</button>
      </form>
    </div>
  </div>
</x-app-layout>
