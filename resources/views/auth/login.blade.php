<!DOCTYPE html>
<html class="h-full" data-theme="true" data-theme-mode="light" lang="en">
  @include('partials.head')
  <body class="flex h-full dark:bg-coal-500">
    <!--begin::Theme mode setup on page load-->
    <script>
      const defaultThemeMode = 'light' // light|dark|system
      let themeMode

      if (document.documentElement) {
        if (localStorage.getItem('theme')) {
          themeMode = localStorage.getItem('theme')
        } else if (document.documentElement.hasAttribute('data-theme-mode')) {
          themeMode = document.documentElement.getAttribute('data-theme-mode')
        } else {
          themeMode = defaultThemeMode
        }

        if (themeMode === 'system') {
          themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches
            ? 'dark'
            : 'light'
        }

        document.documentElement.classList.add(themeMode)
      }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Page layout-->
    <style>
      .page-bg {
        background-image: url('/assets/media/images/2600x1200/bg-10.png');
      }
      .dark .page-bg {
        background-image: url('/assets/media/images/2600x1200/bg-10-dark.png');
      }
    </style>
    <div
      class="flex items-center justify-center grow bg-center bg-no-repeat page-bg"
    >
      <div class="card max-w-[370px] w-full">
        <form
          action="{{ route('login') }}"
          class="card-body flex flex-col gap-5 p-10"
          id="sign_in_form"
          method="POST"
        >
          @csrf
          <div class="text-center mb-2.5">
            <h3 class="text-lg font-semibold text-gray-900 leading-none mb-2.5">
              Sign in
            </h3>
            <div class="flex items-center justify-center font-medium">
              <span class="text-2sm text-gray-600 me-1.5">
                Need an account?
              </span>
              <a class="text-2sm link" href="{{ route('register') }}">
                Sign up
              </a>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-2.5">
            <a class="btn btn-light btn-sm justify-center" href="#">
              <img
                alt=""
                class="size-3.5 shrink-0"
                src="assets/media/brand-logos/google.svg"
              />
              Use Google
            </a>
            <a class="btn btn-light btn-sm justify-center" href="#">
              <img
                alt=""
                class="size-3.5 shrink-0 dark:hidden"
                src="assets/media/brand-logos/apple-black.svg"
              />
              <img
                alt=""
                class="size-3.5 shrink-0 light:hidden"
                src="assets/media/brand-logos/apple-white.svg"
              />
              Use Apple
            </a>
          </div>
          <div class="flex items-center gap-2">
            <span class="border-t border-gray-200 w-full"></span>
            <span class="text-2xs text-gray-500 font-medium uppercase">Or</span>
            <span class="border-t border-gray-200 w-full"></span>
          </div>
          <div class="flex flex-col gap-1">
            <label class="form-label text-gray-900">Email</label>
            <input
              class="input"
              name="email"
              placeholder="email@email.com"
              type="text"
              value=""
            />
          </div>
          <div class="flex flex-col gap-1">
            <div class="flex items-center justify-between gap-1">
              <label class="form-label text-gray-900">Password</label>
              <a
                class="text-2sm link shrink-0"
                href="html/demo1/authentication/classic/reset-password/enter-email.html"
              >
                Forgot Password?
              </a>
            </div>
            <label class="input" data-toggle-password="true">
              <input
                name="password"
                placeholder="Enter Password"
                type="password"
                value=""
              />
              <button class="btn btn-icon" data-toggle-password-trigger="true">
                <i
                  class="ki-filled ki-eye text-gray-500 toggle-password-active:hidden"
                ></i>
                <i
                  class="ki-filled ki-eye-slash text-gray-500 hidden toggle-password-active:block"
                ></i>
              </button>
            </label>
          </div>
          <label class="checkbox-group">
            <input
              class="checkbox checkbox-sm"
              name="check"
              type="checkbox"
              value="1"
            />
            <span class="checkbox-label">Remember me</span>
          </label>
          <button
            type="submit"
            class="btn btn-primary flex justify-center grow"
          >
            Sign In
          </button>
        </form>
      </div>
    </div>
    <!--end::Page layout-->
    <!--begin::Page scripts-->
    <script src="./assets/js/core.bundle.js"></script>
    <script src="./assets/vendors/apexcharts/apexcharts.min.js"></script>
    <!--end::Page scripts-->
  </body>
</html>
