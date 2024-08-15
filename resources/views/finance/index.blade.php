@extends("index")

@section("content")
  <div class="container-fixed">
    <div
      class="flex flex-nowrap items-center lg:items-end justify-between border-b border-b-gray-200 dark:border-b-coal-100 gap-6 mb-5 lg:mb-10"
    >
      <div class="grid">
        <div class="scrollable-x-auto">
          <div class="menu gap-3" data-menu="true">
            <div
              class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary"
              data-menu-item-placement="bottom-start"
              data-menu-item-toggle="dropdown"
              data-menu-item-trigger="click"
            >
              <div class="menu-link gap-1.5 pb-2 lg:pb-4 px-2" tabindex="0">
                <span
                  class="menu-title text-nowrap font-medium text-sm text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-item-here:text-primary menu-item-here:font-semibold menu-item-show:text-primary menu-link-hover:text-primary"
                >
                  Profiles
                </span>
                <span class="menu-arrow">
                  <i
                    class="ki-filled ki-down text-2xs text-gray-500 menu-item-active:text-primary menu-item-here:text-primary menu-item-show:text-primary menu-link-hover:text-primary"
                  ></i>
                </span>
              </div>
              <div class="menu-dropdown menu-default py-2 min-w-[200px]">
                <div class="menu-item">
                  <a
                    class="menu-link"
                    href="html/demo1/public-profile/profiles/default.html"
                    tabindex="0"
                  >
                    <span class="menu-title">Default</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    class="menu-link"
                    href="html/demo1/public-profile/profiles/creator.html"
                    tabindex="0"
                  >
                    <span class="menu-title">Creator</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    class="menu-link"
                    href="html/demo1/public-profile/profiles/company.html"
                    tabindex="0"
                  >
                    <span class="menu-title">Company</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    class="menu-link"
                    href="html/demo1/public-profile/profiles/nft.html"
                    tabindex="0"
                  >
                    <span class="menu-title">NFT</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    class="menu-link"
                    href="html/demo1/public-profile/profiles/blogger.html"
                    tabindex="0"
                  >
                    <span class="menu-title">Blogger</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    class="menu-link"
                    href="html/demo1/public-profile/profiles/crm.html"
                    tabindex="0"
                  >
                    <span class="menu-title">CRM</span>
                  </a>
                </div>
                <div
                  class="menu-item"
                  data-menu-item-offset="-10px, 0"
                  data-menu-item-overflow="true"
                  data-menu-item-placement="right-start"
                  data-menu-item-toggle="dropdown"
                  data-menu-item-trigger="click|lg:click"
                >
                  <div class="menu-link" tabindex="0">
                    <span class="menu-title">More</span>
                    <span class="menu-arrow">
                      <i
                        class="ki-filled ki-down text-2xs [.menu-dropdown_&amp;]:-rotate-90"
                      ></i>
                    </span>
                  </div>
                  <div class="menu-dropdown menu-default py min-w-[200px]">
                    <div class="menu-item">
                      <a
                        class="menu-link"
                        href="html/demo1/public-profile/profiles/gamer.html"
                        tabindex="0"
                      >
                        <span class="menu-title">Gamer</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        class="menu-link"
                        href="html/demo1/public-profile/profiles/feeds.html"
                        tabindex="0"
                      >
                        <span class="menu-title">Feeds</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        class="menu-link"
                        href="html/demo1/public-profile/profiles/plain.html"
                        tabindex="0"
                      >
                        <span class="menu-title">Plain</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        class="menu-link"
                        href="html/demo1/public-profile/profiles/modal.html"
                        tabindex="0"
                      >
                        <span class="menu-title">Modal</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary"
              data-menu-item-placement="bottom-start"
              data-menu-item-toggle="dropdown"
              data-menu-item-trigger="click"
            >
              <div class="menu-link gap-1.5 pb-2 lg:pb-4 px-2" tabindex="0">
                <span
                  class="menu-title text-nowrap font-medium text-sm text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-item-here:text-primary menu-item-here:font-semibold menu-item-show:text-primary menu-link-hover:text-primary"
                >
                  Projects
                </span>
                <span class="menu-arrow">
                  <i
                    class="ki-filled ki-down text-2xs text-gray-500 menu-item-active:text-primary menu-item-here:text-primary menu-item-show:text-primary menu-link-hover:text-primary"
                  ></i>
                </span>
              </div>
              <div class="menu-dropdown menu-default py-2 min-w-[200px]">
                <div class="menu-item">
                  <a
                    class="menu-link"
                    href="html/demo1/public-profile/projects/3-columns.html"
                    tabindex="0"
                  >
                    <span class="menu-title">3 Columns</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    class="menu-link"
                    href="html/demo1/public-profile/projects/2-columns.html"
                    tabindex="0"
                  >
                    <span class="menu-title">2 Columns</span>
                  </a>
                </div>
              </div>
            </div>
            <div
              class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary"
            >
              <a
                class="menu-link gap-1.5 pb-2 lg:pb-4 px-2"
                href="html/demo1/public-profile/works.html"
                tabindex="0"
              >
                <span
                  class="menu-title text-nowrap font-medium text-sm text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-item-here:text-primary menu-item-here:font-semibold menu-item-show:text-primary menu-link-hover:text-primary"
                >
                  Works
                </span>
              </a>
            </div>
            <div
              class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary"
            >
              <a
                class="menu-link gap-1.5 pb-2 lg:pb-4 px-2"
                href="html/demo1/public-profile/teams.html"
                tabindex="0"
              >
                <span
                  class="menu-title text-nowrap font-medium text-sm text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-item-here:text-primary menu-item-here:font-semibold menu-item-show:text-primary menu-link-hover:text-primary"
                >
                  Teams
                </span>
              </a>
            </div>
            <div
              class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary active"
            >
              <a
                class="menu-link gap-1.5 pb-2 lg:pb-4 px-2"
                href="html/demo1/public-profile/network.html"
                tabindex="0"
              >
                <span
                  class="menu-title text-nowrap font-medium text-sm text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-item-here:text-primary menu-item-here:font-semibold menu-item-show:text-primary menu-link-hover:text-primary"
                >
                  Network
                </span>
              </a>
            </div>
            <div
              class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary"
            >
              <a
                class="menu-link gap-1.5 pb-2 lg:pb-4 px-2"
                href="html/demo1/public-profile/activity.html"
                tabindex="0"
              >
                <span
                  class="menu-title text-nowrap font-medium text-sm text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-item-here:text-primary menu-item-here:font-semibold menu-item-show:text-primary menu-link-hover:text-primary"
                >
                  Activity
                </span>
              </a>
            </div>
            <div
              class="menu-item border-b-2 border-b-transparent menu-item-active:border-b-primary menu-item-here:border-b-primary"
              data-menu-item-placement="bottom-start"
              data-menu-item-toggle="dropdown"
              data-menu-item-trigger="click"
            >
              <div class="menu-link gap-1.5 pb-2 lg:pb-4 px-2" tabindex="0">
                <span
                  class="menu-title text-nowrap font-medium text-sm text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-item-here:text-primary menu-item-here:font-semibold menu-item-show:text-primary menu-link-hover:text-primary"
                >
                  More
                </span>
                <span class="menu-arrow">
                  <i
                    class="ki-filled ki-down text-2xs text-gray-500 menu-item-active:text-primary menu-item-here:text-primary menu-item-show:text-primary menu-link-hover:text-primary"
                  ></i>
                </span>
              </div>
              <div class="menu-dropdown menu-default py-2 min-w-[200px]">
                <div class="menu-item">
                  <a
                    class="menu-link"
                    href="html/demo1/public-profile/campaigns/card.html"
                    tabindex="0"
                  >
                    <span class="menu-title">Campaigns - Card</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    class="menu-link"
                    href="html/demo1/public-profile/campaigns/list.html"
                    tabindex="0"
                  >
                    <span class="menu-title">Campaigns - List</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    class="menu-link"
                    href="html/demo1/public-profile/empty.html"
                    tabindex="0"
                  >
                    <span class="menu-title">Empty</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="flex items-center lg:pb-4 gap-2.5">
        <button class="btn btn-primary" data-modal-toggle="#modal_1">
          New Finance Plan
        </button>
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
                <form id="financeForm" method="POST" action="{{ route('finance.store') }}">
                    @csrf
                    <div class="w-full mb-4">
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-32">Monthly Income</label>
                            <div class="flex flex-col w-full gap-1">
                                <input class="input" name="income" placeholder="99,99" type="text" value="{{ old('income') }}" />
                                <span class="form-hint">Enter your monthly income, we'll use this to calculate your best options.</span>
                                <span class="text-red-500 text-sm error-message" id="incomeError"></span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mb-4">
                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                            <label class="form-label max-w-32">Fixed Costs</label>
                            <div class="flex flex-col w-full gap-1">
                                <input class="input" name="fixed_costs" placeholder="99,99" type="text" value="{{ old('fixed_costs') }}" />
                                <span class="form-hint">Enter the amount of fixed costs. (e.g. shopping / rent)</span>
                                <span class="text-red-500 text-sm error-message" id="fixedCostsError"></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary">Create Plan</button>
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
        <h3 class="text-lg text-gray-900 font-semibold">6 Connections</h3>
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
      <div id="network_cards">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-7.5">
          <div class="card">
            <div class="card-body lg:pt-9 lg:pb-7.5">
              <div class="flex justify-center mb-2.5">
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
              <div class="flex items-center justify-center gap-1.5 mb-2.5">
                <a
                  class="hover:text-primary-active text-base leading-5 font-semibold text-gray-900"
                  href="#"
                >
                  [NAME]
                </a>
              </div>
              <div
                class="flex flex-wrap justify-center items-center gap-4 mb-7"
              >
                <div
                  class="flex items-center text-sm font-medium text-gray-600"
                >
                  <i class="ki-filled ki-abstract-41 me-1 text-gray-500"></i>
                  Pinnacle Innovate
                </div>
                <div
                  class="flex items-center text-sm font-medium text-gray-600"
                >
                  <i class="ki-filled ki-sms me-1 text-gray-500"></i>
                  <a class="text-gray-600 hover:text-primary-active" href="#">
                    kevin@pinnacle.com
                  </a>
                </div>
              </div>
              <div class="grid justify-center gap-1.5 mb-7.5">
                <span
                  class="text-2xs font-medium uppercase text-gray-500 text-center"
                >
                  hi hi hi
                </span>
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
                    92
                  </span>
                  <span class="text-gray-600 text-xs font-medium">
                    Purchases
                  </span>
                </div>
                <div
                  class="grid grid-cols-1 gap-1.5 border-[0.5px] border-dashed border-gray-400 rounded-md px-2.5 py-2 shrink-0 min-w-24 max-w-auto"
                >
                  <span
                    class="text-gray-900 text-2sm leading-none font-semibold"
                  >
                    $69
                  </span>
                  <span class="text-gray-600 text-xs font-medium">
                    Avg. Price
                  </span>
                </div>
                <div
                  class="grid grid-cols-1 gap-1.5 border-[0.5px] border-dashed border-gray-400 rounded-md px-2.5 py-2 shrink-0 min-w-24 max-w-auto"
                >
                  <span
                    class="text-gray-900 text-2sm leading-none font-semibold"
                  >
                    $6,240
                  </span>
                  <span class="text-gray-600 text-xs font-medium">
                    Total spent
                  </span>
                </div>
              </div>
            </div>
            <div class="card-footer justify-center">
              <a class="btn btn-light btn-sm">
                <i class="ki-filled ki-check-circle"></i>
                Connected
              </a>
            </div>
          </div>
        </div>
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
