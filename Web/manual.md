# Guia de instalacion

- Descargar en instalar **WAPP Stack** de Bitnami (https://bitnami.com/stack/wapp)

**Nota:** en el paso en que el instalador pregunta que componentes queremos instalar, podemos desmarcar __todo lo que se pueda__. Ademas cuando pregunte por los datos de la base de datos podemos dejar los que vienen ya que de cualquier manera vamos a usar la base provista por la catedra.
- Antes de dar **start** a algun servidor realizar los proximos pasos.
- Ubicar y abrir con un editor de texto los archivos
  - `C:\\Bitnami\wapp...\apache2\conf\httpd.conf`
  - `C:\\Bitnami\wapp...\apache2\conf\bitnami\bitnami.conf`

  **Nota:** los archivos pueden estar en otra ubicacion dependiendo de la carpeta de instalacion.
- En ambos archivos buscar y reemplazar todas las apariciones de
`C:/Bitnami/wapp.../apache2/htdocs` por la ubicacion absoluta de la carpeta `Web` del repositorio (usando **/** para separar directorios). Por ejemplo:
`C:/Users/usuario/itba/inge/TPE-GRUPO-8-Bolsa-de-Trabajo/Web`.
- Ahora se debe crear el tunnel SSH para conectarse a la base de datos. Con Ubuntu Bash de Windows 10 se puede hacer con el siguiente comando:
```
ssh usuario@pampero.itba.edu.ar -L 9999:10.16.1.122:5432
```
El tunnel tambien se puede crear con Putty. En este caso tener en cuenta los siguientes datos:
  - **Host servidor SSH:** `pampero.itba.edu.ar`
  - **Source port:** `9999`
  - **Destination:** `10.16.1.122:5432`
- Finalmente, ya sea que el tunnel se creo con Putty o Ubuntu, se debe correr `ping localhost` en pampero, esto es para evitar que nos desconecte por inactividad.

- Listo, con dar start a Apache en el manager de WAPP ya se puede acceder al Sitio en `http://localhost` o `http://localhost:8080`.

Recordar que cada vez que queramos entrar al sitio se debe verificar que Apache este *corriendo* y que tenemos el tunnel.
