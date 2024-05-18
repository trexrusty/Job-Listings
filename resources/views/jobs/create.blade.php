<x-layout>

    <x-h1>Create Job</x-h1>

    <x-forms.form method='POST' action='/jobs'>

        <x-forms.input label='Title' name='title' placeholder="CEO" required></x-forms.input>
        <x-forms.input label='Salary' name='salary' placeholder="100000 " type='number' required></x-forms.input>
        <x-forms.input label='Location' name='location' placeholder="Hull England" required></x-forms.input>
        <x-forms.select label='Schedule' name='schedule'>
            <option value="Part Time">Part Time</option>
            <option value="Full Time">Full Time</option>
        </x-forms.select>
        <x-forms.input label='URl' name='url' placeholder="example.com" required></x-forms.input>
        <x-forms.divider />
        <x-forms.input label='Tags' name='tags' placeholder="CEO, Web, ETC"></x-forms.input>
        <x-forms.checkbox label='Feature On Main Page?' name='feature' />
        <x-forms.divider />

        <x-forms.button>Create Job Listing</x-forms.button>

    </x-forms.form>



</x-layout>
