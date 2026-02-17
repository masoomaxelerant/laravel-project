<x-layout>
  <h1 class="mt-2 text-5xl tracking-tight sm:text-4xl text-pretty">Welcome to suggestions page.</h1>
  <div class="mt-6 max-w-xl mx-auto">
    <div class="mt-4 mb-4 font-bold text-sm/6 text-gray-600"><a href="/suggestion/create" class="text-blue-600 hover:text-blue-500">Add New Suggestions</a></div>
    <h2 class="text-lg font-semibold text-blue-900 font-c">Your Suggestions</h2>
    @if(isset($suggestions) && count($suggestions) > 0)
      <ul>
        @foreach($suggestions as $suggestion)
          <li class="ml-4 text-gray-600 font-bold">
            {!! nl2br(e($suggestion->suggestion)) !!} <span class="float-right"><a href="/suggestion/{{ $suggestion->id }}" class="font-normal text-xm text-blue-600 underline">View</a> | <a href="/suggestion/{{ $suggestion->id }}/edit" class="font-normal text-xm text-blue-600 underline">Edit</a></span>
            <ol class="ml-4 text-gray-500 font-normal">
              <span class="text-xs text-gray-500">{!! $suggestion->user_name ? 'By: ' . e($suggestion->user_name) : 'Anonymous' !!}</span>
              <span class="text-xs text-gray-500"> | {!! $suggestion->updated_at ? $suggestion->updated_at->format('M j, Y g:i A') : 'Unknown' !!}</span>
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