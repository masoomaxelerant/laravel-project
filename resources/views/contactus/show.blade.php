<x-layout title="Contact Us">
  <h1 class="mt-2 text-5xl tracking-tight sm:text-4xl text-pretty">Submitted Contact Us</h1>
  <p class="text-lg">The following message was received from the user.</p>
  <div class="mt-4">
    <h2 class="text-lg font-semibold text-blue-900 font-c mb-4">User Message Details</h2>
      <table class="min-w-full bg-white border border-gray-200">
        <tr class="bg-gray-100 text-left text-gray-700 font-bold">
          <th class="p-2">Name</th>
          <th class="p-2">Email</th>
          <th class="p-2">Phone</th>
          <th class="p-2">Message</th>
          <th class="p-2">Submitted At</th>
        </tr>
        @if(isset($contactus) && count($contactus) > 0)
          @foreach($contactus as $contact)
            <tr class="ml-4 text-gray-600 font-bold">
              <td class="p-2">{{ $contact->first_name }} {{ $contact->last_name }}</td>
              <td class="p-2">{{ $contact->email }}</td>
              <td class="p-2">{{ $contact->phone }}</td>
              <td class="p-2">{!! nl2br(e($contact->message)) !!}</td>
              <td class="p-2">{!! $contact->created_at ? $contact->created_at->format('M j, Y g:i A') : 'Unknown' !!}</td>
            </tr>
          @endforeach
        @else
          <p>No contact message found.</p>
        @endif
      </table>
  </div>
</x-layout>
