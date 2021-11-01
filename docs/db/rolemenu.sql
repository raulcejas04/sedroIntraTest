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
-- Name: rolemenu rolemenu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rolemenu
    ADD CONSTRAINT rolemenu_pkey PRIMARY KEY (role_id, menu_id);


--
-- Name: public_rolemenu_menu_id1_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_rolemenu_menu_id1_idx ON public.rolemenu USING btree (menu_id);


--
-- Name: public_rolemenu_role_id2_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX public_rolemenu_role_id2_idx ON public.rolemenu USING btree (role_id);


--
-- Name: rolemenu rolemenu_role_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rolemenu
    ADD CONSTRAINT rolemenu_role_id_fkey FOREIGN KEY (role_id) REFERENCES public.role(id) ON DELETE CASCADE;


--
-- Name: TABLE rolemenu; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL ON TABLE public.rolemenu TO vincularusr;


--
-- PostgreSQL database dump complete
--

