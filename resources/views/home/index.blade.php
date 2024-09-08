@extends("index")

@section("content")
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="card">
      <div class="card-body p-5 lg:p-7.5">
        <div class="flex items-center justify-between mb-3 lg:mb-5">
          <div class="flex items-center justify-center">
            <svg
              width="35"
              height="70"
              viewBox="0 0 70 70"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              style="transform: scale(-1, 1)"
            >
              <path
                d="M58.193 26.8815C53.1408 29.3081 48.0945 28.3472 48.0945 28.3472C48.0945 28.3472 57.2778 25.4223 58.9608 20.2805C60.8937 14.3752 60.0041 9.482 57.3352 3C53.1408 16.3446 34.6925 17.8888 27.6272 25.9844C24.5124 29.5538 23.2109 34.551 22.8294 36.4573C22.0668 35.0276 21.7023 33.319 22.2097 31.3575C17.8729 36.8386 14.6794 41.8904 12.5397 54.7255C20.7082 40.7281 36.232 29.5607 36.232 29.5607C36.232 29.5607 42.9222 24.7176 45.976 21.6851C40.3878 27.8571 34.146 32.6968 27.2471 39.5488C20.3882 46.4843 12.7985 57.5948 10 66.1985C12.0245 63.1159 14.9494 59.8198 18.9532 56.3155C22.9571 52.8114 30.9 58.6028 42.6262 49.8376C36.8099 51.9942 32.3613 51.1686 29.2476 50.5965C42.6262 49.8376 56.5729 40.9372 58.193 26.8815Z"
                fill="#883efe"
              />
            </svg>
          </div>
        </div>
        <div class="flex flex-col gap-1 lg:gap-2.5">
          <a
            class="text-base font-smedium text-gray-900 hover:text-primary-active"
            href="/metronic/tailwind/demo2/account/billing/basic"
          >
            FeatherSales
          </a>
          <span class="text-2sm text-gray-700">
            Boost your sales productivity with our FeatherSales tool.
          </span>
        </div>
      </div>

      @if (App\Models\Sale::where("user_id", Auth::user()->id)->doesntExist())
        <!-- Show Enroll Button -->
        <form method="POST" action="{{ route("home.enrollSales") }}">
          @csrf
          <div class="card-footer justify-between items-center py-3.5">
            <button class="btn btn-light btn-sm">
              <i class="ki-filled ki-mouse-square"></i>
              Enroll
            </button>
          </div>
        </form>
      @else
        <!-- Show Un-enroll Button -->
        <form method="POST" action="{{ route("home.unenrollSales") }}">
          @csrf
          @method("DELETE")
          <div class="card-footer justify-between items-center py-3.5">
            <button class="btn btn-outline btn-danger btn-sm">
              <i class="ki-filled ki-mouse-square"></i>
              Un-enroll
            </button>
          </div>
        </form>
      @endif
    </div>
      <div class="card">
          <div class="card-body p-5 lg:p-7.5">
              <div class="flex items-center justify-between mb-3 lg:mb-5">
                  <div class="flex items-center justify-center">
                      <svg
                          width="35"
                          height="70"
                          viewBox="0 0 70 70"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          style="transform: scale(-1, 1)"
                      >
                          <path
                              d="M58.193 26.8815C53.1408 29.3081 48.0945 28.3472 48.0945 28.3472C48.0945 28.3472 57.2778 25.4223 58.9608 20.2805C60.8937 14.3752 60.0041 9.482 57.3352 3C53.1408 16.3446 34.6925 17.8888 27.6272 25.9844C24.5124 29.5538 23.2109 34.551 22.8294 36.4573C22.0668 35.0276 21.7023 33.319 22.2097 31.3575C17.8729 36.8386 14.6794 41.8904 12.5397 54.7255C20.7082 40.7281 36.232 29.5607 36.232 29.5607C36.232 29.5607 42.9222 24.7176 45.976 21.6851C40.3878 27.8571 34.146 32.6968 27.2471 39.5488C20.3882 46.4843 12.7985 57.5948 10 66.1985C12.0245 63.1159 14.9494 59.8198 18.9532 56.3155C22.9571 52.8114 30.9 58.6028 42.6262 49.8376C36.8099 51.9942 32.3613 51.1686 29.2476 50.5965C42.6262 49.8376 56.5729 40.9372 58.193 26.8815Z"
                              fill="#883efe"
                          />
                      </svg>
                  </div>
              </div>
              <div class="flex flex-col gap-1 lg:gap-2.5">
                  <a
                      class="text-base font-smedium text-gray-900 hover:text-primary-active"
                      href="/metronic/tailwind/demo2/account/billing/basic"
                  >
                      FeatherFinance
                  </a>
                  <span class="text-2sm text-gray-700">
            Streamline your finances and maximize savings with the FeatherFinance tool.
          </span>
              </div>
          </div>

          @if (App\Models\Finance::where("user_id", Auth::user()->id)->doesntExist())
              <!-- Show Enroll Button -->
              <form method="POST" action="{{ route("home.enrollFinances") }}">
                  @csrf
                  <div class="card-footer justify-between items-center py-3.5">
                      <button class="btn btn-light btn-sm">
                          <i class="ki-filled ki-mouse-square"></i>
                          Enroll
                      </button>
                  </div>
              </form>
          @else
              <!-- Show Un-enroll Button -->
              <form method="POST" action="{{ route("home.unenrollFinances") }}">
                  @csrf
                  @method("DELETE")
                  <div class="card-footer justify-between items-center py-3.5">
                      <button class="btn btn-outline btn-danger btn-sm">
                          <i class="ki-filled ki-mouse-square"></i>
                          Un-enroll
                      </button>
                  </div>
              </form>
          @endif
      </div>

  </div>
@endsection
