<x-layout>
    <x-h1>Register</x-h1>

    <x-forms.form method='POST' action='register' enctype='multipart/form-data'>

        <x-forms.input label='Name' name='name' required></x-forms.input>
        <x-forms.input label='Email' name='email' type='email' required></x-forms.input>

        <x-forms.input label='Password' name='password' type='password' required></x-forms.input>
        <x-forms.input label='Password Confirmation' name='password_confirmation' type='password' required></x-forms.input>

        <x-forms.divider />

        <x-forms.input label='Employer Name' name='employer' required></x-forms.input>
        <x-forms.input label='Employer Logo' name='logo' type='file'></x-forms.input>

        <x-forms.divider />

        <x-forms.button>Create Account</x-forms.button>

    </x-forms.form>

</x-layout>
