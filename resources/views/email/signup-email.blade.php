Hello {{$email_data['name']}}
<br><br>
Welcome to my COntrol Management system!
<br>
Please click the below link to verify your email and activate your account!
<br><br>
<a href="http://localhost:8080/cms/verify?code={{$email_data['verification_code']}}">Click Here!</a>

<br><br>
Thank you!
<br>
CMS Team