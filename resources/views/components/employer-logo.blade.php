@props([
    'job',
    'width' =>60,
])

{{--{{dd($width)}}--}}

{{--<img src="https://picsum.photos/seed/{{rand(1,5000)}}/{{$width}}" alt="" class="rounded-xl">--}}
{{--<img src="{{$job->employer->logo}}" alt="" class="rounded-xl" width="{{$width}}px">--}}
<img src="{{asset($job->employer->logo)}}" alt="" class="rounded-xl" width="{{$width}}px">
