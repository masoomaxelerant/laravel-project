<x-layout>
  <h1 class="mt-2 text-5xl tracking-tight sm:text-4xl text-pretty">Welcome to suggestions edit page.</h1>
  <form action="/suggestion/{{ $suggestions->id }}" method="POST" class="max-w-xl mx-auto">
    @csrf
    @method('PATCH');
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-2">
        <h2 class="text-base/7 font-semibold text-gray-900">Edit Your Suggestion</h2>
        <div class="mt-10 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="suggestion" class="block text-sm font-medium leading-6 text-gray-900">Suggestion</label>
            <div class="mt-2">
              <textarea id="suggestion" name="suggestion" rows="4" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-4">{{ $suggestions->suggestion }}</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-2 flex items-center justify-end gap-x-6">
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Updates</button>
      <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600" form="delete-suggestion">Delete</button>
    </div>
  </form>
  <form action="/suggestion/{{ $suggestions->id }}/delete" method="POST" id="delete-suggestion" style="display: none;">
    @csrf
    @method('DELETE')
  </form>

</x-layout>