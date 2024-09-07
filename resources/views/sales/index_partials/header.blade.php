<div
  class="flex flex-nowrap items-center lg:items-end justify-between border-b border-b-gray-200 dark:border-b-coal-100 gap-6 mb-5 lg:mb-10"
>
  <div class="flex items-center lg:pb-4 gap-2.5">
    <button class="btn btn-outline btn-info" data-tooltip="#sort">Sort</button>
    <div
      class="hidden rounded-xl shadow-default p-3 bg-light border border-gray-200 text-gray-700 text-xs font-normal"
      id="sort"
    >
      Here you can sort by daily, weekly, or monthly.
    </div>

    <button class="btn btn-outline btn-info" data-modal-toggle="#modal_2">
      Monthly Target
    </button>
    <button class="btn btn-outline btn-info" data-modal-toggle="#modal_1">
      RPC
    </button>

    @include("sales.index_partials.monthly_target")
    @include("sales.index_partials.rpc")

    <button class="btn btn-sm btn-icon btn-light">
      <i class="ki-filled ki-messages"></i>
    </button>
  </div>
</div>
