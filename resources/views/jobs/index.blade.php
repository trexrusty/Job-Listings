<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-4">
            <h1 class="font-bold text-4xl">Find your new job today</h1>
            <x-forms.form action="/search" class="mt-6">
                <x-forms.input :label='false' name='q' placeholder="Web Developer"></x-forms.input>
            </x-forms.form>


        </section>
        @if ($paginator->onFirstPage())
        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach ($featuredJobs as $job)
                <x-job-card :$job />
                @endforeach


            </div>
        </section>
        @endif
        <section>
            <x-section-heading>Tags</x-section-heading>
                <div class="mt-3 space-x-1">
                    @foreach ($tags as $tag)
                        <x-tag :$tag/>
                    @endforeach
                </div>
        </section>

        <section>
            <x-section-heading>Jobs</x-section-heading>
                <div class="mt-3 space-y-6">
                    @foreach ($jobs as $job)
                    <x-job-card-wide :$job />
                    @endforeach
                </div>
        </section>
        {{ $jobs->links() }}
    </div>
</x-layout>
