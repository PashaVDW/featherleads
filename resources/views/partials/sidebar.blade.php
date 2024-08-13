<div class="sidebar-content flex grow shrink-0 py-5 pr-2" id="sidebar_content">
  <div
    class="scrollable-y-hover grow shrink-0 flex pl-2 lg:pl-5 pr-1 lg:pr-3"
    data-scrollable="true"
    data-scrollable-dependencies="#sidebar_header"
    data-scrollable-height="auto"
    data-scrollable-offset="0px"
    data-scrollable-wrappers="#sidebar_content"
    id="sidebar_scrollable"
  >
    <div
      class="menu flex flex-col grow gap-0.5"
      data-menu="true"
      data-menu-accordion-expand-all="false"
      id="sidebar_menu"
    >
      <div class="menu-item pt-2.25 pb-px">
        <span
          class="menu-heading uppercase text-2sm font-semibold text-gray-500 pl-[10px] pr-[10px]"
        >
          <i class="ki-solid ki-dollar text-info text-md"></i>
          Sales
        </span>
      </div>
      <div
        class="menu-item"
        data-menu-item-toggle="accordion"
        data-menu-item-trigger="click"
      ></div>
      <div class="menu-item">
        <div
          class="menu-label border border-transparent gap-[10px] pl-[10px] pr-[10px] py-[6px]"
          tabindex="0"
        >
          <a class="menu-link" href="{{ route('leads.index') }}">
            <span
              class="menu-icon items-start text-gray-500 dark:text-gray-400 w-[20px]"
            >
              <i class="ki-solid ki-users text-info text-md"></i>
            </span>
            <span class="menu-title text-sm font-semibold text-gray-700">
              Leads
            </span>
          </a>
        </div>
      </div>
      <div class="menu-item">
        <div
          class="menu-label border border-transparent gap-[10px] pl-[10px] pr-[10px] py-[6px]"
          tabindex="0"
        >
          <a class="menu-link" href="{{ route('leads.create') }}">
            <span
              class="menu-icon items-start text-gray-500 dark:text-gray-400 w-[20px]"
            >
              <i class="ki-solid ki-user text-info text-md"></i>
            </span>
            <span class="menu-title text-sm font-semibold text-gray-700">
              Create Lead
            </span>
          </a>
        </div>
      </div>
        <div class="menu-item pt-2.25 pb-px">
        <span
            class="menu-heading uppercase text-2sm font-semibold text-gray-500 pl-[10px] pr-[10px]"
        >
          <i class="ki-filled ki-financial-schedule text-info text-md"></i>
          Financial Management
        </span>
        </div>
    </div>
  </div>
</div>
