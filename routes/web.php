<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'greeting' => 'Hola ',
        'person' => request('person', 'Word'),
        'tasks' => [
            'Papa',
            'Zanahoria',
            'Tomate'
        ],
    ]);
});

Route::get('/ideas', function () {
    $ideas = session()->get('ideas', []);

    return view('ideas', [
        'ideas' => $ideas
    ]);
});


Route::post('/ideas/publicar', function () {
    $idea = request('idea');

    session()->push('ideas', $idea);

    return redirect('/ideas');
});

//Temporal
Route::get('delete-ideas', function () {
    session()->forget('ideas');
    return redirect('/ideas');
});
