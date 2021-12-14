CREATE TABLE public.zonas (
	"idZona" serial4 NOT NULL,
	descrip varchar(100) NULL,
	activo bpchar(1) NULL,
	padre int4 NOT NULL,
	orden numeric NULL,
	nivel int4 NOT NULL,
	georef varchar(12) NULL,
	idsim varchar(12) NULL,
	codant int4 NULL,
	codprov int4 NULL,
	coddepto int4 NULL,
	codmun int4 NULL,
	nuevo varchar(2) NULL,
	CONSTRAINT zonas_pkey PRIMARY KEY ("idZona")
);