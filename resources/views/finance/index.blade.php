@extends("index")

@section("content")
  <div class="container-fixed">
    <div
      class="flex flex-nowrap items-center lg:items-end justify-between border-b border-b-gray-200 dark:border-b-coal-100 gap-6 mb-5 lg:mb-10"
    >
      <div class="flex items-center lg:pb-4 gap-2.5">
        <button class="btn btn-outline btn-info" data-modal-toggle="#modal_1">
          New Finance Plan
        </button>
        <!-- Modal Structure -->
        <button class="btn btn-outline btn-info" data-modal-toggle="#modal_2">
          New Category Item
        </button>
        @if (Auth::user()->finance_id != null &&$finance->income != 0 &&DB::table("finance_categories")->where("user_id", Auth::id())->count() > 0)
          <button class="btn btn-outline btn-info" data-modal-toggle="#modal_3">
            New Budget
          </button>
          <div class="modal" data-modal="true" id="modal_3">
            <div class="modal-content max-w-[600px] top-[20%]">
              <div class="modal-body">
                @foreach ($financeCategory as $index => $financeCategoryRange)
                  <div class="w-full">
                    <div class="rounded-lg shadow-lg p-6 w-full max-w-md">
                      <h2 class="text-white text-2xl font-bold mb-4">
                        {{ $financeCategoryRange->name }}
                      </h2>
                      <div class="mb-4">
                        <label
                          for="price-range-{{ $index }}"
                          class="block text-gray-700 font-bold mb-2"
                        >
                          Price Range
                        </label>
                        <input
                          type="range"
                          id="price-range-{{ $index }}"
                          class="price-range w-full accent-indigo-600"
                          min="0"
                          max="{{ $finance->income - $finance->fixed_costs }}"
                          value="0"
                          oninput="updateSliders({{ $index }}, this.value)"
                        />
                      </div>
                      <div class="flex justify-between text-gray-500">
                        <span id="minPrice-{{ $index }}">Є0</span>
                        <span
                          data-tooltip="#custom_tooltip"
                          id="maxPrice-{{ $index }}"
                        >
                          Є{{ $finance->income - $finance->fixed_costs }}
                        </span>
                        <div
                          class="hidden rounded-xl shadow-default p-3 bg-light border border-gray-200 text-gray-700 text-xs font-normal"
                          id="custom_tooltip"
                        >
                          This is the amount remaining after deducting fixed
                          costs from income.
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <script>
            const income = {{ $finance->income - $finance->fixed_costs }};
            const sliders = document.querySelectorAll('.price-range');
            const totalSliders = sliders.length;

            function updateSliders(changedIndex, newValue) {
              sliders[changedIndex].value = newValue;

              let totalValue = 0;
              sliders.forEach((slider) => {
                totalValue += parseFloat(slider.value);
              });

              if (totalValue > income) {
                let excess = totalValue - income;

                sliders.forEach((slider, index) => {
                  if (index !== changedIndex && excess > 0) {
                    const sliderValue = parseFloat(slider.value);
                    const reduction = Math.min(sliderValue, excess);
                    slider.value = sliderValue - reduction;
                    excess -= reduction;

                    document.getElementById(`minPrice-${index}`).textContent =
                      `$${slider.value}`;
                  }
                });
              }

              document.getElementById(`minPrice-${changedIndex}`).textContent =
                `$${newValue}`;
            }
          </script>
        @endif

        <!-- Modal Structure -->
        <div class="modal" data-modal="true" id="modal_1">
          <div class="modal-content max-w-[600px] top-[20%]">
            <div class="modal-header">
              <h3 class="modal-title">Featherleads - Financial Plan</h3>
              <button
                class="btn btn-xs btn-icon btn-light"
                data-modal-dismiss="true"
              >
                <i class="ki-outline ki-cross"></i>
              </button>
            </div>
            <div class="modal-body">
              <!-- Modal Form -->
              <form
                id="financeForm"
                method="POST"
                action="{{ route("finance.store") }}"
              >
                @csrf
                <div class="w-full mb-4">
                  <div
                    class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5"
                  >
                    <label class="form-label max-w-32">Monthly Income</label>
                    <div class="flex flex-col w-full gap-1">
                      <input
                        class="input"
                        name="income"
                        placeholder="99.99"
                        type="number"
                        step="0.01"
                        min="0"
                        value="{{ old("income") }}"
                      />
                      <span class="form-hint">
                        Enter your monthly income, we'll use this to calculate
                        your best options.
                      </span>
                      <span
                        class="text-red-500 text-sm error-message"
                        id="incomeError"
                      ></span>
                    </div>
                  </div>
                </div>
                <div class="w-full mb-4">
                  <div
                    class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5"
                  >
                    <label class="form-label max-w-32">Fixed Costs</label>
                    <div class="flex flex-col w-full gap-1">
                      <input
                        class="input"
                        name="fixed_costs"
                        placeholder="99.99"
                        type="number"
                        step="0.01"
                        min="0"
                        value="{{ old("fixed_costs") }}"
                      />
                      <span class="form-hint">
                        Enter the amount of fixed costs. (e.g. shopping / rent)
                      </span>
                      <span
                        class="text-red-500 text-sm error-message"
                        id="fixedCostsError"
                      ></span>
                    </div>
                  </div>
                </div>
                <div class="flex justify-end">
                  <button type="submit" class="btn btn-primary">
                    Create Plan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal" data-modal="true" id="modal_2">
          <div class="modal-content max-w-[600px] top-[20%]">
            <div class="modal-header">
              <h3 class="modal-title">Featherleads - Category Item</h3>
              <button
                class="btn btn-xs btn-icon btn-light"
                data-modal-dismiss="true"
              >
                <i class="ki-outline ki-cross"></i>
              </button>
            </div>
            <div class="modal-body">
              <!-- Modal Form -->
              <form
                id="categoryForm"
                method="POST"
                action="{{ route("finance.category.store") }}"
              >
                @csrf
                <div class="w-full mb-4">
                  <div
                    class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5"
                  >
                    <label class="form-label max-w-32">Name</label>
                    <div class="flex flex-col w-full gap-1">
                      <input
                        class="input"
                        name="finance_category_name"
                        placeholder="example name"
                        type="text"
                        value=""
                      />
                      <span class="form-hint">
                        This will be the title for your category.
                      </span>
                      <span
                        class="text-red-500 text-sm error-message"
                        id="incomeError"
                      ></span>
                    </div>
                  </div>
                </div>
                <div class="w-full mb-4">
                  <div
                    class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5"
                  >
                    <label class="form-label max-w-32">Description</label>
                    <div class="flex flex-col w-full gap-1">
                      <input
                        class="input"
                        name="finance_category_description"
                        placeholder="(optional) example description"
                        type="text"
                        value=""
                      />
                      <span class="form-hint">
                        This will be the description for your category.
                      </span>
                      <span
                        class="text-red-500 text-sm error-message"
                        id="fixedCostsError"
                      ></span>
                    </div>
                  </div>
                </div>
                <div class="flex justify-end">
                  <button type="submit" class="btn btn-primary">
                    Create Item
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
                  />
                </label>
              </button>
            </div>
            <div class="menu-item" data-dropdown-dismiss="true">
              <button class="menu-link" data-modal-toggle="#report_user_modal">
                <span class="menu-icon">
                  <i class="ki-filled ki-information-2"></i>
                </span>
                <span class="menu-title">Report User</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fixed">
    <!-- begin: works -->
    <div class="flex flex-col items-stretch gap-5 lg:gap-7.5">
      <!-- begin: toolbar -->
      <div class="flex flex-wrap items-center gap-5 justify-between">
        <h3 class="text-lg text-gray-900 font-semibold">
          Your maximum spending limit for today is...
        </h3>
        <div class="btn-tabs" data-tabs="true">
          <a
            class="btn btn-icon active"
            data-tab-toggle="#network_cards"
            href="#"
          >
            <i class="ki-filled ki-category"></i>
          </a>
          <a class="btn btn-icon" data-tab-toggle="#network_list" href="#">
            <i class="ki-filled ki-row-horizontal"></i>
          </a>
        </div>
      </div>
      <!-- end: toolbar -->
      <!-- begin: cards -->
      <div
        id="network_cards"
        class="grid grid-cols-1 md:grid-cols-2 gap-5 lg:gap-7.5"
      >
        @foreach ($financeCategory as $category)
          <div class="card relative">
            <!-- Dropdown -->
            <div class="absolute top-4 right-4">
              <div class="relative inline-block text-left">
                <div>
                  <button
                    id="dropdownMenuButton"
                    onclick="toggleDropdown('{{ $category->id }}')"
                    class="inline-flex justify-center w-full text-sm font-medium text-gray-500 hover:text-gray-700"
                  >
                    <i class="ki-filled ki-dots-vertical"></i>
                  </button>
                </div>
                <!-- Dropdown Menu -->
                <div
                  id="dropdownMenu_{{ $category->id }}"
                  class="hidden absolute right-0 z-10 mt-2 w-36 border border-gray-200 rounded-lg shadow-lg"
                >
                  <div class="flex flex-col justify-center m-5 space-y-2">
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    >
                      Edit
                    </a>
                    <button
                      class="btn btn-outline btn-danger w-full"
                      data-modal-toggle="#delete_category_{{ $category->id }}"
                    >
                      Delete
                    </button>
                  </div>
                </div>

                <!-- Modal -->
                <div
                  class="modal hidden z-50"
                  data-modal="true"
                  id="delete_category_{{ $category->id }}"
                >
                  <div class="modal-content max-w-[600px] top-[20%]">
                    <div class="modal-body text-center">
                      <i class="ki-duotone ki-trash text-info text-2xl"></i>
                      <p class="mb-4 text-white">
                        Are you sure you want to delete this category?
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
                        <form
                          method="POST"
                          action="{{ route("finance.category.deleteCategory", $category->id) }}"
                          class="inline"
                        >
                          @csrf
                          @method("DELETE")
                          <button
                            type="submit"
                            class="btn btn-outline btn-danger"
                          >
                            Yes, delete
                          </button>
                          <input
                            name="id"
                            type="hidden"
                            value="{{ $category->id }}"
                          />
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                  function toggleDropdown(id) {
                    var dropdown = document.getElementById(
                      'dropdownMenu_' + id
                    );
                    dropdown.classList.toggle('hidden');
                  }

                  // Dismiss modal
                  document
                    .querySelectorAll('[data-modal-dismiss="true"]')
                    .forEach(function (button) {
                      button.addEventListener('click', function () {
                        const modal = document.getElementById(
                          'delete_category_{{ $category->id }}'
                        );
                        modal.classList.add('hidden');
                      });
                    });
                </script>
              </div>
            </div>

            <!-- Card Content -->
            <div class="card-body lg:pt-9 lg:pb-7.5">
              <div class="flex justify-center mb-2.5">
                <div class="size-20 relative">
                  <svg
                    width="70"
                    height="70"
                    viewBox="0 0 70 70"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M58.193 26.8815C53.1408 29.3081 48.0945 28.3472 48.0945 28.3472C48.0945 28.3472 57.2778 25.4223 58.9608 20.2805C60.8937 14.3752 60.0041 9.482 57.3352 3C53.1408 16.3446 34.6925 17.8888 27.6272 25.9844C24.5124 29.5538 23.2109 34.551 22.8294 36.4573C22.0668 35.0276 21.7023 33.319 22.2097 31.3575C17.8729 36.8386 14.6794 41.8904 12.5397 54.7255C20.7082 40.7281 36.232 29.5607 36.232 29.5607C36.232 29.5607 42.9222 24.7176 45.976 21.6851C40.3878 27.8571 34.146 32.6968 27.2471 39.5488C20.3882 46.4843 12.7985 57.5948 10 66.1985C12.0245 63.1159 14.9494 59.8198 18.9532 56.3155C22.9571 52.8114 30.9 58.6028 42.6262 49.8376C36.8099 51.9942 32.3613 51.1686 29.2476 50.5965C42.6262 49.8376 56.5729 40.9372 58.193 26.8815Z"
                      fill="#883efe"
                    />
                  </svg>
                  <div></div>
                </div>
              </div>
              <div class="flex items-center justify-center gap-1.5 mb-2.5">
                <a
                  class="hover:text-primary-active text-base leading-5 font-semibold text-gray-900"
                  href="#"
                >
                  {{ $category->name }}
                </a>
              </div>
              <div
                class="flex flex-wrap justify-center items-center gap-4 mb-7"
              >
                <div
                  class="flex items-center text-sm font-medium text-gray-600"
                >
                  {{ $category->description }}
                </div>
              </div>
              <div
                class="flex items-center justify-center flex-wrap gap-2 lg:gap-5"
              >
                <div
                  class="grid grid-cols-1 gap-1.5 border-[0.5px] border-dashed border-gray-400 rounded-md px-2.5 py-2 shrink-0 min-w-24 max-w-auto"
                >
                  <span
                    class="text-gray-900 text-2sm leading-none font-semibold"
                  >
                    €{{ $category->daily_amount }}
                  </span>
                  <span class="text-gray-600 text-xs font-medium">
                    Today spent
                  </span>
                </div>
                <div
                  class="grid grid-cols-1 gap-1.5 border-[0.5px] border-dashed border-gray-400 rounded-md px-2.5 py-2 shrink-0 min-w-24 max-w-auto"
                >
                  <span
                    class="text-gray-900 text-2sm leading-none font-semibold"
                  >
                    €{{ $category->monthly_average }}
                  </span>
                  <span class="text-gray-600 text-xs font-medium">
                    Monthly Avg. spent
                  </span>
                </div>
                <div
                  class="grid grid-cols-1 gap-1.5 border-[0.5px] border-dashed border-gray-400 rounded-md px-2.5 py-2 shrink-0 min-w-24 max-w-auto"
                >
                  <span
                    class="text-gray-900 text-2sm leading-none font-semibold"
                  >
                    €{{ $category->total_amount }}
                  </span>
                  <span class="text-gray-600 text-xs font-medium">
                    Total spent
                  </span>
                </div>
              </div>
            </div>

            <div class="card-footer justify-center">
              <button
                class="btn btn-outline btn-info"
                data-modal-toggle="#modal_4"
              >
                Add Today's Expense
              </button>

              <div class="modal" data-modal="true" id="modal_4">
                <div class="modal-content max-w-[600px] top-[20%]">
                  <div class="modal-body">
                    <form
                      method="POST"
                      action="{{ route("finance.category.addDailyExpense") }}"
                    >
                      @csrf
                      <input
                        name="id"
                        type="hidden"
                        value="{{ $category->id }}"
                      />
                      <div class="w-full">
                        <div
                          class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5"
                        >
                          <label class="form-label max-w-32">
                            Daily Expense
                          </label>
                          <div class="flex flex-col w-full gap-1">
                            <input
                              class="input"
                              name="daily_expense"
                              placeholder="99,99"
                              type="number"
                              step="0.1"
                              min="0"
                              value=""
                            />
                            <span class="form-hint">
                              Enter the amount of your daily expense. Don't
                              worry; it stacks.
                            </span>
                          </div>
                        </div>
                        <div class="flex justify-end mt-4">
                          <button
                            type="submit"
                            class="btn btn-outline btn-info"
                          >
                            Submit
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="flex justify-center m-5">
                <button
                  class="btn btn-outline btn-danger"
                  data-modal-toggle="#daily_expense_clear"
                >
                  Clear Today's Expenses
                </button>
              </div>

              <form
                method="POST"
                action="{{ route("finance.category.clearDailyExpense") }}"
              >
                @csrf
                @method("DELETE")
                <div class="modal" data-modal="true" id="daily_expense_clear">
                  <div class="modal-content max-w-[600px] top-[20%]">
                    <div class="modal-body text-center">
                      <i class="ki-duotone ki-trash text-info text-2xl"></i>
                      <p class="mb-4 text-white">
                        Are you sure you want to clear your expenses from today?
                      </p>
                      <div class="flex justify-center items-center space-x-4">
                        <button
                          data-modal-dismiss="true"
                          type="button"
                          class="btn btn-outline btn-info"
                        >
                          No, cancel
                        </button>
                        <button
                          type="submit"
                          class="btn btn-outline btn-danger"
                        >
                          Yes, submit
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        @endforeach
      </div>
      <!-- end: cards -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Monthly Saved</h3>
          <button class="btn btn-sm btn-icon btn-light btn-clear">
            <i class="ki-outline ki-dots-vertical"></i>
          </button>
        </div>
        <div class="px-3 py-1">
          <div id="area_chart"></div>
        </div>
        <script src="{{ asset("assets/js/finance_apexchart.js") }}"></script>
      </div>
      <!-- begin: list -->
      <div class="hidden" id="network_list">
        <div class="flex flex-col gap-5 lg:gap-7.5">
          <div class="card p-7.5">
            <div class="flex items-center flex-wrap justify-between gap-5">
              <div class="flex items-center gap-3.5">
                <div class="flex justify-center">
                  <div class="size-20 relative">
                    <img
                      class="rounded-full"
                      src="assets/media/avatars/300-1.png"
                    />
                    <div
                      class="flex size-2.5 bg-success rounded-full absolute bottom-0.5 left-16 transform -translate-y-1/2"
                    ></div>
                  </div>
                </div>
                <div class="grid">
                  <div class="flex items-center gap-1.5 mb-2.5">
                    <a
                      class="text-base leading-5 font-semibold hover:text-primary-active text-gray-900"
                      href="#"
                    >
                      Jenny Klabber
                    </a>
                    <svg
                      class="text-primary"
                      fill="none"
                      height="16"
                      viewbox="0 0 15 16"
                      width="15"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M14.5425 6.89749L13.5 5.83999C13.4273 5.76877 13.3699 5.6835 13.3312 5.58937C13.2925 5.49525 13.2734 5.39424 13.275 5.29249V3.79249C13.274 3.58699 13.2324 3.38371 13.1527 3.19432C13.0729 3.00494 12.9565 2.83318 12.8101 2.68892C12.6638 2.54466 12.4904 2.43073 12.2998 2.35369C12.1093 2.27665 11.9055 2.23801 11.7 2.23999H10.2C10.0982 2.24159 9.99722 2.22247 9.9031 2.18378C9.80898 2.1451 9.72371 2.08767 9.65249 2.01499L8.60249 0.957487C8.30998 0.665289 7.91344 0.50116 7.49999 0.50116C7.08654 0.50116 6.68999 0.665289 6.39749 0.957487L5.33999 1.99999C5.26876 2.07267 5.1835 2.1301 5.08937 2.16879C4.99525 2.20747 4.89424 2.22659 4.79249 2.22499H3.29249C3.08699 2.22597 2.88371 2.26754 2.69432 2.34731C2.50494 2.42709 2.33318 2.54349 2.18892 2.68985C2.04466 2.8362 1.93073 3.00961 1.85369 3.20013C1.77665 3.39064 1.73801 3.5945 1.73999 3.79999V5.29999C1.74159 5.40174 1.72247 5.50275 1.68378 5.59687C1.6451 5.691 1.58767 5.77627 1.51499 5.84749L0.457487 6.89749C0.165289 7.19 0.00115967 7.58654 0.00115967 7.99999C0.00115967 8.41344 0.165289 8.80998 0.457487 9.10249L1.49999 10.16C1.57267 10.2312 1.6301 10.3165 1.66878 10.4106C1.70747 10.5047 1.72659 10.6057 1.72499 10.7075V12.2075C1.72597 12.413 1.76754 12.6163 1.84731 12.8056C1.92709 12.995 2.04349 13.1668 2.18985 13.3111C2.3362 13.4553 2.50961 13.5692 2.70013 13.6463C2.89064 13.7233 3.0945 13.762 3.29999 13.76H4.79999C4.90174 13.7584 5.00275 13.7775 5.09687 13.8162C5.191 13.8549 5.27627 13.9123 5.34749 13.985L6.40499 15.0425C6.69749 15.3347 7.09404 15.4988 7.50749 15.4988C7.92094 15.4988 8.31748 15.3347 8.60999 15.0425L9.65999 14C9.73121 13.9273 9.81647 13.8699 9.9106 13.8312C10.0047 13.7925 10.1057 13.7734 10.2075 13.775H11.7075C12.1212 13.775 12.518 13.6106 12.8106 13.3181C13.1031 13.0255 13.2675 12.6287 13.2675 12.215V10.715C13.2659 10.6132 13.285 10.5122 13.3237 10.4181C13.3624 10.324 13.4198 10.2387 13.4925 10.1675L14.55 9.10999C14.6953 8.96452 14.8104 8.79176 14.8887 8.60164C14.9671 8.41152 15.007 8.20779 15.0063 8.00218C15.0056 7.79656 14.9643 7.59311 14.8847 7.40353C14.8051 7.21394 14.6888 7.04197 14.5425 6.89749ZM10.635 6.64999L6.95249 10.25C6.90055 10.3026 6.83864 10.3443 6.77038 10.3726C6.70212 10.4009 6.62889 10.4153 6.55499 10.415C6.48062 10.4139 6.40719 10.3982 6.33896 10.3685C6.27073 10.3389 6.20905 10.2961 6.15749 10.2425L4.37999 8.44249C4.32532 8.39044 4.28169 8.32793 4.25169 8.25867C4.22169 8.18941 4.20593 8.11482 4.20536 8.03934C4.20479 7.96387 4.21941 7.88905 4.24836 7.81934C4.27731 7.74964 4.31999 7.68647 4.37387 7.63361C4.42774 7.58074 4.4917 7.53926 4.56194 7.51163C4.63218 7.484 4.70726 7.47079 4.78271 7.47278C4.85816 7.47478 4.93244 7.49194 5.00112 7.52324C5.0698 7.55454 5.13148 7.59935 5.18249 7.65499L6.56249 9.05749L9.84749 5.84749C9.95296 5.74215 10.0959 5.68298 10.245 5.68298C10.394 5.68298 10.537 5.74215 10.6425 5.84749C10.6953 5.90034 10.737 5.96318 10.7653 6.03234C10.7935 6.1015 10.8077 6.1756 10.807 6.25031C10.8063 6.32502 10.7908 6.39884 10.7612 6.46746C10.7317 6.53608 10.6888 6.59813 10.635 6.64999Z"
                        fill="currentColor"
                      ></path>
                    </svg>
                  </div>
                  <div class="flex items-center flex-wrap gap-x-4">
                    <div
                      class="flex items-center text-sm font-medium text-gray-600"
                    >
                      <i
                        class="ki-filled ki-abstract-41 me-1 text-gray-500"
                      ></i>
                      Pinnacle Innovate
                    </div>
                    <div
                      class="flex items-center text-sm font-medium text-gray-600"
                    >
                      <i class="ki-filled ki-sms me-1 text-gray-500"></i>
                      <a
                        class="text-gray-600 hover:text-primary-active"
                        href="#"
                      >
                        kevin@pinnacle.com
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex items-center flex-wrap gap-5 lg:gap-11">
                <div class="flex items-center flex-wrap gap-2 lg:gap-5">
                  <div
                    class="grid grid-cols-1 gap-1.5 border-[0.5px] border-dashed border-gray-400 shrink-0 rounded-md px-2.5 py-2"
                  >
                    <span
                      class="text-gray-900 text-sm leading-none font-semibold"
                    >
                      92
                    </span>
                    <span class="text-gray-600 text-xs font-medium">
                      Purchases
                    </span>
                  </div>
                  <div
                    class="grid grid-cols-1 gap-1.5 border-[0.5px] border-dashed border-gray-400 shrink-0 rounded-md px-2.5 py-2"
                  >
                    <span
                      class="text-gray-900 text-sm leading-none font-semibold"
                    >
                      $69
                    </span>
                    <span class="text-gray-600 text-xs font-medium">
                      Avg. Price
                    </span>
                  </div>
                  <div
                    class="grid grid-cols-1 gap-1.5 border-[0.5px] border-dashed border-gray-400 shrink-0 rounded-md px-2.5 py-2"
                  >
                    <span
                      class="text-gray-900 text-sm leading-none font-semibold"
                    >
                      $6,240
                    </span>
                    <span class="text-gray-600 text-xs font-medium">
                      Total spent
                    </span>
                  </div>
                </div>
                <div>
                  <div class="flex -space-x-2">
                    <div class="flex">
                      <img
                        class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-7"
                        src="assets/media/avatars/300-4.png"
                      />
                    </div>
                    <div class="flex">
                      <img
                        class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-7"
                        src="assets/media/avatars/300-1.png"
                      />
                    </div>
                    <div class="flex">
                      <img
                        class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-7"
                        src="assets/media/avatars/300-2.png"
                      />
                    </div>
                    <div class="flex">
                      <span
                        class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-7 text-success-inverse ring-success-light bg-success size-7"
                      >
                        +10
                      </span>
                    </div>
                  </div>
                </div>
                <div class="text-right w-28">
                  <a class="btn btn-light btn-sm">
                    <i class="ki-filled ki-check-circle"></i>
                    Connected
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex grow justify-center pt-5 lg:pt-7.5">
          <a
            class="btn btn-link"
            href="html/demo1/account/members/team-info.html"
          >
            Show more Connections
          </a>
        </div>
      </div>
      <!-- end: list -->
    </div>
    <!-- end: works -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection
