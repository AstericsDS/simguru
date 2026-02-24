<div>
  {{-- Title --}}
  <h1 class="text-2xl font-medium">User</h1>

  {{-- Content --}}
  <div class="mt-4">
    <div class="max-w-lg">
      <div class="col-span-2">
        <label for="name" class="block mb-2 text-sm font-medium">
          Nama User
        </label>
        <input
          disabled
          value="{{ $user->name }}"
          type="text"
          id="name"
          class="bg-gray-50 border transition-all text-gray-900 border-primary text-sm rounded-lg block w-full p-2.5"
        />
      </div>
      <div class="col-span-2">
        <label for="email" class="block mb-2 text-sm font-medium">
          Nama User
        </label>
        <input
          disabled
          value="{{ $user->email ?? "Kosong" }}"
          type="text"
          id="email"
          class="bg-gray-50 border transition-all text-gray-900 border-primary text-sm rounded-lg block w-full p-2.5"
        />
      </div>
    </div>
  </div>
</div>
