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
-- Name: dispositivo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dispositivo (
    id integer NOT NULL,
    persona_juridica_id integer,
    nicname character varying(20) NOT NULL,
    fecha_alta date,
    fecha_baja date
);


ALTER TABLE public.dispositivo OWNER TO postgres;

--
-- Name: dispositivo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.dispositivo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dispositivo_id_seq OWNER TO postgres;

--
-- Name: doctrine_migration_versions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.doctrine_migration_versions (
    version character varying(191) NOT NULL,
    executed_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    execution_time integer
);


ALTER TABLE public.doctrine_migration_versions OWNER TO postgres;

--
-- Name: estado_civil; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estado_civil (
    id integer NOT NULL,
    estado_civil character varying(255) NOT NULL
);


ALTER TABLE public.estado_civil OWNER TO postgres;

--
-- Name: estado_civil_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estado_civil_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estado_civil_id_seq OWNER TO postgres;

--
-- Name: keycloak_id; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.keycloak_id (
    id integer NOT NULL
);


ALTER TABLE public.keycloak_id OWNER TO postgres;

--
-- Name: keycloak_id_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.keycloak_id_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.keycloak_id_id_seq OWNER TO postgres;

--
-- Name: menu; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.menu (
    id integer NOT NULL,
    name character varying(100),
    app character varying(15),
    active smallint DEFAULT 1,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone,
    created_by integer,
    updated_by integer,
    deleted_by integer
);


ALTER TABLE public.menu OWNER TO postgres;

--
-- Name: menu_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.menu_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.menu_id_seq OWNER TO postgres;

--
-- Name: menu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.menu_id_seq OWNED BY public.menu.id;


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
-- Name: nacionalidad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.nacionalidad (
    id integer NOT NULL,
    pais character varying(255) NOT NULL,
    codigo character varying(4) DEFAULT NULL::character varying
);


ALTER TABLE public.nacionalidad OWNER TO postgres;

--
-- Name: nacionalidad_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.nacionalidad_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nacionalidad_id_seq OWNER TO postgres;

--
-- Name: parametros; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.parametros (
    id integer NOT NULL,
    parametro character varying(255) NOT NULL,
    descripcion character varying(255) NOT NULL,
    fecha_desde date,
    fecha_hasta date,
    valor character varying(255) NOT NULL
);


ALTER TABLE public.parametros OWNER TO postgres;

--
-- Name: parametros_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.parametros_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.parametros_id_seq OWNER TO postgres;

--
-- Name: persona_fisica; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.persona_fisica (
    id integer NOT NULL,
    tipo_cuit_cuil_id integer NOT NULL,
    sexo_id integer NOT NULL,
    estado_civil_id integer,
    nacionalidad_id integer NOT NULL,
    tipo_documento_id integer NOT NULL,
    apellido character varying(255) NOT NULL,
    nombres character varying(255) NOT NULL,
    nro_doc character varying(255) NOT NULL,
    cuit_cuil character varying(255) NOT NULL,
    fecha_nac date
);


ALTER TABLE public.persona_fisica OWNER TO postgres;

--
-- Name: persona_fisica_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.persona_fisica_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.persona_fisica_id_seq OWNER TO postgres;

--
-- Name: persona_juridica; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.persona_juridica (
    id integer NOT NULL,
    cuit character varying(11) NOT NULL,
    razon_social character varying(255) NOT NULL,
    fecha_alta date,
    fecha_baja date
);


ALTER TABLE public.persona_juridica OWNER TO postgres;

--
-- Name: persona_juridica_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.persona_juridica_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.persona_juridica_id_seq OWNER TO postgres;

