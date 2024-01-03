<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @can('isAdministrator')
    <p> hanya bisa dilihat Administrator</p>
    @endcan

    @can('isAdmin')
    <p> hanya bisa dilihat Admin</p>
    @endcan

    @can('isUserBiasa')
    <p> hanya bisa dilihat userbiasa</p>
    @endcan



</body>
</html>
