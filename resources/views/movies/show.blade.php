@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $movie->poster_path }}" alt="poster" class="w-64 lg:w-96">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $movie->title }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                        <g data-name="Layer 2">
                            <path
                                d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                data-name="star"/>
                        </g>
                    </svg>
                    <span class="ml-1">{{ $movie->vote_average }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie->release_date }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach($movie->genres as $category)
                            {{ $category['name'] }}
                        @endforeach
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $movie->overview }}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Budget</h4>
                    <div class="flex mt-4">
                        {{ $movie->budget }} $
                    </div>
                </div>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">IMDB <a target="_blank" href="http://imdb.com/{{ $movie->imdb_id }}">Link</a></h4>
                </div>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Belongs To Collection</h4>
                    <div class="flex mt-4">
                        <div class="mr-8">
                            <div>{{ $movie->belongs_to_collection['name'] }}</div>
                            @if(isset($movie->belongs_to_collection['poster_path']))
                                <img src="https://image.tmdb.org/t/p/w300/{{ $movie->belongs_to_collection['poster_path'] }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end movie-info -->

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Production Companies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie->production_companies as $production_companies)
                    <div class="mt-8">
                        @if(isset($production_companies['logo_path']))
                            <img src="https://image.tmdb.org/t/p/w300/{{ $production_companies['logo_path'] }}" alt="production_companies" class="hover:opacity-75 transition ease-in-out duration-150">
                        @endif
                        <div class="mt-2">
                            <div class="text-sm text-gray-400">
                                {{ $production_companies['name'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> <!-- end movie-cast -->


    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Production Companies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie->production_countries as $production_countries)
                    <div class="mt-8">
                        <div class="mt-2">
                            <div class="text-sm text-gray-400">
                                ({{ $production_countries['iso_3166_1'] }}) {{ $production_countries['name'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> <!-- end movie-cast -->

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Spoken Languages</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie->spoken_languages as $spoken_languages)
                    <div class="mt-8">
                        <div class="mt-2">
                            <div class="text-sm text-gray-400">
                                ({{ $spoken_languages['iso_639_1'] }}) {{ $spoken_languages['name'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> <!-- end movie-cast -->

@endsection
