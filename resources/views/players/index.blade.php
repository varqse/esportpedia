@extends('layouts.user')

@section('contents')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">{{ $team->TeamName }} Players</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($players as $player)
        <div class="bg-white border border-gray-200 rounded-lg shadow p-4">
            <h2 class="text-xl font-bold">{{ $player->PlayerName }}</h2>
            <p>Nickname: {{ $player->Nickname }}</p>
            <p>Nationality: {{ $player->PlayerNationality }}</p>
            <p>Role: {{ $player->PlayerRole }}</p>
            <p>DOB: {{ $player->PlayerDOB }}</p>
            <div class="mt-4 flex space-x-2">
                <a href="{{ route('player.edit', ['player' => $player->PlayerID]) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg">Edit</a>
                <form action="{{ route('player.destroy', ['player' => $player->PlayerID]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('admin.teams') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg">
        Back to Teams
    </a>
</div>
@endsection
