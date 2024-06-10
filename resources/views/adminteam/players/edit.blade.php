@extends('layouts.user')

@section('contents')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Edit Player</h1>
    <form action="{{ route('player.update', ['player' => $player->PlayerID]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="PlayerName" class="block text-gray-700">Player Name</label>
            <input type="text" name="PlayerName" id="PlayerName" value="{{ $player->PlayerName }}" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label for="PlayerNationality" class="block text-gray-700">Player Nationality</label>
            <input type="text" name="PlayerNationality" id="PlayerNationality" value="{{ $player->PlayerNationality }}" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label for="PlayerRole" class="block text-gray-700">Player Role</label>
            <input type="text" name="PlayerRole" id="PlayerRole" value="{{ $player->PlayerRole }}" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label for="PlayerDOB" class="block text-gray-700">Player DOB</label>
            <input type="date" name="PlayerDOB" id="PlayerDOB" value="{{ $player->PlayerDOB }}" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label for="Nickname" class="block text-gray-700">Nickname</label>
            <input type="text" name="Nickname" id="Nickname" value="{{ $player->Nickname }}" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg">Update</button>
        </div>
    </form>
    <a href="{{ route('admin.teams') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg">
        Back to Teams
    </a>
</div>
@endsection
