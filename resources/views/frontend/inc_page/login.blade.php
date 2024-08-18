{{-- <div class="banner-wrapper has_background">
    <img src="assets/images/banner-for-all2.jpg" class="img-responsive attachment-1920x447 size-1920x447" alt="img">
    <div class="banner-wrapper-inner">
        <h1 class="page-title">Login Page</h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="/"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span>Login Page</span>
                </li>
            </ul>
        </div>
    </div>
</div> --}}
<main class="site-main  main-container no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12 mt-5">
                <div class="page-main-content">
                    <div class="akasha">
                        <div class="akasha-notices-wrapper"></div>
                        <div class="u-columns col2-set" id="customer_login">



                            <div class="u-column1 col-1">
                                <h2>Login</h2>
                                <form class="akasha-form akasha-form-login login" action="{{ route('customer.login') }}"
                                    method="post">
                                    @csrf

                                    <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                        <label for="username">Email&nbsp;<span class="required">*</span></label>
                                        <input type="email" class="akasha-Input akasha-Input--text input-text"
                                            name="email" id="email" autocomplete="email">
                                    </p>
                                    <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                        <label for="password">Password&nbsp;<span class="required">*</span></label>
                                        <input class="akasha-Input akasha-Input--text input-text" type="password"
                                            name="password" id="password" autocomplete="current-password">
                                    </p>
                                    <p class="form-row">
                                        <input type="hidden" id="akasha-login-nonce" name="akasha-login-nonce"
                                            value="832993cb93"><input type="hidden" name="_wp_http_referer"
                                            value="/akasha/my-account/">
                                        <button type="submit" class="akasha-Button button" name="login"
                                            value="Log in">Log in
                                        </button>
                                        <label class="akasha-form__label akasha-form__label-for-checkbox inline">
                                            <input class="akasha-form__input akasha-form__input-checkbox"
                                                name="rememberme" type="checkbox" id="rememberme" value="forever">
                                            <span>Remember me</span>
                                        </label>
                                    </p>
                                    <p class="akasha-LostPassword lost_password">
                                        <a href="#">Lost your
                                            password?</a>
                                    </p>
                                </form>
                            </div>

                            <div class="u-column2 col-2">
                                <h2>Register</h2>
                                <form method="post" action="{{ route('customer_signup') }}"
                                    class="akasha-form akasha-form-register register">
                                    @csrf

                                    <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                        <label for="username">Name&nbsp;<span class="required">*</span></label>
                                        <input type="text" class="akasha-Input akasha-Input--text input-text"
                                            name="register_name" id="name" autocomplete="name">
                                    </p>

                                    <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                        <label for="username">Email&nbsp;<span class="required">*</span></label>
                                        <input type="email" class="akasha-Input akasha-Input--text input-text"
                                            name="register_email" id="email" autocomplete="email">
                                    </p>
                                    <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                        <label for="username">Phone&nbsp;<span class="required">*</span></label>
                                        <input type="text" class="akasha-Input akasha-Input--text input-text"
                                            name="register_number" id="phone" autocomplete="phone">
                                    </p>
                                    <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                        <label for="username">Address&nbsp;<span class="required">*</span></label>
                                        <input type="text" class="akasha-Input akasha-Input--text input-text"
                                            name="register_address" id="address" autocomplete="address">
                                    </p>
                                    <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                        <label for="password">Password&nbsp;<span class="required">*</span></label>
                                        <input class="akasha-Input akasha-Input--text input-text" type="password"
                                            name="register_password" id="password" autocomplete="current-password">
                                    </p>
                                    <div class="akasha-privacy-policy-text">
                                        <p>Your personal data will be used to
                                            support your experience throughout this website, to manage access to your
                                            account, and for other purposes described in our <a href="{{ route('privacy.page') }}"
                                                class="akasha-privacy-policy-link" target="_blank">privacy policy</a>.
                                        </p>
                                    </div>
                                    <p class="akasha-FormRow form-row">
                                        {{-- <input type="hidden" id="akasha-register-nonce" name="akasha-register-nonce"
                                            value="45fae70a87"><input type="hidden" name="_wp_http_referer"
                                            value="/akasha/my-account/"> --}}
                                        <button type="submit" class="akasha-Button button">Register</button>
                                    </p>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
