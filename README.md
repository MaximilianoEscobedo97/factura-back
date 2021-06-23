<h1>Reto back-end<h1>
 
    Instrucciones:
    
    1-.Crear .env
    2-.correr comando 'composer install'
    3-.correr migraciones
    4-.Listo, Se elvoraron metodos de API para el Reto de back-end
    
    Notas:
    La base de datos es Relacional.
    Se elaboro en base a lo que pide el documento.
    
    Metodos de API elaborados:
    
//Ruta crear Clientes
Route::post('/clients','ClienteController@store');
//Ruta listar CFDI
Route::get('/cfdi/list','CfdiController@index');
//Ruta Enviar CFDI
Route::get('/cfdi/{id}/email','CfdiController@sendCfdi');
//Ruta Crear CFDI
Route::post('/cfdi/create','CfdiController@store');
//Ruta Crear CFDI
Route::patch('/cfdi/cancel/{id}','CfdiController@cancel');
    

