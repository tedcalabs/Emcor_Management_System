<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="'/reset_passwordy'">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
