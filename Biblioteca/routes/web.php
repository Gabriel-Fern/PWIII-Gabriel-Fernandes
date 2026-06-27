<?php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Adicione esta linha ao seu routes/web.php (junto com as rotas que
| ja existem no arquivo, nao substitua o arquivo inteiro).
|
*/

Route::resource('livros', LivroController::class);