--
-- Name: realm; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.realm (
    id integer NOT NULL,
    realm character varying(255) NOT NULL,
    id_realm_keycloak character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.realm OWNER TO postgres;

--
-- Name: realm_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.realm_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.realm_id_seq OWNER TO postgres;

--
-- Name: representacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.representacion (
    id integer NOT NULL,
    persona_fisica_id integer NOT NULL,
    persona_juridica_id integer NOT NULL
);


ALTER TABLE public.representacion OWNER TO postgres;

--
-- Name: representacion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.representacion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.representacion_id_seq OWNER TO postgres;

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
-- Name: rolemenu; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rolemenu (
    role_id integer NOT NULL,
    menu_id integer NOT NULL
);


ALTER TABLE public.rolemenu OWNER TO postgres;

--
-- Name: COLUMN rolemenu.role_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.rolemenu.role_id IS 'ID del rol.';


--
-- Name: COLUMN rolemenu.menu_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.rolemenu.menu_id IS 'ID del menu.';


--
-- Name: sexo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sexo (
    id integer NOT NULL,
    sexo character varying(255) NOT NULL,
    descripcion character varying(255) NOT NULL
);


ALTER TABLE public.sexo OWNER TO postgres;

--
-- Name: sexo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sexo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sexo_id_seq OWNER TO postgres;

--
-- Name: solicitud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.solicitud (
    id integer NOT NULL,
    realm_id integer,
    usuario_id integer,
    persona_fisica_id integer,
    persona_juridica_id integer,
    dispositivo_id integer,
    cuit character varying(11) DEFAULT NULL::character varying,
    cuil character varying(11) DEFAULT NULL::character varying,
    nicname character varying(20) NOT NULL,
    fecha_alta timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    mail character varying(255) NOT NULL,
    fecha_expiracion timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    hash character varying(255) NOT NULL,
    fecha_uso timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    correccion text,
    usada boolean
);


ALTER TABLE public.solicitud OWNER TO postgres;

--
-- Name: solicitud_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.solicitud_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.solicitud_id_seq OWNER TO postgres;

--
-- Name: tipo_cuit_cuil; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo_cuit_cuil (
    id integer NOT NULL,
    tipo_cuit_cuil character varying(255) NOT NULL
);


ALTER TABLE public.tipo_cuit_cuil OWNER TO postgres;

--
-- Name: tipo_cuit_cuil_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_cuit_cuil_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_cuit_cuil_id_seq OWNER TO postgres;

--
-- Name: tipo_documento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo_documento (
    id integer NOT NULL,
    tipo_documento character varying(255) NOT NULL
);


ALTER TABLE public.tipo_documento OWNER TO postgres;

--
-- Name: tipo_documento_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_documento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_documento_id_seq OWNER TO postgres;

--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id integer NOT NULL,
    realm_id integer,
    persona_fisica_id integer,
    email character varying(180) NOT NULL,
    roles json NOT NULL,
    password character varying(255) DEFAULT NULL::character varying,
    keycloak_id character varying(255) DEFAULT NULL::character varying,
    username character varying(255)
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_seq OWNER TO postgres;

--
-- Name: menu id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu ALTER COLUMN id SET DEFAULT nextval('public.menu_id_seq'::regclass);


--
-- Name: role id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role ALTER COLUMN id SET DEFAULT nextval('public.role_id_seq'::regclass);


--
-- Data for Name: dispositivo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dispositivo (id, persona_juridica_id, nicname, fecha_alta, fecha_baja) FROM stdin;
\.


--
-- Data for Name: doctrine_migration_versions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.doctrine_migration_versions (version, executed_at, execution_time) FROM stdin;
DoctrineMigrations\\Version20211005135346	2021-10-14 13:28:59	111
DoctrineMigrations\\Version20211006114759	2021-10-14 13:28:59	0
DoctrineMigrations\\Version20211014162851	2021-10-14 13:28:59	0
\.


--
-- Data for Name: estado_civil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estado_civil (id, estado_civil) FROM stdin;
\.


--
-- Data for Name: keycloak_id; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.keycloak_id (id) FROM stdin;
\.


--
-- Data for Name: menu; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.menu (id, name, app, active, created_at, updated_at, deleted_at, created_by, updated_by, deleted_by) FROM stdin;
1	Menu Top backend	backtop	1	\N	\N	\N	\N	\N	\N
2	Menu Sidebar back	backsidebar	1	\N	\N	\N	\N	\N	\N
3	Menu Top Frontend	fronttop	1	\N	\N	\N	\N	\N	\N
\.


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
-- Data for Name: nacionalidad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.nacionalidad (id, pais, codigo) FROM stdin;
\.


--
-- Data for Name: parametros; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.parametros (id, parametro, descripcion, fecha_desde, fecha_hasta, valor) FROM stdin;
\.


--
-- Data for Name: persona_fisica; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.persona_fisica (id, tipo_cuit_cuil_id, sexo_id, estado_civil_id, nacionalidad_id, tipo_documento_id, apellido, nombres, nro_doc, cuit_cuil, fecha_nac) FROM stdin;
\.


--
-- Data for Name: persona_juridica; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.persona_juridica (id, cuit, razon_social, fecha_alta, fecha_baja) FROM stdin;
\.


--
-- Data for Name: realm; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.realm (id, realm, id_realm_keycloak) FROM stdin;
\.


--
-- Data for Name: representacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.representacion (id, persona_fisica_id, persona_juridica_id) FROM stdin;
\.


--
-- Data for Name: role; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.role (id, company_id, code, name, active, createdby, createdat, updatedby, updatedat, deletedby, deletedat, orderlist) FROM stdin;
2	\N	ROLE_ADMIN	Administrador	1	1	2013-07-08 00:00:00	1	2017-03-03 04:24:18	\N	\N	\N
1	1	ROLE_SYSADMIN	Sysadmin	1	1	2013-07-08 00:00:00	1	2019-01-03 15:44:02	\N	\N	\N
3	\N	ROLE_USER	Consulta dispositivos	1	1	2013-07-08 00:00:00	1	2018-06-21 12:07:25	\N	\N	\N
\.


--
-- Data for Name: rolemenu; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rolemenu (role_id, menu_id) FROM stdin;
1	1000
1	2000
1	3000
1	10000
1	20000
1	30000
1	40000
1	50000
1	60000
1	2130
1	2100
1	2120
1	2140
1	3100
1	3150
1	3200
2	1000
2	2000
2	3000
2	10000
2	20000
2	30000
2	40000
2	50000
2	60000
2	2130
2	2100
2	2120
2	2140
2	3100
2	3150
2	3200
3	1000
3	2000
3	3000
3	10000
3	20000
3	30000
3	40000
3	50000
3	60000
3	2130
3	2100
3	2120
3	2140
3	3100
3	3150
3	3200
\.


--
-- Data for Name: sexo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sexo (id, sexo, descripcion) FROM stdin;
\.


--
-- Data for Name: solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.solicitud (id, realm_id, usuario_id, persona_fisica_id, persona_juridica_id, dispositivo_id, cuit, cuil, nicname, fecha_alta, mail, fecha_expiracion, hash, fecha_uso, correccion, usada) FROM stdin;
\.


--
-- Data for Name: tipo_cuit_cuil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipo_cuit_cuil (id, tipo_cuit_cuil) FROM stdin;
\.


--
-- Data for Name: tipo_documento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipo_documento (id, tipo_documento) FROM stdin;
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id, realm_id, persona_fisica_id, email, roles, password, keycloak_id, username) FROM stdin;
1	\N	\N	gusjoagomez@hotmail.com	["ROLE_USER"]		867e89ed-912f-43b6-ae9a-486af1c29ff7	\N
\.


