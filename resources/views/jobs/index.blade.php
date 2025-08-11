<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-8">
            <h1 class="font-bold text-4xl my-6">Lets Find Your Next Job</h1>

            {{--            <form action="" class="mt-6">--}}
            {{--                <input type="text" placeholder="Backend developer" class="bg-white/5 px-4 py-3 rounded-xl border border-white/10--}}
            {{--                w-full--}}
            {{--                max-w-xl ">--}}
            {{--            </form>--}}

            <x-forms.form action="/search">
                <x-forms.input name="q" placeholder="Backend Developer"/>
            </x-forms.form>

        </section>

        {{--    TOP JOBS - FEATURED JOBS--}}
        <section class="pt-10">
            <x-section-heading> Featured Jobs</x-section-heading>
            <!--top jobs Container-->
            <div class="grid md:grid-cols-3 gap-2 md:gap-4 lg:gap-6 mt-6">
                <!-- Single Card -->
                @foreach($featured_jobs as $job)
                    <x-job-card :$job/>
                @endforeach
            </div>
        </section>

        <section class="">
            <x-section-heading> Tags</x-section-heading>
            <div class="space-x-2 mt-4">
                @foreach($tags as $tag)
                    <x-tag size="medium" :$tag/>
                @endforeach
            </div>

        </section>

        <section class="">
            <x-section-heading>Recents Jobs</x-section-heading>
            <div class="space-y-4">
                @foreach($jobs as $job)
                    <x-job-card-wide :$job/>
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
