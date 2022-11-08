Endpoint 
Listar todos los items(GET)
http://localhost/SecTpoweb2GCiPOLLETTI/api/infopescas/

listar 1 item	(GET) (agregar el id_pesca al final)
http://localhost/SecTpoweb2GCiPOLLETTI/api/infopescas/(id_pesca)

ordenar  items	(GET) (sort= nombre del campo ,al final del endpoint cambiar asc o desc)
http://localhost/SecTpoweb2GCiPOLLETTI/api/infopescas?sort=id_localidad_fk&order=asc

AGREGAR 1 item	(POST) ()
http://localhost/SecTpoweb2GCiPOLLETTI/api/infopescas/
Objet Ejemplo
	  {
           "id_pesca": 6,
        "embarcado": "NO",
        "tipo_embarcacion": "embarcacionamot",
        "equipo_pesca": "cañita de pescar",
        "carnada": "un cangrejo",
        "pesca": "un atun ",
        "Detalles_Pesca": "Hola MUendo WEbo",
        "id_localidad_fk": 2
      }
	
AGREGAR 1 item	(Put) (Agregar el id_pesca al final)
http://localhost/SecTpoweb2GCiPOLLETTI/api/infopescas/(id_pesca)
Objet Ejemplo
  {
           "id_pesca": 6,
        "embarcado": "SI",
        "tipo_embarcacion": "embarcacionamot",
        "equipo_pesca": "cañita de pescar",
        "carnada": "un cangrejo",
        "pesca": "un atun ",
        "Detalles_Pesca": "Hola MUendo WEbo",
        "id_localidad_fk": 2
      }

----------------------------------------------------------------------------
Endpoint Categoria (Localidades)
Listar todos los items(GET)
http://localhost/SecTpoweb2GCiPOLLETTI/api/localid/

listar 1 item	(GET) (agregar el id_localidad al final)
http://localhost/SecTpoweb2GCiPOLLETTI/api/localid/(id_localidad)

AGREGAR 1 item	(POST) ()
http://localhost/SecTpoweb2GCiPOLLETTI/api/localid/
Objet Ejemplo
	  {
        "id_localidad": "localidad"
      }
	
AGREGAR 1 item	(Put) (Agregar el id_localidad al final)
http://localhost/SecTpoweb2GCiPOLLETTI/api/infopescas/(id_localidad)
Objet Ejemplo
  {
           "id_localidad": 2,
        "localidad": "Mar Del PLata",
      }