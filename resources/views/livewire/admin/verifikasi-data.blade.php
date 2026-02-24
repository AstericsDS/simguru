<div class="text-black">
  {{-- Title --}}
  <h1 class="text-2xl font-medium">Daftar Pengajuan</h1>

  {{-- Content --}}
  <div class="rounded-md mt-4">
    {{-- Filter --}}
    @php
      $statuses = [
        "all" => "Semua",
        "pending" => "Pending",
        "approved" => "Diterima",
        "rejected" => "Ditolak",
      ];
    @endphp

    <div class="flex gap-2 overflow-scroll text-sm sm:text-lg">
      @foreach ($statuses as $value => $label)
        <button
          wire:click="setFilter('{{ $value }}')"
          class="btn-filter p-2 cursor-pointer transition-all {{ $filter === $value ? "text-primary border-b-[2px] border-primary font-medium" : "text-gray-500 hover:text-gray-800" }}"
        >
          {{ $label }}
        </button>
      @endforeach
    </div>

    {{-- Table --}}
    <div class="relative overflow-x-auto shadow-md rounded-lg mt-4">
      <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-auto"
      >
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">Nama</th>
            <th scope="col" class="px-6 py-3">Unit</th>
            <th scope="col" class="px-6 py-3">Admin</th>
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
            <th scope="col" class="px-6 py-3">Tipe Perubahan</th>
            <th scope="col" class="px-6 py-3 w-1">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($updates as $update)
            <tr
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
            >
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                {{ $update->parsed_new_data["Nama"] }}
              </th>
              <td class="px-6 py-4">
                @switch($update->table)
                  @case("campuses")
                    Kampus

                    @break
                  @case("buildings")
                    Gedung

                    @break
                  @case("rooms")
                    Ruang

                    @break
                @endswitch
              </td>
              <td class="px-6 py-4">
                {{ $update->admin->name }}
              </td>
              <td class="px-6 py-4">
                {{ $update->created_at->locale("id")->translatedFormat("l, d F Y | H:i:s") }}
              </td>
              <td class="px-6 py-4">
                @switch($update->status)
                  @case("pending")
                    <span class="rounded-xl bg-yellow-400 text-white px-2 py-1">
                      Pending
                    </span>

                    @break
                  @case("approved")
                    <span class="rounded-xl bg-[#40a02b] text-white px-2 py-1">
                      Disetujui
                    </span>

                    @break
                  @case("rejected")
                    <span class="rounded-xl bg-[#d20f39] text-white px-2 py-1">
                      Ditolak
                    </span>

                    @break
                @endswitch
              </td>
              <td class="px-6 py-4">
                @if ($update->type === "new")
                  <span
                    class="bg-blue-200 border border-blue-500 px-2 py-1 rounded-md"
                  >
                    Baru
                  </span>
                @elseif ($update->type === "modify")
                  <span
                    class="bg-yellow-200 border border-yellow-500 px-2 py-1 rounded-md"
                  >
                    Edit
                  </span>
                @elseif ($update->type === "delete")
                  <span
                    class="bg-red-200 border border-red-500 px-2 py-1 rounded-md"
                  >
                    Hapus
                  </span>
                @endif
              </td>
              <td class="px-6 py-4">
                <div class="flex gap-2 items-center">
                  <button
                    wire:click="view({{ $update->id }})"
                    type="button"
                    class="transition-all cursor-pointer hover:text-blue-500 hover:bg-gray-300 rounded-xl p-2 mx-auto"
                  >
                    <i class="fa-solid fa-eye"></i>
                  </button>
                  @if ($update->status === "pending")
                    <button
                      @click="$dispatch('confirm', {id: {{ $update->id }}, action: 'accept'})"
                      class="border border-green-500 size-8 rounded-xl cursor-pointer hover:bg-green-500 hover:text-white transition-all"
                    >
                      <i class="fa-solid fa-check"></i>
                    </button>
                    <button
                      @click="$dispatch('confirm', {id: {{ $update->id }}, action: 'reject'})"
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

    <!-- View Modal -->
    <div
      x-data="{ state: false, active: 'new' }"
      @view.window="state = !state"
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
          class="relative bg-white h-[90%] overflow-y-auto rounded-lg shadow-sm w-[95%] opacity-100 z-50"
          x-transition:enter="transition ease-in-out duration-250"
          x-transition:enter-start="scale-50"
          x-transition:enter-end="scale-100"
          x-transition:leave="transition ease-in-out duration-250"
          x-transition:leave-end="scale-50"
        >
          {{-- Content --}}
          <div class="px-8 py-6">
            {{-- Header --}}
            <div
              class="flex items-center justify-between border-b rounded-t border-gray-200"
            >
              <div class="flex gap-12">
                <button
                  @click="active = 'new'"
                  :class="active === 'new' ? 'text-gray-900' : 'text-gray-500'"
                  class="text-lg font-semibold cursor-pointer transition-all"
                >
                  Data Baru
                </button>
                @if (isset($selectedUpdate->old_data))
                  <button
                    @click="active = 'old'"
                    :class="active === 'old' ? 'text-gray-900' : 'text-gray-500'"
                    class="text-lg font-semibold cursor-pointer transition-all"
                  >
                    Data Lama
                  </button>
                @endif
              </div>
              <button
                @click="state = false"
                type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer"
              >
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
                <span class="sr-only">Close modal</span>
              </button>
            </div>

            @if (isset($selectedUpdate))
              {{-- Data --}}
              <div
                class="mt-6 gap-x-6"
                :class="active == 'new' ? 'flex flex-col-reverse xl:grid xl:grid-cols-2 gap-4' : ''"
              >
                <div
                  x-show="active === 'new'"
                  x-transition:enter.duration.250ms
                >
                  @foreach ($selectedUpdate->parsed_new_data ?? [] as $key => $value)
                    <div
                      class="grid grid-cols-[20%_1fr] md:grid-cols-[15%_1fr] xl:grid-cols-[20%_1fr] mb-2"
                    >
                      <span class="text-sm md:text-base">
                        {{ $key }}
                      </span>
                      <div class="flex gap-4">
                        <span class="text-sm md:text-base">:</span>
                        <span class="text-sm md:text-base">
                          {{ $value }}
                        </span>
                      </div>
                    </div>
                  @endforeach

                  {{-- Documents --}}
                  <div class="border-2 border-gray-300 p-4 rounded-md mt-4">
                    <div class="flex gap-2 items-center">
                      <i class="fa-regular fa-file"></i>
                      <h1 class="text-sm md:text-base">Dokumen</h1>
                    </div>

                    <ul
                      class="mt-3 space-y-1 list-disc list-inside marker:text-primary"
                    >
                      @foreach ($new_data["documents_path"] as $document)
                        <li>
                          <a
                            target="_blank"
                            href="{{ asset("storage/" . $document) }}"
                            class="text-sm md:text-base border-b border-transparent hover:border-gray-500 transition-all duration-300"
                          >
                            {{ basename($document) }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>

                @if (isset($selectedUpdate->old_data))
                  <div
                    x-show="active === 'old'"
                    x-transition:enter.duration.250ms
                  >
                    @foreach ($selectedUpdate->parsed_old_data ?? [] as $key => $value)
                      <div
                        class="grid grid-cols-[20%_1fr] md:grid-cols-[15%_1fr] xl:grid-cols-[20%_1fr] mb-2"
                      >
                        <span class="text-sm md:text-base">
                          {{ $key }}
                        </span>
                        <div class="flex gap-4">
                          <span class="text-sm md:text-base">:</span>
                          <span class="text-sm md:text-base">
                            {{ $value }}
                          </span>
                        </div>
                      </div>
                    @endforeach
                  </div>
                @endif

                {{-- Images --}}
                <div
                  x-show="active === 'new'"
                  x-transition:enter.duration.250ms
                >
                  <div class="carousel w-full rounded-md">
                    @foreach ($new_data["images_path"] as $image)
                      <div
                        id="item{{ $loop->iteration }}"
                        class="carousel-item w-full"
                      >
                        <img
                          src="{{ asset("storage/" . $image) }}"
                          class="w-full"
                        />
                      </div>
                    @endforeach
                  </div>
                  <div class="flex w-full justify-center gap-2 py-2">
                    @foreach ($new_data["images_path"] as $image)
                      <a href="#item{{ $loop->iteration }}" class="btn btn-md">
                        {{ $loop->iteration }}
                      </a>
                    @endforeach
                  </div>
                </div>
              </div>

              {{-- Inventory --}}
              @if ($selectedUpdate->table === "rooms")
                <div class="border-2 border-gray-300 p-5 rounded-md mt-4">
                  <div class="flex gap-2 items-center">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="size-6"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"
                      />
                    </svg>
                    <h1>Inventaris</h1>
                  </div>

                  <table class="w-full border border-gray-400 mt-4">
                    <thead>
                      <tr>
                        <th
                          class="text-left font-normal border border-gray-400 p-2 px-4"
                        >
                          Nama Barang
                        </th>
                        <th
                          class="text-left font-normal border border-gray-400 p-2 px-4"
                        >
                          Kuantitas
                        </th>
                      </tr>
                    </thead>

                    {{-- Inventory --}}
                    @if (isset($selectedUpdate->new_data["inventory"]))
                      <tbody x-show="active === 'new'">
                        @foreach ($selectedUpdate->new_data["inventory"] ?? [] as $item)
                          <tr>
                            <td class="border border-gray-400 p-2 px-4">
                              {{ $item["name"] }}
                            </td>
                            <td class="border border-gray-400 p-2 px-4">
                              {{ $item["quantity"] }}
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    @endif

                    @if (isset($selectedUpdate->old_data["inventory"]))
                      <tbody x-show="active === 'old'">
                        @foreach ($selectedUpdate->old_data["inventory"] ?? [] as $item)
                          <tr>
                            <td class="border border-gray-400 p-2 px-4">
                              {{ $item["name"] }}
                            </td>
                            <td class="border border-gray-400 p-2 px-4">
                              {{ $item["quantity"] }}
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    @endif
                  </table>
                </div>
              @endif
            @endif
          </div>
        </div>
      </div>
    </div>

    {{-- Confirm Modal --}}
    <div
      x-data="{ state: false, confirmData: { id: null, action: null } }"
      @confirm.window="state = !state; confirmData = $event.detail"
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
          <div
            x-show="confirmData.action === 'accept'"
            class="flex flex-col items-center py-8"
          >
            <i
              class="fa-solid fa-circle-exclamation text-gray-500 text-8xl"
            ></i>
            <p class="pt-6 pb-12 text-2xl text-gray-600">Apakah anda yakin?</p>
            <div class="flex gap-6">
              <button
                @click="$wire.confirm(confirmData.id, confirmData.action); state = false"
                class="px-8 py-2 rounded-md bg-primary hover:bg-unj-dark transition-all cursor-pointer text-white text-xl"
              >
                Iya
              </button>
              <button
                @click="$dispatch('confirm')"
                class="px-8 py-2 rounded-md border-2 border-red-600 hover:bg-red-700 hover:border-red-700 transition-all cursor-pointer text-xl hover:text-white"
              >
                Tidak
              </button>
            </div>
          </div>

          <div
            x-show="confirmData.action === 'reject'"
            class="flex flex-col items-center py-8"
          >
            <i
              class="fa-solid fa-circle-exclamation text-gray-500 text-8xl"
            ></i>
            <p class="pt-6 pb-12 text-2xl text-gray-600">Apakah anda yakin?</p>
            <div class="flex gap-6">
              <button
                @click="$wire.confirm(confirmData.id, confirmData.action)"
                class="px-8 py-2 rounded-md bg-primary hover:bg-unj-dark transition-all cursor-pointer text-white text-xl"
              >
                Iya
              </button>
              <button
                @click="$dispatch('confirm')"
                class="px-8 py-2 rounded-md border-2 border-red-600 hover:bg-red-700 hover:border-red-700 transition-all cursor-pointer text-xl hover:text-white"
              >
                Tidak
              </button>
            </div>
            <div class="w-3/4">
              <form class="w-full text-center mt-8">
                <textarea
                  wire:model.live="reject_reason"
                  class="w-full rounded-md p-4 {{ $errors->has("reject_reason") ? "border-red-500" : "" }}"
                  placeholder="Tulis alasan penolakan"
                ></textarea>
              </form>
              @error("reject_reason")
                <span class="text-red-500">
                  {{ $message }}
                </span>
              @enderror
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
      :class="{ 'bg-green-100': status === 'success', 'bg-red-100': status === 'fail' }"
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
        :class="status === 'fail' ? 'inline-flex' : 'hidden'"
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

    <div class="mt-4">
      {{ $updates->links() }}
    </div>
  </div>
</div>
