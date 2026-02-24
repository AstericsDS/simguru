<header
  class="shadow flex items-center justify-between px-4 md:px-6 h-16 sticky top-0 z-20"
>
  <div class="flex items-center space-x-2">
    {{-- Tombol collapse sidebar --}}
    <button
      @click="sidebarOpen = !sidebarOpen"
      aria-label="Toggle sidebar"
      class="bg-white text-gray-700 hover:text-primary focus:outline-none rounded p-2 cursor-pointer transition-all hover:bg-gray-100"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="h-6 w-6"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
        />
      </svg>
    </button>

    {{-- Search bar --}}
    {{--
      <div class="relative w-64 md:w-64">
      <input type="search" placeholder="Search here..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" />
      <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
      </svg>
      </div>
      </div>
    --}}
  </div>

  {{-- Tombol messages dan user --}}
  <div class="flex items-center space-x-4">
    {{-- Messages button --}}
    {{--
      <button
      aria-label="Messages"
      class="text-white hover:text-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500 rounded p-1"
      >
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
      <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
      <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
      </svg>
      </button>
    --}}

    {{--
      <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 bg-blue-200">
      <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
      </svg>
      <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 015 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
      </svg>
      </button>
    --}}

    {{-- Messages button --}}
    <button
      id="dropdownNotificationButton"
      data-dropdown-toggle="dropdownNotification"
      class="relative inline-flex items-center text-sm font-medium text-center text-gray-600 hover:text-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500 rounded p-1"
      type="button"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="size-6"
      >
        <path
          d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z"
        />
        <path
          d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z"
        />
      </svg>
      <div
        class="absolute block w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-0.5 start-5.5"
      ></div>
    </button>

    <!-- Dropdown messages -->
    <div
      id="dropdownNotification"
      class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow-sm"
      aria-labelledby="dropdownNotificationButton"
    >
      <div
        class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50"
      >
        Notifications
      </div>
      <div class="divide-y divide-gray-100">
        <a href="#" class="flex px-4 py-3 hover:bg-gray-100">
          <div class="shrink-0">
            <div
              class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600"
            >
              <span class="font-medium text-gray-600 dark:text-gray-300">
                JL
              </span>
            </div>
            <div
              class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-blue-600 border border-white rounded-full"
            >
              <svg
                class="w-2 h-2 text-white"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 18 18"
              >
                <path
                  d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z"
                />
                <path
                  d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z"
                />
              </svg>
            </div>
          </div>
          <div class="w-full ps-3">
            <div class="text-gray-500 text-sm mb-1.5">
              New message from
              <span class="font-semibold text-gray-900">Jese Leos</span>
              : "Hey, what's up? All set for the presentation?"
            </div>
            <div class="text-xs text-blue-600">a few moments ago</div>
          </div>
        </a>
        <a href="#" class="flex px-4 py-3 hover:bg-gray-100">
          <div class="shrink-0">
            <div
              class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600"
            >
              <span class="font-medium text-gray-600 dark:text-gray-300">
                JM
              </span>
            </div>
            <div
              class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-gray-900 border border-white rounded-full"
            >
              <svg
                class="w-2 h-2 text-white"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 18"
              >
                <path
                  d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z"
                />
              </svg>
            </div>
          </div>
          <div class="w-full ps-3">
            <div class="text-gray-500 text-sm mb-1.5">
              <span class="font-semibold text-gray-900">Joseph Mcfall</span>
              and
              <span class="font-medium text-gray-900">5 others</span>
              started following you.
            </div>
            <div class="text-xs text-blue-600">10 minutes ago</div>
          </div>
        </a>
        <a href="#" class="flex px-4 py-3 hover:bg-gray-100">
          <div class="shrink-0">
            <div
              class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600"
            >
              <span class="font-medium text-gray-600 dark:text-gray-300">
                BG
              </span>
            </div>
            <div
              class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-red-600 border border-white rounded-full"
            >
              <svg
                class="w-2 h-2 text-white"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 18"
              >
                <path
                  d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z"
                />
              </svg>
            </div>
          </div>
          <div class="w-full ps-3">
            <div class="text-gray-500 text-sm mb-1.5">
              <span class="font-semibold text-gray-900">Bonnie Green</span>
              and
              <span class="font-medium text-gray-900">141 others</span>
              love your story. See it and view more stories.
            </div>
            <div class="text-xs text-blue-600">44 minutes ago</div>
          </div>
        </a>
        <a href="#" class="flex px-4 py-3 hover:bg-gray-100">
          <div class="shrink-0">
            <div
              class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600"
            >
              <span class="font-medium text-gray-600 dark:text-gray-300">
                LL
              </span>
            </div>
            <div
              class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-green-400 border border-white rounded-full"
            >
              <svg
                class="w-2 h-2 text-white"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 18"
              >
                <path
                  d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"
                />
              </svg>
            </div>
          </div>
          <div class="w-full ps-3">
            <div class="text-gray-500 text-sm mb-1.5">
              <span class="font-semibold text-gray-900">Leslie Livingston</span>
              mentioned you in a comment:
              <span class="font-medium text-blue-500" href="#">
                @bonnie.green
              </span>
              what do you say?
            </div>
            <div class="text-xs text-blue-600">1 hour ago</div>
          </div>
        </a>
        <a href="#" class="flex px-4 py-3 hover:bg-gray-100">
          <div class="shrink-0">
            <div
              class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600"
            >
              <span class="font-medium text-gray-600 dark:text-gray-300">
                RB
              </span>
            </div>
            <div
              class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-purple-500 border border-white rounded-full"
            >
              <svg
                class="w-2 h-2 text-white"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 14"
              >
                <path
                  d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"
                />
              </svg>
            </div>
          </div>
          <div class="w-full ps-3">
            <div class="text-gray-500 text-sm mb-1.5">
              <span class="font-semibold text-gray-900">Robert Brown</span>
              posted a new video: Glassmorphism - learn how to implement the new
              design trend.
            </div>
            <div class="text-xs text-blue-600">3 hours ago</div>
          </div>
        </a>
      </div>
      <a
        href="#"
        class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100"
      >
        <div class="inline-flex items-center">
          <svg
            class="w-4 h-4 me-2 text-gray-500"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 20 14"
          >
            <path
              d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"
            />
          </svg>
          View all
        </div>
      </a>
    </div>

    {{-- User button --}}
    {{--
      <button aria-label="User menu" class="text-white hover:text-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500 rounded p-1">
      <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
      <path d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"/>
      </svg>
      </button>
    --}}

    <!-- User button -->
    <button
      id="dropdownUserAvatarButton"
      data-dropdown-toggle="dropdownAvatar"
      class="text-white hover:text-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500 rounded p-1"
      type="button"
    >
      <span class="sr-only">Open user menu</span>
      <div
        class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600"
      >
        <span class="font-medium text-gray-600 dark:text-gray-300">A</span>
      </div>
    </button>

    <!-- Dropdown user -->
    <div
      id="dropdownAvatar"
      class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44"
    >
      <div class="px-4 py-3 text-sm text-gray-900">
        @auth
          <a
            href="{{ route("view-user", Auth::id()) }}"
            class="text-gray-700 hover:text-gray-800 transition-all"
          >
            <div class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="15"
                height="15"
                viewBox="0 0 24 24"
              >
                <!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                <path
                  fill="currentColor"
                  d="M5.85 17.1q1.275-.975 2.85-1.537T12 15t3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4T6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5t1.013-2.488T12 6t2.488 1.013T15.5 9.5t-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"
                />
              </svg>
              <span>{{ Auth::user()->name }}</span>
            </div>
          </a>
        @endauth

        {{-- <div class="font-medium truncate">name@flowbite.com</div> --}}
      </div>
      {{--
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownUserAvatarButton">
        <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
        </li>
        <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
        </li>
        <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a>
        </li>
        </ul>
      --}}
      <div class="px-4 py-3">
        <button
          wire:click="logout"
          class="block text-sm text-gray-700 hover:bg-gray-100 hover:cursor-pointer hover:text-gray-800 w-full transition-all text-start"
        >
          <div class="flex gap-2 items-center text-red-600 hover:text-red-700">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="15"
              height="15"
              viewBox="0 0 24 24"
            >
              <!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
              <path
                fill="currentColor"
                d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h6q.425 0 .713.288T12 4t-.288.713T11 5H5v14h6q.425 0 .713.288T12 20t-.288.713T11 21zm12.175-8H10q-.425 0-.712-.288T9 12t.288-.712T10 11h7.175L15.3 9.125q-.275-.275-.275-.675t.275-.7t.7-.313t.725.288L20.3 11.3q.3.3.3.7t-.3.7l-3.575 3.575q-.3.3-.712.288t-.713-.313q-.275-.3-.262-.712t.287-.688z"
              />
            </svg>
            <span>Sign Out</span>
          </div>
        </button>
        {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a> --}}
      </div>
    </div>
  </div>
</header>
