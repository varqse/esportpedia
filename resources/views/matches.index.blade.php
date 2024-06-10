@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Match Schedule</h2>
        <div class="mt-4">
            @foreach($matches as $match)
                <div class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 p-4 mb-4">
                    <!-- Gambar Kiri dengan Nama Tim -->
                    <div class="flex flex-col items-center w-1/3">
                        <img class="object-cover w-64 h-64 md:h-auto md:w-64 rounded-none md:rounded-l-lg" src="{{ asset('images/'.$match->team1->TeamLogo) }}" alt="{{ $match->team1->TeamName }}">
                        <span class="mt-2 text-xl font-bold text-gray-900 dark:text-white">{{ $match->team1->TeamName }}</span>
                        <span class="mt-1 text-lg font-medium text-gray-700 dark:text-gray-400">Score: {{ $match->Team1Score }}</span> <!-- Skor Team A -->
                    </div>

                    <!-- Teks Tengah -->
                    <div class="flex flex-col justify-center items-center text-center p-4 leading-normal mx-4 w-1/3">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $match->MatchDate }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $match->MatchTime }}</p>
                        @if($match->TicketID)
                            <a href="#" class="px-4 py-2 mt-4 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Book Tickets</a>
                        @endif
                    </div>

                    <!-- Gambar Kanan dengan Nama Tim -->
                    <div class="flex flex-col items-center w-1/3">
                        <img class="object-cover w-64 h-64 md:h-auto md:w-64 rounded-none md:rounded-r-lg" src="{{ asset('images/'.$match->team2->TeamLogo) }}" alt="{{ $match->team2->TeamName }}">
                        <span class="mt-2 text-xl font-bold text-gray-900 dark:text-white">{{ $match->team2->TeamName }}</span>
                        <span class="mt-1 text-lg font-medium text-gray-700 dark:text-gray-400">Score: {{ $match->Team2Score }}</span> <!-- Skor Team B -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
