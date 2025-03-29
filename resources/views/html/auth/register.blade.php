<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Financial Planner</title>
    <link rel="stylesheet" href="/css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="logo" style="display: flex; align-items: center; gap: 0.5rem; justify-content: center; margin-bottom: 1rem;">
                <img src="/images/logo.png" alt="Logo" style="width: 60px; height: 60px; object-fit: contain;">
                <div style="font-size: 1.2rem; font-weight: 600;">
                    <span style="color: #71D881;">Financial</span>
                    <span>Planner</span>
                </div>
            </div>
            <p class="subtitle">Create your account to start planning.</p>
            
            <form class="auth-form" action="/register" method="POST">
                @csrf
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" class="{{ $errors->has('username') ? 'error' : '' }}" required>
                    @error('username')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-input">
                        <input type="password" id="password" name="password" required>
                        <button type="button" class="toggle-password">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#A0A0A0">
                                <path d="M12 4C4 4 1 12 1 12C1 12 4 20 12 20C20 20 23 12 23 12C23 12 20 4 12 4Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Register</button>
                
                <div class="divider">
                    <span>or</span>
                </div>

                <button type="button" class="google-btn">
                    <img src="/images/google.png" alt="Google">
                    Continue with Google
                </button>
            </form>

            <p class="switch-auth">
                Already have an account? <a href="/login">Login</a>
            </p>
        </div>
    </div>

    <script>
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const password = document.querySelector('#password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
        });
    </script>
</body>
</html> 