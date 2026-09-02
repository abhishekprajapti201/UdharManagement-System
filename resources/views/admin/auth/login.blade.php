<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

<!-- Include jQuery (required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- Google Font (Inter) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet" />

  <style>
    * { font-family: 'Inter', sans-serif; }

    body {
      background: linear-gradient(135deg, #f0f4ff 0%, #e6edf7 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease;
    }

    .login-card:hover {
      transform: translateY(-2px);
    }

    .input-field {
      transition: all 0.2s ease;
      border: 2px solid #e2e8f0;
    }

    .input-field:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
      outline: none;
    }

    .input-field.error {
      border-color: #ef4444;
      box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    .login-btn {
      transition: all 0.2s ease;
      background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    }

    .login-btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.4);
    }

    .login-btn:active {
      transform: translateY(0);
    }

    .error-message {
      animation: shake 0.5s ease;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-8px); }
      75% { transform: translateX(8px); }
    }

    .input-icon {
      color: #94a3b8;
      transition: color 0.2s ease;
    }

    .input-group:focus-within .input-icon {
      color: #3b82f6;
    }

    .input-group.error .input-icon {
      color: #ef4444;
    }

    .password-toggle {
      cursor: pointer;
      color: #94a3b8;
      transition: color 0.2s ease;
    }

    .password-toggle:hover {
      color: #475569;
    }

    /* Loading spinner */
    .spinner {
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-top: 2px solid white;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      animation: spin 0.8s linear infinite;
      display: inline-block;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Floating shapes background */
    .floating-shape {
      position: fixed;
      border-radius: 50%;
      opacity: 0.05;
      pointer-events: none;
      z-index: -1;
    }
  </style>
</head>
<body>

  <!-- Background decorative shapes -->
  <div class="floating-shape w-96 h-96 bg-blue-600 -top-20 -right-20"></div>
  <div class="floating-shape w-64 h-64 bg-indigo-600 bottom-10 -left-20"></div>
  <div class="floating-shape w-48 h-48 bg-cyan-600 top-1/2 left-1/2 transform -translate-x-1/2"></div>

  <!-- ===== LOGIN CARD ===== -->
  <div class="w-full max-w-md mx-4">
    <div class="login-card rounded-2xl p-8 sm:p-10">

      <!-- Logo & Title -->
      <div class="text-center mb-8">
        <div class="flex justify-center mb-4">
          <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-200">
           <span class="text-white text-2xl font-bold">UM</span>
          </div>
        </div>
        <h1 class="text-3xl font-bold text-slate-800 admin-logo-text">
          Login <span class="text-blue-600">Panel</span>
        </h1>

      </div>

      <!-- Login Form -->
      <form  class="space-y-5">

        <!-- Email Field -->
        <div>
          <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">
           Email Address
          </label>
          <div class="input-group relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <i class="fas fa-envelope input-icon text-sm"></i>
            </div>
            <input
              type="email"
              id="email"
              name="email"
              class="input-field w-full pl-10 pr-3 py-3 rounded-xl text-sm bg-white/70 placeholder:text-slate-400"
              placeholder="Enter your email address"
              value="{{ old('email') }}"

            />
          </div>
          <div id="emailError" class="text-red-500 text-xs mt-1 hidden">
            <i class="fas fa-exclamation-circle mr-1"></i> Please enter a valid email
          </div>
        </div>

        <!-- Password Field -->
        <div>
          <div class="flex items-center justify-between mb-1.5">
            <label for="password" class="block text-sm font-semibold text-slate-700">
              Password
            </label>

          </div>
          <div class="input-group relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <i class="fas fa-lock input-icon text-sm"></i>
            </div>
            <input
              type="password"
              id="password"
              name="password"
              class="input-field w-full pl-10 pr-12 py-3 rounded-xl text-sm bg-white/70 placeholder:text-slate-400"
              placeholder="Enter your password"
              value="{{ old('paasswprd') }}"

            />
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
              <i class="fas fa-eye password-toggle" id="togglePassword" onclick="togglePassword()"></i>
            </div>
          </div>
          <div id="passwordError" class="text-red-500 text-xs mt-1 hidden">
            <i class="fas fa-exclamation-circle mr-1"></i> Password must be at least 6 characters
          </div>
        </div>

        {{-- <!-- Remember Me -->
        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 text-sm text-slate-600 cursor-pointer">
            <input type="checkbox" id="rememberMe" class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500" />
            <span>Remember me</span>
          </label>
        </div> --}}

        <!-- Login Button -->
        <button
          type="submit"
          id="loginBtn"
          class="login-btn w-full text-white font-semibold py-3.5 rounded-xl text-sm transition-all flex items-center justify-center gap-2"
        >
          <span id="btnText">Sign In</span>
          <i class="fas fa-arrow-right text-sm" id="btnIcon"></i>
          <span id="btnSpinner" class="hidden"><span class="spinner"></span></span>
        </button>


      </form>

  </div>

  <script>

    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const toggleIcon = document.getElementById('togglePassword');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
      }
    }
  </script>
</body>
</html>
