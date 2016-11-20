SET LOCAL CHARACTER_SET_CLIENT=UTF8;
SET LOCAL CHARACTER_SET_CONNECTION=UTF8;
SET LOCAL CHARACTER_SET_RESULTS=UTF8;
SET LOCAL CHARACTER_SET_SERVER=UTF8;

CREATE TABLE USUARIO
(
	USUARIO_NOM varchar(10),
	USUARIO_USS varchar(9),
	USUARIO_PSW varchar(64),
	USUARIO_TIP char(1),
	PRIMARY KEY (USUARIO_USS)
);

CREATE TABLE PREGUNTA
(
	PREGUNTA_NUM tinyint(1),
	PREGUNTA_PREG varchar(100),
	PREGUNTA_RESP varchar(20),
	PREGUNTA_ASIG char(4),
	PRIMARY KEY (PREGUNTA_NUM)
);

INSERT INTO USUARIO VALUES('ETHAN','317542689','tripleH12','J');
INSERT INTO USUARIO VALUES('KEVIN','315294378','mamemimomu','J');
INSERT INTO USUARIO VALUES('CLYDE','672486','Mamanus#2','A');

INSERT INTO PREGUNTA VALUES(1,'Organelo que lleva a cabo la respiración celular para obtener energía para la célula','mitocondria','1502');
INSERT INTO PREGUNTA VALUES(2,'Unidad mínima de vida','celula','1502');
INSERT INTO PREGUNTA VALUES(3,'Delimita la célula','membrana','1502');
INSERT INTO PREGUNTA VALUES(4,'Se forman con aminoácidos','proteina','1502');
INSERT INTO PREGUNTA VALUES(5,'Principal fuente de energía','carbohidrato','1502');
INSERT INTO PREGUNTA VALUES(6,'En ella se almacenan datos','memoria','1412');
INSERT INTO PREGUNTA VALUES(7,'Actividad en la que se le dan instrucciones a una computadora','programar','1412');
INSERT INTO PREGUNTA VALUES(8,'Parte lógica de las computadoras','software','1412');
INSERT INTO PREGUNTA VALUES(9,'Actividad en que se traduce un programa a lenguaje máquina de una sola vez','compilar','1412');
INSERT INTO PREGUNTA VALUES(10,'Persona que usa sus habilidades de programación para fines delictivos','cracker','1412'); 