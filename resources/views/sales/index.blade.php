@extends("index")

@section("content")
  <div class="container-fixed">
    @include("sales.index_partials.header")

    <div class="flex flex-wrap items-center gap-5 justify-between mb-8">
      <h3 class="text-lg text-gray-900 font-semibold" id="viewModeText">
        You are currently viewing this in: Monthly mode
      </h3>
    </div>

    @include("sales.index_partials.cards")
  </div>

  @include("sales.index_partials.footer")
@endsection
