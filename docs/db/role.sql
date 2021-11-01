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
-- Name: role; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.role (
    id integer NOT NULL,
    company_id integer,
    code character varying(15),
    name character varying(50) NOT NULL,
    active smallint DEFAULT 1,
    createdby integer,
    createdat timestamp without time zone NOT NULL,
    updatedby integer,
    updatedat timestamp without time zone NOT NULL,
    deletedby integer,
    deletedat timestamp without time zone,
    orderlist integer DEFAULT 1
);


ALTER TABLE public.role OWNER TO postgres;

--
-- Name: COLUMN role.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.id IS 'ID de rol.';


--
-- Name: COLUMN role.company_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.company_id IS 'Compania. Si esta en nulo, el rol puede ser seleccionado por cualquier compania.';


--
-- Name: COLUMN role.code; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.code IS 'Codigo de Rol.';


--
-- Name: COLUMN role.name; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.name IS 'Nombre del rol en idioma1.';


--
-- Name: COLUMN role.active; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.active IS 'Activo si=1 no=0.';


--
-- Name: COLUMN role.createdby; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.createdby IS 'usuario que creo el registro.';


--
-- Name: COLUMN role.createdat; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.createdat IS 'Fecha de creacion del registro.';


--
-- Name: COLUMN role.updatedby; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.updatedby IS 'Usuario que modifico el regisro.';


--
-- Name: COLUMN role.updatedat; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.updatedat IS 'Fecha de modificacion del registro.';


--
-- Name: COLUMN role.deletedby; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.deletedby IS 'Por quien fue borrado.';


--
-- Name: COLUMN role.deletedat; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.deletedat IS 'Fecha y hora de borrado.';


--
-- Name: COLUMN role.orderlist; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.role.orderlist IS 'Orden';


--
-- Name: role_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.role_id_seq OWNER TO postgres;

--
-- Name: role_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.role_id_seq OWNED BY public.role.id;


--
-- Name: role id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role ALTER COLUMN id SET DEFAULT nextval('public.role_id_seq'::regclass);


--
-- Data for Name: role; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.role (id, company_id, code, name, active, createdby, createdat, updatedby, updatedat, deletedby, deletedat, orderlist) FROM stdin;
2	\N	ROLE_ADMIN	Administrador	1	1	2013-07-08 00:00:00	1	2017-03-03 04:24:18	\N	\N	\N
1	1	ROLE_SYSADMIN	Sysadmin	1	1	2013-07-08 00:00:00	1	2019-01-03 15:44:02	\N	\N	\N
3	\N	ROLE_USER	Consulta dispositivos	1	1	2013-07-08 00:00:00	1	2018-06-21 12:07:25	\N	\N	\N
\.


--
-- Name: role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.role_id_seq', 14, true);


--
-- Name: role role_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);


--
-- Name: public_role_company_id1_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_role_company_id1_idx ON public.role USING btree (company_id);


--
-- Name: public_role_createdby2_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_role_createdby2_idx ON public.role USING btree (createdby);


--
-- Name: public_role_deletedby4_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_role_deletedby4_idx ON public.role USING btree (deletedby);


--
-- Name: public_role_updatedby3_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_role_updatedby3_idx ON public.role USING btree (updatedby);


--
-- Name: TABLE role; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL ON TABLE public.role TO vincularusr;


--
-- Name: SEQUENCE role_id_seq; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL ON SEQUENCE public.role_id_seq TO vincularusr;


--
-- PostgreSQL database dump complete
--

