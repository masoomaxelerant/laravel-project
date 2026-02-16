<x-layout>
  <h1>Welcome to suggestion page.</h1>
  <form action="/submit-suggestion" method="POST" class="max-w-xl mx-auto">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
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
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    </div>
  </form>
  <div class="mt-6 max-w-xl mx-auto">
    @if($message)
      <p class="mt-3 text-sm/6 text-green-600">{{ $message }}</p>
    @endif
    <h2 class="text-lg font-semibold text-blue-900 font-c">Your Suggestions</h2>
    @if(isset($suggestions) && count($suggestions) > 0)
      <ul>
        @foreach($suggestions as $suggestion)
          <li class="ml-4 text-gray-600 font-bold">
            {!! nl2br(e($suggestion->suggestion)) !!}
            <ol class="ml-4 text-gray-500 font-normal">
              <span class="text-xs text-gray-500">{!! $suggestion->user_name ? 'By: ' . e($suggestion->user_name) : 'Anonymous' !!}</span>
              <span class="text-xs text-gray-500"> | {!! $suggestion->created_at ? $suggestion->created_at->format('M j, Y g:i A') : 'Unknown' !!}</span>
              <span class="text-xs text-gray-500"> | Status: {{ $suggestion->status }}</span>
            </ol>
          </li>
        @endforeach
      </ul>
      <a href="/delete-suggestions" class="mt-4 inline-block text-sm font-medium text-red-600 hover:text-red-500">Clear All Suggestions</a>
    @else
      <p>No suggestions yet.</p>
    @endif
  </div>
</x-layout>