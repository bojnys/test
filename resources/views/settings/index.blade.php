@extends('master')
@section('title')
    Settings
@stop
@section('content')
    @include('flash::message')
    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
    <table>
        <tr><th>Optie</th><th>&nbsp;</th><th>Waarde</th></tr>
        <tr><td>Titel</td><td></td><td>{{$settings->title}}</td></tr>
        <tr><td>Posts Per Pagina (Publiek)</td><td></td><td>{{$settings->publicPPP}}</td></tr>
        <tr><td>Posts Per Pagina (Profiel)</td><td></td><td>{{$settings->profilePPP}}</td></tr>
        <tr><td>Comments Per Pagina (Publiek)</td><td></td><td>{{$settings->publicCPP}}</td></tr>
        <tr><td>Comments Per Pagina (Profiel)</td><td></td><td>{{$settings->profileCPP}}</td></tr>
        <tr><td>Aantal Posts (Profiel)</td><td></td><td>{{$settings->defaultPostsProfile}}</td></tr>
        <tr><td>Aantal Comments (Profiel)</td><td></td><td>{{$settings->defaultCommentsProfile}}</td></tr>
        <tr><td>Lengte Verkorte Posts (Publiek)</td><td></td><td>{{$settings->publicPostLength}}</td></tr>
        <tr><td>Lengte Verkorte Comments (Profiel)</td><td></td><td>{{$settings->profilePostLength}}</td></tr>
    </table>
    <a href="/settings/edit" class="btn btn-primary" role="button">Instellingen Aanpassen</a>
@stop
