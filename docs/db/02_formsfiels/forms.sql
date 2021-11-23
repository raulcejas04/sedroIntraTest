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


CREATE TABLE public.xcnf_form (
    id serial4 NOT NULL,
    form_name varchar(15) NOT NULL
);
--
-- Data for Name: xcnf_form; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.xcnf_form (id, form_name) VALUES (1, 'pruebagus');
INSERT INTO public.xcnf_form (id, form_name) VALUES (2, 'formemilio');


--
-- Name: xcnf_form_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.xcnf_form_id_seq', 6, false);


--
-- PostgreSQL database dump complete
--

