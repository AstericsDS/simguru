<div class="flex justify-center">
  {{-- Content --}}
  <div class="mt-4 flex flex-col gap-6 p-4 bg-slate-100 border border-gray-500 rounded-md transition-all">
    <div class="col-span-2">
      <label for="name" class="block mb-2 text-sm font-medium">
        Nama User
      </label>
      <input
        disabled
        value="{{ $user->name }}"
        type="text"
        id="name"
        class="bg-gray-50 border transition-all text-gray-900 border-primary text-sm rounded-lg block w-[250px] sm:w-[350px] p-2.5"
      />
    </div>
    <div class="col-span-2">
      <label for="email" class="block mb-2 text-sm font-medium">
        Email User
      </label>
      <input
        disabled
        value="{{ $user->email ?? "Kosong" }}"
        type="text"
        id="email"
        class="bg-gray-50 border transition-all text-gray-900 border-primary text-sm rounded-lg block w-[250px] sm:w-[350px] p-2.5"
      />
    </div>
    <div class="flex justify-end">
      @if ($user->role === 1)
        <span class="px-2 py-1 bg-blue-300 text-blue-700 rounded-md">Super Admin</span>
      @else
        <span class="px-2 py-1 bg-green-300 text-green-700 rounded-md">Admin</span>
      @endif
    </div>
  </div>
</div>
