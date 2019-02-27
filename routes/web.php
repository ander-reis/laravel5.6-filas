<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    /*******************************************************************************************************************
     *
     * TESTE COM DOMPDF
     *
     *******************************************************************************************************************/

    /**
     * gerar direto no navegador
     */
//    $pdf = \PDF::loadHTML('<h1>School of Net</h1>');
//    return $pdf->stream();

    /**
     * faz o download do arquivo
     */
//     $pdf = \PDF::loadHTML('<h1>School of Net</h1>');
//     return $pdf->download('meu-pdf.pdf');

    /**
     * salva arquivo em local especifico
     */
//    $pdf = \PDF::loadHTML('<h1>School of Net</h1>');
//    $pdf->save(storage_path('app/meu-pdf.pdf'));
//    return $pdf->download('meu-pdf.pdf');

    /**
     * gera pdf de uma view
     */
//    $pdf = \PDF::loadView('reports.my-user', ['users' => \App\User::all()]);
//    return $pdf->stream();

    /*******************************************************************************************************************
     *
     * TESTE COM SNAPPY
     *
     *******************************************************************************************************************/
    /**
     * gerar direto no navegador
     */
//    $pdf = \PDFsnappy::loadHTML('<h1>School of Net</h1>');
//    return $pdf->inline();

    /**
     * salva arquivo em local especifico
     */
//    $pdf = \PDFsnappy::loadHTML('<h1>School of Net</h1>');
//    $pdf->save(storage_path('app/meu-pdf.pdf'));
//    return $pdf->download('meu-pdf.pdf');

    /**
     * gera pdf de uma view
     */
    $pdf = \PDFsnappy::loadView('reports.my-user', ['users' => \App\User::all()]);
    return $pdf->inline();
});

Route::get('/queue', function(){
    $user = \App\User::find(1);
    \App\Jobs\MakeReport::dispatch($user);
    echo 'Job enviado';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
