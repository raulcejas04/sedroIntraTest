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
-- Name: menu id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu ALTER COLUMN id SET DEFAULT nextval('public.menu_id_seq'::regclass);


--
-- Name: role id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role ALTER COLUMN id SET DEFAULT nextval('public.role_id_seq'::regclass);


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

