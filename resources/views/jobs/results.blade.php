<x-layout>
    <section>
        <x-h1>Results</x-h1>
            <div class="mt-3 space-y-6">
                @foreach ($jobs as $job)
                <x-job-card-wide :$job />
                @endforeach
            </div>
    </section>






</x-layout>
