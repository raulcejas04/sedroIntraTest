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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: menuitem; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.menuitem (
    id integer NOT NULL,
    menu_id integer,
    parent_id integer,
    rolecompany character varying(20),
    name character varying(50) NOT NULL,
    nametree character varying(50),
    icon character varying(100),
    link character varying(50),
    active smallint DEFAULT 1,
    orderlist1 integer DEFAULT 0,
    orderlist integer,
    type_id character varying(1),
    availablesel smallint DEFAULT 1,
    module character varying(80),
    action character varying(80),
    divider smallint DEFAULT 0 NOT NULL
);


ALTER TABLE public.menuitem OWNER TO postgres;

--
-- Data for Name: menuitem; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) FROM stdin;
10000	2	\N	\N	Dashboard	Dashboard	\N	\N	1	10000	10000	0	1	\N	\N	0
20000	2	\N	\N	Orders	Orders	\N	\N	1	20000	20000	0	1	\N	\N	0
30000	2	\N	\N	Products	Products	\N	\N	1	30000	30000	0	1	\N	\N	0
40000	2	\N	\N	Customers	Customers	\N	\N	1	40000	40000	0	1	\N	\N	0
50000	2	\N	\N	Reports	Reports	\N	\N	1	50000	50000	0	1	\N	\N	0
60000	2	\N	\N	Integrations	Integrations	\N	\N	1	60000	60000	0	1	\N	\N	0
1000	1	\N	\N	Home	Hole	\N	\N	1	1000	1000	1	1	\N	\N	0
2000	1	\N	\N	Usuarios	Usuarios	\N	\N	1	2000	2000	1	1	\N	\N	0
3000	1	\N	\N	Dispositivos	Dispositivos	\N	\N	1	3000	3000	1	1	\N	\N	0
2130	1	2000	\N	Menues	Menues	\N	\N	1	2130	2130	2	1	\N	\N	0
2100	1	2000	\N	Lista Usuarios	Lista Usuarios	\N	\N	1	2100	2100	2	1	\N	\N	0
2120	1	2000	\N	Roles	Roles	\N	\N	1	2120	2120	2	1	\N	\N	0
2140	1	2130	\N	Lista menues	Lista Menues	\N	\N	1	2140	2140	3	1	\N	\N	0
3150	1	3000	\N	Invitacion a persona	Invitacion a persona	\N	\N	1	3150	3150	2	1	\N	\N	0
3200	1	3000	\N	Lista a confirmar	Lista a confirmar	\N	\N	1	3200	3200	2	1	\N	\N	0
3100	1	3000	\N	Lista dispositivos	Lista dispositivos	\N	acciones-extranet/lista	1	3100	3100	2	1	\N	\N	0
\.


--
-- Name: menuitem menu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menuitem
    ADD CONSTRAINT menu_pkey PRIMARY KEY (id);


--
-- Name: public_menu_action2_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_menu_action2_idx ON public.menuitem USING btree (action);


--
-- Name: public_menu_parent_id1_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_menu_parent_id1_idx ON public.menuitem USING btree (parent_id);


--
-- Name: menuitem menu_parent_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menuitem
    ADD CONSTRAINT menu_parent_id_fkey FOREIGN KEY (parent_id) REFERENCES public.menuitem(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- PostgreSQL database dump complete
--

