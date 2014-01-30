<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <p>{{ $user->userInfo->firstName }} {{ $user->userInfo->lastName }} nodigt u uit om mee te werken aan:</p>
        <a href="http://projectthuiszorg.dev/client/jobs/{{ $job->id }}">{{ $job->title }}</a>
        <p>Bekijk de baan door op de titel te klikken!</p>
    </body>
</html>