--
-- Name: dispositivo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.dispositivo_id_seq', 1, false);


--
-- Name: estado_civil_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estado_civil_id_seq', 1, false);


--
-- Name: keycloak_id_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.keycloak_id_id_seq', 1, false);


--
-- Name: menu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.menu_id_seq', 3, true);


--
-- Name: nacionalidad_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.nacionalidad_id_seq', 1, false);


--
-- Name: parametros_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.parametros_id_seq', 1, false);


--
-- Name: persona_fisica_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.persona_fisica_id_seq', 1, false);


--
-- Name: persona_juridica_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.persona_juridica_id_seq', 1, false);


--
-- Name: realm_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.realm_id_seq', 1, false);


--
-- Name: representacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.representacion_id_seq', 1, false);


--
-- Name: role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.role_id_seq', 14, true);


--
-- Name: sexo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sexo_id_seq', 1, false);


--
-- Name: solicitud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.solicitud_id_seq', 1, false);


--
-- Name: tipo_cuit_cuil_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_cuit_cuil_id_seq', 1, false);


--
-- Name: tipo_documento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_documento_id_seq', 1, false);


--
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_seq', 1, true);


--
-- Name: dispositivo dispositivo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dispositivo
    ADD CONSTRAINT dispositivo_pkey PRIMARY KEY (id);


--
-- Name: doctrine_migration_versions doctrine_migration_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doctrine_migration_versions
    ADD CONSTRAINT doctrine_migration_versions_pkey PRIMARY KEY (version);


--
-- Name: estado_civil estado_civil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_civil
    ADD CONSTRAINT estado_civil_pkey PRIMARY KEY (id);


--
-- Name: keycloak_id keycloak_id_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.keycloak_id
    ADD CONSTRAINT keycloak_id_pkey PRIMARY KEY (id);


