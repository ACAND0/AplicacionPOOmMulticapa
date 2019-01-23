create database DAW205_DBproyectoAplicacion1819;

use DAW205_DBproyectoAplicacion1819; 

-- CREAR TABLA --
create table T01_Usuarios1(
T01_CodUsuario varchar(15) primary key,
T01_Password varchar(255), 
T01_DescUsuario varchar(255), 
T01_NumAccesos int default 0,
T01_FechaHoraUltimaConexion int,
T01_Perfil enum('administrador','usuario'))engine=innodb;

-- TABLA DEPARTAMENTOS---

create table T02_Departamento1(
CodDepartamento varchar(3) primary key,
DescDepartamento varchar(255),
FechaCreacionDepartamento int,
FechaBajaDepartamento int default null)engine=innodb;

-- CREAR USUARIO --
CREATE USER 'userDAW205_DBAplicacion1819'@'%' IDENTIFIED BY 'paso';
-- ASIGNAR PRIVILEGIOS A USUARIO  --
GRANT ALL PRIVILEGES ON `DAW205_DBproyectoAplicacion1819` . * TO `userDAW205_DBAplicacion1819`@'%';



