@extends("index")

@section("content")
  <form
    action="{{ route("leads.store") }}"
    class="w-full flex flex-col gap-4"
    method="POST"
  >
    @csrf
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
      <button type="submit" class="btn btn-outline btn-info">Submit</button>
    </div>
  </form>
@endsection
