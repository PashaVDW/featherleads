<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
  <div class="card">
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
      <button class="btn btn-outline btn-info" data-modal-toggle="#yesModal">
        Yes
      </button>
      <button class="btn btn-outline btn-info" data-modal-toggle="#noModal">
        No
      </button>
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
    </div>
  </div>

  <div class="modal" data-modal="true" id="yesModal">
    <div class="modal-content max-w-[600px] top-[20%]">
      <div class="modal-header">
        <h3 class="modal-title">Add Prospect</h3>
        <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true">
          <i class="ki-outline ki-cross"></i>
        </button>
      </div>
      <div class="modal-body">
        <form
          action="{{ route("prospects.store") }}"
          class="w-full flex flex-col gap-4"
          method="POST"
        >
          @csrf
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
          <input type="hidden" name="type" value="yes" />

          <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label flex items-center gap-1 max-w-32">
              Company Name
              <span class="text-danger">*</span>
            </label>
            <input
              class="input"
              name="company_name"
              placeholder="Enter Company Name"
              type="text"
              value=""
            />
          </div>

          <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label flex items-center gap-1 max-w-32">
              Lead Name
              <span class="text-danger">*</span>
            </label>
            <input
              class="input"
              name="name"
              placeholder="Enter Lead Name"
              type="text"
              value=""
            />
          </div>

          <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label flex items-center gap-1 max-w-32">
              Email Address
            </label>
            <input
              class="input"
              name="email"
              placeholder="Enter email address"
              type="text"
              value=""
            />
          </div>

          <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label flex items-center gap-1 max-w-32">
              Phone Number
              <span class="text-danger">*</span>
            </label>
            <input
              class="input"
              name="phone"
              placeholder="Enter Phone Number"
              type="text"
              value=""
            />
          </div>

          <div class="flex justify-end">
            <button
              type="submit"
              id="yes-button"
              class="btn btn-outline btn-info"
            >
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal" data-modal="true" id="noModal">
    <div class="modal-content max-w-[600px] top-[20%]">
      <div class="modal-header">
        <h3 class="modal-title">
          Add to no-call list (to ensure no further contact)
        </h3>
        <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true">
          <i class="ki-outline ki-cross"></i>
        </button>
      </div>
      <div class="modal-body">
        <form
          action="{{ route("prospects.store") }}"
          class="w-full flex flex-col gap-4"
          method="POST"
        >
          @csrf
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
          <input type="hidden" name="type" value="no" />

          <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label flex items-center gap-1 max-w-32">
              Company Name
              <span class="text-danger">*</span>
            </label>
            <input
              class="input"
              name="company_name"
              placeholder="Enter Company Name"
              type="text"
              value=""
            />
          </div>

          <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label flex items-center gap-1 max-w-32">
              Lead Name
              <span class="text-danger">*</span>
            </label>
            <input
              class="input"
              name="name"
              placeholder="Enter Lead Name"
              type="text"
              value=""
            />
          </div>

          <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label flex items-center gap-1 max-w-32">
              Email Address
            </label>
            <input
              class="input"
              name="email"
              placeholder="Enter email address"
              type="text"
              value=""
            />
          </div>

          <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label flex items-center gap-1 max-w-32">
              Phone Number
              <span class="text-danger">*</span>
            </label>
            <input
              class="input"
              name="phone"
              placeholder="Enter Phone Number"
              type="text"
              value=""
            />
          </div>

          <div class="flex justify-end">
            <button
              type="submit"
              id="no-button"
              class="btn btn-outline btn-info"
            >
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @if ($sale->cost_per_customer != null || $sale->cost_per_customer != 0)
    <div class="card max-w-[350px]" data-tooltip="#addsales">
      <div class="card-header flex justify-between items-center">
        <h3 class="card-title">Add Sale</h3>
      </div>
      <div class="card-body flex justify-center items-center px-3 py-4 gap-6">
        <form method="POST" action="{{ route("sales.addSale") }}">
          @csrf
          <button class="btn btn-outline btn-info" id="addSale">
            Add Sale
          </button>
        </form>
      </div>
    </div>
  @endif

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
