@extends('layouts.user')

@section('contents')
    <div class="container">
        <h2>Match Schedule</h2>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2">

            @if($matches->isEmpty())
                <p>No matches found for this tournament.</p>
            @else
                @foreach($matches as $match)
                    <div class="flex flex-wrap">
                        <div class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:w-full md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 p-4 mb-4">
                            <!-- Gambar Kiri dengan Nama Tim -->
                            <div class="flex flex-col items-center w-1/3">
                                @if($match->team1)
                                    @if($match->team1->TeamLogo)
                                        <img class="object-cover w-64 h-64 md:h-auto md:w-64 rounded-none md:rounded-l-lg" src="{{ asset('images/'.$match->team1->TeamLogo) }}" alt="{{ $match->team1->TeamName }}">
                                    @endif
                                    <span class="mt-2 text-xl font-bold text-gray-900 dark:text-white">{{ $match->team1->TeamName }}</span>
                                    <span class="mt-1 text-lg font-medium text-gray-700 dark:text-gray-400">{{ $match->Team1Score }}</span>
                                @else
                                    <p>Team 1 not found</p>
                                @endif
                            </div>

                            <!-- Teks Tengah -->
                            <div class="flex flex-col justify-center items-center text-center p-4 leading-normal mx-4 w-1/3">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white whitespace-nowrap">{{ $match->MatchDate }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $match->MatchTime }}</p>
                                @if($match->TicketID)
                                <a href="{{ route('matches.book', ['match' => $match->MatchID]) }}" class="btn btn-primary">Book Tickets</a>

                                @endif
                            </div>

                            <!-- Gambar Kanan dengan Nama Tim -->
                            <div class="flex flex-col items-center w-1/3">
                                @if($match->team2)
                                    @if($match->team2->TeamLogo)
                                        <img class="object-cover w-64 h-64 md:h-auto md:w-64 rounded-none md:rounded-r-lg" src="{{ asset('images/'.$match->team2->TeamLogo) }}" alt="{{ $match->team2->TeamName }}">
                                    @endif
                                    <span class="mt-2 text-xl font-bold text-gray-900 dark:text-white">{{ $match->team2->TeamName }}</span>
                                    <span class="mt-1 text-lg font-medium text-gray-700 dark:text-gray-400">{{ $match->Team2Score }}</span>
                                @else
                                    <p>Team 2 not found</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

