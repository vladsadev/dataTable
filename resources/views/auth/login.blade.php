<x-layout>
    <x-page-heading>Log in</x-page-heading>

    <x-forms.form method="POST" action="/login" enctype="multipart/form-data">
        <x-forms.input label="Your Email" name="email" type="email"/>
        <x-forms.input label="Password" name="password" type="password"/>

        <x-forms.divider/>

        <x-forms.button class="hover:bg-white/40">Log In</x-forms.button>

    </x-forms.form>

</x-layout>
