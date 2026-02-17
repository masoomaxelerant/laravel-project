<x-layout title="Contact Us">
  <h1 class="mt-2 text-5xl tracking-tight sm:text-4xl text-pretty">Contact Us</h1>
  <x-card id="contact-card" class="max-w-600">
    @if (session('success'))
      <p class="mb-4 text-sm text-green-600">{{ session('success') }}</p>
    @endif
    <form action="{{ route('contact.store') }}" method="POST" class="max-w-xl mx-auto">
      @csrf
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-2">
          <h2 class="text-base/7 font-semibold text-gray-900">Send us a message</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Fill out the form below and we'll get back to you.</p>
          <div class="mt-10 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
              <div class="mt-2">
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
              </div>
              @error('first_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
            <div class="sm:col-span-3">
              <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
              <div class="mt-2">
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
              </div>
              @error('last_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
            <div class="sm:col-span-3">
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
              <div class="mt-2">
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
              </div>
              @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
            <div class="sm:col-span-3">
              <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
              <div class="mt-2">
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
              </div>
              @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
            <div class="col-span-full">
              <label for="message" class="block text-sm font-medium leading-6 text-gray-900">Message</label>
              <div class="mt-2">
                <textarea id="message" name="message" rows="4" required
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('message') }}</textarea>
              </div>
              @error('message')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>
      </div>
      <div class="mt-2 flex items-center justify-end gap-x-6">
        <button type="submit"
          class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
      </div>
    </form>
  </x-card>
</x-layout>
