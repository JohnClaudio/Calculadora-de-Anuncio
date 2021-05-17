create database CalculadoraCapgemini;
use CalculadoraCapgemini;
CREATE TABLE `CalculadoraCapgemini`.`anuncio` ( 
`id_anuncio` INT(11) AUTO_INCREMENT ,
`nome_anuncio` VARCHAR(100) , 
`data_inicio` DATE, 
`data_termino` DATE, 
`investimento_dia`float,
`nome_cliente` VARCHAR(80)  ,
`data` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
 PRIMARY KEY (`id_anuncio`)) ENGINE = InnoDB CHARSET=latin1 COLLATE latin1_swedish_ci;
 
insert into anuncio values (default,'Extreme Life','2021-05-10','2021-05-15','5.0','Carlos Peres',default);
insert into anuncio values (default,'Security Teste','2021-05-10','2021-05-15','10.0','Vanessa Andreia',default);
insert into anuncio values (default,'Luthien Shop','2021-05-10','2021-05-15','5.5','Carla antonia',default);
insert into anuncio values (default,'FG Empresa','2021-05-10','2021-05-15','2.0','Andre Soares',default);
insert into anuncio values (default,'Fabrica Fernando','2021-05-10','2021-05-15','5.5','Fernando de Souza',default);
