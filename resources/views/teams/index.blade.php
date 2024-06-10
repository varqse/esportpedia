@extends('layouts.user')

@section('contents')
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach($teams as $team)
    <div class="flex flex-col max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <div class="w-full h-48 flex items-center justify-center bg-gray-200 dark:bg-gray-700">
                <img class="max-h-full max-w-full" src="{{ asset('images/' . $team->TeamLogo) }}" alt="{{ $team->TeamName }}" />
            </div>
        </a>
        <div class="flex flex-col flex-grow p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $team->TeamName }}</h5>
            </a>
            <div class="mt-auto">
                <a href="{{ route('team.players', $team->TeamID) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Players
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
