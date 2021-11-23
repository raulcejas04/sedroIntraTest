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


CREATE TABLE public.xcnf_formfield (
    id serial4 NOT NULL,
    form_id int4 NOT NULL,
    fieldname varchar(100) NOT NULL,
    val_label varchar(100) NULL,
    val_labelhelp varchar(100) NULL,
    val_placeholder varchar(100) NULL,
    val_min varchar(10) NULL,
    error_min varchar(255) NULL,
    val_max varchar(10) NULL,
    error_max varchar(255) NULL,
    val_format varchar(255) NULL,
    val_format_error varchar(255) NULL,
    val_range varchar(255) NULL,
    val_range_error varchar(255) NULL,
    is_cuit bool NULL DEFAULT false,
    is_cuit_error varchar(255) NULL,
    is_null bool NULL DEFAULT false,
    is_null_error varchar(255) NULL,
    is_email bool NULL DEFAULT false,
    is_email_error varchar(255) NULL,
    is_emailrepeat bool NULL DEFAULT false,
    is_emailrepeat_error varchar(255) NULL,
    is_creditcard bool NULL DEFAULT false,
    is_creditcard_error varchar(255) NULL,
    is_currency bool NULL DEFAULT false,
    is_currency_error varchar(255) NULL,
    is_empty bool NULL DEFAULT false,
    is_empty_error varchar(255) NULL,
    is_date bool NULL DEFAULT false,
    is_date_error varchar(255) NULL,
    is_decimal bool NULL DEFAULT false,
    is_decimal_error varchar(255) NULL,
    is_numeric bool NULL DEFAULT false,
    is_numeric_error varchar(255) NULL,
    is_float bool NULL DEFAULT false,
    is_float_error varchar(255) NULL,
    is_hexcolor bool NULL DEFAULT false,
    is_hexcolor_error varchar(255) NULL,
    is_hsl bool NULL DEFAULT false,
    is_hsl_error varchar(255) NULL,
    is_jwt bool NULL DEFAULT false,
    is_jwt_error varchar(255) NULL,
    is_url bool NULL DEFAULT false,
    is_url_error varchar(255) NULL,
    is_ip bool NULL DEFAULT false,
    is_ip_error varchar(255) NULL,
    is_json bool NULL DEFAULT false,
    is_json_error varchar(255) NULL,
    is_latlong bool NULL DEFAULT false,
    is_latlong_error varchar(255) NULL,
    is_pattern bool NULL DEFAULT false,
    is_pattern_error varchar(255) NULL,
    extraproperties varchar(1024) NULL,
    CONSTRAINT xcnf_formfield_pk PRIMARY KEY (id)
);



