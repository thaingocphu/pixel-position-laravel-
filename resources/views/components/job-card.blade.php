@props(['featured_job'])


<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">{{$featured_job->employer->name}}</div>
    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300">{{$featured_job->title}}</h3>
        <p class="text-sm mt-4">{{$featured_job->schedule}}- From {{$featured_job->salary}}</p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach ($featured_job->tags as $tag)
                <x-tag :$tag />
            @endforeach    
        </div>
        <x-employer-logo :logo="$featured_job->employer->logo" width="42"/>
    </div>
</x-panel>