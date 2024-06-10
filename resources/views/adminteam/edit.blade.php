@extends('layouts.user')

@section('contents')
<div class="max-w-xl mx-auto">
    <form action="{{ route('team.update', $team->TeamID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="TeamName" class="block text-sm font-medium text-gray-700">Team Name</label>
            <input type="text" name="TeamName" id="TeamName" class="mt-1 block w-full" value="{{ $team->TeamName }}" required>
        </div>
        <div class="mb-4">
            <label for="TeamLogo" class="block text-sm font-medium text-gray-700">Team Logo</label>
            <input type="file" name="TeamLogo" id="TeamLogo" class="mt-1 block w-full">
            @if($team->TeamLogo)
                <img src="{{ asset('images/' . $team->TeamLogo) }}" alt="{{ $team->TeamName }}" class="mt-2 h-24">
            @endif
        </div>
        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