--
-- Name: menu menu_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu
    ADD CONSTRAINT menu_pk PRIMARY KEY (id);


--
-- Name: menuitem menu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menuitem
    ADD CONSTRAINT menu_pkey PRIMARY KEY (id);


--
-- Name: nacionalidad nacionalidad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nacionalidad
    ADD CONSTRAINT nacionalidad_pkey PRIMARY KEY (id);


--
-- Name: parametros parametros_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parametros
    ADD CONSTRAINT parametros_pkey PRIMARY KEY (id);


--
-- Name: persona_fisica persona_fisica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona_fisica
    ADD CONSTRAINT persona_fisica_pkey PRIMARY KEY (id);


--
-- Name: persona_juridica persona_juridica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona_juridica
    ADD CONSTRAINT persona_juridica_pkey PRIMARY KEY (id);


--
-- Name: realm realm_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.realm
    ADD CONSTRAINT realm_pkey PRIMARY KEY (id);


--
-- Name: representacion representacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.representacion
    ADD CONSTRAINT representacion_pkey PRIMARY KEY (id);


--
-- Name: role role_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);


--
-- Name: rolemenu rolemenu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rolemenu
    ADD CONSTRAINT rolemenu_pkey PRIMARY KEY (role_id, menu_id);


--
-- Name: sexo sexo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sexo
    ADD CONSTRAINT sexo_pkey PRIMARY KEY (id);


--
-- Name: solicitud solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT solicitud_pkey PRIMARY KEY (id);


--
-- Name: tipo_cuit_cuil tipo_cuit_cuil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_cuit_cuil
    ADD CONSTRAINT tipo_cuit_cuil_pkey PRIMARY KEY (id);


--
-- Name: tipo_documento tipo_documento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_documento
    ADD CONSTRAINT tipo_documento_pkey PRIMARY KEY (id);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- Name: idx_2265b05d319ce0ff; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_2265b05d319ce0ff ON public.usuario USING btree (persona_fisica_id);


--
-- Name: idx_2265b05d9dff5f89; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_2265b05d9dff5f89 ON public.usuario USING btree (realm_id);


--
-- Name: idx_96d27cc0319ce0ff; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_96d27cc0319ce0ff ON public.solicitud USING btree (persona_fisica_id);


--
-- Name: idx_96d27cc09dff5f89; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_96d27cc09dff5f89 ON public.solicitud USING btree (realm_id);


--
-- Name: idx_96d27cc0c4b65de; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_96d27cc0c4b65de ON public.solicitud USING btree (persona_juridica_id);


--
-- Name: idx_96d27cc0db38439e; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_96d27cc0db38439e ON public.solicitud USING btree (usuario_id);


--
-- Name: idx_96d27cc0fd37f77b; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_96d27cc0fd37f77b ON public.solicitud USING btree (dispositivo_id);


--
-- Name: idx_a05f26eec4b65de; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_a05f26eec4b65de ON public.dispositivo USING btree (persona_juridica_id);


--
-- Name: idx_e41b26b8319ce0ff; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_e41b26b8319ce0ff ON public.representacion USING btree (persona_fisica_id);


--
-- Name: idx_e41b26b8c4b65de; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_e41b26b8c4b65de ON public.representacion USING btree (persona_juridica_id);


--
-- Name: idx_fa4edbea2b32db58; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_fa4edbea2b32db58 ON public.persona_fisica USING btree (sexo_id);


--
-- Name: idx_fa4edbea75376d93; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_fa4edbea75376d93 ON public.persona_fisica USING btree (estado_civil_id);


--
-- Name: idx_fa4edbea89e70f80; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_fa4edbea89e70f80 ON public.persona_fisica USING btree (tipo_cuit_cuil_id);


--
-- Name: idx_fa4edbeaab8dc0f8; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_fa4edbeaab8dc0f8 ON public.persona_fisica USING btree (nacionalidad_id);


--
-- Name: idx_fa4edbeaf6939175; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_fa4edbeaf6939175 ON public.persona_fisica USING btree (tipo_documento_id);


--
-- Name: public_menu_action2_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_menu_action2_idx ON public.menuitem USING btree (action);


--
-- Name: public_menu_parent_id1_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_menu_parent_id1_idx ON public.menuitem USING btree (parent_id);


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
-- Name: public_rolemenu_menu_id1_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_rolemenu_menu_id1_idx ON public.rolemenu USING btree (menu_id);


