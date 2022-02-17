@component('mail::message')
![Heading]({{url('images/email/heading.jpg')}})
![Intro]({{url('images/email/mail_intro.jpg')}})
<a href="{{$formulaUrl}}">![{{$skintype->name}}]({{$skintype->image_asset_url}} "{{$skintype->name}}")</a>
<a href="https://wa.me/message/DTJD4K7QPQVFP1">![Footing]({{url('images/email/footing.jpg')}})</a>
@endcomponent