--
-- Data for Name: xcnf_formfield; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.xcnf_formfield (id, form_id, fieldname, val_label, val_labelhelp, val_placeholder, val_min, error_min, val_max, error_max, val_format, val_format_error, val_range, val_range_error, is_cuit, is_cuit_error, is_null, is_null_error, is_email, is_email_error, is_emailrepeat, is_emailrepeat_error, is_creditcard, is_creditcard_error, is_currency, is_currency_error, is_empty, is_empty_error, is_date, is_date_error, is_decimal, is_decimal_error, is_numeric, is_numeric_error, is_float, is_float_error, is_hexcolor, is_hexcolor_error, is_hsl, is_hsl_error, is_jwt, is_jwt_error, is_url, is_url_error, is_ip, is_ip_error, is_json, is_json_error, is_latlong, is_latlong_error, is_pattern, is_pattern_error, extraproperties) VALUES (1, 1, 'campoString', NULL, NULL, 'Ingrese campo string', '1', 'El valor debe ser mayor o igual que 1', '100', 'El campo No puede ser mayor que 100', NULL, NULL, NULL, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, true, 'Este valor no puede ser vacio', false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, NULL);
INSERT INTO public.xcnf_formfield (id, form_id, fieldname, val_label, val_labelhelp, val_placeholder, val_min, error_min, val_max, error_max, val_format, val_format_error, val_range, val_range_error, is_cuit, is_cuit_error, is_null, is_null_error, is_email, is_email_error, is_emailrepeat, is_emailrepeat_error, is_creditcard, is_creditcard_error, is_currency, is_currency_error, is_empty, is_empty_error, is_date, is_date_error, is_decimal, is_decimal_error, is_numeric, is_numeric_error, is_float, is_float_error, is_hexcolor, is_hexcolor_error, is_hsl, is_hsl_error, is_jwt, is_jwt_error, is_url, is_url_error, is_ip, is_ip_error, is_json, is_json_error, is_latlong, is_latlong_error, is_pattern, is_pattern_error, extraproperties) VALUES (3, 1, 'campoEmail', NULL, NULL, 'Ingrese su E-mail', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, false, NULL, false, NULL, true, 'Debe ingresar un email', false, NULL, false, NULL, false, NULL, true, 'Este valor no puede ser vacio', false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, NULL);
INSERT INTO public.xcnf_formfield (id, form_id, fieldname, val_label, val_labelhelp, val_placeholder, val_min, error_min, val_max, error_max, val_format, val_format_error, val_range, val_range_error, is_cuit, is_cuit_error, is_null, is_null_error, is_email, is_email_error, is_emailrepeat, is_emailrepeat_error, is_creditcard, is_creditcard_error, is_currency, is_currency_error, is_empty, is_empty_error, is_date, is_date_error, is_decimal, is_decimal_error, is_numeric, is_numeric_error, is_float, is_float_error, is_hexcolor, is_hexcolor_error, is_hsl, is_hsl_error, is_jwt, is_jwt_error, is_url, is_url_error, is_ip, is_ip_error, is_json, is_json_error, is_latlong, is_latlong_error, is_pattern, is_pattern_error, extraproperties) VALUES (2, 1, 'campoInteger', NULL, NULL, 'Ingrese campo entero', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, true, 'Este valor no puede ser vacio', false, NULL, false, NULL, true, 'Este valor debe ser un numero', false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, NULL);
INSERT INTO public.xcnf_formfield (id, form_id, fieldname, val_label, val_labelhelp, val_placeholder, val_min, error_min, val_max, error_max, val_format, val_format_error, val_range, val_range_error, is_cuit, is_cuit_error, is_null, is_null_error, is_email, is_email_error, is_emailrepeat, is_emailrepeat_error, is_creditcard, is_creditcard_error, is_currency, is_currency_error, is_empty, is_empty_error, is_date, is_date_error, is_decimal, is_decimal_error, is_numeric, is_numeric_error, is_float, is_float_error, is_hexcolor, is_hexcolor_error, is_hsl, is_hsl_error, is_jwt, is_jwt_error, is_url, is_url_error, is_ip, is_ip_error, is_json, is_json_error, is_latlong, is_latlong_error, is_pattern, is_pattern_error, extraproperties) VALUES (5, 1, 'repetirmail', NULL, NULL, 'Ingrese E-mail nuevamente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, false, NULL, false, NULL, true, 'Este campo debe ser un mail igual que el anterior', true, 'No coincide con el email anterior', false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, '{"email": "pruebagus_campoEmail"}');
INSERT INTO public.xcnf_formfield (id, form_id, fieldname, val_label, val_labelhelp, val_placeholder, val_min, error_min, val_max, error_max, val_format, val_format_error, val_range, val_range_error, is_cuit, is_cuit_error, is_null, is_null_error, is_email, is_email_error, is_emailrepeat, is_emailrepeat_error, is_creditcard, is_creditcard_error, is_currency, is_currency_error, is_empty, is_empty_error, is_date, is_date_error, is_decimal, is_decimal_error, is_numeric, is_numeric_error, is_float, is_float_error, is_hexcolor, is_hexcolor_error, is_hsl, is_hsl_error, is_jwt, is_jwt_error, is_url, is_url_error, is_ip, is_ip_error, is_json, is_json_error, is_latlong, is_latlong_error, is_pattern, is_pattern_error, extraproperties) VALUES (4, 1, 'cuit', NULL, NULL, 'Ingrese CUIT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, true, 'El campo debe ser un numero de CUIT', false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, true, 'Este valor no puede ser vacio', false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, NULL);
INSERT INTO public.xcnf_formfield (id, form_id, fieldname, val_label, val_labelhelp, val_placeholder, val_min, error_min, val_max, error_max, val_format, val_format_error, val_range, val_range_error, is_cuit, is_cuit_error, is_null, is_null_error, is_email, is_email_error, is_emailrepeat, is_emailrepeat_error, is_creditcard, is_creditcard_error, is_currency, is_currency_error, is_empty, is_empty_error, is_date, is_date_error, is_decimal, is_decimal_error, is_numeric, is_numeric_error, is_float, is_float_error, is_hexcolor, is_hexcolor_error, is_hsl, is_hsl_error, is_jwt, is_jwt_error, is_url, is_url_error, is_ip, is_ip_error, is_json, is_json_error, is_latlong, is_latlong_error, is_pattern, is_pattern_error, extraproperties) VALUES (6, 2, 'mailuser', NULL, NULL, 'Ingrese E-Mail', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, false, NULL, false, NULL, true, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, false, NULL, NULL);


--
-- Name: xcnf_formfield_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.xcnf_formfield_id_seq', 5, true);


--
-- PostgreSQL database dump complete
--

