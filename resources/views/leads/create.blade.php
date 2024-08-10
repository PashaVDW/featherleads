@extends('index')

@section('content')
    <form class="w-full flex flex-col gap-4">
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
                name="lead_name"
                placeholder="Enter Lead Name"
                type="text"
                value=""
            />
        </div>

        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label flex items-center gap-1 max-w-32">
                Email Address
                <span class="text-danger">*</span>
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
                name="phone_number"
                placeholder="Enter Phone Number"
                type="text"
                value=""
            />
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Submit
            </button>
        </div>
    </form>
@endsection
