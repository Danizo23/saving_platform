<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Saving Platform</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* Video ya usuli */
    #bg-video {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    /* Overlay ya maudhui */
    .overlay {
      position: relative;
      z-index: 1;
      height: 100vh;
      color: white;
    }

    /* Vitufe vya juu kulia */
    .top-buttons {
      position: absolute;
      top: 20px;
      right: 30px;
      z-index: 2;
    }

    /* Maudhui ya kati */
    .hero-content {
      height: 100vh;
    }

    .glow-text {
  color: #fff;
  text-align: center;
  animation: glow 1.5s ease-in-out infinite alternate;
  text-shadow:
  0 0 5px #fff,
  0 0 10px #fff,
  0 0 20px #ff4da6,
  0 0 30px #ff4da6,
  0 0 40px #ff4da6,
  0 0 55px #ff4da6,
  0 0 70px #ff4da6;

}

@keyframes glow {
  from {
    text-shadow:
      0 0 5px #fff,
      0 0 10px #fff,
      0 0 20px #0fa,
      0 0 30px #0fa,
      0 0 40px #0fa,
      0 0 55px #0fa,
      0 0 70px #0fa;
  }
  to {
    text-shadow:
      0 0 10px #fff,
      0 0 20px #0fa,
      0 0 30px #0fa,
      0 0 40px #0fa,
      0 0 50px #0fa,
      0 0 60px #0fa,
      0 0 70px #0fa;
  }
}



.silver-glow {
  font-size: 3rem;
  font-weight: bold;
  color: #C0C0C0;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.silver-glow::after {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(120deg, transparent, rgba(255,255,255,0.6), transparent);
  animation: shine 2s infinite;
}

@keyframes shine {
  to {
    left: 100%;
  }
}


  </style>
</head>
<body>
  <!-- Video ya usuli -->
  <video autoplay muted loop id="bg-video">
    <source src="/videos/meeting.mp4" type="video/mp4" />
  </video>

  <!-- Maudhui ya juu -->
  <div class="overlay">
    <!-- Vitufe vya juu kulia -->
    <div class="top-buttons">
      <a href="{{ route('register') }}" class="btn btn-outline-light me-2">Register</a>
      
    </div>

    <!-- Maudhui ya kati -->
    <div class="container d-flex flex-column justify-content-center align-items-center text-center hero-content">
      <h1 class="silver-glow">Welcome to the Saving Platform</h1>
      <p class="lead">Save your money and achieve your financial goals!</p>
      <a href="/dashboard" class="btn btn-primary btn-lg mt-3">Get Started</a>
    </div>
  </div>
</body>
</html>
