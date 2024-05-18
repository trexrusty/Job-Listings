@props(['tag', 'size' => 'base'])


@php
    $classes = "hover:bg-white/25 transition-colors duration-300 bg-white/10 rounded-xl";

    if ($size == 'base') {
        $classes .= " px-5 py-1 text-sm";
    }

    if ($size == 'small') {
        $classes .= " px-3 py-1 text-2xs";
    }
@endphp

<a href="/tags/{{$tag->name}}" class="{{$classes}}">{{$tag->name}}</a>
