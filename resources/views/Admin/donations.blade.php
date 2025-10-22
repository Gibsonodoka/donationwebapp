@extends('layouts.admin')

@section('content')
  <h1 class="text-2xl font-semibold text-gray-800 mb-6">Donation Management</h1>

  @if (session('success'))
    <div class="bg-green-50 border border-green-300 text-green-700 rounded-lg p-4 mb-6">
      {{ session('success') }}
    </div>
  @endif

  <div class="overflow-x-auto bg-white rounded-lg shadow-sm border">
    <table class="w-full text-sm text-left text-gray-700">
      <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
        <tr>
          <th class="px-6 py-3">User</th>
          <th class="px-6 py-3">Support Area</th>
          <th class="px-6 py-3">Amount</th>
          <th class="px-6 py-3">Crypto</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3">Receipt</th>
          <th class="px-6 py-3 text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($donations as $donation)
          <tr class="border-b hover:bg-gray-50">
            <td class="px-6 py-4">{{ $donation->user->name }}</td>
            <td class="px-6 py-4">{{ $donation->support_area }}</td>
            <td class="px-6 py-4">{{ $donation->amount }}</td>
            <td class="px-6 py-4">{{ $donation->crypto_type }}</td>
            <td class="px-6 py-4 capitalize">
              @if($donation->status === 'confirmed')
                <span class="text-green-600 font-semibold">Confirmed</span>
              @elseif($donation->status === 'rejected')
                <span class="text-red-600 font-semibold">Rejected</span>
              @else
                <span class="text-yellow-600 font-semibold">Pending</span>
              @endif
            </td>
            <td class="px-6 py-4">
              @if($donation->receipt_path)
                <a href="{{ asset('storage/'.$donation->receipt_path) }}" target="_blank"
                   class="text-blue-600 hover:underline">View</a>
              @else
                N/A
              @endif
            </td>
            <td class="px-6 py-4 text-center">
              @if($donation->status === 'pending')
                <div class="flex justify-center gap-2">
                  <form action="{{ route('admin.donations.confirm', $donation->id) }}" method="POST">
                    @csrf
                    <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 text-xs">
                      Confirm
                    </button>
                  </form>
                  <form action="{{ route('admin.donations.reject', $donation->id) }}" method="POST">
                    @csrf
                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-xs">
                      Reject
                    </button>
                  </form>
                </div>
              @else
                <span class="text-gray-400 text-sm italic">No Action</span>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
