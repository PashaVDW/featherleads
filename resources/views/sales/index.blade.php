@extends("index")

@section("content")
  <div class="container-fixed">
    <div
      class="flex flex-nowrap items-center lg:items-end justify-between border-b border-b-gray-200 dark:border-b-coal-100 gap-6 mb-5 lg:mb-10"
    >
      <div class="flex items-center lg:pb-4 gap-2.5">
        <button class="btn btn-outline btn-info" data-tooltip="#sort">
          Sort
        </button>
        <div
          class="hidden rounded-xl shadow-default p-3 bg-light border border-gray-200 text-gray-700 text-xs font-normal"
          id="sort"
        >
          Here you can sort by daily weekly or monthly.
        </div>
        <!-- Modal Structure -->
        <button class="btn btn-outline btn-info" data-modal-toggle="#modal_2">
          Monthly Target
        </button>
        <button class="btn btn-outline btn-info" data-modal-toggle="#modal_1">
          RPC
        </button>

        <!-- Modal Structure -->
        <div class="modal" data-modal="true" id="modal_2">
          <div class="modal-content max-w-[600px] top-[20%]">
            <div class="modal-header">
              <h3 class="modal-title">Featherleads - Target</h3>
              <button
                class="btn btn-xs btn-icon btn-light"
                data-modal-dismiss="true"
              >
                <i class="ki-outline ki-cross"></i>
              </button>
            </div>
            <div class="modal-body">
              <!-- Modal Form -->
              <form id="financeForm" method="POST" action="#">
                @csrf
                <div class="w-full mb-4">
                  <div
                    class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5"
                  >
                    <label class="form-label max-w-32">Monthly Target</label>
                    <div class="flex flex-col w-full gap-1">
                      <input
                        class="input"
                        name="target"
                        placeholder="99.99"
                        type="number"
                        step="0.01"
                        min="0"
                        value="{{ old("target") }}"
                      />
                      <span
                        class="text-red-500 text-sm error-message"
                        id="incomeError"
                      ></span>
                    </div>
                  </div>
                </div>
                <div class="flex justify-end">
                  <button type="submit" class="btn btn-primary">
                    Create Target
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal" data-modal="true" id="modal_1">
          <div class="modal-content max-w-[600px] top-[20%]">
            <div class="modal-header">
              <h3 class="modal-title">Featherleads - RPC</h3>
              <button
                class="btn btn-xs btn-icon btn-light"
                data-modal-dismiss="true"
              >
                <i class="ki-outline ki-cross"></i>
              </button>
            </div>
            <div class="modal-body">
              <!-- Modal Form -->
              <form id="financeForm" method="POST" action="#">
                @csrf
                <div class="w-full mb-4">
                  <div
                    class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5"
                  >
                    <label class="form-label max-w-32">RPC</label>
                    <div class="flex flex-col w-full gap-1">
                      <input
                        class="input"
                        name="rpc"
                        placeholder="99.99"
                        type="number"
                        step="0.01"
                        min="0"
                        value="{{ old("rpc") }}"
                      />
                      <span class="form-hint">
                        Here you can set the Revenue Per Customer
                      </span>
                      <span
                        class="text-red-500 text-sm error-message"
                        id="incomeError"
                      ></span>
                    </div>
                  </div>
                </div>
                <div class="flex justify-end">
                  <button type="submit" class="btn btn-primary">
                    Create RPC
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <button class="btn btn-sm btn-icon btn-light">
          <i class="ki-filled ki-messages"></i>
        </button>
        <div
          class="dropdown"
          data-dropdown="true"
          data-dropdown-placement="bottom-end"
          data-dropdown-trigger="click"
        >
          <button class="dropdown-toggle btn btn-sm btn-icon btn-light">
            <i class="ki-filled ki-dots-vertical"></i>
          </button>
          <div class="dropdown-content menu-default w-full max-w-[220px]">
            <div class="menu-item" data-dropdown-dismiss="true">
              <button
                class="menu-link"
                data-modal-toggle="#share_profile_modal"
              >
                <span class="menu-icon">
                  <i class="ki-filled ki-coffee"></i>
                </span>
                <span class="menu-title">Share Profile</span>
              </button>
            </div>
            <div class="menu-item" data-dropdown-dismiss="true">
              <a
                class="menu-link"
                data-modal-toggle="#give_award_modal"
                href="#"
              >
                <span class="menu-icon">
                  <i class="ki-filled ki-award"></i>
                </span>
                <span class="menu-title">Give Award</span>
              </a>
            </div>
            <div class="menu-item" data-dropdown-dismiss="true">
              <button class="menu-link">
                <span class="menu-icon">
                  <i class="ki-filled ki-chart-line"></i>
                </span>
                <span class="menu-title">Stay Updated</span>
                <label class="switch switch-sm">
                  <input name="check" type="checkbox" value="1" />
                </label>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header section with title -->
    <div class="flex flex-wrap items-center gap-5 justify-between mb-8">
      <h3 class="text-lg text-gray-900 font-semibold">
        You are currently viewing this in: Monthly mode
      </h3>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="card max-w-[350px] mx-0" data-tooltip="#targetcard">
        <div
          class="hidden rounded-xl shadow-default p-3 bg-light border border-gray-200 text-gray-700 text-xs font-normal"
          id="targetcard"
        >
          Here you can see your target progress.
        </div>
        <div class="card-header">
          <h3 class="card-title">Target Chart</h3>
          <button class="btn btn-sm btn-icon btn-light btn-clear">
            <i class="ki-outline ki-dots-vertical"></i>
          </button>
        </div>
        <div class="card-body flex justify-center items-center px-3 py-1">
          <div id="pie_chart"></div>
        </div>
      </div>

      <div class="card max-w-[350px] mx-0" data-tooltip="#calllogs">
        <div
          class="hidden rounded-xl shadow-default p-3 bg-light border border-gray-200 text-gray-700 text-xs font-normal"
          id="calllogs"
        >
          Here you can log your daily Yes's and No's after each call.
        </div>
        <div class="card-header flex justify-between items-center">
          <h3 class="card-title">Call Response Log</h3>

          <!-- Dropdown Button -->
          <div class="relative inline-block text-left">
            <div>
              <button
                id="dropdownMenuButton"
                onclick="toggleDropdown()"
                class="inline-flex justify-center w-full text-sm font-medium text-gray-500 hover:text-gray-700"
              >
                <i class="ki-filled ki-dots-vertical"></i>
              </button>
            </div>

            <!-- Dropdown Menu -->
            <div
              id="dropdownMenu"
              class="hidden absolute right-0 z-10 mt-2 w-36 border border-gray-200 rounded-lg shadow-lg"
              style="transform: translateX(50%)"
            >
              <div class="flex flex-col justify-center m-5 space-y-2">
                <button
                  class="btn btn-outline btn-danger w-full"
                  data-modal-toggle="#delete_category"
                >
                  Clear
                </button>
              </div>
            </div>
          </div>
          <!-- End Dropdown -->
        </div>

        <!-- Buttons inside the card-body -->
        <div class="card-body flex justify-center items-center px-3 py-4 gap-6">
          <button class="btn btn-outline btn-info" id="yes-button">Yes</button>
          <button class="btn btn-outline btn-info" id="no-button">No</button>
        </div>

        <!-- Counts inside the card-footer -->
        <div class="card-footer flex justify-center items-center gap-6">
          <div>
            <span class="font-semibold text-white">Yes Count:</span>
            <span id="yes-count" class="text-white">0</span>
          </div>
          <div>
            <span class="font-semibold text-white">No Count:</span>
            <span id="no-count" class="text-white">0</span>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal hidden z-50" data-modal="true" id="delete_category">
        <div class="modal-content max-w-[600px] top-[20%]">
          <div class="modal-body text-center">
            <i class="ki-duotone ki-trash text-info text-2xl"></i>
            <p class="mb-4 text-white">
              Are you sure you want to clear the logs?
            </p>
            <div class="flex justify-center items-center space-x-4">
              <button
                data-modal-dismiss="true"
                type="button"
                class="btn btn-outline btn-info"
              >
                No, cancel
              </button>

              <!-- Delete Form -->
              <form href="{{ route("sales.index") }}">
                <button
                  type="submit"
                  class="btn btn-outline btn-danger"
                  id="clear-button"
                >
                  Yes, clear
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <script>
        function toggleDropdown() {
          var dropdown = document.getElementById('dropdownMenu');
          dropdown.classList.toggle('hidden');
        }

        // Dismiss modal
        document
          .querySelectorAll('[data-modal-dismiss="true"]')
          .forEach(function (button) {
            button.addEventListener('click', function () {
              const modal = document.getElementById('delete_category');
              modal.classList.add('hidden');
            });
          });
      </script>
    </div>
  </div>
  <script src="assets/js/call_response_log.js"></script>
  <script src="assets/js/sales_apexchart.js"></script>
@endsection
