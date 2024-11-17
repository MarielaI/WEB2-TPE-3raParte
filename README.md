
Descripcion: 
 El proyecto se trata de desarrollar una Api Rest para venta de zapatillas on line, utilizando renderización del lado del servidor con PHP y MySQL.

Endpoints: 
A continuación se detallan los endpoints desarollados: 

* getModelos: 
Para listar todos los modelos de zapatillas usar el metodo GET y la url: /api/modelos

    - El listado obtenido se puede ordenar en forma ascendente en los siguientes campos: 
    Por nombre_modelo, ingresar la url: api/modelos?orderBy=nombre_modelo
    Por precio, ingresar la url: api/modelos?orderBy=precio
    Por material, ingresar la url: api/modelos?orderBy=material 
    Por talle, ingresar la url: api/modelos?orderBy=talle

     - El listado obtenido se puede ordenar en forma descendente en los siguientes campos: 
    Por nombre_modelo, ingresar la url: api/modelos?orderBy=nombre_modelo&sort=DESC
    Por precio, ingresar la url: api/modelos?orderBy=precio&sort=DESC
    Por material, ingresar la url: api/modelos?orderBy=material&sort=DESC
    Por talle, ingresar la url: api/modelos?orderBy=talle&sort=DESC

    -El listado obtenido tiene la posibilidad de poder paginarse: 
    El parametro limit representa la cantidad de registros que se desean mostrar (debe ser de tipo numerico positivo sin decimales), y el parametro page se usa para indicar el numero de pagina a mostrar, por ejemplo: 
    Metodo Get: api/modelos?limit=2&page=5 
    Se podra visualizar 2 modelos de zapatillas en la pagina 5. 

* getModelo($id): 
Para ver solo el modelo que corresponde al id indicado, por ejemplo, para ver el modelo con el id 31, la url a ingresar es: Metodo GET api/modelos/31

* updateModelo($nombre_modelo,$precio, $material, $talle, $id): 
Para editar un modelo de zapatillas, usaremos el metodo PUT en la URL en la url api/modelos/Sid y luego en el body enviar la informacion en formato JSON. 
Por ejemplo, para editar el modelo con el id 31, debemos ingresar: {"nombre_modelo":"Jordan","precio":5000000,"material":"sintetico","talle":41,"id":31} en la URL en la url api/modelos/31, siendo todos datos obligatorios.  






    







