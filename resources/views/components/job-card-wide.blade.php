@props(['job'])

<x-panel class="flex gap-6">
<div>
        <x-logo :employer='$job->employer'></x-logo>
    </div>

    <div class="flex-1 flex flex-col">
        <a href="" class="self-start text-sm text-gray-400">{{$job->employer->name}}</a>
        <h3 class="mt-2 group-hover:text-blue-400 transition-colors duration-300 text-xl font-bold">
            <a href="{{$job->url}}" target="_blank">{{$job->title}}</a></h3>
        <p class="text-sm text-gray-400 mt-auto">${{$job->salary}} & {{$job->schedule}}</p>
    </div>

    <div>
        @foreach ($job->tags as $tag)
        <x-tag :$tag size='small'/>
        @endforeach
    </div>

</x-panel>


