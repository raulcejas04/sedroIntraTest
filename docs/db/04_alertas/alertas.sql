--
-- PostgreSQL database dump
--

-- Dumped from database version 12.8 (Ubuntu 12.8-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.8 (Ubuntu 12.8-0ubuntu0.20.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;


CREATE TABLE public.alertas (
	id serial4 NOT NULL,
	alert_type varchar(3) NULL,
	object_type_id int4 NULL,
	persona_juridica_id int4 NULL,
	persona_fisica_id int4 NULL,
	fechavto date NULL,
	titulo varchar(255) NOT NULL,
	descripcion varchar(1024) NULL,
	createdat timestamp NULL,
	updatedat timestamp NULL,
	createdby int4 NULL,
	updatedby int4 NULL,
	readed int2 NULL,
	CONSTRAINT alertas_pkey PRIMARY KEY (id)
);

--
-- Data for Name: alertas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.alertas (id, alert_type, object_type_id, persona_juridica_id, persona_fisica_id, fechavto, titulo, descripcion, createdat, updatedat, createdby, updatedby, readed) VALUES (1, 'IML', 99, 1, 1, NULL, 'INTERVENCIÓN DESDE MARCO LEGAL	Andrade Maria Fariña', 'NTERVENCIÓN DESDE MARCO LEGAL. 	(DNI 99999999)ANDRADE MARÍA FARIÑA', NULL, NULL, NULL, NULL, 0);
INSERT INTO public.alertas (id, alert_type, object_type_id, persona_juridica_id, persona_fisica_id, fechavto, titulo, descripcion, createdat, updatedat, createdby, updatedby, readed) VALUES (4, 'SSA', 99, 1, 1, NULL, 'SEGUIMIENTO SALUD - Gonzalez Maria. Citación', 'SEGUIMIENTO SALUD - Gonzalez Maria. Citación. La sra Gonzalez debía concurrir al Servicio Local el día 08/ 12/2021 las 14 hs. Por este motivo enviamos alerta.', NULL, NULL, NULL, NULL, 0);
INSERT INTO public.alertas (id, alert_type, object_type_id, persona_juridica_id, persona_fisica_id, fechavto, titulo, descripcion, createdat, updatedat, createdby, updatedby, readed) VALUES (5, 'SSA', 99, 1, 1, NULL, 'SEG. DE SALUD CIC Villa AZUL -  	(DNI 997777777) Casco Marta', 'Consumo problematico. Madre embarazada.hija con BP. no respeta indicaciones medicas.', NULL, NULL, NULL, NULL, 0);
INSERT INTO public.alertas (id, alert_type, object_type_id, persona_juridica_id, persona_fisica_id, fechavto, titulo, descripcion, createdat, updatedat, createdby, updatedby, readed) VALUES (7, 'SSA', 99, 1, 1, NULL, 'Articulacion con inst. de rehabilitacion, PROFE (dni 993334444) Gambeta Dario', 'Se espera respuesta de PROFE para traslado de ambos niños a rehabilitación y escuela. acompañante terapéutico para madre.', NULL, NULL, NULL, NULL, 1);
INSERT INTO public.alertas (id, alert_type, object_type_id, persona_juridica_id, persona_fisica_id, fechavto, titulo, descripcion, createdat, updatedat, createdby, updatedby, readed) VALUES (6, 'DES', 99, 1, 1, NULL, 'VER MOTIVOS DE INASISTENCIA DEL NIÑO A LA ESCUELA. (DNI 88.333.333)Valdez Susana', 'El niño actualmente no está concurriendo a escuela, su madre y abuela manifiesta que los discriminan y maltrataban.', NULL, NULL, NULL, NULL, 0);
INSERT INTO public.alertas (id, alert_type, object_type_id, persona_juridica_id, persona_fisica_id, fechavto, titulo, descripcion, createdat, updatedat, createdby, updatedby, readed) VALUES (8, 'SSA', 99, 1, 1, '2021-07-20', 'Asistencia urgente con medicación . (DNI 94666666) Marmol Pablo', 'Pablo nació con Mielomeningocele (espina bífida). Se debe entrevistar a los progenitores.', NULL, NULL, NULL, NULL, 0);
INSERT INTO public.alertas (id, alert_type, object_type_id, persona_juridica_id, persona_fisica_id, fechavto, titulo, descripcion, createdat, updatedat, createdby, updatedby, readed) VALUES (2, 'SSA', 99, 1, 1, '2021-12-30', 'SEGUIMIENTO DE SALUD  SOTELO CECILIA', 'SEGUIMIENTO DE SALUD - (DNI 99.888.888) SOTELO CECILIA', NULL, NULL, NULL, NULL, 0);
INSERT INTO public.alertas (id, alert_type, object_type_id, persona_juridica_id, persona_fisica_id, fechavto, titulo, descripcion, createdat, updatedat, createdby, updatedby, readed) VALUES (3, 'FUR', 99, 1, 1, '2021-09-12', 'Fuga Hospitalaria TBC-URGENTE', 'Fuga Hospitalaria TBC-URGENTE. PACIENTE: GIMENEZ GRACIELA. Madre con niño de 3 meses con profilaxis fuga de hospital Peron.', NULL, NULL, NULL, NULL, 0);


--
-- Name: alertas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alertas_id_seq', 8, true);


--
-- PostgreSQL database dump complete
--

