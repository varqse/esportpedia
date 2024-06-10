@extends('layouts.user')

@section('contents')
<div class="max-w-xl mx-auto">
    <form action="{{ route('player.createPlayer', $team->TeamID) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="PlayerName" class="block text-sm font-medium text-gray-700">Player Name</label>
            <input type="text" name="PlayerName" id="PlayerName" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="PlayerRole" class="block text-sm font-medium text-gray-700">Player Role</label>
            <input type="text" name="PlayerRole" id="PlayerRole" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="PlayerNationality" class="block text-sm font-medium text-gray-700">Player Nationality</label>
            <input type="text" name="PlayerNationality" id="PlayerNationality" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="PlayerDOB" class="block text-sm font-medium text-gray-700">Player Date of Birth</label>
            <input type="date" name="PlayerDOB" id="PlayerDOB" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="Nickname" class="block text-sm font-medium text-gray-700">Nickname</label>
            <input type="text" name="Nickname" id="Nickname" class="mt-1 block w-full">
        </div>
        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Save
            </button>
        </div>
    </form>
</div>
@endsection
