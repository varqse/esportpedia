<!-- resources/views/tournaments/index.blade.php -->

@extends('layouts.user') <!-- Pastikan ini sesuai dengan struktur layout Anda -->

@section('contents')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
    <form method="GET" action="{{ route('tournaments.index') }}" class="mb-4">
        <div class="flex items-center">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search Tournament" class="p-2 border border-gray-300 rounded-md">
            <select name="sort" class="ml-2 p-2 border border-gray-300 rounded-md">
                <option value="TourStartDate" {{ $sort == 'TourStartDate' ? 'selected' : '' }}>Sort by Start Date</option>
                <option value="TourFinishDate" {{ $sort == 'TourFinishDate' ? 'selected' : '' }}>Sort by Finish Date</option>
            </select>
            <button type="submit" class="ml-2 p-2 bg-blue-500 text-white rounded-md">Search</button>
        </div>
    </form>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <!-- Table header -->
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Tournament</th>
            <th scope="col" class="px-6 py-3">Start date</th>
            <th scope="col" class="px-6 py-3">Finish date</th>
            <th scope="col" class="px-6 py-3">Location</th>
            <th scope="col" class="px-6 py-3">Action</th>
        </tr>
    </thead>
    <!-- Table body -->
    <tbody>
        @foreach($tournaments as $tournament)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $tournament->TourName }}</td>
            <td class="px-6 py-4">{{ $tournament->TourStartDate }}</td>
            <td class="px-6 py-4">{{ $tournament->TourFinishDate }}</td>
            <td class="px-6 py-4">{{ $tournament->Location }}</td>
            <td class="px-6 py-4">
            <a href="{{ route('tournament.matches', ['TourID' => $tournament->TourID]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
        </td>

        </tr>
        @endforeach
    </tbody>
</table>



    <div class="mt-4">
        {{ $tournaments->appends(['search' => $search, 'sort' => $sort])->links() }}
    </div>
</div>






@endsection
