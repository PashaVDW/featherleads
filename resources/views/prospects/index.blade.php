@extends("index")

@section("content")
  <div class="grid">
    <div class="card card-grid min-w-full">
      <div class="card-header py-5 flex-wrap">
        <h3 class="card-title">Leads Overview</h3>
        <label class="switch switch-sm">
          <input
            checked=""
            class="order-2"
            name="check"
            type="checkbox"
            value="1"
          />
          <span class="switch-label order-1">Push Alerts</span>
        </label>
      </div>
      <div class="card-body">
        <div
          data-datatable="true"
          data-datatable-page-size="5"
          data-datatable-state-save="true"
          id="datatable_1"
        >
          <div class="scrollable-x-auto">
            <table
              class="table table-auto table-border"
              data-datatable-table="true"
            >
              <thead>
                <tr>
                  <th class="w-[200px] text-center">
                    <span class="sort asc">
                      <span class="sort-label">Company Name</span>
                      <span class="sort-icon"></span>
                    </span>
                  </th>
                  <th class="min-w-[100px]">
                    <span class="sort">
                      <span class="sort-label">Name</span>
                      <span class="sort-icon"></span>
                    </span>
                  </th>
                  <th class="w-[185px]">
                    <span class="sort">
                      <span class="sort-label">Lead Type</span>
                      <span class="sort-icon"></span>
                    </span>
                  </th>
                  <th class="w-[185px]">
                    <span class="sort">
                      <span class="sort-label">
                        <span
                          class="pt-px"
                          data-tooltip="true"
                          data-tooltip-offset="0, 5px"
                          data-tooltip-placement="top"
                        ></span>
                        Email
                      </span>
                      <span class="sort-icon"></span>
                    </span>
                  </th>
                  <th class="min-w-[100px]">
                    <span class="sort">
                      <span class="sort-label">Phone Number</span>
                      <span class="sort-icon"></span>
                    </span>
                  </th>
                  <th class="w-[60px]"></th>
                  <th class="w-[60px]"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach ($prospects as $prospect)
                    <td class="text-center">
                      {{ $lead->company_name }}
                    </td>
                    <td>{{ $lead->name }}</td>
                    <td>{{ $lead->type }}</td>
                    <td>{{ $lead->email }}</td>
                    <td>{{ $lead->phone }}</td>
                    <td>
                      <form
                        method="GET"
                        action="{{ route("prospects.edit", $prospect->id) }}"
                      >
                        @csrf
                        <button class="btn btn-sm btn-icon btn-clear btn-light">
                          <i class="ki-outline ki-notepad-edit"></i>
                        </button>
                      </form>
                    </td>
                    <td>
                      <form
                        method="POST"
                        action="{{ route("prospects.destroy", $prospect->id) }}"
                      >
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-sm btn-icon btn-clear btn-light">
                          <i class="ki-outline ki-trash"></i>
                        </button>
                      </form>
                    </td>
                  @endforeach
                </tr>
              </tbody>
            </table>
          </div>
          <div
            class="card-footer justify-center md:justify-between flex-col md:flex-row gap-3 text-gray-600 text-2sm font-medium"
          >
            <div class="flex items-center gap-2">
              Show
              <select
                class="select select-sm w-16"
                data-datatable-size="true"
                name="perpage"
              ></select>
              per page
            </div>
            <div class="flex items-center gap-4">
              <span data-datatable-info="true"></span>
              <div class="pagination" data-datatable-pagination="true"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
