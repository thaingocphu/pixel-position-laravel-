<x-layout>
    <x-page-heading>New Job</x-page-heading>
    <x-forms.form method="POST" action="{{route('jobs.store')}}">
        <x-forms.input label="Title" name="title" placeholder="CEO"/>
        <x-forms.input label="Salary" name="salary" placeholder="$50,000"/>
        <x-forms.input label="Location" name="location" placeholder="Florida"/>

        <x-forms.select label="Schedule" name="schedule">
            <option>Part time</option>
            <option>Full time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="http://photos.com"/>
        <x-forms.checkbox label="Featured (cost extra)" name="featured"/>
        <x-forms.divider/>
        <x-forms.input label="tags (comma separated)" name="tags" placeholder="Backend, frontend,..."/>
        
        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>