<div class="modal" data-modal="true" id="modal_1">
  <div class="modal-content max-w-[600px] top-[20%]">
    <div class="modal-header">
      <h3 class="modal-title">Featherleads - RPC</h3>
      <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true">
        <i class="ki-outline ki-cross"></i>
      </button>
    </div>
    <div class="modal-body">
      <form
        id="financeForm"
        method="POST"
        action="{{ route("sales.setRPCAmount") }}"
      >
        @csrf
        <div class="w-full mb-4">
          <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
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
          <button type="submit" class="btn btn-primary">Create RPC</button>
        </div>
      </form>
    </div>
  </div>
</div>
