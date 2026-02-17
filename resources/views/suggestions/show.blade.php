<x-layout>
  <h1 class="mt-2 text-5xl tracking-tight sm:text-4xl text-pretty">Welcome to single suggestion view page by ID.</h1>
  <div class="mt-6 max-w-xl mx-auto">
    <h2 class="text-lg font-semibold text-blue-900 font-c">Your Suggestion</h2>
    @if(isset($suggestions))
      <ul>
          <li class="ml-4 text-gray-600 font-bold">
            {!! nl2br(e($suggestions->suggestion)) !!}
            <ol class="ml-4 text-gray-500 font-normal">
              <span class="text-xs text-gray-500">{!! $suggestions->user_name ? 'By: ' . e($suggestions->user_name) : 'Anonymous' !!}</span>
              <span class="text-xs text-gray-500"> | {!! $suggestions->created_at ? $suggestions->created_at->format('M j, Y g:i A') : 'Unknown' !!}</span>
              <span class="text-xs text-gray-500"> | Status: {{ $suggestions->status }}</span>
            </ol>
          </li>
      </ul>
      <div class="mt-4 flex items-center gap-x-">
        <a href="/suggestion/{{ $suggestions->id }}/edit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white">Updates</a>
      </div>
    @else
      <p>No suggestions yet.</p>
    @endif
  </div>
</x-layout>