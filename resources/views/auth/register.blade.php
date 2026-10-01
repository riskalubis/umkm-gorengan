<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ffd6a5, #ffb4a2, #ffc8dd);
        }

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        .register-card {
            width: 400px;
            max-width: 100%;
            background: #ffffff;
            border-radius: 28px;
            padding: 36px 38px;
            box-shadow: 0 20px 50px rgba(150, 70, 30, 0.18);
        }

        .register-title {
            margin-bottom: 26px;
        }

        .register-title h1 {
            margin: 0;
            font-size: 25px;
            font-weight: 700;
            color: #292929;
        }

        .register-title p {
            margin: 7px 0 0;
            font-size: 13px;
            color: #999;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
            color: #444;
        }

        .form-group input {
            width: 100%;
            height: 46px;
            padding: 0 14px;
            border: 1px solid #e5e5e5;
            border-radius: 13px;
            background: #fafafa;
            font-size: 13px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #f59e0b;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.10);
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 18px;
            margin-top: 22px;
        }

        .login-link {
            color: #888;
            font-size: 13px;
            text-decoration: underline;
        }

        .register-button {
            height: 44px;
            padding: 0 22px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #f97316, #f59e0b);
            color: white;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 7px 18px rgba(249, 115, 22, 0.25);
            transition: 0.2s;
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(249, 115, 22, 0.32);
        }

        @media (max-width: 480px) {
            .register-card {
                padding: 30px 24px;
                border-radius: 24px;
            }

            .actions {
                gap: 12px;
            }
        }
    </style>
</head>

<body>

<div class="register-wrapper">

    <div class="register-card">

        <div class="register-title">
            <h1>Buat Akun</h1>

            <p>
                Daftarkan akun untuk melanjutkan.
            </p>
        </div>


        <form method="POST" action="{{ route('register') }}">

            @csrf


            {{-- NAME --}}
            <div class="form-group">

                <label for="name">
                    Nama
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Masukkan nama"
                >

                <x-input-error
                    :messages="$errors->get('name')"
                    class="mt-2"
                />

            </div>


            {{-- EMAIL --}}
            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="username"
                    placeholder="Masukkan email"
                >

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />

            </div>


            {{-- PASSWORD --}}
            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Masukkan password"
                >

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />

            </div>


            {{-- CONFIRM PASSWORD --}}
            <div class="form-group">

                <label for="password_confirmation">
                    Konfirmasi Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Ulangi password"
                >

                <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="mt-2"
                />

            </div>


            {{-- BUTTON --}}
            <div class="actions">

                <a
                    href="{{ route('login') }}"
                    class="login-link"
                >
                    Sudah punya akun?
                </a>

                <button
                    type="submit"
                    class="register-button"
                >
                    Daftar
                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>