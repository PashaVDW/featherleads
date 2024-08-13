@extends('index')

@section('content')
  <form
    action="{{ route('leads.update', $lead) }}"
    class="w-full flex flex-col gap-4"
    method="POST"
  >
    @csrf
    @method('PATCH')
    @if ($errors->any())
      <div
        style="
          border: 2px solid purple;
          background-color: #f3e5f5;
          color: #4a148c;
          padding: 15px;
          border-radius: 5px;
          margin: 15px 0;
          font-family: Arial, sans-serif;
          font-size: 14px;
        "
      >
        <ul style="margin: 0; padding: 0; list-style-type: none">
          @foreach ($errors->all() as $error)
            <li style="margin: 5px 0">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
      <label class="form-label flex items-center gap-1 max-w-32">
        Company Name
        <span class="text-danger">*</span>
      </label>
      <input
        class="input"
        name="company_name"
        placeholder="{{ $lead->company_name }}"
        type="text"
        value="{{ $lead->company_name }}"
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
        placeholder="{{ $lead->name }}"
        type="text"
        value="{{ $lead->name }}"
      />
    </div>

    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
      <label class="form-label flex items-center gap-1 max-w-32">
        Email Address
      </label>
      <input
        class="input"
        name="email"
        placeholder="{{ $lead->email }}"
        type="text"
        value="{{ $lead->email }}"
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
        placeholder="{{ $lead->phone }}"
        type="text"
        value="{{ $lead->phone }}"
      />
    </div>
    <div class="w-full">
      <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
        <label class="form-label max-w-32">Lead Type</label>
        <select class="select" name="type">
          <option value="Cold">Cold</option>
          <option value="Warm">Warm</option>
          <option value="Acquired">Acquired</option>
        </select>
      </div>
    </div>
    <div class="flex justify-end">
      <button
        type="submit"
        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
      >
        Submit
      </button>
    </div>
  </form>
@endsection
