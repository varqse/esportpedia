@extends('layouts.app')

@section('contents')






<div class="max-w-xl mx-auto">
    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="TeamName" class="block text-sm font-medium text-gray-700">Team Name</label>
            <input type="text" name="TeamName" id="TeamName" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="TeamNationality" class="block text-sm font-medium text-gray-700">Team Nationality</label>
            <input type="text" name="TeamNationality" id="TeamNationality" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="TeamLogo" class="block text-sm font-medium text-gray-700">Team Logo</label>
            <input type="file" name="TeamLogo" id="TeamLogo" class="mt-1 block w-full">
        </div>
        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Save
            </button>
        </div>
    </form>
</div>
@endsection