--
-- Name: public_rolemenu_role_id2_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_rolemenu_role_id2_idx ON public.rolemenu USING btree (role_id);


--
-- Name: uniq_2265b05de7927c74; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX uniq_2265b05de7927c74 ON public.usuario USING btree (email);


--
-- Name: usuario fk_2265b05d319ce0ff; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT fk_2265b05d319ce0ff FOREIGN KEY (persona_fisica_id) REFERENCES public.persona_fisica(id);


--
-- Name: usuario fk_2265b05d9dff5f89; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT fk_2265b05d9dff5f89 FOREIGN KEY (realm_id) REFERENCES public.realm(id);


--
-- Name: solicitud fk_96d27cc0319ce0ff; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_96d27cc0319ce0ff FOREIGN KEY (persona_fisica_id) REFERENCES public.persona_fisica(id);


--
-- Name: solicitud fk_96d27cc09dff5f89; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_96d27cc09dff5f89 FOREIGN KEY (realm_id) REFERENCES public.realm(id);


--
-- Name: solicitud fk_96d27cc0c4b65de; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_96d27cc0c4b65de FOREIGN KEY (persona_juridica_id) REFERENCES public.persona_juridica(id);


--
-- Name: solicitud fk_96d27cc0db38439e; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_96d27cc0db38439e FOREIGN KEY (usuario_id) REFERENCES public.usuario(id);


--
-- Name: solicitud fk_96d27cc0fd37f77b; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_96d27cc0fd37f77b FOREIGN KEY (dispositivo_id) REFERENCES public.dispositivo(id);


--
-- Name: dispositivo fk_a05f26eec4b65de; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dispositivo
    ADD CONSTRAINT fk_a05f26eec4b65de FOREIGN KEY (persona_juridica_id) REFERENCES public.persona_juridica(id);


--
-- Name: representacion fk_e41b26b8319ce0ff; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.representacion
    ADD CONSTRAINT fk_e41b26b8319ce0ff FOREIGN KEY (persona_fisica_id) REFERENCES public.persona_fisica(id);


--
-- Name: representacion fk_e41b26b8c4b65de; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.representacion
    ADD CONSTRAINT fk_e41b26b8c4b65de FOREIGN KEY (persona_juridica_id) REFERENCES public.persona_juridica(id);


--
-- Name: persona_fisica fk_fa4edbea2b32db58; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona_fisica
    ADD CONSTRAINT fk_fa4edbea2b32db58 FOREIGN KEY (sexo_id) REFERENCES public.sexo(id);


--
-- Name: persona_fisica fk_fa4edbea75376d93; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona_fisica
    ADD CONSTRAINT fk_fa4edbea75376d93 FOREIGN KEY (estado_civil_id) REFERENCES public.estado_civil(id);


--
-- Name: persona_fisica fk_fa4edbea89e70f80; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona_fisica
    ADD CONSTRAINT fk_fa4edbea89e70f80 FOREIGN KEY (tipo_cuit_cuil_id) REFERENCES public.tipo_cuit_cuil(id);


--
-- Name: persona_fisica fk_fa4edbeaab8dc0f8; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona_fisica
    ADD CONSTRAINT fk_fa4edbeaab8dc0f8 FOREIGN KEY (nacionalidad_id) REFERENCES public.nacionalidad(id);


--
-- Name: persona_fisica fk_fa4edbeaf6939175; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona_fisica
    ADD CONSTRAINT fk_fa4edbeaf6939175 FOREIGN KEY (tipo_documento_id) REFERENCES public.tipo_documento(id);


--
-- Name: menuitem menu_parent_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menuitem
    ADD CONSTRAINT menu_parent_id_fkey FOREIGN KEY (parent_id) REFERENCES public.menuitem(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: rolemenu rolemenu_role_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rolemenu
    ADD CONSTRAINT rolemenu_role_id_fkey FOREIGN KEY (role_id) REFERENCES public.role(id) ON DELETE CASCADE;


--
-- Name: TABLE role; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL ON TABLE public.role TO vincularusr;


--
-- Name: SEQUENCE role_id_seq; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL ON SEQUENCE public.role_id_seq TO vincularusr;


--
-- Name: TABLE rolemenu; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL ON TABLE public.rolemenu TO vincularusr;


--
-- PostgreSQL database dump complete
--

