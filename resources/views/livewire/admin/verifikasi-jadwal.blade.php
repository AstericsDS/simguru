<div>
  {{-- Title --}}
  <h1 class="text-2xl font-medium">Verifikasi Jadwal</h1>

  {{-- Content --}}
  <div class="mt-4">
    <div class="relative overflow-x-auto shadow-md rounded-lg mt-4">
      <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-auto"
      >
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">Nama Acara</th>
            <th scope="col" class="px-6 py-3">Ruang</th>
            <th scope="col" class="px-6 py-3">Lokasi</th>
            <th scope="col" class="px-6 py-3">Hari dan Tanggal</th>
            <th scope="col" class="px-6 py-3">Waktu</th>
            <th scope="col" class="px-6 py-3">
              <div class="flex items-center">
                Waktu Pengajuan
                <button wire:click="sortDate" class="cursor-pointer">
                  <svg
                    class="w-3 h-3 ms-1.5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"
                    />
                  </svg>
                </button>
              </div>
            </th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3 w-1">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($events as $event)
            @php
              $s = \Carbon\Carbon::parse($event->start)->locale("id");
              $e = \Carbon\Carbon::parse($event->end)->locale("id");
            @endphp

            <tr
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
            >
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                {{ $event->event_name }}
              </th>
              <td class="px-6 py-4">
                {{ $event->room->name }}
              </td>
              <td class="px-6 py-4">
                <span>
                  {{ $event->room->building->name }},
                  {{ $event->room->campus->name }}
                </span>
              </td>
              <td class="px-6 py-4">
                {{ $s->translatedFormat("l, j F Y") }}
              </td>
              <td class="px-6 py-4">
                <span>
                  {{ $s->translatedFormat("H:i") }} -
                  {{ $e->translatedFormat("H:i") }}
                </span>
              </td>
              <td class="px-6 py-4">
                {{ $event->created_at->locale("id")->translatedFormat("l, d F Y") }}
              </td>
              <td class="px-6 py-4 flex">
                @if ($event->status === "pending")
                  <span
                    class="px-2 py-1 border border-yellow-500 bg-yellow-200 rounded-md flex-1 flex justify-center"
                  >
                    Pending
                  </span>
                @elseif ($event->status === "approved")
                  <span
                    class="px-2 py-1 border border-green-500 bg-green-200 rounded-md flex-1 flex justify-center"
                  >
                    Disetujui
                  </span>
                @else
                  <span
                    class="px-2 py-1 border border-red-500 bg-red-200 rounded-md flex-1 flex justify-center"
                  >
                    Ditolak
                  </span>
                @endif
              </td>
              <td class="px-6 py-4">
                <div class="flex gap-2 items-center">
                  @if ($event->status === "pending")
                    <button
                      @click="$dispatch('confirm-modal', {id: {{ $event->id }}, action: 'accept'})"
                      class="border border-green-500 size-8 rounded-xl cursor-pointer hover:bg-green-500 hover:text-white transition-all"
                    >
                      <i class="fa-solid fa-check"></i>
                    </button>
                    <button
                      @click="$dispatch('confirm-modal', {id: {{ $event->id }}, action: 'reject'})"
                      class="border border-red-500 size-8 rounded-xl cursor-pointer hover:bg-red-500 hover:text-white transition-all"
                    >
                      <i class="fa-solid fa-xmark"></i>
                    </button>
                  @endif
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  {{-- Confirm Modal --}}
  <div
    x-data="{ state: false, confirmData: { id: null, action: null } }"
    @confirm-modal.window="state = !state; confirmData = $event.detail"
    @keydown.window.escape="state = false"
  >
    <div
      x-show="state"
      class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center"
      x-transition:enter="transition ease-in-out duration-250"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in-out duration-250"
      x-transition:leave-end="opacity-0"
    >
      <div
        x-show="state"
        @click.outside="state = false"
        class="relative bg-white max-h-screen overflow-y-auto rounded-lg shadow-sm w-2xl p-2 opacity-100 z-50"
        x-transition:enter="transition ease-in-out duration-250"
        x-transition:enter-start="scale-50"
        x-transition:enter-end="scale-100"
        x-transition:leave="transition ease-in-out duration-250"
        x-transition:leave-end="scale-50"
      >
        <div class="flex flex-col items-center py-8">
          <i class="fa-solid fa-circle-exclamation text-gray-500 text-8xl"></i>
          <p class="pt-6 pb-12 text-2xl text-gray-600">Apakah anda yakin?</p>
          <div class="flex gap-6">
            <button
              @click="$wire.save(confirmData.id, confirmData.action)"
              class="px-8 py-2 rounded-md bg-primary hover:bg-unj-dark transition-all cursor-pointer text-white text-xl"
            >
              Iya
            </button>
            <button
              @click="$dispatch('confirm-modal')"
              class="px-8 py-2 rounded-md border-2 border-red-600 hover:bg-red-700 hover:border-red-700 transition-all cursor-pointer text-xl hover:text-white"
            >
              Tidak
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Toast --}}
  <div
    x-data="{ state: false, 'status': '', 'message': '' }"
    x-show="state"
    @toast.window="state = true; status = $event.detail.status; message = $event.detail.message; setTimeout( () => state = false, 3000 )"
    :class="{ 'bg-green-100': status === 'success', 'bg-red-100': status === 'fail', 'bg-red-100': status === 'nochanges' }"
    x-transition:enter="transform transition ease-in-out duration-1000"
    x-transition:enter-start="-translate-x-full opacity-0"
    x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transform transition ease-in-out duration-1000"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="-translate-x-5/4 opacity-0"
    class="fixed bottom-5 left-5 flex w-fit z-30 p-4 rounded-md shadow-lg items-center gap-4"
  >
    {{-- Success Logo --}}
    <div
      :class="status === 'success' ? 'inline-flex' : 'hidden'"
      class="items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200"
    >
      <svg
        class="w-5 h-5"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
        />
      </svg>
      <span class="sr-only">Check icon</span>
    </div>

    {{-- Failed Logo --}}
    <div
      :class="status === 'fail' || status === 'nochanges' ? 'inline-flex' : 'hidden'"
      class="items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200"
    >
      <svg
        class="w-5 h-5"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"
        />
      </svg>
      <span class="sr-only">Error icon</span>
    </div>

    {{-- Message --}}
    <div x-text="message"></div>

    {{-- Close Button --}}
    <button
      @click="state = false"
      type="button"
      class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700 cursor-pointer transition-all"
    >
      <span class="sr-only">Close</span>
      <svg
        class="w-3 h-3"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 14 14"
      >
        <path
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
        />
      </svg>
    </button>
  </div>
</div>
