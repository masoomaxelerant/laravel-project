<x-layout>
  <h1 class="mt-2 text-5xl tracking-tight sm:text-4xl text-pretty">Welcome to suggestions create page.</h1>
  <form action="/submit-suggestion" method="POST" class="max-w-xl mx-auto">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-2">
        <h2 class="text-base/7 font-semibold text-gray-900">Your Suggestion</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">We value your feedback. Please share your suggestions with us.</p>
        <div class="mt-10 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="suggestion" class="block text-sm font-medium leading-6 text-gray-900">Suggestion</label>
            <div class="mt-2">
              <textarea id="suggestion" name="suggestion" rows="4" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
            <p class="mt-3 text-sm/6 text-gray-600">Write your suggestions here.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-2 flex items-center justify-end gap-x-6">
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    </div>
  </form>
</x-layout>