-- USAMOS LA BASE DE DATOS --
use DAW205_DBproyectoAplicacion1819;


insert into T01_Usuarios1 values ('admin',sha2('P@ssw0rd',256),'Cuenta de administrador',0,null,'administrador'),
                          ('adrian',sha2('P@ssw0rd',256),'Usuario de Adrián Cando Oviedo',0,null,'usuario'),
                          ('heraclio',sha2('P@ssw0rd',256),'Usuario de Heraclio Borbujo',0,null,'usuario'),                
                          ('israel',sha2('P@ssw0rd',256),'Cuenta de Israel',0,null,'usuario'),
                          ('christian',sha2('P@ssw0rd',256),'Cuenta de Christian',0,null,'usuario'),
                          ('david',sha2('P@ssw0rd',256),'Cuenta de David',0,null,'usuario'),
                          ('tania',sha2('P@ssw0rd',256),'Cuenta de Tania Mateos',0,null,'usuario'),
                          ('victor',sha2('P@ssw0rd',256),'Cuenta de Victor aka Xubi',0,null,'usuario'),
                          ('alejandro',sha2('P@ssw0rd',256),'Cuenta de Alejandro',0,null,'usuario'),
                          ('mario',sha2('P@ssw0rd',256),'Cuenta de Mario Casquero',0,null,'usuario'),
                          ('laura',sha2('P@ssw0rd',256),'Cuenta de Laura Fernández',0,null,'usuario');

insert into T02_Departamentos1 values ('TYD','Tecnología y Desarrollo',null,null,'usuario'),
                                 ('DRH','Recursos Humanos',null,null,'usuario'),
                                 ('MYP','Marketing y Personal',null,null,'usuario'),
                                 ('DLT','Logística y Transporte',null,null,'usuario'),
                                 ('DAE','Asuntos Económicos',null,null,'usuario');
