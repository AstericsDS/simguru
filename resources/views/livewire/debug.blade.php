<div>
  <h1
    class="p-2 bg-green-500 mt-4 text-center text-3xl font-semibold text-green-950"
  >
    This is DIV 1
  </h1>
  <div class="grid grid-cols-3 gap-4">
    @foreach ($buildings as $building)
      <div class="p-2 rounded-md bg-blue-200 text-blue-700">
        <span>{{ $building["name"] }}</span>
        <span>{{ $building["campus"]["address"] ?? "" }}</span>
      </div>
    @endforeach
  </div>
</div>
