<x-layout>
    <x-h1>Login</x-h1>

    <x-forms.form method='POST' action='login'>

        <x-forms.input label='Email' name='email' type='email' required></x-forms.input>

        <x-forms.input label='Password' name='password' type='password' required></x-forms.input>

        <x-forms.divider />

        <x-forms.button>Login</x-forms.button>

    </x-forms.form>

</x-layout>
