<x-mail::message>
# Introduction

To activate your account please click on the buton bellow.

<x-mail::button :url="$temporaryURL">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
