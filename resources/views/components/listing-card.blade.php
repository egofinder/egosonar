@props(['listing'])

<x-card>
    <div class="flex">
        {{-- <img class="hidden w-48 mr-6 md:block"
            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
            alt="" /> --}}
        <img class="w-48 mr-6 mb-6"
            src={{ url('https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/') .
                $listing->longitude .
                ',' .
                $listing->latitude .
                ',13/300x300?access_token=' .
                env('MAPBOX_ACCESS_TOKEN') }}
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->address }}
            </div>
        </div>
    </div>
</x-card>
