@component('mail::message')
{{-- Greeting --}}
# @lang('Ada Pesan dari visitor website')

<table style="width: 100%">
    <tr>
        <td><b>Nama : </b></td>
    </tr>
    <tr>
        <td>{{ $name }}</td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td><b>Email : </b></td>
    </tr>
    <tr>
        <td>{{ $email }}</td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td><b>Subject : </b></td>
    </tr>
    <tr>
        <td>{{ $subject }}</td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td><b>Message : </b></td>
    </tr>
    <tr>
        <td>{{ $message }}</td>
    </tr>
</table>

@endcomponent
