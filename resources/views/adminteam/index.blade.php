@extends('layouts.app')

@section('contents')
<div class="flex justify-end mb-4">
    <a href="{{ route('team.create') }}" class="inline-flex items-center px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700">
        Add Team
        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
    </a>
</div>

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
                <a href="{{ route('team.edit', $team->TeamID) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg">Edit</a>
                <a href="{{ route('player.create', $team->TeamID) }}" class="mt-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Add Player</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<a href="{{ route('admin.teams') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg">
    Back to Teams
</a>
@endsection
