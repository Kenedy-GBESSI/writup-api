<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<style>
    body{
        font-size:20px;
    }
    h1{
        text-transform: uppercase;
        text-align: center;
    }
    h3,h1,.section{
        border-bottom: 5px solid rgb(220, 70, 70);
    }
    .autheur{
        border: 1px solid black;
        border-bottom:none;
        text-align: center;
        display:flex;
        justify-content: center;
        align-content: center;
        flex-direction: column
    }
</style>
<body>
   <div class="section">
    <h1>{{$livre_name}}</h1>
    <h4>Résumé:</h4>
    <p>{{$summary}}</p>
     @foreach($livre?? '' as $chapter)
        <h3>{{$chapter['chapter']->title}}</h3>
        @foreach($chapter['paragraphs'] as $paragraph)
          <p>{{$paragraph->content}}</p>
        @endforeach
     @endforeach
   </div>
   <div class="autheur">
     <p>Auteur</p>
     <p>Nom: GBESSI</p>
     <p>Prénom: Kénédy</p>
   </div>
</body>
</html>
