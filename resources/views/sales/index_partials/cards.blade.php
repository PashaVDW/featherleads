<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
  <div class="card max-w-[350px]" data-tooltip="#targetcard">
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

  <div class="card max-w-[350px]" data-tooltip="#calllogs">
    <div class="card-header flex justify-between items-center">
      <h3 class="card-title">Call Response Log</h3>
    </div>

    <div class="card-body flex justify-center items-center px-3 py-4 gap-6">
      <button class="btn btn-outline btn-info" id="yes-button">Yes</button>
      <button class="btn btn-outline btn-info" id="no-button">No</button>
    </div>
    <div class="card-footer flex justify-center items-center gap-6">
      <div>
        <span class="font-semibold text-white">Yes's:</span>
        <span id="yes-count" class="text-white">0</span>
      </div>
      <div>
        <span class="font-semibold text-white">No's:</span>
        <span id="no-count" class="text-white">0</span>
      </div>
      <button class="btn btn-outline btn-danger" id="clear-button">
        Clear
      </button>
    </div>
  </div>

  <div class="card max-w-[350px]" data-tooltip="#addsales">
    <div class="card-header flex justify-between items-center">
      <h3 class="card-title">Add Sale</h3>
    </div>
    <div class="card-body flex justify-center items-center px-3 py-4 gap-6">
      <button class="btn btn-outline btn-info" id="addSale">Add Sale</button>
    </div>
  </div>

  <div class="card lg:col-span-3">
    <div class="card-header">
      <h3 class="card-title">Monthly Progression</h3>
      <button class="btn btn-sm btn-icon btn-light btn-clear">
        <i class="ki-outline ki-dots-vertical"></i>
      </button>
    </div>
    <div class="px-3 py-1">
      <div id="area_chart"></div>
    </div>
  </div>
</div>
