@component('mail::message')
{{-- Greeting --}}
# @lang('Ada Pesan dari visitor website')

<table style="width: 100%">
    <tr>
        <td>Nama</td>
        <td> : </td>
        <td>{{ $name }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td> : </td>
        <td>{{ $email }}</td>
    </tr>
    <tr>
        <td>Subject</td>
        <td> : </td>
        <td>{{ $subject }}</td>
    </tr>
    <tr>
        <td>Message</td>
        <td> : </td>
        <td>{{ $message }}</td>
    </tr>
</table>

@endcomponent
