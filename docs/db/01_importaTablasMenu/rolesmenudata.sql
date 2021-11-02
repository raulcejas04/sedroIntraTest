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

--
-- Data for Name: menu; Type: TABLE DATA; Schema: public; Owner: postgres
--

SET SESSION AUTHORIZATION DEFAULT;

ALTER TABLE public.menu DISABLE TRIGGER ALL;

INSERT INTO public.menu (id, name, app, active, created_at, updated_at, deleted_at, created_by, updated_by, deleted_by) VALUES (1, 'Menu Top backend', 'backtop', 1, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.menu (id, name, app, active, created_at, updated_at, deleted_at, created_by, updated_by, deleted_by) VALUES (2, 'Menu Sidebar back', 'backsidebar', 1, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.menu (id, name, app, active, created_at, updated_at, deleted_at, created_by, updated_by, deleted_by) VALUES (3, 'Menu Top Frontend', 'fronttop', 1, NULL, NULL, NULL, NULL, NULL, NULL);


ALTER TABLE public.menu ENABLE TRIGGER ALL;

--
-- Data for Name: menuitem; Type: TABLE DATA; Schema: public; Owner: postgres
--

ALTER TABLE public.menuitem DISABLE TRIGGER ALL;

INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (10000, 2, NULL, NULL, 'Dashboard', 'Dashboard', NULL, NULL, 1, 10000, 10000, '0', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (20000, 2, NULL, NULL, 'Orders', 'Orders', NULL, NULL, 1, 20000, 20000, '0', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (30000, 2, NULL, NULL, 'Products', 'Products', NULL, NULL, 1, 30000, 30000, '0', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (40000, 2, NULL, NULL, 'Customers', 'Customers', NULL, NULL, 1, 40000, 40000, '0', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (50000, 2, NULL, NULL, 'Reports', 'Reports', NULL, NULL, 1, 50000, 50000, '0', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (60000, 2, NULL, NULL, 'Integrations', 'Integrations', NULL, NULL, 1, 60000, 60000, '0', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (1000, 1, NULL, NULL, 'Home', 'Hole', NULL, NULL, 1, 1000, 1000, '1', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (2000, 1, NULL, NULL, 'Usuarios', 'Usuarios', NULL, NULL, 1, 2000, 2000, '1', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (3000, 1, NULL, NULL, 'Dispositivos', 'Dispositivos', NULL, NULL, 1, 3000, 3000, '1', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (2130, 1, 2000, NULL, 'Menues', 'Menues', NULL, NULL, 1, 2130, 2130, '2', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (2100, 1, 2000, NULL, 'Lista Usuarios', 'Lista Usuarios', NULL, NULL, 1, 2100, 2100, '2', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (2120, 1, 2000, NULL, 'Roles', 'Roles', NULL, NULL, 1, 2120, 2120, '2', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (2140, 1, 2130, NULL, 'Lista menues', 'Lista Menues', NULL, NULL, 1, 2140, 2140, '3', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (3150, 1, 3000, NULL, 'Invitacion a persona', 'Invitacion a persona', NULL, NULL, 1, 3150, 3150, '2', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (3200, 1, 3000, NULL, 'Lista a confirmar', 'Lista a confirmar', NULL, NULL, 1, 3200, 3200, '2', 1, NULL, NULL, 0);
INSERT INTO public.menuitem (id, menu_id, parent_id, rolecompany, name, nametree, icon, link, active, orderlist1, orderlist, type_id, availablesel, module, action, divider) VALUES (3100, 1, 3000, NULL, 'Lista dispositivos', 'Lista dispositivos', NULL, 'acciones-extranet/lista', 1, 3100, 3100, '2', 1, NULL, NULL, 0);


ALTER TABLE public.menuitem ENABLE TRIGGER ALL;

--
-- Data for Name: role; Type: TABLE DATA; Schema: public; Owner: postgres
--

ALTER TABLE public.role DISABLE TRIGGER ALL;

INSERT INTO public.role (id, company_id, code, name, active, createdby, createdat, updatedby, updatedat, deletedby, deletedat, orderlist) VALUES (2, NULL, 'ROLE_ADMIN', 'Administrador', 1, 1, '2013-07-08 00:00:00', 1, '2017-03-03 04:24:18', NULL, NULL, NULL);
INSERT INTO public.role (id, company_id, code, name, active, createdby, createdat, updatedby, updatedat, deletedby, deletedat, orderlist) VALUES (1, 1, 'ROLE_SYSADMIN', 'Sysadmin', 1, 1, '2013-07-08 00:00:00', 1, '2019-01-03 15:44:02', NULL, NULL, NULL);
INSERT INTO public.role (id, company_id, code, name, active, createdby, createdat, updatedby, updatedat, deletedby, deletedat, orderlist) VALUES (3, NULL, 'ROLE_USER', 'Consulta dispositivos', 1, 1, '2013-07-08 00:00:00', 1, '2018-06-21 12:07:25', NULL, NULL, NULL);


ALTER TABLE public.role ENABLE TRIGGER ALL;

--
-- Data for Name: rolemenu; Type: TABLE DATA; Schema: public; Owner: postgres
--

ALTER TABLE public.rolemenu DISABLE TRIGGER ALL;

INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 1000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 2000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 3000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 10000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 20000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 30000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 40000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 50000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 60000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 2130);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 2100);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 2120);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 2140);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 3100);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 3150);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (1, 3200);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 1000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 2000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 3000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 10000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 20000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 30000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 40000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 50000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 60000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 2130);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 2100);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 2120);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 2140);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 3100);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 3150);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (2, 3200);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 1000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 2000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 3000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 10000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 20000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 30000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 40000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 50000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 60000);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 2130);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 2100);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 2120);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 2140);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 3100);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 3150);
INSERT INTO public.rolemenu (role_id, menu_id) VALUES (3, 3200);


ALTER TABLE public.rolemenu ENABLE TRIGGER ALL;

--
-- Name: menu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.menu_id_seq', 3, true);


--
-- Name: role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.role_id_seq', 14, true);


--
-- PostgreSQL database dump complete
--

