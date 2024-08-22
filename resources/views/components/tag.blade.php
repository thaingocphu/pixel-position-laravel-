@props(['tag','size' => 'base'])

@php
    $classes = "bg-white/10 hover:bg-white/25 px-3 py-1 text-2xs font-bold transition-color duration-300 rounded-xl";

    if($size === 'base'){
        $classes .= " px-3 py-1 text-sm";
    }

    if($size === 'small'){
        $classes .= " px-3 py-1 text-2xs";
    }
@endphp

<a href="/tags/{{strtolower($tag->name)}}" class="{{$classes}}">{{$tag->name}}</a>
