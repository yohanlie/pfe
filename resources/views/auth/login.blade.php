<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .wrapper {
        background: #ececec;
        padding: 0 20px 0 20px;
    }

    .main {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .side-image {
        width: 450px;
        height: 550px;
        background-image: url("/images/log_img.jpg");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 10px 0 0 10px;
        position: relative;
    }

    .row {
        width: 900px;
        height: 550px;
        display: flex;
        border-radius: 10px;
        background: #fff;
        padding: 0px;
        box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.2);
    }

    .text-image {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .text p {
        color: #fff;
        font-size: 20px;
    }

    .right {
        width: 450px;
        height: 550px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .input-boxx {
        width: 330px;
        box-sizing: border-box;
    }

    .side-image img {
        width: 35px;
        position: absolute;
        top: 30px;
        left: 30px;
    }

    .input-boxx header {
        font-weight: 700;
        text-align: center;
        margin-bottom: 45px;
    }

    .input-fieldd {
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 0 10px 0 10px;
    }

    .inputt {
        height: 45px;
        width: 100%;
        background: transparent;
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        outline: none;
        margin-bottom: 20px;
        color: #40414a;
    }

    .input-boxx .input-fieldd label {
        position: absolute;
        top: 10px;
        left: 10px;
        pointer-events: none;
        transition: .5s;
    }

    .input-fieldd input:focus~label {
        top: -10px;
        font-size: 13px;
    }

    .input-fieldd input:valid~label {
        top: -10px;
        font-size: 13px;
        color: #5d5076;
    }

    .input-fieldd .input:focus,
    .input-field .input:valid {
        border-bottom: 1px solid #743ae1;
    }

    .submitt {
        border: none;
        outline: none;
        height: 45px;
        background: #ececec;
        border-radius: 5px;
        transition: .4s;
    }

    .submitt:hover {
        background: rgba(37, 95, 156, 0.937);
        color: #fff;
    }

    .signin {
        text-align: center;
        font-size: small;
        margin-top: 25px;
    }

    .signin span a {
        text-decoration: none;
        font-weight: 700;
        color: #000;
        transition: .5s;
    }

    .signin span a:hover {
        text-decoration: underline;
        color: #000;
    }

    @media only screen and (max-width: 768px) {
        .side-image {
            border-radius: 10px 10px 0 0;
        }

        img {
            width: 35px;
            position: absolute;
            top: 20px;
            left: 47%;
        }

        .textt {
            position: absolute;
            top: 70%;
            text-align: center;
        }

        .textt p {
            font-size: 16px;
        }

        .row {
            max-width: 420px;
            width: 100%;
        }
    }
</style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header>
        <div class="header-main" style="height: 90px; border-bottom: 1px solid grey;">
            <div class="container" style="display: flex; justify-content: center; transform: translateY(35%);">
                <a href="/" class="header-logo" style="margin: 0;">
                    <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary" style="font-size: 25px;">Flower</strong><strong>shop</strong></div>
                </a>
            </div>
            <div class="header-search-container" style="margin-left: 90px; transform: translateY(-55%);">
                <a href="/"><button class="search-btn">Go back</button></a>
            </div>
        </div>
    </header>
    <!-- end header section -->
  </div>
  <!-- end hero area -->
    <div class="wrapper">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="main">
            <div class="row">
                <div class="col-md-6 side-image"></div>
                <div class="col-md-6 right">
                    <div class="input-boxx">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <header>Log in</header>
                            <!-- Email Address -->
                            <div class="input-fieldd">
                                <input id="email" class="inputt" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <label for="email">Email</label>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="input-fieldd">
                                <input id="password" class="inputt"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />
                                <label for="password">Password</label>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div style="display: flex;flex-direction: column;position: relative;padding: 0 10px 0 10px; margin-bottom: 10px;">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" style="width: 14px;" name="remember">
                                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div class="input-fieldd">
                                <button class="submitt">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                            <div class="signin">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{url('/register')}}">
                                        {{ __('New Client?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <!-- info section -->

  @include('home.footer')

</body>

</html>