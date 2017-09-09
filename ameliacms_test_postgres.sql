--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: acms_taction; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_taction (
    idaction integer NOT NULL,
    name character varying(15),
    function integer,
    idicon integer,
    status character(1)
);


ALTER TABLE acms_taction OWNER TO postgres;

--
-- Name: acms_taction_idaction_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_taction_idaction_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_taction_idaction_seq OWNER TO postgres;

--
-- Name: acms_taction_idaction_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_taction_idaction_seq OWNED BY acms_taction.idaction;


--
-- Name: acms_taddress; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_taddress (
    idaddress integer NOT NULL,
    idfather integer,
    name character varying(50),
    status character varying(255)
);


ALTER TABLE acms_taddress OWNER TO postgres;

--
-- Name: acms_taddress_idaddress_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_taddress_idaddress_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_taddress_idaddress_seq OWNER TO postgres;

--
-- Name: acms_taddress_idaddress_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_taddress_idaddress_seq OWNED BY acms_taddress.idaddress;


--
-- Name: acms_tcharge; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tcharge (
    idcharge integer NOT NULL,
    name character varying(60),
    status character(1)
);


ALTER TABLE acms_tcharge OWNER TO postgres;

--
-- Name: acms_tcharge_idcharge_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tcharge_idcharge_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tcharge_idcharge_seq OWNER TO postgres;

--
-- Name: acms_tcharge_idcharge_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tcharge_idcharge_seq OWNED BY acms_tcharge.idcharge;


--
-- Name: acms_tcontact; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tcontact (
    idcontact integer NOT NULL,
    name character varying(25),
    email character varying(60),
    phone character varying(20),
    message text,
    iduser integer,
    response text,
    status character(1)
);


ALTER TABLE acms_tcontact OWNER TO postgres;

--
-- Name: acms_tcontact_idcontact_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tcontact_idcontact_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tcontact_idcontact_seq OWNER TO postgres;

--
-- Name: acms_tcontact_idcontact_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tcontact_idcontact_seq OWNED BY acms_tcontact.idcontact;


--
-- Name: acms_tdcharge_service_action; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tdcharge_service_action (
    idcharge_service_action integer NOT NULL,
    idcharge integer,
    idservice integer,
    idaction integer
);


ALTER TABLE acms_tdcharge_service_action OWNER TO postgres;

--
-- Name: acms_tdcharge_service_action_idcharge_service_action_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tdcharge_service_action_idcharge_service_action_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tdcharge_service_action_idcharge_service_action_seq OWNER TO postgres;

--
-- Name: acms_tdcharge_service_action_idcharge_service_action_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tdcharge_service_action_idcharge_service_action_seq OWNED BY acms_tdcharge_service_action.idcharge_service_action;


--
-- Name: acms_tdpassword; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tdpassword (
    idpassword integer NOT NULL,
    iduser integer,
    password text,
    creation_date timestamp without time zone,
    status character(1)
);


ALTER TABLE acms_tdpassword OWNER TO postgres;

--
-- Name: acms_tdpassword_idpassword_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tdpassword_idpassword_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tdpassword_idpassword_seq OWNER TO postgres;

--
-- Name: acms_tdpassword_idpassword_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tdpassword_idpassword_seq OWNED BY acms_tdpassword.idpassword;


--
-- Name: acms_tdquestion_answer; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tdquestion_answer (
    idquestion_answer integer NOT NULL,
    iduser integer,
    question text,
    answer text
);


ALTER TABLE acms_tdquestion_answer OWNER TO postgres;

--
-- Name: acms_tdquestion_answer_idquestion_answer_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tdquestion_answer_idquestion_answer_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tdquestion_answer_idquestion_answer_seq OWNER TO postgres;

--
-- Name: acms_tdquestion_answer_idquestion_answer_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tdquestion_answer_idquestion_answer_seq OWNED BY acms_tdquestion_answer.idquestion_answer;


--
-- Name: acms_tdservice_action; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tdservice_action (
    idservice_action integer NOT NULL,
    idservice integer,
    idaction integer
);


ALTER TABLE acms_tdservice_action OWNER TO postgres;

--
-- Name: acms_tdservice_action_idservice_action_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tdservice_action_idservice_action_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tdservice_action_idservice_action_seq OWNER TO postgres;

--
-- Name: acms_tdservice_action_idservice_action_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tdservice_action_idservice_action_seq OWNED BY acms_tdservice_action.idservice_action;


--
-- Name: acms_tdslider; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tdslider (
    iddslider integer NOT NULL,
    idslider integer,
    idgallery integer,
    title character varying(50),
    description text,
    idpage integer
);


ALTER TABLE acms_tdslider OWNER TO postgres;

--
-- Name: acms_tdslider_iddslider_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tdslider_iddslider_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tdslider_iddslider_seq OWNER TO postgres;

--
-- Name: acms_tdslider_iddslider_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tdslider_iddslider_seq OWNED BY acms_tdslider.iddslider;


--
-- Name: acms_tduser_service_ordered; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tduser_service_ordered (
    iduser_service_ordered integer NOT NULL,
    iduser integer,
    idservice integer,
    ordered integer
);


ALTER TABLE acms_tduser_service_ordered OWNER TO postgres;

--
-- Name: acms_tduser_service_ordered_iduser_service_ordered_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tduser_service_ordered_iduser_service_ordered_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tduser_service_ordered_iduser_service_ordered_seq OWNER TO postgres;

--
-- Name: acms_tduser_service_ordered_iduser_service_ordered_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tduser_service_ordered_iduser_service_ordered_seq OWNED BY acms_tduser_service_ordered.iduser_service_ordered;


--
-- Name: acms_tethnicity; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tethnicity (
    idethnicity integer NOT NULL,
    name character varying(45),
    status character(1)
);


ALTER TABLE acms_tethnicity OWNER TO postgres;

--
-- Name: acms_tethnicity_idethnicity_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tethnicity_idethnicity_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tethnicity_idethnicity_seq OWNER TO postgres;

--
-- Name: acms_tethnicity_idethnicity_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tethnicity_idethnicity_seq OWNED BY acms_tethnicity.idethnicity;


--
-- Name: acms_tgallery; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tgallery (
    idgallery integer NOT NULL,
    iduser integer,
    src text,
    title text,
    legend text,
    alternative text,
    description text,
    date_created date
);


ALTER TABLE acms_tgallery OWNER TO postgres;

--
-- Name: acms_tgallery_idgallery_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tgallery_idgallery_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tgallery_idgallery_seq OWNER TO postgres;

--
-- Name: acms_tgallery_idgallery_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tgallery_idgallery_seq OWNED BY acms_tgallery.idgallery;


--
-- Name: acms_ticon; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_ticon (
    idicon integer NOT NULL,
    class character varying(60),
    name character varying(60),
    status character(1)
);


ALTER TABLE acms_ticon OWNER TO postgres;

--
-- Name: acms_ticon_idicon_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_ticon_idicon_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_ticon_idicon_seq OWNER TO postgres;

--
-- Name: acms_ticon_idicon_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_ticon_idicon_seq OWNED BY acms_ticon.idicon;


--
-- Name: acms_tlog_access; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tlog_access (
    idlog_access integer NOT NULL,
    name character varying(20),
    message text,
    ip character varying(16),
    browser character varying(30),
    date_created timestamp without time zone,
    operative_system character varying(30)
);


ALTER TABLE acms_tlog_access OWNER TO postgres;

--
-- Name: acms_tlog_access_idlog_access_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tlog_access_idlog_access_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tlog_access_idlog_access_seq OWNER TO postgres;

--
-- Name: acms_tlog_access_idlog_access_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tlog_access_idlog_access_seq OWNED BY acms_tlog_access.idlog_access;


--
-- Name: acms_tlog_movement; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tlog_movement (
    idlog_movement integer NOT NULL,
    iduser integer,
    idaction integer,
    idservice character varying(255),
    message text,
    data text,
    date_created timestamp without time zone
);


ALTER TABLE acms_tlog_movement OWNER TO postgres;

--
-- Name: acms_tlog_movement_idlog_movement_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tlog_movement_idlog_movement_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tlog_movement_idlog_movement_seq OWNER TO postgres;

--
-- Name: acms_tlog_movement_idlog_movement_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tlog_movement_idlog_movement_seq OWNED BY acms_tlog_movement.idlog_movement;


--
-- Name: acms_tlog_report; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tlog_report (
    idlog_report integer NOT NULL,
    iduser integer,
    report text,
    code text,
    date_created timestamp without time zone
);


ALTER TABLE acms_tlog_report OWNER TO postgres;

--
-- Name: acms_tlog_report_idlog_report_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tlog_report_idlog_report_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tlog_report_idlog_report_seq OWNER TO postgres;

--
-- Name: acms_tlog_report_idlog_report_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tlog_report_idlog_report_seq OWNED BY acms_tlog_report.idlog_report;


--
-- Name: acms_tnationality; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tnationality (
    idnationality integer NOT NULL,
    name_one character varying(3),
    name_two character varying(25),
    status character(1)
);


ALTER TABLE acms_tnationality OWNER TO postgres;

--
-- Name: acms_tnationality_idnationality_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tnationality_idnationality_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tnationality_idnationality_seq OWNER TO postgres;

--
-- Name: acms_tnationality_idnationality_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tnationality_idnationality_seq OWNED BY acms_tnationality.idnationality;


--
-- Name: acms_tnotice; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tnotice (
    idnotice integer NOT NULL,
    title character varying(160),
    content text,
    url text,
    date_created date,
    status character(1)
);


ALTER TABLE acms_tnotice OWNER TO postgres;

--
-- Name: acms_tnotice_idnotice_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tnotice_idnotice_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tnotice_idnotice_seq OWNER TO postgres;

--
-- Name: acms_tnotice_idnotice_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tnotice_idnotice_seq OWNED BY acms_tnotice.idnotice;


--
-- Name: acms_torganization; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_torganization (
    name_one character varying(50),
    name_two character varying(50),
    email character varying(50),
    description text,
    idgallery_header integer,
    idgallery_favicon integer,
    address text,
    rights text,
    phone_one character varying(20),
    phone_two character varying(20),
    phone_three character varying(20),
    number_question_answer integer,
    login integer,
    new_password_sent_email integer,
    email_host text,
    email_port character varying(5),
    email_security_smtp character(1),
    email_type_security_smtp character varying(3),
    email_user text,
    email_password text,
    email_subject text,
    email_message text,
    number_days_password_diferrence integer,
    number_answer_allowed integer,
    skip_homepage character(1),
    type_web character(1)
);


ALTER TABLE acms_torganization OWNER TO postgres;

--
-- Name: acms_tpage; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tpage (
    idpage integer NOT NULL,
    url text,
    link text,
    name text,
    img text,
    idicon integer,
    content text,
    view_main character(1),
    status character(1)
);


ALTER TABLE acms_tpage OWNER TO postgres;

--
-- Name: acms_tpage_idpage_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tpage_idpage_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tpage_idpage_seq OWNER TO postgres;

--
-- Name: acms_tpage_idpage_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tpage_idpage_seq OWNED BY acms_tpage.idpage;


--
-- Name: acms_tperson; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tperson (
    idperson integer NOT NULL,
    idnationality integer,
    idethnicity integer,
    idcharge integer,
    image text,
    identification_card character varying(15),
    name_one character varying(20),
    name_two character varying(20),
    last_name_one character varying(20),
    last_name_two character varying(20),
    sex character(1),
    email character varying(50),
    birth_date date,
    birth_place text,
    idaddress integer,
    address text,
    phone_one character varying(20),
    phone_two character varying(20),
    status character(1)
);


ALTER TABLE acms_tperson OWNER TO postgres;

--
-- Name: acms_tperson_idperson_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tperson_idperson_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tperson_idperson_seq OWNER TO postgres;

--
-- Name: acms_tperson_idperson_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tperson_idperson_seq OWNED BY acms_tperson.idperson;


--
-- Name: acms_tportfolio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tportfolio (
    idportfolio integer NOT NULL,
    title character varying(60),
    description character varying(100),
    idgallery integer,
    idpage integer,
    status character(1)
);


ALTER TABLE acms_tportfolio OWNER TO postgres;

--
-- Name: acms_tportfolio_idportfolio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tportfolio_idportfolio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tportfolio_idportfolio_seq OWNER TO postgres;

--
-- Name: acms_tportfolio_idportfolio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tportfolio_idportfolio_seq OWNED BY acms_tportfolio.idportfolio;


--
-- Name: acms_tpost; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tpost (
    idpost integer NOT NULL,
    url character varying(70),
    name text,
    color character(7),
    idgallery integer,
    content text,
    iduser integer,
    date_created date,
    status character(1)
);


ALTER TABLE acms_tpost OWNER TO postgres;

--
-- Name: acms_tpost_idpost_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tpost_idpost_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tpost_idpost_seq OWNER TO postgres;

--
-- Name: acms_tpost_idpost_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tpost_idpost_seq OWNED BY acms_tpost.idpost;


--
-- Name: acms_tservice; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tservice (
    idservice integer NOT NULL,
    idfather integer,
    name character varying(30),
    url character varying(30),
    idicon integer,
    color character(7),
    status character(1)
);


ALTER TABLE acms_tservice OWNER TO postgres;

--
-- Name: acms_tservice_idservice_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tservice_idservice_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tservice_idservice_seq OWNER TO postgres;

--
-- Name: acms_tservice_idservice_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tservice_idservice_seq OWNED BY acms_tservice.idservice;


--
-- Name: acms_tservicehome; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tservicehome (
    idservicehome integer NOT NULL,
    title character varying(60),
    description character varying(100),
    idicon integer,
    idgallery integer,
    idpage integer,
    status character(1)
);


ALTER TABLE acms_tservicehome OWNER TO postgres;

--
-- Name: acms_tservicehome_idservicehome_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tservicehome_idservicehome_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tservicehome_idservicehome_seq OWNER TO postgres;

--
-- Name: acms_tservicehome_idservicehome_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tservicehome_idservicehome_seq OWNED BY acms_tservicehome.idservicehome;


--
-- Name: acms_tslider; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tslider (
    idslider integer NOT NULL,
    name character varying(60),
    status character(1)
);


ALTER TABLE acms_tslider OWNER TO postgres;

--
-- Name: acms_tslider_idslider_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tslider_idslider_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tslider_idslider_seq OWNER TO postgres;

--
-- Name: acms_tslider_idslider_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tslider_idslider_seq OWNED BY acms_tslider.idslider;


--
-- Name: acms_tsocial_network; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tsocial_network (
    idsocial_network integer NOT NULL,
    name character varying(30),
    url text,
    idicon integer,
    status character(1)
);


ALTER TABLE acms_tsocial_network OWNER TO postgres;

--
-- Name: acms_tsocial_network_idsocial_network_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tsocial_network_idsocial_network_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tsocial_network_idsocial_network_seq OWNER TO postgres;

--
-- Name: acms_tsocial_network_idsocial_network_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tsocial_network_idsocial_network_seq OWNED BY acms_tsocial_network.idsocial_network;


--
-- Name: acms_ttheme; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_ttheme (
    idtheme integer NOT NULL,
    name text,
    description text,
    src text,
    img text,
    status character(1)
);


ALTER TABLE acms_ttheme OWNER TO postgres;

--
-- Name: acms_ttheme_idtheme_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_ttheme_idtheme_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_ttheme_idtheme_seq OWNER TO postgres;

--
-- Name: acms_ttheme_idtheme_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_ttheme_idtheme_seq OWNED BY acms_ttheme.idtheme;


--
-- Name: acms_ttheme_origin; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_ttheme_origin (
    idtheme_origin integer NOT NULL,
    name text,
    description text,
    img text,
    src text,
    date_created date,
    status character(1)
);


ALTER TABLE acms_ttheme_origin OWNER TO postgres;

--
-- Name: acms_ttheme_origin_idtheme_origin_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_ttheme_origin_idtheme_origin_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_ttheme_origin_idtheme_origin_seq OWNER TO postgres;

--
-- Name: acms_ttheme_origin_idtheme_origin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_ttheme_origin_idtheme_origin_seq OWNED BY acms_ttheme_origin.idtheme_origin;


--
-- Name: acms_tuser; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acms_tuser (
    iduser integer NOT NULL,
    idperson integer,
    name character varying(20),
    failed_attempts integer,
    initiated integer,
    note text,
    status character(1)
);


ALTER TABLE acms_tuser OWNER TO postgres;

--
-- Name: acms_tuser_iduser_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acms_tuser_iduser_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acms_tuser_iduser_seq OWNER TO postgres;

--
-- Name: acms_tuser_iduser_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE acms_tuser_iduser_seq OWNED BY acms_tuser.iduser;


--
-- Name: idaction; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_taction ALTER COLUMN idaction SET DEFAULT nextval('acms_taction_idaction_seq'::regclass);


--
-- Name: idaddress; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_taddress ALTER COLUMN idaddress SET DEFAULT nextval('acms_taddress_idaddress_seq'::regclass);


--
-- Name: idcharge; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tcharge ALTER COLUMN idcharge SET DEFAULT nextval('acms_tcharge_idcharge_seq'::regclass);


--
-- Name: idcontact; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tcontact ALTER COLUMN idcontact SET DEFAULT nextval('acms_tcontact_idcontact_seq'::regclass);


--
-- Name: idcharge_service_action; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tdcharge_service_action ALTER COLUMN idcharge_service_action SET DEFAULT nextval('acms_tdcharge_service_action_idcharge_service_action_seq'::regclass);


--
-- Name: idpassword; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tdpassword ALTER COLUMN idpassword SET DEFAULT nextval('acms_tdpassword_idpassword_seq'::regclass);


--
-- Name: idquestion_answer; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tdquestion_answer ALTER COLUMN idquestion_answer SET DEFAULT nextval('acms_tdquestion_answer_idquestion_answer_seq'::regclass);


--
-- Name: idservice_action; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tdservice_action ALTER COLUMN idservice_action SET DEFAULT nextval('acms_tdservice_action_idservice_action_seq'::regclass);


--
-- Name: iddslider; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tdslider ALTER COLUMN iddslider SET DEFAULT nextval('acms_tdslider_iddslider_seq'::regclass);


--
-- Name: iduser_service_ordered; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tduser_service_ordered ALTER COLUMN iduser_service_ordered SET DEFAULT nextval('acms_tduser_service_ordered_iduser_service_ordered_seq'::regclass);


--
-- Name: idethnicity; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tethnicity ALTER COLUMN idethnicity SET DEFAULT nextval('acms_tethnicity_idethnicity_seq'::regclass);


--
-- Name: idgallery; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tgallery ALTER COLUMN idgallery SET DEFAULT nextval('acms_tgallery_idgallery_seq'::regclass);


--
-- Name: idicon; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_ticon ALTER COLUMN idicon SET DEFAULT nextval('acms_ticon_idicon_seq'::regclass);


--
-- Name: idlog_access; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tlog_access ALTER COLUMN idlog_access SET DEFAULT nextval('acms_tlog_access_idlog_access_seq'::regclass);


--
-- Name: idlog_movement; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tlog_movement ALTER COLUMN idlog_movement SET DEFAULT nextval('acms_tlog_movement_idlog_movement_seq'::regclass);


--
-- Name: idlog_report; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tlog_report ALTER COLUMN idlog_report SET DEFAULT nextval('acms_tlog_report_idlog_report_seq'::regclass);


--
-- Name: idnationality; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tnationality ALTER COLUMN idnationality SET DEFAULT nextval('acms_tnationality_idnationality_seq'::regclass);


--
-- Name: idnotice; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tnotice ALTER COLUMN idnotice SET DEFAULT nextval('acms_tnotice_idnotice_seq'::regclass);


--
-- Name: idpage; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tpage ALTER COLUMN idpage SET DEFAULT nextval('acms_tpage_idpage_seq'::regclass);


--
-- Name: idperson; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tperson ALTER COLUMN idperson SET DEFAULT nextval('acms_tperson_idperson_seq'::regclass);


--
-- Name: idportfolio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tportfolio ALTER COLUMN idportfolio SET DEFAULT nextval('acms_tportfolio_idportfolio_seq'::regclass);


--
-- Name: idpost; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tpost ALTER COLUMN idpost SET DEFAULT nextval('acms_tpost_idpost_seq'::regclass);


--
-- Name: idservice; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tservice ALTER COLUMN idservice SET DEFAULT nextval('acms_tservice_idservice_seq'::regclass);


--
-- Name: idservicehome; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tservicehome ALTER COLUMN idservicehome SET DEFAULT nextval('acms_tservicehome_idservicehome_seq'::regclass);


--
-- Name: idslider; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tslider ALTER COLUMN idslider SET DEFAULT nextval('acms_tslider_idslider_seq'::regclass);


--
-- Name: idsocial_network; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tsocial_network ALTER COLUMN idsocial_network SET DEFAULT nextval('acms_tsocial_network_idsocial_network_seq'::regclass);


--
-- Name: idtheme; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_ttheme ALTER COLUMN idtheme SET DEFAULT nextval('acms_ttheme_idtheme_seq'::regclass);


--
-- Name: idtheme_origin; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_ttheme_origin ALTER COLUMN idtheme_origin SET DEFAULT nextval('acms_ttheme_origin_idtheme_origin_seq'::regclass);


--
-- Name: iduser; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tuser ALTER COLUMN iduser SET DEFAULT nextval('acms_tuser_iduser_seq'::regclass);


--
-- Data for Name: acms_taction; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_taction VALUES (1, 'Agregar', 1, 2, '1');
INSERT INTO acms_taction VALUES (2, 'Editar', 2, 71, '1');
INSERT INTO acms_taction VALUES (3, 'Consultar', 3, 11, '1');
INSERT INTO acms_taction VALUES (4, 'Activar', 4, 20, '1');
INSERT INTO acms_taction VALUES (5, 'Desactivar', 5, 21, '1');
INSERT INTO acms_taction VALUES (6, 'Generar', 6, 1, '1');
INSERT INTO acms_taction VALUES (7, 'Eliminar', 7, 27, '1');


--
-- Name: acms_taction_idaction_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_taction_idaction_seq', 7, false);


--
-- Data for Name: acms_taddress; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_taddress VALUES (1, 0, 'VENEZUELA', '1');
INSERT INTO acms_taddress VALUES (2, 1, 'DTTO. CAPITAL', '1');
INSERT INTO acms_taddress VALUES (3, 1, 'ANZOATEGUI', '1');
INSERT INTO acms_taddress VALUES (4, 1, 'APURE', '1');
INSERT INTO acms_taddress VALUES (5, 1, 'ARAGUA', '1');
INSERT INTO acms_taddress VALUES (6, 1, 'BARINAS', '1');
INSERT INTO acms_taddress VALUES (7, 1, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (8, 1, 'CARABOBO', '1');
INSERT INTO acms_taddress VALUES (9, 1, 'COJEDES', '1');
INSERT INTO acms_taddress VALUES (10, 1, 'FALCON', '1');
INSERT INTO acms_taddress VALUES (11, 1, 'GUARICO', '1');
INSERT INTO acms_taddress VALUES (12, 1, 'LARA', '1');
INSERT INTO acms_taddress VALUES (13, 1, 'MERIDA', '1');
INSERT INTO acms_taddress VALUES (14, 1, 'MIRANDA', '1');
INSERT INTO acms_taddress VALUES (15, 1, 'MONAGAS', '1');
INSERT INTO acms_taddress VALUES (16, 1, 'NUEVA ESPARTA', '1');
INSERT INTO acms_taddress VALUES (17, 1, 'PORTUGUESA', '1');
INSERT INTO acms_taddress VALUES (18, 1, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (19, 1, 'TACHIRA', '1');
INSERT INTO acms_taddress VALUES (20, 1, 'TRUJILLO', '1');
INSERT INTO acms_taddress VALUES (21, 1, 'YARACUY', '1');
INSERT INTO acms_taddress VALUES (22, 1, 'ZULIA', '1');
INSERT INTO acms_taddress VALUES (23, 1, 'AMAZONAS', '1');
INSERT INTO acms_taddress VALUES (24, 1, 'DELTA AMACURO', '1');
INSERT INTO acms_taddress VALUES (25, 1, 'VARGAS', '1');
INSERT INTO acms_taddress VALUES (26, 2, 'LIBERTADOR', '1');
INSERT INTO acms_taddress VALUES (27, 3, 'ANACO', '1');
INSERT INTO acms_taddress VALUES (28, 3, 'ARAGUA', '1');
INSERT INTO acms_taddress VALUES (29, 3, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (30, 3, 'BRUZUAL', '1');
INSERT INTO acms_taddress VALUES (31, 3, 'CAJIGAL', '1');
INSERT INTO acms_taddress VALUES (32, 3, 'FREITES', '1');
INSERT INTO acms_taddress VALUES (33, 3, 'INDEPENDENCIA', '1');
INSERT INTO acms_taddress VALUES (34, 3, 'LIBERTAD', '1');
INSERT INTO acms_taddress VALUES (35, 3, 'MIRANDA', '1');
INSERT INTO acms_taddress VALUES (36, 3, 'MONAGAS', '1');
INSERT INTO acms_taddress VALUES (37, 3, 'PEÃ‘ALVER', '1');
INSERT INTO acms_taddress VALUES (38, 3, 'SIMON RODRIGUEZ', '1');
INSERT INTO acms_taddress VALUES (39, 3, 'SOTILLO', '1');
INSERT INTO acms_taddress VALUES (40, 3, 'GUANIPA', '1');
INSERT INTO acms_taddress VALUES (41, 3, 'GUANTA', '1');
INSERT INTO acms_taddress VALUES (42, 3, 'PIRITU', '1');
INSERT INTO acms_taddress VALUES (43, 3, 'M.L/DIEGO BAUTISTA U', '1');
INSERT INTO acms_taddress VALUES (44, 3, 'CARVAJAL', '1');
INSERT INTO acms_taddress VALUES (45, 3, 'SANTA ANA', '1');
INSERT INTO acms_taddress VALUES (46, 3, 'MC GREGOR', '1');
INSERT INTO acms_taddress VALUES (47, 3, 'S JUAN CAPISTRANO', '1');
INSERT INTO acms_taddress VALUES (48, 4, 'ACHAGUAS', '1');
INSERT INTO acms_taddress VALUES (49, 4, 'MUÃ‘OZ', '1');
INSERT INTO acms_taddress VALUES (50, 4, 'PAEZ', '1');
INSERT INTO acms_taddress VALUES (51, 4, 'PEDRO CAMEJO', '1');
INSERT INTO acms_taddress VALUES (52, 4, 'ROMULO GALLEGOS', '1');
INSERT INTO acms_taddress VALUES (53, 4, 'SAN FERNANDO', '1');
INSERT INTO acms_taddress VALUES (54, 4, 'BIRUACA', '1');
INSERT INTO acms_taddress VALUES (55, 5, 'GIRARDOT', '1');
INSERT INTO acms_taddress VALUES (56, 5, 'SANTIAGO MARIÃ‘O', '1');
INSERT INTO acms_taddress VALUES (57, 5, 'JOSE FELIX RIVAS', '1');
INSERT INTO acms_taddress VALUES (58, 5, 'SAN CASIMIRO', '1');
INSERT INTO acms_taddress VALUES (59, 5, 'SAN SEBASTIAN', '1');
INSERT INTO acms_taddress VALUES (60, 5, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (61, 5, 'URDANETA', '1');
INSERT INTO acms_taddress VALUES (62, 5, 'ZAMORA', '1');
INSERT INTO acms_taddress VALUES (63, 5, 'LIBERTADOR', '1');
INSERT INTO acms_taddress VALUES (64, 5, 'JOSE ANGEL LAMAS', '1');
INSERT INTO acms_taddress VALUES (65, 5, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (66, 5, 'SANTOS MICHELENA', '1');
INSERT INTO acms_taddress VALUES (67, 5, 'MARIO B IRAGORRY', '1');
INSERT INTO acms_taddress VALUES (68, 5, 'TOVAR', '1');
INSERT INTO acms_taddress VALUES (69, 5, 'CAMATAGUA', '1');
INSERT INTO acms_taddress VALUES (70, 5, 'JOSE R REVENGA', '1');
INSERT INTO acms_taddress VALUES (71, 5, 'FRANCISCO LINARES A.', '1');
INSERT INTO acms_taddress VALUES (72, 5, 'M.OCUMARE D LA COSTA', '1');
INSERT INTO acms_taddress VALUES (73, 6, 'ARISMENDI', '1');
INSERT INTO acms_taddress VALUES (74, 6, 'BARINAS', '1');
INSERT INTO acms_taddress VALUES (75, 6, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (76, 6, 'EZEQUIEL ZAMORA', '1');
INSERT INTO acms_taddress VALUES (77, 6, 'OBISPOS', '1');
INSERT INTO acms_taddress VALUES (78, 6, 'PEDRAZA', '1');
INSERT INTO acms_taddress VALUES (79, 6, 'ROJAS', '1');
INSERT INTO acms_taddress VALUES (80, 6, 'SOSA', '1');
INSERT INTO acms_taddress VALUES (81, 6, 'ALBERTO ARVELO T', '1');
INSERT INTO acms_taddress VALUES (82, 6, 'A JOSE DE SUCRE', '1');
INSERT INTO acms_taddress VALUES (83, 6, 'CRUZ PAREDES', '1');
INSERT INTO acms_taddress VALUES (84, 6, 'ANDRES E. BLANCO', '1');
INSERT INTO acms_taddress VALUES (85, 7, 'CARONI', '1');
INSERT INTO acms_taddress VALUES (86, 7, 'CEDEÃ‘O', '1');
INSERT INTO acms_taddress VALUES (87, 7, 'HERES', '1');
INSERT INTO acms_taddress VALUES (88, 7, 'PIAR', '1');
INSERT INTO acms_taddress VALUES (89, 7, 'ROSCIO', '1');
INSERT INTO acms_taddress VALUES (90, 7, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (91, 7, 'SIFONTES', '1');
INSERT INTO acms_taddress VALUES (92, 7, 'RAUL LEONI', '1');
INSERT INTO acms_taddress VALUES (93, 7, 'GRAN SABANA', '1');
INSERT INTO acms_taddress VALUES (94, 7, 'EL CALLAO', '1');
INSERT INTO acms_taddress VALUES (95, 7, 'PADRE PEDRO CHIEN', '1');
INSERT INTO acms_taddress VALUES (96, 8, 'BEJUMA', '1');
INSERT INTO acms_taddress VALUES (97, 8, 'CARLOS ARVELO', '1');
INSERT INTO acms_taddress VALUES (98, 8, 'DIEGO IBARRA', '1');
INSERT INTO acms_taddress VALUES (99, 8, 'GUACARA', '1');
INSERT INTO acms_taddress VALUES (100, 8, 'MONTALBAN', '1');
INSERT INTO acms_taddress VALUES (101, 8, 'JUAN JOSE MORA', '1');
INSERT INTO acms_taddress VALUES (102, 8, 'PUERTO CABELLO', '1');
INSERT INTO acms_taddress VALUES (103, 8, 'SAN JOAQUIN', '1');
INSERT INTO acms_taddress VALUES (104, 8, 'VALENCIA', '1');
INSERT INTO acms_taddress VALUES (105, 8, 'MIRANDA', '1');
INSERT INTO acms_taddress VALUES (106, 8, 'LOS GUAYOS', '1');
INSERT INTO acms_taddress VALUES (107, 8, 'NAGUANAGUA', '1');
INSERT INTO acms_taddress VALUES (108, 8, 'SAN DIEGO', '1');
INSERT INTO acms_taddress VALUES (109, 8, 'LIBERTADOR', '1');
INSERT INTO acms_taddress VALUES (110, 9, 'ANZOATEGUI', '1');
INSERT INTO acms_taddress VALUES (111, 9, 'FALCON', '1');
INSERT INTO acms_taddress VALUES (112, 9, 'GIRARDOT', '1');
INSERT INTO acms_taddress VALUES (113, 9, 'MP PAO SN J BAUTISTA', '1');
INSERT INTO acms_taddress VALUES (114, 9, 'RICAURTE', '1');
INSERT INTO acms_taddress VALUES (115, 9, 'SAN CARLOS', '1');
INSERT INTO acms_taddress VALUES (116, 9, 'TINACO', '1');
INSERT INTO acms_taddress VALUES (117, 9, 'LIMA BLANCO', '1');
INSERT INTO acms_taddress VALUES (118, 9, 'ROMULO GALLEGOS', '1');
INSERT INTO acms_taddress VALUES (119, 10, 'ACOSTA', '1');
INSERT INTO acms_taddress VALUES (120, 10, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (121, 10, 'BUCHIVACOA', '1');
INSERT INTO acms_taddress VALUES (122, 10, 'CARIRUBANA', '1');
INSERT INTO acms_taddress VALUES (123, 10, 'COLINA', '1');
INSERT INTO acms_taddress VALUES (124, 10, 'DEMOCRACIA', '1');
INSERT INTO acms_taddress VALUES (125, 10, 'FALCON', '1');
INSERT INTO acms_taddress VALUES (126, 10, 'FEDERACION', '1');
INSERT INTO acms_taddress VALUES (127, 10, 'MAUROA', '1');
INSERT INTO acms_taddress VALUES (128, 10, 'MIRANDA', '1');
INSERT INTO acms_taddress VALUES (129, 10, 'PETIT', '1');
INSERT INTO acms_taddress VALUES (130, 10, 'SILVA', '1');
INSERT INTO acms_taddress VALUES (131, 10, 'ZAMORA', '1');
INSERT INTO acms_taddress VALUES (132, 10, 'DABAJURO', '1');
INSERT INTO acms_taddress VALUES (133, 10, 'MONS. ITURRIZA', '1');
INSERT INTO acms_taddress VALUES (134, 10, 'LOS TAQUES', '1');
INSERT INTO acms_taddress VALUES (135, 10, 'PIRITU', '1');
INSERT INTO acms_taddress VALUES (136, 10, 'UNION', '1');
INSERT INTO acms_taddress VALUES (137, 10, 'SAN FRANCISCO', '1');
INSERT INTO acms_taddress VALUES (138, 10, 'JACURA', '1');
INSERT INTO acms_taddress VALUES (139, 10, 'CACIQUE MANAURE', '1');
INSERT INTO acms_taddress VALUES (140, 10, 'PALMA SOLA', '1');
INSERT INTO acms_taddress VALUES (141, 10, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (142, 10, 'URUMACO', '1');
INSERT INTO acms_taddress VALUES (143, 10, 'TOCOPERO', '1');
INSERT INTO acms_taddress VALUES (144, 11, 'INFANTE', '1');
INSERT INTO acms_taddress VALUES (145, 11, 'MELLADO', '1');
INSERT INTO acms_taddress VALUES (146, 11, 'MIRANDA', '1');
INSERT INTO acms_taddress VALUES (147, 11, 'MONAGAS', '1');
INSERT INTO acms_taddress VALUES (148, 11, 'RIBAS', '1');
INSERT INTO acms_taddress VALUES (149, 11, 'ROSCIO', '1');
INSERT INTO acms_taddress VALUES (150, 11, 'ZARAZA', '1');
INSERT INTO acms_taddress VALUES (151, 11, 'CAMAGUAN', '1');
INSERT INTO acms_taddress VALUES (152, 11, 'S JOSE DE GUARIBE', '1');
INSERT INTO acms_taddress VALUES (153, 11, 'LAS MERCEDES', '1');
INSERT INTO acms_taddress VALUES (154, 11, 'EL SOCORRO', '1');
INSERT INTO acms_taddress VALUES (155, 11, 'ORTIZ', '1');
INSERT INTO acms_taddress VALUES (156, 11, 'S MARIA DE IPIRE', '1');
INSERT INTO acms_taddress VALUES (157, 11, 'CHAGUARAMAS', '1');
INSERT INTO acms_taddress VALUES (158, 11, 'SAN GERONIMO DE G', '1');
INSERT INTO acms_taddress VALUES (159, 12, 'CRESPO', '1');
INSERT INTO acms_taddress VALUES (160, 12, 'IRIBARREN', '1');
INSERT INTO acms_taddress VALUES (161, 12, 'JIMENEZ', '1');
INSERT INTO acms_taddress VALUES (162, 12, 'MORAN', '1');
INSERT INTO acms_taddress VALUES (163, 12, 'PALAVECINO', '1');
INSERT INTO acms_taddress VALUES (164, 12, 'TORRES', '1');
INSERT INTO acms_taddress VALUES (165, 12, 'URDANETA', '1');
INSERT INTO acms_taddress VALUES (166, 12, 'ANDRES E BLANCO', '1');
INSERT INTO acms_taddress VALUES (167, 12, 'SIMON PLANAS', '1');
INSERT INTO acms_taddress VALUES (168, 13, 'ALBERTO ADRIANI', '1');
INSERT INTO acms_taddress VALUES (169, 13, 'ANDRES BELLO', '1');
INSERT INTO acms_taddress VALUES (170, 13, 'ARZOBISPO CHACON', '1');
INSERT INTO acms_taddress VALUES (171, 13, 'CAMPO ELIAS', '1');
INSERT INTO acms_taddress VALUES (172, 13, 'GUARAQUE', '1');
INSERT INTO acms_taddress VALUES (173, 13, 'JULIO CESAR SALAS', '1');
INSERT INTO acms_taddress VALUES (174, 13, 'JUSTO BRICEÃ‘O', '1');
INSERT INTO acms_taddress VALUES (175, 13, 'LIBERTADOR', '1');
INSERT INTO acms_taddress VALUES (176, 13, 'SANTOS MARQUINA', '1');
INSERT INTO acms_taddress VALUES (177, 13, 'MIRANDA', '1');
INSERT INTO acms_taddress VALUES (178, 13, 'ANTONIO PINTO S.', '1');
INSERT INTO acms_taddress VALUES (179, 13, 'OB. RAMOS DE LORA', '1');
INSERT INTO acms_taddress VALUES (180, 13, 'CARACCIOLO PARRA', '1');
INSERT INTO acms_taddress VALUES (181, 13, 'CARDENAL QUINTERO', '1');
INSERT INTO acms_taddress VALUES (182, 13, 'PUEBLO LLANO', '1');
INSERT INTO acms_taddress VALUES (183, 13, 'RANGEL', '1');
INSERT INTO acms_taddress VALUES (184, 13, 'RIVAS DAVILA', '1');
INSERT INTO acms_taddress VALUES (185, 13, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (186, 13, 'TOVAR', '1');
INSERT INTO acms_taddress VALUES (187, 13, 'TULIO F CORDERO', '1');
INSERT INTO acms_taddress VALUES (188, 13, 'PADRE NOGUERA', '1');
INSERT INTO acms_taddress VALUES (189, 13, 'ARICAGUA', '1');
INSERT INTO acms_taddress VALUES (190, 13, 'ZEA', '1');
INSERT INTO acms_taddress VALUES (191, 14, 'ACEVEDO', '1');
INSERT INTO acms_taddress VALUES (192, 14, 'BRION', '1');
INSERT INTO acms_taddress VALUES (193, 14, 'GUAICAIPURO', '1');
INSERT INTO acms_taddress VALUES (194, 14, 'INDEPENDENCIA', '1');
INSERT INTO acms_taddress VALUES (195, 14, 'LANDER', '1');
INSERT INTO acms_taddress VALUES (196, 14, 'PAEZ', '1');
INSERT INTO acms_taddress VALUES (197, 14, 'PAZ CASTILLO', '1');
INSERT INTO acms_taddress VALUES (198, 14, 'PLAZA', '1');
INSERT INTO acms_taddress VALUES (199, 14, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (200, 14, 'URDANETA', '1');
INSERT INTO acms_taddress VALUES (201, 14, 'ZAMORA', '1');
INSERT INTO acms_taddress VALUES (202, 14, 'CRISTOBAL ROJAS', '1');
INSERT INTO acms_taddress VALUES (203, 14, 'LOS SALIAS', '1');
INSERT INTO acms_taddress VALUES (204, 14, 'ANDRES BELLO', '1');
INSERT INTO acms_taddress VALUES (205, 14, 'SIMON BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (206, 14, 'BARUTA', '1');
INSERT INTO acms_taddress VALUES (207, 14, 'CARRIZAL', '1');
INSERT INTO acms_taddress VALUES (208, 14, 'CHACAO', '1');
INSERT INTO acms_taddress VALUES (209, 14, 'EL HATILLO', '1');
INSERT INTO acms_taddress VALUES (210, 14, 'BUROZ', '1');
INSERT INTO acms_taddress VALUES (211, 14, 'PEDRO GUAL', '1');
INSERT INTO acms_taddress VALUES (212, 15, 'ACOSTA', '1');
INSERT INTO acms_taddress VALUES (213, 15, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (214, 15, 'CARIPE', '1');
INSERT INTO acms_taddress VALUES (215, 15, 'CEDEÃ‘O', '1');
INSERT INTO acms_taddress VALUES (216, 15, 'EZEQUIEL ZAMORA', '1');
INSERT INTO acms_taddress VALUES (217, 15, 'LIBERTADOR', '1');
INSERT INTO acms_taddress VALUES (218, 15, 'MATURIN', '1');
INSERT INTO acms_taddress VALUES (219, 15, 'PIAR', '1');
INSERT INTO acms_taddress VALUES (220, 15, 'PUNCERES', '1');
INSERT INTO acms_taddress VALUES (221, 15, 'SOTILLO', '1');
INSERT INTO acms_taddress VALUES (222, 15, 'AGUASAY', '1');
INSERT INTO acms_taddress VALUES (223, 15, 'SANTA BARBARA', '1');
INSERT INTO acms_taddress VALUES (224, 15, 'URACOA', '1');
INSERT INTO acms_taddress VALUES (225, 16, 'ARISMENDI', '1');
INSERT INTO acms_taddress VALUES (226, 16, 'DIAZ', '1');
INSERT INTO acms_taddress VALUES (227, 16, 'GOMEZ', '1');
INSERT INTO acms_taddress VALUES (228, 16, 'MANEIRO', '1');
INSERT INTO acms_taddress VALUES (229, 16, 'MARCANO', '1');
INSERT INTO acms_taddress VALUES (230, 16, 'MARIÃ‘O', '1');
INSERT INTO acms_taddress VALUES (231, 16, 'PENIN. DE MACANAO', '1');
INSERT INTO acms_taddress VALUES (232, 16, 'VILLALBA(HE)', '1');
INSERT INTO acms_taddress VALUES (233, 16, 'TUBORES', '1');
INSERT INTO acms_taddress VALUES (234, 16, 'ANTOLIN DEL CAMPO', '1');
INSERT INTO acms_taddress VALUES (235, 16, 'GARCIA', '1');
INSERT INTO acms_taddress VALUES (236, 17, 'ARAURE', '1');
INSERT INTO acms_taddress VALUES (237, 17, 'ESTELLER', '1');
INSERT INTO acms_taddress VALUES (238, 17, 'GUANARE', '1');
INSERT INTO acms_taddress VALUES (239, 17, 'GUANARITO', '1');
INSERT INTO acms_taddress VALUES (240, 17, 'OSPINO', '1');
INSERT INTO acms_taddress VALUES (241, 17, 'PAEZ', '1');
INSERT INTO acms_taddress VALUES (242, 17, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (243, 17, 'TUREN', '1');
INSERT INTO acms_taddress VALUES (244, 17, 'M.JOSE V DE UNDA', '1');
INSERT INTO acms_taddress VALUES (245, 17, 'AGUA BLANCA', '1');
INSERT INTO acms_taddress VALUES (246, 17, 'PAPELON', '1');
INSERT INTO acms_taddress VALUES (247, 17, 'GENARO BOCONOITO', '1');
INSERT INTO acms_taddress VALUES (248, 17, 'S RAFAEL DE ONOTO', '1');
INSERT INTO acms_taddress VALUES (249, 17, 'SANTA ROSALIA', '1');
INSERT INTO acms_taddress VALUES (250, 18, 'ARISMENDI', '1');
INSERT INTO acms_taddress VALUES (251, 18, 'BENITEZ', '1');
INSERT INTO acms_taddress VALUES (252, 18, 'BERMUDEZ', '1');
INSERT INTO acms_taddress VALUES (253, 18, 'CAJIGAL', '1');
INSERT INTO acms_taddress VALUES (254, 18, 'MARIÃ‘O', '1');
INSERT INTO acms_taddress VALUES (255, 18, 'MEJIA', '1');
INSERT INTO acms_taddress VALUES (256, 18, 'MONTES', '1');
INSERT INTO acms_taddress VALUES (257, 18, 'RIBERO', '1');
INSERT INTO acms_taddress VALUES (258, 18, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (259, 18, 'VALDEZ', '1');
INSERT INTO acms_taddress VALUES (260, 18, 'ANDRES E BLANCO', '1');
INSERT INTO acms_taddress VALUES (261, 18, 'LIBERTADOR', '1');
INSERT INTO acms_taddress VALUES (262, 18, 'ANDRES MATA', '1');
INSERT INTO acms_taddress VALUES (263, 18, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (264, 18, 'CRUZ S ACOSTA', '1');
INSERT INTO acms_taddress VALUES (265, 19, 'AYACUCHO', '1');
INSERT INTO acms_taddress VALUES (266, 19, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (267, 19, 'INDEPENDENCIA', '1');
INSERT INTO acms_taddress VALUES (268, 19, 'CARDENAS', '1');
INSERT INTO acms_taddress VALUES (269, 19, 'JAUREGUI', '1');
INSERT INTO acms_taddress VALUES (270, 19, 'JUNIN', '1');
INSERT INTO acms_taddress VALUES (271, 19, 'LOBATERA', '1');
INSERT INTO acms_taddress VALUES (272, 19, 'SAN CRISTOBAL', '1');
INSERT INTO acms_taddress VALUES (273, 19, 'URIBANTE', '1');
INSERT INTO acms_taddress VALUES (274, 19, 'CORDOBA', '1');
INSERT INTO acms_taddress VALUES (275, 19, 'GARCIA DE HEVIA', '1');
INSERT INTO acms_taddress VALUES (276, 19, 'GUASIMOS', '1');
INSERT INTO acms_taddress VALUES (277, 19, 'MICHELENA', '1');
INSERT INTO acms_taddress VALUES (278, 19, 'LIBERTADOR', '1');
INSERT INTO acms_taddress VALUES (279, 19, 'PANAMERICANO', '1');
INSERT INTO acms_taddress VALUES (280, 19, 'PEDRO MARIA UREÃ‘A', '1');
INSERT INTO acms_taddress VALUES (281, 19, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (282, 19, 'ANDRES BELLO', '1');
INSERT INTO acms_taddress VALUES (283, 19, 'FERNANDEZ FEO', '1');
INSERT INTO acms_taddress VALUES (284, 19, 'LIBERTAD', '1');
INSERT INTO acms_taddress VALUES (285, 19, 'SAMUEL MALDONADO', '1');
INSERT INTO acms_taddress VALUES (286, 19, 'SEBORUCO', '1');
INSERT INTO acms_taddress VALUES (287, 19, 'ANTONIO ROMULO C', '1');
INSERT INTO acms_taddress VALUES (288, 19, 'FCO DE MIRANDA', '1');
INSERT INTO acms_taddress VALUES (289, 19, 'JOSE MARIA VARGA', '1');
INSERT INTO acms_taddress VALUES (290, 19, 'RAFAEL URDANETA', '1');
INSERT INTO acms_taddress VALUES (291, 19, 'SIMON RODRIGUEZ', '1');
INSERT INTO acms_taddress VALUES (292, 19, 'TORBES', '1');
INSERT INTO acms_taddress VALUES (293, 19, 'SAN JUDAS TADEO', '1');
INSERT INTO acms_taddress VALUES (294, 20, 'RAFAEL RANGEL', '1');
INSERT INTO acms_taddress VALUES (295, 20, 'BOCONO', '1');
INSERT INTO acms_taddress VALUES (296, 20, 'CARACHE', '1');
INSERT INTO acms_taddress VALUES (297, 20, 'ESCUQUE', '1');
INSERT INTO acms_taddress VALUES (298, 20, 'TRUJILLO', '1');
INSERT INTO acms_taddress VALUES (299, 20, 'URDANETA', '1');
INSERT INTO acms_taddress VALUES (300, 20, 'VALERA', '1');
INSERT INTO acms_taddress VALUES (301, 20, 'CANDELARIA', '1');
INSERT INTO acms_taddress VALUES (302, 20, 'MIRANDA', '1');
INSERT INTO acms_taddress VALUES (303, 20, 'MONTE CARMELO', '1');
INSERT INTO acms_taddress VALUES (304, 20, 'MOTATAN', '1');
INSERT INTO acms_taddress VALUES (305, 20, 'PAMPAN', '1');
INSERT INTO acms_taddress VALUES (306, 20, 'S RAFAEL CARVAJAL', '1');
INSERT INTO acms_taddress VALUES (307, 20, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (308, 20, 'ANDRES BELLO', '1');
INSERT INTO acms_taddress VALUES (309, 20, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (310, 20, 'JOSE F M CAÃ‘IZAL', '1');
INSERT INTO acms_taddress VALUES (311, 20, 'JUAN V CAMPO ELI', '1');
INSERT INTO acms_taddress VALUES (312, 20, 'LA CEIBA', '1');
INSERT INTO acms_taddress VALUES (313, 20, 'PAMPANITO', '1');
INSERT INTO acms_taddress VALUES (314, 21, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (315, 21, 'BRUZUAL', '1');
INSERT INTO acms_taddress VALUES (316, 21, 'NIRGUA', '1');
INSERT INTO acms_taddress VALUES (317, 21, 'SAN FELIPE', '1');
INSERT INTO acms_taddress VALUES (318, 21, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (319, 21, 'URACHICHE', '1');
INSERT INTO acms_taddress VALUES (320, 21, 'PEÃ‘A', '1');
INSERT INTO acms_taddress VALUES (321, 21, 'JOSE ANTONIO PAEZ', '1');
INSERT INTO acms_taddress VALUES (322, 21, 'LA TRINIDAD', '1');
INSERT INTO acms_taddress VALUES (323, 21, 'COCOROTE', '1');
INSERT INTO acms_taddress VALUES (324, 21, 'INDEPENDENCIA', '1');
INSERT INTO acms_taddress VALUES (325, 21, 'ARISTIDES BASTID', '1');
INSERT INTO acms_taddress VALUES (326, 21, 'MANUEL MONGE', '1');
INSERT INTO acms_taddress VALUES (327, 21, 'VEROES', '1');
INSERT INTO acms_taddress VALUES (328, 22, 'BARALT', '1');
INSERT INTO acms_taddress VALUES (329, 22, 'SANTA RITA', '1');
INSERT INTO acms_taddress VALUES (330, 22, 'COLON', '1');
INSERT INTO acms_taddress VALUES (331, 22, 'MARA', '1');
INSERT INTO acms_taddress VALUES (332, 22, 'MARACAIBO', '1');
INSERT INTO acms_taddress VALUES (333, 22, 'MIRANDA', '1');
INSERT INTO acms_taddress VALUES (334, 22, 'PAEZ', '1');
INSERT INTO acms_taddress VALUES (335, 22, 'MACHIQUES DE P', '1');
INSERT INTO acms_taddress VALUES (336, 22, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (337, 22, 'LA CAÃ‘ADA DE U.', '1');
INSERT INTO acms_taddress VALUES (338, 22, 'LAGUNILLAS', '1');
INSERT INTO acms_taddress VALUES (339, 22, 'CATATUMBO', '1');
INSERT INTO acms_taddress VALUES (340, 22, 'M/ROSARIO DE PERIJA', '1');
INSERT INTO acms_taddress VALUES (341, 22, 'CABIMAS', '1');
INSERT INTO acms_taddress VALUES (342, 22, 'VALMORE RODRIGUEZ', '1');
INSERT INTO acms_taddress VALUES (343, 22, 'JESUS E LOSSADA', '1');
INSERT INTO acms_taddress VALUES (344, 22, 'ALMIRANTE P', '1');
INSERT INTO acms_taddress VALUES (345, 22, 'SAN FRANCISCO', '1');
INSERT INTO acms_taddress VALUES (346, 22, 'JESUS M SEMPRUN', '1');
INSERT INTO acms_taddress VALUES (347, 22, 'FRANCISCO J PULG', '1');
INSERT INTO acms_taddress VALUES (348, 22, 'SIMON BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (349, 23, 'ATURES', '1');
INSERT INTO acms_taddress VALUES (350, 23, 'ATABAPO', '1');
INSERT INTO acms_taddress VALUES (351, 23, 'MAROA', '1');
INSERT INTO acms_taddress VALUES (352, 23, 'RIO NEGRO', '1');
INSERT INTO acms_taddress VALUES (353, 23, 'AUTANA', '1');
INSERT INTO acms_taddress VALUES (354, 23, 'MANAPIARE', '1');
INSERT INTO acms_taddress VALUES (355, 23, 'ALTO ORINOCO', '1');
INSERT INTO acms_taddress VALUES (356, 24, 'TUCUPITA', '1');
INSERT INTO acms_taddress VALUES (357, 24, 'PEDERNALES', '1');
INSERT INTO acms_taddress VALUES (358, 24, 'ANTONIO DIAZ', '1');
INSERT INTO acms_taddress VALUES (359, 24, 'CASACOIMA', '1');
INSERT INTO acms_taddress VALUES (360, 25, 'VARGAS', '1');
INSERT INTO acms_taddress VALUES (361, 26, 'ALTAGRACIA', '1');
INSERT INTO acms_taddress VALUES (362, 26, 'CANDELARIA', '1');
INSERT INTO acms_taddress VALUES (363, 26, 'CATEDRAL', '1');
INSERT INTO acms_taddress VALUES (364, 26, 'LA PASTORA', '1');
INSERT INTO acms_taddress VALUES (365, 26, 'SAN AGUSTIN', '1');
INSERT INTO acms_taddress VALUES (366, 26, 'SAN JOSE', '1');
INSERT INTO acms_taddress VALUES (367, 26, 'SAN JUAN', '1');
INSERT INTO acms_taddress VALUES (368, 26, 'SANTA ROSALIA', '1');
INSERT INTO acms_taddress VALUES (369, 26, 'SANTA TERESA', '1');
INSERT INTO acms_taddress VALUES (370, 26, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (371, 26, '23 DE ENERO', '1');
INSERT INTO acms_taddress VALUES (372, 26, 'ANTIMANO', '1');
INSERT INTO acms_taddress VALUES (373, 26, 'EL RECREO', '1');
INSERT INTO acms_taddress VALUES (374, 26, 'EL VALLE', '1');
INSERT INTO acms_taddress VALUES (375, 26, 'LA VEGA', '1');
INSERT INTO acms_taddress VALUES (376, 26, 'MACARAO', '1');
INSERT INTO acms_taddress VALUES (377, 26, 'CARICUAO', '1');
INSERT INTO acms_taddress VALUES (378, 26, 'EL JUNQUITO', '1');
INSERT INTO acms_taddress VALUES (379, 26, 'COCHE', '1');
INSERT INTO acms_taddress VALUES (380, 26, 'SAN PEDRO', '1');
INSERT INTO acms_taddress VALUES (381, 26, 'SAN BERNARDINO', '1');
INSERT INTO acms_taddress VALUES (382, 26, 'EL PARAISO', '1');
INSERT INTO acms_taddress VALUES (383, 27, 'ANACO', '1');
INSERT INTO acms_taddress VALUES (384, 27, 'SAN JOAQUIN', '1');
INSERT INTO acms_taddress VALUES (385, 28, 'CM. ARAGUA DE BARCELONA', '1');
INSERT INTO acms_taddress VALUES (386, 28, 'CACHIPO', '1');
INSERT INTO acms_taddress VALUES (387, 29, 'EL CARMEN', '1');
INSERT INTO acms_taddress VALUES (388, 29, 'SAN CRISTOBAL', '1');
INSERT INTO acms_taddress VALUES (389, 29, 'BERGANTIN', '1');
INSERT INTO acms_taddress VALUES (390, 29, 'CAIGUA', '1');
INSERT INTO acms_taddress VALUES (391, 29, 'EL PILAR', '1');
INSERT INTO acms_taddress VALUES (392, 29, 'NARICUAL', '1');
INSERT INTO acms_taddress VALUES (393, 30, 'CM. CLARINES', '1');
INSERT INTO acms_taddress VALUES (394, 30, 'GUANAPE', '1');
INSERT INTO acms_taddress VALUES (395, 30, 'SABANA DE UCHIRE', '1');
INSERT INTO acms_taddress VALUES (396, 31, 'CM. ONOTO', '1');
INSERT INTO acms_taddress VALUES (397, 31, 'SAN PABLO', '1');
INSERT INTO acms_taddress VALUES (398, 32, 'CM. CANTAURA', '1');
INSERT INTO acms_taddress VALUES (399, 32, 'LIBERTADOR', '1');
INSERT INTO acms_taddress VALUES (400, 32, 'SANTA ROSA', '1');
INSERT INTO acms_taddress VALUES (401, 32, 'URICA', '1');
INSERT INTO acms_taddress VALUES (402, 33, 'CM. SOLEDAD', '1');
INSERT INTO acms_taddress VALUES (403, 33, 'MAMO', '1');
INSERT INTO acms_taddress VALUES (404, 34, 'CM. SAN MATEO', '1');
INSERT INTO acms_taddress VALUES (405, 34, 'EL CARITO', '1');
INSERT INTO acms_taddress VALUES (406, 34, 'SANTA INES', '1');
INSERT INTO acms_taddress VALUES (407, 35, 'CM. PARIAGUAN', '1');
INSERT INTO acms_taddress VALUES (408, 35, 'ATAPIRIRE', '1');
INSERT INTO acms_taddress VALUES (409, 35, 'BOCA DEL PAO', '1');
INSERT INTO acms_taddress VALUES (410, 35, 'EL PAO', '1');
INSERT INTO acms_taddress VALUES (411, 36, 'CM. MAPIRE', '1');
INSERT INTO acms_taddress VALUES (412, 36, 'PIAR', '1');
INSERT INTO acms_taddress VALUES (413, 36, 'SN DIEGO DE CABRUTICA', '1');
INSERT INTO acms_taddress VALUES (414, 36, 'SANTA CLARA', '1');
INSERT INTO acms_taddress VALUES (415, 36, 'UVERITO', '1');
INSERT INTO acms_taddress VALUES (416, 36, 'ZUATA', '1');
INSERT INTO acms_taddress VALUES (417, 37, 'CM. PUERTO PIRITU', '1');
INSERT INTO acms_taddress VALUES (418, 37, 'SAN MIGUEL', '1');
INSERT INTO acms_taddress VALUES (419, 37, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (420, 38, 'CM. EL TIGRE', '1');
INSERT INTO acms_taddress VALUES (421, 39, 'POZUELOS', '1');
INSERT INTO acms_taddress VALUES (422, 39, 'CM PTO. LA CRUZ', '1');
INSERT INTO acms_taddress VALUES (423, 40, 'CM. SAN JOSE DE GUANIPA', '1');
INSERT INTO acms_taddress VALUES (424, 41, 'GUANTA', '1');
INSERT INTO acms_taddress VALUES (425, 41, 'CHORRERON', '1');
INSERT INTO acms_taddress VALUES (426, 42, 'PIRITU', '1');
INSERT INTO acms_taddress VALUES (427, 42, 'SAN FRANCISCO', '1');
INSERT INTO acms_taddress VALUES (428, 43, 'LECHERIAS', '1');
INSERT INTO acms_taddress VALUES (429, 43, 'EL MORRO', '1');
INSERT INTO acms_taddress VALUES (430, 44, 'VALLE GUANAPE', '1');
INSERT INTO acms_taddress VALUES (431, 44, 'SANTA BARBARA', '1');
INSERT INTO acms_taddress VALUES (432, 45, 'SANTA ANA', '1');
INSERT INTO acms_taddress VALUES (433, 45, 'PUEBLO NUEVO', '1');
INSERT INTO acms_taddress VALUES (434, 46, 'EL CHAPARRO', '1');
INSERT INTO acms_taddress VALUES (435, 46, 'TOMAS ALFARO CALATRAVA', '1');
INSERT INTO acms_taddress VALUES (436, 47, 'BOCA UCHIRE', '1');
INSERT INTO acms_taddress VALUES (437, 47, 'BOCA DE CHAVEZ', '1');
INSERT INTO acms_taddress VALUES (438, 48, 'ACHAGUAS', '1');
INSERT INTO acms_taddress VALUES (439, 48, 'APURITO', '1');
INSERT INTO acms_taddress VALUES (440, 48, 'EL YAGUAL', '1');
INSERT INTO acms_taddress VALUES (441, 48, 'GUACHARA', '1');
INSERT INTO acms_taddress VALUES (442, 48, 'MUCURITAS', '1');
INSERT INTO acms_taddress VALUES (443, 48, 'QUESERAS DEL MEDIO', '1');
INSERT INTO acms_taddress VALUES (444, 49, 'BRUZUAL', '1');
INSERT INTO acms_taddress VALUES (445, 49, 'MANTECAL', '1');
INSERT INTO acms_taddress VALUES (446, 49, 'QUINTERO', '1');
INSERT INTO acms_taddress VALUES (447, 49, 'SAN VICENTE', '1');
INSERT INTO acms_taddress VALUES (448, 49, 'RINCON HONDO', '1');
INSERT INTO acms_taddress VALUES (449, 50, 'GUASDUALITO', '1');
INSERT INTO acms_taddress VALUES (450, 50, 'ARAMENDI', '1');
INSERT INTO acms_taddress VALUES (451, 50, 'EL AMPARO', '1');
INSERT INTO acms_taddress VALUES (452, 50, 'SAN CAMILO', '1');
INSERT INTO acms_taddress VALUES (453, 50, 'URDANETA', '1');
INSERT INTO acms_taddress VALUES (454, 51, 'SAN JUAN DE PAYARA', '1');
INSERT INTO acms_taddress VALUES (455, 51, 'CODAZZI', '1');
INSERT INTO acms_taddress VALUES (456, 51, 'CUNAVICHE', '1');
INSERT INTO acms_taddress VALUES (457, 52, 'ELORZA', '1');
INSERT INTO acms_taddress VALUES (458, 52, 'LA TRINIDAD', '1');
INSERT INTO acms_taddress VALUES (459, 53, 'SAN FERNANDO', '1');
INSERT INTO acms_taddress VALUES (460, 53, 'PEÃ‘ALVER', '1');
INSERT INTO acms_taddress VALUES (461, 53, 'EL RECREO', '1');
INSERT INTO acms_taddress VALUES (462, 53, 'SN RAFAEL DE ATAMAICA', '1');
INSERT INTO acms_taddress VALUES (463, 54, 'BIRUACA', '1');
INSERT INTO acms_taddress VALUES (464, 55, 'CM. LAS DELICIAS', '1');
INSERT INTO acms_taddress VALUES (465, 55, 'CHORONI', '1');
INSERT INTO acms_taddress VALUES (466, 55, 'MADRE MA DE SAN JOSE', '1');
INSERT INTO acms_taddress VALUES (467, 55, 'JOAQUIN CRESPO', '1');
INSERT INTO acms_taddress VALUES (468, 55, 'PEDRO JOSE OVALLES', '1');
INSERT INTO acms_taddress VALUES (469, 55, 'JOSE CASANOVA GODOY', '1');
INSERT INTO acms_taddress VALUES (470, 55, 'ANDRES ELOY BLANCO', '1');
INSERT INTO acms_taddress VALUES (471, 55, 'LOS TACARIGUAS', '1');
INSERT INTO acms_taddress VALUES (472, 56, 'CM. TURMERO', '1');
INSERT INTO acms_taddress VALUES (473, 56, 'SAMAN DE GUERE', '1');
INSERT INTO acms_taddress VALUES (474, 56, 'ALFREDO PACHECO M', '1');
INSERT INTO acms_taddress VALUES (475, 56, 'CHUAO', '1');
INSERT INTO acms_taddress VALUES (476, 56, 'AREVALO APONTE', '1');
INSERT INTO acms_taddress VALUES (477, 57, 'CM. LA VICTORIA', '1');
INSERT INTO acms_taddress VALUES (478, 57, 'ZUATA', '1');
INSERT INTO acms_taddress VALUES (479, 57, 'PAO DE ZARATE', '1');
INSERT INTO acms_taddress VALUES (480, 57, 'CASTOR NIEVES RIOS', '1');
INSERT INTO acms_taddress VALUES (481, 57, 'LAS GUACAMAYAS', '1');
INSERT INTO acms_taddress VALUES (482, 58, 'CM. SAN CASIMIRO', '1');
INSERT INTO acms_taddress VALUES (483, 58, 'VALLE MORIN', '1');
INSERT INTO acms_taddress VALUES (484, 58, 'GUIRIPA', '1');
INSERT INTO acms_taddress VALUES (485, 58, 'OLLAS DE CARAMACATE', '1');
INSERT INTO acms_taddress VALUES (486, 59, 'CM. SAN SEBASTIAN', '1');
INSERT INTO acms_taddress VALUES (487, 60, 'CM. CAGUA', '1');
INSERT INTO acms_taddress VALUES (488, 60, 'BELLA VISTA', '1');
INSERT INTO acms_taddress VALUES (489, 61, 'CM. BARBACOAS', '1');
INSERT INTO acms_taddress VALUES (490, 61, 'SAN FRANCISCO DE CARA', '1');
INSERT INTO acms_taddress VALUES (491, 61, 'TAGUAY', '1');
INSERT INTO acms_taddress VALUES (492, 61, 'LAS PEÃ‘ITAS', '1');
INSERT INTO acms_taddress VALUES (493, 62, 'CM. VILLA DE CURA', '1');
INSERT INTO acms_taddress VALUES (494, 62, 'MAGDALENO', '1');
INSERT INTO acms_taddress VALUES (495, 62, 'SAN FRANCISCO DE ASIS', '1');
INSERT INTO acms_taddress VALUES (496, 62, 'VALLES DE TUCUTUNEMO', '1');
INSERT INTO acms_taddress VALUES (497, 62, 'PQ AUGUSTO MIJARES', '1');
INSERT INTO acms_taddress VALUES (498, 63, 'CM. PALO NEGRO', '1');
INSERT INTO acms_taddress VALUES (499, 63, 'SAN MARTIN DE PORRES', '1');
INSERT INTO acms_taddress VALUES (500, 64, 'CM. SANTA CRUZ', '1');
INSERT INTO acms_taddress VALUES (501, 65, 'CM. SAN MATEO', '1');
INSERT INTO acms_taddress VALUES (502, 66, 'CM. LAS TEJERIAS', '1');
INSERT INTO acms_taddress VALUES (503, 66, 'TIARA', '1');
INSERT INTO acms_taddress VALUES (504, 67, 'CM. EL LIMON', '1');
INSERT INTO acms_taddress VALUES (505, 67, 'CA A DE AZUCAR', '1');
INSERT INTO acms_taddress VALUES (506, 68, 'CM. COLONIA TOVAR', '1');
INSERT INTO acms_taddress VALUES (507, 69, 'CM. CAMATAGUA', '1');
INSERT INTO acms_taddress VALUES (508, 69, 'CARMEN DE CURA', '1');
INSERT INTO acms_taddress VALUES (509, 70, 'CM. EL CONSEJO', '1');
INSERT INTO acms_taddress VALUES (510, 71, 'CM. SANTA RITA', '1');
INSERT INTO acms_taddress VALUES (511, 71, 'FRANCISCO DE MIRANDA', '1');
INSERT INTO acms_taddress VALUES (512, 71, 'MONS FELICIANO G', '1');
INSERT INTO acms_taddress VALUES (513, 72, 'OCUMARE DE LA COSTA', '1');
INSERT INTO acms_taddress VALUES (514, 73, 'ARISMENDI', '1');
INSERT INTO acms_taddress VALUES (515, 73, 'GUADARRAMA', '1');
INSERT INTO acms_taddress VALUES (516, 73, 'LA UNION', '1');
INSERT INTO acms_taddress VALUES (517, 73, 'SAN ANTONIO', '1');
INSERT INTO acms_taddress VALUES (518, 74, 'ALFREDO A LARRIVA', '1');
INSERT INTO acms_taddress VALUES (519, 74, 'BARINAS', '1');
INSERT INTO acms_taddress VALUES (520, 74, 'SAN SILVESTRE', '1');
INSERT INTO acms_taddress VALUES (521, 74, 'SANTA INES', '1');
INSERT INTO acms_taddress VALUES (522, 74, 'SANTA LUCIA', '1');
INSERT INTO acms_taddress VALUES (523, 74, 'TORUNOS', '1');
INSERT INTO acms_taddress VALUES (524, 74, 'EL CARMEN', '1');
INSERT INTO acms_taddress VALUES (525, 74, 'ROMULO BETANCOURT', '1');
INSERT INTO acms_taddress VALUES (526, 74, 'CORAZON DE JESUS', '1');
INSERT INTO acms_taddress VALUES (527, 74, 'RAMON I MENDEZ', '1');
INSERT INTO acms_taddress VALUES (528, 74, 'ALTO BARINAS', '1');
INSERT INTO acms_taddress VALUES (529, 74, 'MANUEL P FAJARDO', '1');
INSERT INTO acms_taddress VALUES (530, 74, 'JUAN A RODRIGUEZ D', '1');
INSERT INTO acms_taddress VALUES (531, 74, 'DOMINGA ORTIZ P', '1');
INSERT INTO acms_taddress VALUES (532, 75, 'ALTAMIRA', '1');
INSERT INTO acms_taddress VALUES (533, 75, 'BARINITAS', '1');
INSERT INTO acms_taddress VALUES (534, 75, 'CALDERAS', '1');
INSERT INTO acms_taddress VALUES (535, 76, 'SANTA BARBARA', '1');
INSERT INTO acms_taddress VALUES (536, 76, 'JOSE IGNACIO DEL PUMAR', '1');
INSERT INTO acms_taddress VALUES (537, 76, 'RAMON IGNACIO MENDEZ', '1');
INSERT INTO acms_taddress VALUES (538, 76, 'PEDRO BRICEÃ‘O MENDEZ', '1');
INSERT INTO acms_taddress VALUES (539, 77, 'EL REAL', '1');
INSERT INTO acms_taddress VALUES (540, 77, 'LA LUZ', '1');
INSERT INTO acms_taddress VALUES (541, 77, 'OBISPOS', '1');
INSERT INTO acms_taddress VALUES (542, 77, 'LOS GUASIMITOS', '1');
INSERT INTO acms_taddress VALUES (543, 78, 'CIUDAD BOLIVIA', '1');
INSERT INTO acms_taddress VALUES (544, 78, 'IGNACIO BRICEÃ‘O', '1');
INSERT INTO acms_taddress VALUES (545, 78, 'PAEZ', '1');
INSERT INTO acms_taddress VALUES (546, 78, 'JOSE FELIX RIBAS', '1');
INSERT INTO acms_taddress VALUES (547, 79, 'DOLORES', '1');
INSERT INTO acms_taddress VALUES (548, 79, 'LIBERTAD', '1');
INSERT INTO acms_taddress VALUES (549, 79, 'PALACIO FAJARDO', '1');
INSERT INTO acms_taddress VALUES (550, 79, 'SANTA ROSA', '1');
INSERT INTO acms_taddress VALUES (551, 80, 'CIUDAD DE NUTRIAS', '1');
INSERT INTO acms_taddress VALUES (552, 80, 'EL REGALO', '1');
INSERT INTO acms_taddress VALUES (553, 80, 'PUERTO DE NUTRIAS', '1');
INSERT INTO acms_taddress VALUES (554, 80, 'SANTA CATALINA', '1');
INSERT INTO acms_taddress VALUES (555, 81, 'RODRIGUEZ DOMINGUEZ', '1');
INSERT INTO acms_taddress VALUES (556, 81, 'SABANETA', '1');
INSERT INTO acms_taddress VALUES (557, 82, 'TICOPORO', '1');
INSERT INTO acms_taddress VALUES (558, 82, 'NICOLAS PULIDO', '1');
INSERT INTO acms_taddress VALUES (559, 82, 'ANDRES BELLO', '1');
INSERT INTO acms_taddress VALUES (560, 83, 'BARRANCAS', '1');
INSERT INTO acms_taddress VALUES (561, 83, 'EL SOCORRO', '1');
INSERT INTO acms_taddress VALUES (562, 83, 'MASPARRITO', '1');
INSERT INTO acms_taddress VALUES (563, 84, 'EL CANTON', '1');
INSERT INTO acms_taddress VALUES (564, 84, 'SANTA CRUZ DE GUACAS', '1');
INSERT INTO acms_taddress VALUES (565, 84, 'PUERTO VIVAS', '1');
INSERT INTO acms_taddress VALUES (566, 85, 'SIMON BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (567, 85, 'ONCE DE ABRIL', '1');
INSERT INTO acms_taddress VALUES (568, 85, 'VISTA AL SOL', '1');
INSERT INTO acms_taddress VALUES (569, 85, 'CHIRICA', '1');
INSERT INTO acms_taddress VALUES (570, 85, 'DALLA COSTA', '1');
INSERT INTO acms_taddress VALUES (571, 85, 'CACHAMAY', '1');
INSERT INTO acms_taddress VALUES (572, 85, 'UNIVERSIDAD', '1');
INSERT INTO acms_taddress VALUES (573, 85, 'UNARE', '1');
INSERT INTO acms_taddress VALUES (574, 85, 'YOCOIMA', '1');
INSERT INTO acms_taddress VALUES (575, 85, 'POZO VERDE', '1');
INSERT INTO acms_taddress VALUES (576, 86, 'CM. CAICARA DEL ORINOCO', '1');
INSERT INTO acms_taddress VALUES (577, 86, 'ASCENSION FARRERAS', '1');
INSERT INTO acms_taddress VALUES (578, 86, 'ALTAGRACIA', '1');
INSERT INTO acms_taddress VALUES (579, 86, 'LA URBANA', '1');
INSERT INTO acms_taddress VALUES (580, 86, 'GUANIAMO', '1');
INSERT INTO acms_taddress VALUES (581, 86, 'PIJIGUAOS', '1');
INSERT INTO acms_taddress VALUES (582, 87, 'CATEDRAL', '1');
INSERT INTO acms_taddress VALUES (583, 87, 'AGUA SALADA', '1');
INSERT INTO acms_taddress VALUES (584, 87, 'LA SABANITA', '1');
INSERT INTO acms_taddress VALUES (585, 87, 'VISTA HERMOSA', '1');
INSERT INTO acms_taddress VALUES (586, 87, 'MARHUANTA', '1');
INSERT INTO acms_taddress VALUES (587, 87, 'JOSE ANTONIO PAEZ', '1');
INSERT INTO acms_taddress VALUES (588, 87, 'ORINOCO', '1');
INSERT INTO acms_taddress VALUES (589, 87, 'PANAPANA', '1');
INSERT INTO acms_taddress VALUES (590, 87, 'ZEA', '1');
INSERT INTO acms_taddress VALUES (591, 88, 'CM. UPATA', '1');
INSERT INTO acms_taddress VALUES (592, 88, 'ANDRES ELOY BLANCO', '1');
INSERT INTO acms_taddress VALUES (593, 88, 'PEDRO COVA', '1');
INSERT INTO acms_taddress VALUES (594, 89, 'CM. GUASIPATI', '1');
INSERT INTO acms_taddress VALUES (595, 89, 'SALOM', '1');
INSERT INTO acms_taddress VALUES (596, 90, 'CM. MARIPA', '1');
INSERT INTO acms_taddress VALUES (597, 90, 'ARIPAO', '1');
INSERT INTO acms_taddress VALUES (598, 90, 'LAS MAJADAS', '1');
INSERT INTO acms_taddress VALUES (599, 90, 'MOITACO', '1');
INSERT INTO acms_taddress VALUES (600, 90, 'GUARATARO', '1');
INSERT INTO acms_taddress VALUES (601, 91, 'CM. TUMEREMO', '1');
INSERT INTO acms_taddress VALUES (602, 91, 'DALLA COSTA', '1');
INSERT INTO acms_taddress VALUES (603, 91, 'SAN ISIDRO', '1');
INSERT INTO acms_taddress VALUES (604, 92, 'CM. CIUDAD PIAR', '1');
INSERT INTO acms_taddress VALUES (605, 92, 'SAN FRANCISCO', '1');
INSERT INTO acms_taddress VALUES (606, 92, 'BARCELONETA', '1');
INSERT INTO acms_taddress VALUES (607, 92, 'SANTA BARBARA', '1');
INSERT INTO acms_taddress VALUES (608, 93, 'CM. SANTA ELENA DE UAIREN', '1');
INSERT INTO acms_taddress VALUES (609, 93, 'IKABARU', '1');
INSERT INTO acms_taddress VALUES (610, 94, 'CM. EL CALLAO', '1');
INSERT INTO acms_taddress VALUES (611, 95, 'CM. EL PALMAR', '1');
INSERT INTO acms_taddress VALUES (612, 96, 'BEJUMA', '1');
INSERT INTO acms_taddress VALUES (613, 96, 'CANOABO', '1');
INSERT INTO acms_taddress VALUES (614, 96, 'SIMON BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (615, 97, 'GUIGUE', '1');
INSERT INTO acms_taddress VALUES (616, 97, 'BELEN', '1');
INSERT INTO acms_taddress VALUES (617, 97, 'TACARIGUA', '1');
INSERT INTO acms_taddress VALUES (618, 98, 'MARIARA', '1');
INSERT INTO acms_taddress VALUES (619, 98, 'AGUAS CALIENTES', '1');
INSERT INTO acms_taddress VALUES (620, 99, 'GUACARA', '1');
INSERT INTO acms_taddress VALUES (621, 99, 'CIUDAD ALIANZA', '1');
INSERT INTO acms_taddress VALUES (622, 99, 'YAGUA', '1');
INSERT INTO acms_taddress VALUES (623, 100, 'MONTALBAN', '1');
INSERT INTO acms_taddress VALUES (624, 101, 'MORON', '1');
INSERT INTO acms_taddress VALUES (625, 101, 'URAMA', '1');
INSERT INTO acms_taddress VALUES (626, 102, 'DEMOCRACIA', '1');
INSERT INTO acms_taddress VALUES (627, 102, 'FRATERNIDAD', '1');
INSERT INTO acms_taddress VALUES (628, 102, 'GOAIGOAZA', '1');
INSERT INTO acms_taddress VALUES (629, 102, 'JUAN JOSE FLORES', '1');
INSERT INTO acms_taddress VALUES (630, 102, 'BARTOLOME SALOM', '1');
INSERT INTO acms_taddress VALUES (631, 102, 'UNION', '1');
INSERT INTO acms_taddress VALUES (632, 102, 'BORBURATA', '1');
INSERT INTO acms_taddress VALUES (633, 102, 'PATANEMO', '1');
INSERT INTO acms_taddress VALUES (634, 103, 'SAN JOAQUIN', '1');
INSERT INTO acms_taddress VALUES (635, 104, 'CANDELARIA', '1');
INSERT INTO acms_taddress VALUES (636, 104, 'CATEDRAL', '1');
INSERT INTO acms_taddress VALUES (637, 104, 'EL SOCORRO', '1');
INSERT INTO acms_taddress VALUES (638, 104, 'MIGUEL PEÃ‘A', '1');
INSERT INTO acms_taddress VALUES (639, 104, 'SAN BLAS', '1');
INSERT INTO acms_taddress VALUES (640, 104, 'SAN JOSE', '1');
INSERT INTO acms_taddress VALUES (641, 104, 'SANTA ROSA', '1');
INSERT INTO acms_taddress VALUES (642, 104, 'RAFAEL URDANETA', '1');
INSERT INTO acms_taddress VALUES (643, 104, 'NEGRO PRIMERO', '1');
INSERT INTO acms_taddress VALUES (644, 105, 'MIRANDA', '1');
INSERT INTO acms_taddress VALUES (645, 106, 'U LOS GUAYOS', '1');
INSERT INTO acms_taddress VALUES (646, 107, 'NAGUANAGUA', '1');
INSERT INTO acms_taddress VALUES (647, 108, 'URB SAN DIEGO', '1');
INSERT INTO acms_taddress VALUES (648, 109, 'U TOCUYITO', '1');
INSERT INTO acms_taddress VALUES (649, 109, 'U INDEPENDENCIA', '1');
INSERT INTO acms_taddress VALUES (650, 110, 'COJEDES', '1');
INSERT INTO acms_taddress VALUES (651, 110, 'JUAN DE MATA SUAREZ', '1');
INSERT INTO acms_taddress VALUES (652, 111, 'TINAQUILLO', '1');
INSERT INTO acms_taddress VALUES (653, 112, 'EL BAUL', '1');
INSERT INTO acms_taddress VALUES (654, 112, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (655, 123, 'EL PAO', '1');
INSERT INTO acms_taddress VALUES (656, 114, 'LIBERTAD DE COJEDES', '1');
INSERT INTO acms_taddress VALUES (657, 114, 'EL AMPARO', '1');
INSERT INTO acms_taddress VALUES (658, 115, 'SAN CARLOS DE AUSTRIA', '1');
INSERT INTO acms_taddress VALUES (659, 115, 'JUAN ANGEL BRAVO', '1');
INSERT INTO acms_taddress VALUES (660, 115, 'MANUEL MANRIQUE', '1');
INSERT INTO acms_taddress VALUES (661, 116, 'GRL/JEFE JOSE L SILVA', '1');
INSERT INTO acms_taddress VALUES (662, 117, 'MACAPO', '1');
INSERT INTO acms_taddress VALUES (663, 117, 'LA AGUADITA', '1');
INSERT INTO acms_taddress VALUES (664, 118, 'ROMULO GALLEGOS', '1');
INSERT INTO acms_taddress VALUES (665, 119, 'SAN JUAN DE LOS CAYOS', '1');
INSERT INTO acms_taddress VALUES (666, 119, 'CAPADARE', '1');
INSERT INTO acms_taddress VALUES (667, 119, 'LA PASTORA', '1');
INSERT INTO acms_taddress VALUES (668, 119, 'LIBERTADOR', '1');
INSERT INTO acms_taddress VALUES (669, 120, 'SAN LUIS', '1');
INSERT INTO acms_taddress VALUES (670, 120, 'ARACUA', '1');
INSERT INTO acms_taddress VALUES (671, 120, 'LA PEÃ‘A', '1');
INSERT INTO acms_taddress VALUES (672, 121, 'CAPATARIDA', '1');
INSERT INTO acms_taddress VALUES (673, 121, 'BOROJO', '1');
INSERT INTO acms_taddress VALUES (674, 121, 'SEQUE', '1');
INSERT INTO acms_taddress VALUES (675, 121, 'ZAZARIDA', '1');
INSERT INTO acms_taddress VALUES (676, 121, 'BARIRO', '1');
INSERT INTO acms_taddress VALUES (677, 121, 'GUAJIRO', '1');
INSERT INTO acms_taddress VALUES (678, 122, 'NORTE', '1');
INSERT INTO acms_taddress VALUES (679, 122, 'CARIRUBANA', '1');
INSERT INTO acms_taddress VALUES (680, 122, 'PUNTA CARDON', '1');
INSERT INTO acms_taddress VALUES (681, 122, 'SANTA ANA', '1');
INSERT INTO acms_taddress VALUES (682, 123, 'LA VELA DE CORO', '1');
INSERT INTO acms_taddress VALUES (683, 123, 'ACURIGUA', '1');
INSERT INTO acms_taddress VALUES (684, 123, 'GUAIBACOA', '1');
INSERT INTO acms_taddress VALUES (685, 123, 'MACORUCA', '1');
INSERT INTO acms_taddress VALUES (686, 123, 'LAS CALDERAS', '1');
INSERT INTO acms_taddress VALUES (687, 124, 'PEDREGAL', '1');
INSERT INTO acms_taddress VALUES (688, 124, 'AGUA CLARA', '1');
INSERT INTO acms_taddress VALUES (689, 124, 'AVARIA', '1');
INSERT INTO acms_taddress VALUES (690, 124, 'PIEDRA GRANDE', '1');
INSERT INTO acms_taddress VALUES (691, 124, 'PURURECHE', '1');
INSERT INTO acms_taddress VALUES (692, 125, 'PUEBLO NUEVO', '1');
INSERT INTO acms_taddress VALUES (693, 125, 'ADICORA', '1');
INSERT INTO acms_taddress VALUES (694, 125, 'BARAIVED', '1');
INSERT INTO acms_taddress VALUES (695, 125, 'BUENA VISTA', '1');
INSERT INTO acms_taddress VALUES (696, 125, 'JADACAQUIVA', '1');
INSERT INTO acms_taddress VALUES (697, 125, 'MORUY', '1');
INSERT INTO acms_taddress VALUES (698, 125, 'EL VINCULO', '1');
INSERT INTO acms_taddress VALUES (699, 125, 'EL HATO', '1');
INSERT INTO acms_taddress VALUES (700, 125, 'ADAURE', '1');
INSERT INTO acms_taddress VALUES (701, 126, 'CHURUGUARA', '1');
INSERT INTO acms_taddress VALUES (702, 126, 'AGUA LARGA', '1');
INSERT INTO acms_taddress VALUES (703, 126, 'INDEPENDENCIA', '1');
INSERT INTO acms_taddress VALUES (704, 126, 'MAPARARI', '1');
INSERT INTO acms_taddress VALUES (705, 126, 'EL PAUJI', '1');
INSERT INTO acms_taddress VALUES (706, 127, 'MENE DE MAUROA', '1');
INSERT INTO acms_taddress VALUES (707, 127, 'CASIGUA', '1');
INSERT INTO acms_taddress VALUES (708, 127, 'SAN FELIX', '1');
INSERT INTO acms_taddress VALUES (709, 128, 'SAN ANTONIO', '1');
INSERT INTO acms_taddress VALUES (710, 128, 'SAN GABRIEL', '1');
INSERT INTO acms_taddress VALUES (711, 128, 'SANTA ANA', '1');
INSERT INTO acms_taddress VALUES (712, 128, 'GUZMAN GUILLERMO', '1');
INSERT INTO acms_taddress VALUES (713, 128, 'MITARE', '1');
INSERT INTO acms_taddress VALUES (714, 128, 'SABANETA', '1');
INSERT INTO acms_taddress VALUES (715, 128, 'RIO SECO', '1');
INSERT INTO acms_taddress VALUES (716, 129, 'CABURE', '1');
INSERT INTO acms_taddress VALUES (717, 129, 'CURIMAGUA', '1');
INSERT INTO acms_taddress VALUES (718, 129, 'COLINA', '1');
INSERT INTO acms_taddress VALUES (719, 130, 'TUCACAS', '1');
INSERT INTO acms_taddress VALUES (720, 130, 'BOCA DE AROA', '1');
INSERT INTO acms_taddress VALUES (721, 131, 'PUERTO CUMAREBO', '1');
INSERT INTO acms_taddress VALUES (722, 131, 'LA CIENAGA', '1');
INSERT INTO acms_taddress VALUES (723, 131, 'LA SOLEDAD', '1');
INSERT INTO acms_taddress VALUES (724, 131, 'PUEBLO CUMAREBO', '1');
INSERT INTO acms_taddress VALUES (725, 131, 'ZAZARIDA', '1');
INSERT INTO acms_taddress VALUES (726, 132, 'CM. DABAJURO', '1');
INSERT INTO acms_taddress VALUES (727, 133, 'CHICHIRIVICHE', '1');
INSERT INTO acms_taddress VALUES (728, 133, 'BOCA DE TOCUYO', '1');
INSERT INTO acms_taddress VALUES (729, 133, 'TOCUYO DE LA COSTA', '1');
INSERT INTO acms_taddress VALUES (730, 134, 'LOS TAQUES', '1');
INSERT INTO acms_taddress VALUES (731, 134, 'JUDIBANA', '1');
INSERT INTO acms_taddress VALUES (732, 135, 'PIRITU', '1');
INSERT INTO acms_taddress VALUES (733, 135, 'SAN JOSE DE LA COSTA', '1');
INSERT INTO acms_taddress VALUES (734, 136, 'STA.CRUZ DE BUCARAL', '1');
INSERT INTO acms_taddress VALUES (735, 136, 'EL CHARAL', '1');
INSERT INTO acms_taddress VALUES (736, 136, 'LAS VEGAS DEL TUY', '1');
INSERT INTO acms_taddress VALUES (737, 137, 'CM. MIRIMIRE', '1');
INSERT INTO acms_taddress VALUES (738, 138, 'JACURA', '1');
INSERT INTO acms_taddress VALUES (739, 138, 'AGUA LINDA', '1');
INSERT INTO acms_taddress VALUES (740, 138, 'ARAURIMA', '1');
INSERT INTO acms_taddress VALUES (741, 139, 'CM. YARACAL', '1');
INSERT INTO acms_taddress VALUES (742, 140, 'CM. PALMA SOLA', '1');
INSERT INTO acms_taddress VALUES (743, 141, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (744, 141, 'PECAYA', '1');
INSERT INTO acms_taddress VALUES (745, 142, 'URUMACO', '1');
INSERT INTO acms_taddress VALUES (746, 142, 'BRUZUAL', '1');
INSERT INTO acms_taddress VALUES (747, 143, 'CM. TOCOPERO', '1');
INSERT INTO acms_taddress VALUES (748, 144, 'VALLE DE LA PASCUA', '1');
INSERT INTO acms_taddress VALUES (749, 144, 'ESPINO', '1');
INSERT INTO acms_taddress VALUES (750, 145, 'EL SOMBRERO', '1');
INSERT INTO acms_taddress VALUES (751, 145, 'SOSA', '1');
INSERT INTO acms_taddress VALUES (752, 146, 'CALABOZO', '1');
INSERT INTO acms_taddress VALUES (753, 146, 'EL CALVARIO', '1');
INSERT INTO acms_taddress VALUES (754, 146, 'EL RASTRO', '1');
INSERT INTO acms_taddress VALUES (755, 146, 'GUARDATINAJAS', '1');
INSERT INTO acms_taddress VALUES (756, 147, 'ALTAGRACIA DE ORITUCO', '1');
INSERT INTO acms_taddress VALUES (757, 147, 'LEZAMA', '1');
INSERT INTO acms_taddress VALUES (758, 147, 'LIBERTAD DE ORITUCO', '1');
INSERT INTO acms_taddress VALUES (759, 147, 'SAN FCO DE MACAIRA', '1');
INSERT INTO acms_taddress VALUES (760, 147, 'SAN RAFAEL DE ORITUCO', '1');
INSERT INTO acms_taddress VALUES (761, 147, 'SOUBLETTE', '1');
INSERT INTO acms_taddress VALUES (762, 147, 'PASO REAL DE MACAIRA', '1');
INSERT INTO acms_taddress VALUES (763, 148, 'TUCUPIDO', '1');
INSERT INTO acms_taddress VALUES (764, 148, 'SAN RAFAEL DE LAYA', '1');
INSERT INTO acms_taddress VALUES (765, 149, 'SAN JUAN DE LOS MORROS', '1');
INSERT INTO acms_taddress VALUES (766, 149, 'PARAPARA', '1');
INSERT INTO acms_taddress VALUES (767, 149, 'CANTAGALLO', '1');
INSERT INTO acms_taddress VALUES (768, 150, 'ZARAZA', '1');
INSERT INTO acms_taddress VALUES (769, 150, 'SAN JOSE DE UNARE', '1');
INSERT INTO acms_taddress VALUES (770, 151, 'CAMAGUAN', '1');
INSERT INTO acms_taddress VALUES (771, 151, 'PUERTO MIRANDA', '1');
INSERT INTO acms_taddress VALUES (772, 151, 'UVERITO', '1');
INSERT INTO acms_taddress VALUES (773, 152, 'SAN JOSE DE GUARIBE', '1');
INSERT INTO acms_taddress VALUES (774, 153, 'LAS MERCEDES', '1');
INSERT INTO acms_taddress VALUES (775, 153, 'STA RITA DE MANAPIRE', '1');
INSERT INTO acms_taddress VALUES (776, 153, 'CABRUTA', '1');
INSERT INTO acms_taddress VALUES (777, 154, 'EL SOCORRO', '1');
INSERT INTO acms_taddress VALUES (778, 155, 'ORTIZ', '1');
INSERT INTO acms_taddress VALUES (779, 155, 'SAN FCO. DE TIZNADOS', '1');
INSERT INTO acms_taddress VALUES (780, 155, 'SAN JOSE DE TIZNADOS', '1');
INSERT INTO acms_taddress VALUES (781, 155, 'S LORENZO DE TIZNADOS', '1');
INSERT INTO acms_taddress VALUES (782, 156, 'SANTA MARIA DE IPIRE', '1');
INSERT INTO acms_taddress VALUES (783, 156, 'ALTAMIRA', '1');
INSERT INTO acms_taddress VALUES (784, 157, 'CHAGUARAMAS', '1');
INSERT INTO acms_taddress VALUES (785, 158, 'GUAYABAL', '1');
INSERT INTO acms_taddress VALUES (786, 158, 'CAZORLA', '1');
INSERT INTO acms_taddress VALUES (787, 159, 'FREITEZ', '1');
INSERT INTO acms_taddress VALUES (788, 159, 'JOSE MARIA BLANCO', '1');
INSERT INTO acms_taddress VALUES (789, 160, 'CATEDRAL', '1');
INSERT INTO acms_taddress VALUES (790, 160, 'LA CONCEPCION', '1');
INSERT INTO acms_taddress VALUES (791, 160, 'SANTA ROSA', '1');
INSERT INTO acms_taddress VALUES (792, 160, 'UNION', '1');
INSERT INTO acms_taddress VALUES (793, 160, 'EL CUJI', '1');
INSERT INTO acms_taddress VALUES (794, 160, 'TAMACA', '1');
INSERT INTO acms_taddress VALUES (795, 160, 'JUAN DE VILLEGAS', '1');
INSERT INTO acms_taddress VALUES (796, 160, 'AGUEDO F. ALVARADO', '1');
INSERT INTO acms_taddress VALUES (797, 160, 'BUENA VISTA', '1');
INSERT INTO acms_taddress VALUES (798, 160, 'JUAREZ', '1');
INSERT INTO acms_taddress VALUES (799, 161, 'JUAN B RODRIGUEZ', '1');
INSERT INTO acms_taddress VALUES (800, 161, 'DIEGO DE LOZADA', '1');
INSERT INTO acms_taddress VALUES (801, 161, 'SAN MIGUEL', '1');
INSERT INTO acms_taddress VALUES (802, 161, 'CUARA', '1');
INSERT INTO acms_taddress VALUES (803, 161, 'PARAISO DE SAN JOSE', '1');
INSERT INTO acms_taddress VALUES (804, 161, 'TINTORERO', '1');
INSERT INTO acms_taddress VALUES (805, 161, 'JOSE BERNARDO DORANTE', '1');
INSERT INTO acms_taddress VALUES (806, 161, 'CRNEL. MARIANO PERAZA', '1');
INSERT INTO acms_taddress VALUES (807, 162, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (808, 162, 'ANZOATEGUI', '1');
INSERT INTO acms_taddress VALUES (809, 162, 'GUARICO', '1');
INSERT INTO acms_taddress VALUES (810, 162, 'HUMOCARO ALTO', '1');
INSERT INTO acms_taddress VALUES (811, 162, 'HUMOCARO BAJO', '1');
INSERT INTO acms_taddress VALUES (812, 162, 'MORAN', '1');
INSERT INTO acms_taddress VALUES (813, 162, 'HILARIO LUNA Y LUNA', '1');
INSERT INTO acms_taddress VALUES (814, 162, 'LA CANDELARIA', '1');
INSERT INTO acms_taddress VALUES (815, 163, 'CABUDARE', '1');
INSERT INTO acms_taddress VALUES (816, 163, 'JOSE G. BASTIDAS', '1');
INSERT INTO acms_taddress VALUES (817, 163, 'AGUA VIVA', '1');
INSERT INTO acms_taddress VALUES (818, 164, 'TRINIDAD SAMUEL', '1');
INSERT INTO acms_taddress VALUES (819, 164, 'ANTONIO DIAZ', '1');
INSERT INTO acms_taddress VALUES (820, 164, 'CAMACARO', '1');
INSERT INTO acms_taddress VALUES (821, 164, 'CASTAÃ‘EDA', '1');
INSERT INTO acms_taddress VALUES (822, 164, 'CHIQUINQUIRA', '1');
INSERT INTO acms_taddress VALUES (823, 164, 'ESPINOZA LOS MONTEROS', '1');
INSERT INTO acms_taddress VALUES (824, 164, 'LARA', '1');
INSERT INTO acms_taddress VALUES (825, 164, 'MANUEL MORILLO', '1');
INSERT INTO acms_taddress VALUES (826, 164, 'MONTES DE OCA', '1');
INSERT INTO acms_taddress VALUES (827, 164, 'TORRES', '1');
INSERT INTO acms_taddress VALUES (828, 164, 'EL BLANCO', '1');
INSERT INTO acms_taddress VALUES (829, 164, 'MONTA A VERDE', '1');
INSERT INTO acms_taddress VALUES (830, 164, 'HERIBERTO ARROYO', '1');
INSERT INTO acms_taddress VALUES (831, 164, 'LAS MERCEDES', '1');
INSERT INTO acms_taddress VALUES (832, 164, 'CECILIO ZUBILLAGA', '1');
INSERT INTO acms_taddress VALUES (833, 164, 'REYES VARGAS', '1');
INSERT INTO acms_taddress VALUES (834, 164, 'ALTAGRACIA', '1');
INSERT INTO acms_taddress VALUES (835, 165, 'SIQUISIQUE', '1');
INSERT INTO acms_taddress VALUES (836, 165, 'SAN MIGUEL', '1');
INSERT INTO acms_taddress VALUES (837, 165, 'XAGUAS', '1');
INSERT INTO acms_taddress VALUES (838, 165, 'MOROTURO', '1');
INSERT INTO acms_taddress VALUES (839, 166, 'PIO TAMAYO', '1');
INSERT INTO acms_taddress VALUES (840, 166, 'YACAMBU', '1');
INSERT INTO acms_taddress VALUES (841, 166, 'QBDA. HONDA DE GUACHE', '1');
INSERT INTO acms_taddress VALUES (842, 167, 'SARARE', '1');
INSERT INTO acms_taddress VALUES (843, 167, 'GUSTAVO VEGAS LEON', '1');
INSERT INTO acms_taddress VALUES (844, 167, 'BURIA', '1');
INSERT INTO acms_taddress VALUES (845, 168, 'GABRIEL PICON G.', '1');
INSERT INTO acms_taddress VALUES (846, 168, 'HECTOR AMABLE MORA', '1');
INSERT INTO acms_taddress VALUES (847, 168, 'JOSE NUCETE SARDI', '1');
INSERT INTO acms_taddress VALUES (848, 168, 'PULIDO MENDEZ', '1');
INSERT INTO acms_taddress VALUES (849, 168, 'PTE. ROMULO GALLEGOS', '1');
INSERT INTO acms_taddress VALUES (850, 168, 'PRESIDENTE BETANCOURT', '1');
INSERT INTO acms_taddress VALUES (851, 168, 'PRESIDENTE PAEZ', '1');
INSERT INTO acms_taddress VALUES (852, 169, 'CM. LA AZULITA', '1');
INSERT INTO acms_taddress VALUES (853, 170, 'CM. CANAGUA', '1');
INSERT INTO acms_taddress VALUES (854, 170, 'CAPURI', '1');
INSERT INTO acms_taddress VALUES (855, 170, 'CHACANTA', '1');
INSERT INTO acms_taddress VALUES (856, 170, 'EL MOLINO', '1');
INSERT INTO acms_taddress VALUES (857, 170, 'GUAIMARAL', '1');
INSERT INTO acms_taddress VALUES (858, 170, 'MUCUTUY', '1');
INSERT INTO acms_taddress VALUES (859, 170, 'MUCUCHACHI', '1');
INSERT INTO acms_taddress VALUES (860, 171, 'ACEQUIAS', '1');
INSERT INTO acms_taddress VALUES (861, 171, 'JAJI', '1');
INSERT INTO acms_taddress VALUES (862, 171, 'LA MESA', '1');
INSERT INTO acms_taddress VALUES (863, 171, 'SAN JOSE', '1');
INSERT INTO acms_taddress VALUES (864, 171, 'MONTALBAN', '1');
INSERT INTO acms_taddress VALUES (865, 171, 'MATRIZ', '1');
INSERT INTO acms_taddress VALUES (866, 171, 'FERNANDEZ PEÃ‘A', '1');
INSERT INTO acms_taddress VALUES (867, 172, 'CM. GUARAQUE', '1');
INSERT INTO acms_taddress VALUES (868, 172, 'MESA DE QUINTERO', '1');
INSERT INTO acms_taddress VALUES (869, 172, 'RIO NEGRO', '1');
INSERT INTO acms_taddress VALUES (870, 173, 'CM. ARAPUEY', '1');
INSERT INTO acms_taddress VALUES (871, 173, 'PALMIRA', '1');
INSERT INTO acms_taddress VALUES (872, 174, 'CM. TORONDOY', '1');
INSERT INTO acms_taddress VALUES (873, 174, 'SAN CRISTOBAL DE T', '1');
INSERT INTO acms_taddress VALUES (874, 175, 'ARIAS', '1');
INSERT INTO acms_taddress VALUES (875, 175, 'SAGRARIO', '1');
INSERT INTO acms_taddress VALUES (876, 175, 'MILLA', '1');
INSERT INTO acms_taddress VALUES (877, 175, 'EL LLANO', '1');
INSERT INTO acms_taddress VALUES (878, 175, 'JUAN RODRIGUEZ SUAREZ', '1');
INSERT INTO acms_taddress VALUES (879, 175, 'JACINTO PLAZA', '1');
INSERT INTO acms_taddress VALUES (880, 175, 'DOMINGO PEÃ‘A', '1');
INSERT INTO acms_taddress VALUES (881, 175, 'GONZALO PICON FEBRES', '1');
INSERT INTO acms_taddress VALUES (882, 175, 'OSUNA RODRIGUEZ', '1');
INSERT INTO acms_taddress VALUES (883, 175, 'LASSO DE LA VEGA', '1');
INSERT INTO acms_taddress VALUES (884, 175, 'CARACCIOLO PARRA P', '1');
INSERT INTO acms_taddress VALUES (885, 175, 'MARIANO PICON SALAS', '1');
INSERT INTO acms_taddress VALUES (886, 175, 'ANTONIO SPINETTI DINI', '1');
INSERT INTO acms_taddress VALUES (887, 175, 'EL MORRO', '1');
INSERT INTO acms_taddress VALUES (888, 175, 'LOS NEVADOS', '1');
INSERT INTO acms_taddress VALUES (889, 176, 'CM. TABAY', '1');
INSERT INTO acms_taddress VALUES (890, 177, 'CM. TIMOTES', '1');
INSERT INTO acms_taddress VALUES (891, 177, 'ANDRES ELOY BLANCO', '1');
INSERT INTO acms_taddress VALUES (892, 177, 'PIÃ‘ANGO', '1');
INSERT INTO acms_taddress VALUES (893, 177, 'LA VENTA', '1');
INSERT INTO acms_taddress VALUES (894, 178, 'CM. STA CRUZ DE MORA', '1');
INSERT INTO acms_taddress VALUES (895, 178, 'MESA BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (896, 178, 'MESA DE LAS PALMAS', '1');
INSERT INTO acms_taddress VALUES (897, 179, 'CM. STA ELENA DE ARENALES', '1');
INSERT INTO acms_taddress VALUES (898, 179, 'ELOY PAREDES', '1');
INSERT INTO acms_taddress VALUES (899, 179, 'PQ R DE ALCAZAR', '1');
INSERT INTO acms_taddress VALUES (900, 180, 'CM. TUCANI', '1');
INSERT INTO acms_taddress VALUES (901, 180, 'FLORENCIO RAMIREZ', '1');
INSERT INTO acms_taddress VALUES (902, 181, 'CM. SANTO DOMINGO', '1');
INSERT INTO acms_taddress VALUES (903, 181, 'LAS PIEDRAS', '1');
INSERT INTO acms_taddress VALUES (904, 182, 'CM. PUEBLO LLANO', '1');
INSERT INTO acms_taddress VALUES (905, 183, 'CM. MUCUCHIES', '1');
INSERT INTO acms_taddress VALUES (906, 183, 'MUCURUBA', '1');
INSERT INTO acms_taddress VALUES (907, 183, 'SAN RAFAEL', '1');
INSERT INTO acms_taddress VALUES (908, 183, 'CACUTE', '1');
INSERT INTO acms_taddress VALUES (909, 183, 'LA TOMA', '1');
INSERT INTO acms_taddress VALUES (910, 184, 'CM. BAILADORES', '1');
INSERT INTO acms_taddress VALUES (911, 184, 'GERONIMO MALDONADO', '1');
INSERT INTO acms_taddress VALUES (912, 185, 'CM. LAGUNILLAS', '1');
INSERT INTO acms_taddress VALUES (913, 185, 'CHIGUARA', '1');
INSERT INTO acms_taddress VALUES (914, 185, 'ESTANQUES', '1');
INSERT INTO acms_taddress VALUES (915, 185, 'SAN JUAN', '1');
INSERT INTO acms_taddress VALUES (916, 185, 'PUEBLO NUEVO DEL SUR', '1');
INSERT INTO acms_taddress VALUES (917, 185, 'LA TRAMPA', '1');
INSERT INTO acms_taddress VALUES (918, 186, 'EL LLANO', '1');
INSERT INTO acms_taddress VALUES (919, 186, 'TOVAR', '1');
INSERT INTO acms_taddress VALUES (920, 186, 'EL AMPARO', '1');
INSERT INTO acms_taddress VALUES (921, 186, 'SAN FRANCISCO', '1');
INSERT INTO acms_taddress VALUES (922, 187, 'CM. NUEVA BOLIVIA', '1');
INSERT INTO acms_taddress VALUES (923, 187, 'INDEPENDENCIA', '1');
INSERT INTO acms_taddress VALUES (924, 187, 'MARIA C PALACIOS', '1');
INSERT INTO acms_taddress VALUES (925, 187, 'SANTA APOLONIA', '1');
INSERT INTO acms_taddress VALUES (926, 188, 'CM. STA MARIA DE CAPARO', '1');
INSERT INTO acms_taddress VALUES (927, 189, 'CM. ARICAGUA', '1');
INSERT INTO acms_taddress VALUES (928, 189, 'SAN ANTONIO', '1');
INSERT INTO acms_taddress VALUES (929, 190, 'CM. ZEA', '1');
INSERT INTO acms_taddress VALUES (930, 190, 'CAÃ‘O EL TIGRE', '1');
INSERT INTO acms_taddress VALUES (931, 191, 'CAUCAGUA', '1');
INSERT INTO acms_taddress VALUES (932, 191, 'ARAGUITA', '1');
INSERT INTO acms_taddress VALUES (933, 191, 'AREVALO GONZALEZ', '1');
INSERT INTO acms_taddress VALUES (934, 191, 'CAPAYA', '1');
INSERT INTO acms_taddress VALUES (935, 191, 'PANAQUIRE', '1');
INSERT INTO acms_taddress VALUES (936, 191, 'RIBAS', '1');
INSERT INTO acms_taddress VALUES (937, 191, 'EL CAFE', '1');
INSERT INTO acms_taddress VALUES (938, 191, 'MARIZAPA', '1');
INSERT INTO acms_taddress VALUES (939, 192, 'HIGUEROTE', '1');
INSERT INTO acms_taddress VALUES (940, 192, 'CURIEPE', '1');
INSERT INTO acms_taddress VALUES (941, 192, 'TACARIGUA', '1');
INSERT INTO acms_taddress VALUES (942, 193, 'LOS TEQUES', '1');
INSERT INTO acms_taddress VALUES (943, 193, 'CECILIO ACOSTA', '1');
INSERT INTO acms_taddress VALUES (944, 193, 'PARACOTOS', '1');
INSERT INTO acms_taddress VALUES (945, 193, 'SAN PEDRO', '1');
INSERT INTO acms_taddress VALUES (946, 193, 'TACATA', '1');
INSERT INTO acms_taddress VALUES (947, 193, 'EL JARILLO', '1');
INSERT INTO acms_taddress VALUES (948, 193, 'ALTAGRACIA DE LA M', '1');
INSERT INTO acms_taddress VALUES (949, 194, 'STA TERESA DEL TUY', '1');
INSERT INTO acms_taddress VALUES (950, 194, 'EL CARTANAL', '1');
INSERT INTO acms_taddress VALUES (951, 195, 'OCUMARE DEL TUY', '1');
INSERT INTO acms_taddress VALUES (952, 195, 'LA DEMOCRACIA', '1');
INSERT INTO acms_taddress VALUES (953, 195, 'SANTA BARBARA', '1');
INSERT INTO acms_taddress VALUES (954, 196, 'RIO CHICO', '1');
INSERT INTO acms_taddress VALUES (955, 196, 'EL GUAPO', '1');
INSERT INTO acms_taddress VALUES (956, 196, 'TACARIGUA DE LA LAGUNA', '1');
INSERT INTO acms_taddress VALUES (957, 196, 'PAPARO', '1');
INSERT INTO acms_taddress VALUES (958, 196, 'SN FERNANDO DEL GUAPO', '1');
INSERT INTO acms_taddress VALUES (959, 197, 'SANTA LUCIA', '1');
INSERT INTO acms_taddress VALUES (960, 198, 'GUARENAS', '1');
INSERT INTO acms_taddress VALUES (961, 199, 'PETARE', '1');
INSERT INTO acms_taddress VALUES (962, 199, 'LEONCIO MARTINEZ', '1');
INSERT INTO acms_taddress VALUES (963, 199, 'CAUCAGUITA', '1');
INSERT INTO acms_taddress VALUES (964, 199, 'FILAS DE MARICHES', '1');
INSERT INTO acms_taddress VALUES (965, 199, 'LA DOLORITA', '1');
INSERT INTO acms_taddress VALUES (966, 200, 'CUA', '1');
INSERT INTO acms_taddress VALUES (967, 200, 'NUEVA CUA', '1');
INSERT INTO acms_taddress VALUES (968, 201, 'GUATIRE', '1');
INSERT INTO acms_taddress VALUES (969, 201, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (970, 202, 'CHARALLAVE', '1');
INSERT INTO acms_taddress VALUES (971, 202, 'LAS BRISAS', '1');
INSERT INTO acms_taddress VALUES (972, 203, 'SAN ANTONIO LOS ALTOS', '1');
INSERT INTO acms_taddress VALUES (973, 204, 'SAN JOSE DE BARLOVENTO', '1');
INSERT INTO acms_taddress VALUES (974, 204, 'CUMBO', '1');
INSERT INTO acms_taddress VALUES (975, 205, 'SAN FCO DE YARE', '1');
INSERT INTO acms_taddress VALUES (976, 205, 'S ANTONIO DE YARE', '1');
INSERT INTO acms_taddress VALUES (977, 206, 'BARUTA', '1');
INSERT INTO acms_taddress VALUES (978, 206, 'EL CAFETAL', '1');
INSERT INTO acms_taddress VALUES (979, 206, 'LAS MINAS DE BARUTA', '1');
INSERT INTO acms_taddress VALUES (980, 207, 'CARRIZAL', '1');
INSERT INTO acms_taddress VALUES (981, 208, 'CHACAO', '1');
INSERT INTO acms_taddress VALUES (982, 209, 'EL HATILLO', '1');
INSERT INTO acms_taddress VALUES (983, 210, 'MAMPORAL', '1');
INSERT INTO acms_taddress VALUES (984, 211, 'CUPIRA', '1');
INSERT INTO acms_taddress VALUES (985, 211, 'MACHURUCUTO', '1');
INSERT INTO acms_taddress VALUES (986, 212, 'CM. SAN ANTONIO', '1');
INSERT INTO acms_taddress VALUES (987, 212, 'SAN FRANCISCO', '1');
INSERT INTO acms_taddress VALUES (988, 213, 'CM. CARIPITO', '1');
INSERT INTO acms_taddress VALUES (989, 214, 'CM. CARIPE', '1');
INSERT INTO acms_taddress VALUES (990, 214, 'TERESEN', '1');
INSERT INTO acms_taddress VALUES (991, 214, 'EL GUACHARO', '1');
INSERT INTO acms_taddress VALUES (992, 214, 'SAN AGUSTIN', '1');
INSERT INTO acms_taddress VALUES (993, 214, 'LA GUANOTA', '1');
INSERT INTO acms_taddress VALUES (994, 214, 'SABANA DE PIEDRA', '1');
INSERT INTO acms_taddress VALUES (995, 215, 'CM. CAICARA', '1');
INSERT INTO acms_taddress VALUES (996, 215, 'AREO', '1');
INSERT INTO acms_taddress VALUES (997, 215, 'SAN FELIX', '1');
INSERT INTO acms_taddress VALUES (998, 215, 'VIENTO FRESCO', '1');
INSERT INTO acms_taddress VALUES (999, 216, 'CM. PUNTA DE MATA', '1');
INSERT INTO acms_taddress VALUES (1000, 216, 'EL TEJERO', '1');
INSERT INTO acms_taddress VALUES (1001, 217, 'CM. TEMBLADOR', '1');
INSERT INTO acms_taddress VALUES (1002, 217, 'TABASCA', '1');
INSERT INTO acms_taddress VALUES (1003, 217, 'LAS ALHUACAS', '1');
INSERT INTO acms_taddress VALUES (1004, 217, 'CHAGUARAMAS', '1');
INSERT INTO acms_taddress VALUES (1005, 218, 'EL FURRIAL', '1');
INSERT INTO acms_taddress VALUES (1006, 218, 'JUSEPIN', '1');
INSERT INTO acms_taddress VALUES (1007, 218, 'EL COROZO', '1');
INSERT INTO acms_taddress VALUES (1008, 218, 'SAN VICENTE', '1');
INSERT INTO acms_taddress VALUES (1009, 218, 'LA PICA', '1');
INSERT INTO acms_taddress VALUES (1010, 218, 'ALTO DE LOS GODOS', '1');
INSERT INTO acms_taddress VALUES (1011, 218, 'BOQUERON', '1');
INSERT INTO acms_taddress VALUES (1012, 218, 'LAS COCUIZAS', '1');
INSERT INTO acms_taddress VALUES (1013, 218, 'SANTA CRUZ', '1');
INSERT INTO acms_taddress VALUES (1014, 218, 'SAN SIMON', '1');
INSERT INTO acms_taddress VALUES (1015, 219, 'CM. ARAGUA', '1');
INSERT INTO acms_taddress VALUES (1016, 219, 'CHAGUARAMAL', '1');
INSERT INTO acms_taddress VALUES (1017, 219, 'GUANAGUANA', '1');
INSERT INTO acms_taddress VALUES (1018, 219, 'APARICIO', '1');
INSERT INTO acms_taddress VALUES (1019, 219, 'TAGUAYA', '1');
INSERT INTO acms_taddress VALUES (1020, 219, 'EL PINTO', '1');
INSERT INTO acms_taddress VALUES (1021, 219, 'LA TOSCANA', '1');
INSERT INTO acms_taddress VALUES (1022, 220, 'CM. QUIRIQUIRE', '1');
INSERT INTO acms_taddress VALUES (1023, 220, 'CACHIPO', '1');
INSERT INTO acms_taddress VALUES (1024, 221, 'CM. BARRANCAS', '1');
INSERT INTO acms_taddress VALUES (1025, 221, 'LOS BARRANCOS DE FAJARDO', '1');
INSERT INTO acms_taddress VALUES (1026, 222, 'CM. AGUASAY', '1');
INSERT INTO acms_taddress VALUES (1027, 223, 'CM. SANTA BARBARA', '1');
INSERT INTO acms_taddress VALUES (1028, 224, 'CM. URACOA', '1');
INSERT INTO acms_taddress VALUES (1029, 225, 'CM. LA ASUNCION', '1');
INSERT INTO acms_taddress VALUES (1030, 226, 'CM. SAN JUAN BAUTISTA', '1');
INSERT INTO acms_taddress VALUES (1031, 226, 'ZABALA', '1');
INSERT INTO acms_taddress VALUES (1032, 227, 'CM. SANTA ANA', '1');
INSERT INTO acms_taddress VALUES (1033, 227, 'GUEVARA', '1');
INSERT INTO acms_taddress VALUES (1034, 227, 'MATASIETE', '1');
INSERT INTO acms_taddress VALUES (1035, 227, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (1036, 227, 'SUCRE', '1');
INSERT INTO acms_taddress VALUES (1037, 228, 'CM. PAMPATAR', '1');
INSERT INTO acms_taddress VALUES (1038, 228, 'AGUIRRE', '1');
INSERT INTO acms_taddress VALUES (1039, 229, 'CM. JUAN GRIEGO', '1');
INSERT INTO acms_taddress VALUES (1040, 229, 'ADRIAN', '1');
INSERT INTO acms_taddress VALUES (1041, 230, 'CM. PORLAMAR', '1');
INSERT INTO acms_taddress VALUES (1042, 231, 'CM. BOCA DEL RIO', '1');
INSERT INTO acms_taddress VALUES (1043, 231, 'SAN FRANCISCO', '1');
INSERT INTO acms_taddress VALUES (1044, 232, 'CM. SAN PEDRO DE COCHE', '1');
INSERT INTO acms_taddress VALUES (1045, 232, 'VICENTE FUENTES', '1');
INSERT INTO acms_taddress VALUES (1046, 233, 'CM. PUNTA DE PIEDRAS', '1');
INSERT INTO acms_taddress VALUES (1047, 233, 'LOS BARALES', '1');
INSERT INTO acms_taddress VALUES (1048, 234, 'CM.LA PLAZA DE PARAGUACHI', '1');
INSERT INTO acms_taddress VALUES (1049, 235, 'CM. VALLE ESP SANTO', '1');
INSERT INTO acms_taddress VALUES (1050, 235, 'FRANCISCO FAJARDO', '1');
INSERT INTO acms_taddress VALUES (1051, 236, 'CM. ARAURE', '1');
INSERT INTO acms_taddress VALUES (1052, 236, 'RIO ACARIGUA', '1');
INSERT INTO acms_taddress VALUES (1053, 237, 'CM. PIRITU', '1');
INSERT INTO acms_taddress VALUES (1054, 237, 'UVERAL', '1');
INSERT INTO acms_taddress VALUES (1055, 238, 'CM. GUANARE', '1');
INSERT INTO acms_taddress VALUES (1056, 238, 'CORDOBA', '1');
INSERT INTO acms_taddress VALUES (1057, 238, 'SAN JUAN GUANAGUANARE', '1');
INSERT INTO acms_taddress VALUES (1058, 238, 'VIRGEN DE LA COROMOTO', '1');
INSERT INTO acms_taddress VALUES (1059, 238, 'SAN JOSE DE LA MONTAÃ‘A', '1');
INSERT INTO acms_taddress VALUES (1060, 239, 'CM. GUANARITO', '1');
INSERT INTO acms_taddress VALUES (1061, 239, 'TRINIDAD DE LA CAPILLA', '1');
INSERT INTO acms_taddress VALUES (1062, 239, 'DIVINA PASTORA', '1');
INSERT INTO acms_taddress VALUES (1063, 240, 'CM. OSPINO', '1');
INSERT INTO acms_taddress VALUES (1064, 240, 'APARICION', '1');
INSERT INTO acms_taddress VALUES (1065, 240, 'LA ESTACION', '1');
INSERT INTO acms_taddress VALUES (1066, 241, 'CM. ACARIGUA', '1');
INSERT INTO acms_taddress VALUES (1067, 241, 'PAYARA', '1');
INSERT INTO acms_taddress VALUES (1068, 241, 'PIMPINELA', '1');
INSERT INTO acms_taddress VALUES (1069, 241, 'RAMON PERAZA', '1');
INSERT INTO acms_taddress VALUES (1070, 242, 'CM. BISCUCUY', '1');
INSERT INTO acms_taddress VALUES (1071, 242, 'CONCEPCION', '1');
INSERT INTO acms_taddress VALUES (1072, 242, 'SAN RAFAEL PALO ALZADO', '1');
INSERT INTO acms_taddress VALUES (1073, 242, 'UVENCIO A VELASQUEZ', '1');
INSERT INTO acms_taddress VALUES (1074, 242, 'SAN JOSE DE SAGUAZ', '1');
INSERT INTO acms_taddress VALUES (1075, 242, 'VILLA ROSA', '1');
INSERT INTO acms_taddress VALUES (1076, 243, 'CM. VILLA BRUZUAL', '1');
INSERT INTO acms_taddress VALUES (1077, 243, 'CANELONES', '1');
INSERT INTO acms_taddress VALUES (1078, 243, 'SANTA CRUZ', '1');
INSERT INTO acms_taddress VALUES (1079, 243, 'SAN ISIDRO LABRADOR', '1');
INSERT INTO acms_taddress VALUES (1080, 244, 'CM. CHABASQUEN', '1');
INSERT INTO acms_taddress VALUES (1081, 244, 'PEÃ‘A BLANCA', '1');
INSERT INTO acms_taddress VALUES (1082, 245, 'CM. AGUA BLANCA', '1');
INSERT INTO acms_taddress VALUES (1083, 246, 'CM. PAPELON', '1');
INSERT INTO acms_taddress VALUES (1084, 246, 'CAÃ‘O DELGADITO', '1');
INSERT INTO acms_taddress VALUES (1085, 247, 'CM. BOCONOITO', '1');
INSERT INTO acms_taddress VALUES (1086, 247, 'ANTOLIN TOVAR AQUINO', '1');
INSERT INTO acms_taddress VALUES (1087, 248, 'CM. SAN RAFAEL DE ONOTO', '1');
INSERT INTO acms_taddress VALUES (1088, 248, 'SANTA FE', '1');
INSERT INTO acms_taddress VALUES (1089, 248, 'THERMO MORLES', '1');
INSERT INTO acms_taddress VALUES (1090, 249, 'CM. EL PLAYON', '1');
INSERT INTO acms_taddress VALUES (1091, 249, 'FLORIDA', '1');
INSERT INTO acms_taddress VALUES (1092, 250, 'RIO CARIBE', '1');
INSERT INTO acms_taddress VALUES (1093, 250, 'SAN JUAN GALDONAS', '1');
INSERT INTO acms_taddress VALUES (1094, 250, 'PUERTO SANTO', '1');
INSERT INTO acms_taddress VALUES (1095, 250, 'EL MORRO DE PTO SANTO', '1');
INSERT INTO acms_taddress VALUES (1096, 250, 'ANTONIO JOSE DE SUCRE', '1');
INSERT INTO acms_taddress VALUES (1097, 251, 'EL PILAR', '1');
INSERT INTO acms_taddress VALUES (1098, 251, 'EL RINCON', '1');
INSERT INTO acms_taddress VALUES (1099, 251, 'GUARAUNOS', '1');
INSERT INTO acms_taddress VALUES (1100, 251, 'TUNAPUICITO', '1');
INSERT INTO acms_taddress VALUES (1101, 251, 'UNION', '1');
INSERT INTO acms_taddress VALUES (1102, 251, 'GRAL FCO. A VASQUEZ', '1');
INSERT INTO acms_taddress VALUES (1103, 252, 'SANTA CATALINA', '1');
INSERT INTO acms_taddress VALUES (1104, 252, 'SANTA ROSA', '1');
INSERT INTO acms_taddress VALUES (1105, 252, 'SANTA TERESA', '1');
INSERT INTO acms_taddress VALUES (1106, 252, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (1107, 252, 'MACARAPANA', '1');
INSERT INTO acms_taddress VALUES (1108, 253, 'YAGUARAPARO', '1');
INSERT INTO acms_taddress VALUES (1109, 253, 'LIBERTAD', '1');
INSERT INTO acms_taddress VALUES (1110, 253, 'PAUJIL', '1');
INSERT INTO acms_taddress VALUES (1111, 254, 'IRAPA', '1');
INSERT INTO acms_taddress VALUES (1112, 254, 'CAMPO CLARO', '1');
INSERT INTO acms_taddress VALUES (1113, 254, 'SORO', '1');
INSERT INTO acms_taddress VALUES (1114, 254, 'SAN ANTONIO DE IRAPA', '1');
INSERT INTO acms_taddress VALUES (1115, 254, 'MARABAL', '1');
INSERT INTO acms_taddress VALUES (1116, 255, 'CM. SAN ANT DEL GOLFO', '1');
INSERT INTO acms_taddress VALUES (1117, 256, 'CUMANACOA', '1');
INSERT INTO acms_taddress VALUES (1118, 256, 'ARENAS', '1');
INSERT INTO acms_taddress VALUES (1119, 256, 'ARICAGUA', '1');
INSERT INTO acms_taddress VALUES (1120, 256, 'COCOLLAR', '1');
INSERT INTO acms_taddress VALUES (1121, 256, 'SAN FERNANDO', '1');
INSERT INTO acms_taddress VALUES (1122, 256, 'SAN LORENZO', '1');
INSERT INTO acms_taddress VALUES (1123, 257, 'CARIACO', '1');
INSERT INTO acms_taddress VALUES (1124, 257, 'CATUARO', '1');
INSERT INTO acms_taddress VALUES (1125, 257, 'RENDON', '1');
INSERT INTO acms_taddress VALUES (1126, 257, 'SANTA CRUZ', '1');
INSERT INTO acms_taddress VALUES (1127, 257, 'SANTA MARIA', '1');
INSERT INTO acms_taddress VALUES (1128, 258, 'ALTAGRACIA', '1');
INSERT INTO acms_taddress VALUES (1129, 258, 'AYACUCHO', '1');
INSERT INTO acms_taddress VALUES (1130, 258, 'SANTA INES', '1');
INSERT INTO acms_taddress VALUES (1131, 258, 'VALENTIN VALIENTE', '1');
INSERT INTO acms_taddress VALUES (1132, 258, 'SAN JUAN', '1');
INSERT INTO acms_taddress VALUES (1133, 258, 'GRAN MARISCAL', '1');
INSERT INTO acms_taddress VALUES (1134, 258, 'RAUL LEONI', '1');
INSERT INTO acms_taddress VALUES (1135, 259, 'GUIRIA', '1');
INSERT INTO acms_taddress VALUES (1136, 259, 'CRISTOBAL COLON', '1');
INSERT INTO acms_taddress VALUES (1137, 259, 'PUNTA DE PIEDRA', '1');
INSERT INTO acms_taddress VALUES (1138, 259, 'BIDEAU', '1');
INSERT INTO acms_taddress VALUES (1139, 260, 'MARIÃ‘O', '1');
INSERT INTO acms_taddress VALUES (1140, 260, 'ROMULO GALLEGOS', '1');
INSERT INTO acms_taddress VALUES (1141, 261, 'TUNAPUY', '1');
INSERT INTO acms_taddress VALUES (1142, 261, 'CAMPO ELIAS', '1');
INSERT INTO acms_taddress VALUES (1143, 262, 'SAN JOSE DE AREOCUAR', '1');
INSERT INTO acms_taddress VALUES (1144, 262, 'TAVERA ACOSTA', '1');
INSERT INTO acms_taddress VALUES (1145, 263, 'CM. MARIGUITAR', '1');
INSERT INTO acms_taddress VALUES (1146, 264, 'ARAYA', '1');
INSERT INTO acms_taddress VALUES (1147, 264, 'MANICUARE', '1');
INSERT INTO acms_taddress VALUES (1148, 264, 'CHACOPATA', '1');
INSERT INTO acms_taddress VALUES (1149, 265, 'CM. COLON', '1');
INSERT INTO acms_taddress VALUES (1150, 265, 'RIVAS BERTI', '1');
INSERT INTO acms_taddress VALUES (1151, 265, 'SAN PEDRO DEL RIO', '1');
INSERT INTO acms_taddress VALUES (1152, 266, 'CM. SAN ANT DEL TACHIRA', '1');
INSERT INTO acms_taddress VALUES (1153, 266, 'PALOTAL', '1');
INSERT INTO acms_taddress VALUES (1154, 266, 'JUAN VICENTE GOMEZ', '1');
INSERT INTO acms_taddress VALUES (1155, 266, 'ISAIAS MEDINA ANGARIT', '1');
INSERT INTO acms_taddress VALUES (1156, 267, 'CM. CAPACHO NUEVO', '1');
INSERT INTO acms_taddress VALUES (1157, 267, 'JUAN GERMAN ROSCIO', '1');
INSERT INTO acms_taddress VALUES (1158, 267, 'ROMAN CARDENAS', '1');
INSERT INTO acms_taddress VALUES (1159, 268, 'CM. TARIBA', '1');
INSERT INTO acms_taddress VALUES (1160, 268, 'LA FLORIDA', '1');
INSERT INTO acms_taddress VALUES (1161, 268, 'AMENODORO RANGEL LAMU', '1');
INSERT INTO acms_taddress VALUES (1162, 269, 'CM. LA GRITA', '1');
INSERT INTO acms_taddress VALUES (1163, 269, 'EMILIO C. GUERRERO', '1');
INSERT INTO acms_taddress VALUES (1164, 269, 'MONS. MIGUEL A SALAS', '1');
INSERT INTO acms_taddress VALUES (1165, 270, 'CM. RUBIO', '1');
INSERT INTO acms_taddress VALUES (1166, 270, 'BRAMON', '1');
INSERT INTO acms_taddress VALUES (1167, 270, 'LA PETROLEA', '1');
INSERT INTO acms_taddress VALUES (1168, 270, 'QUINIMARI', '1');
INSERT INTO acms_taddress VALUES (1169, 271, 'CM. LOBATERA', '1');
INSERT INTO acms_taddress VALUES (1170, 271, 'CONSTITUCION', '1');
INSERT INTO acms_taddress VALUES (1171, 272, 'LA CONCORDIA', '1');
INSERT INTO acms_taddress VALUES (1172, 272, 'PEDRO MARIA MORANTES', '1');
INSERT INTO acms_taddress VALUES (1173, 272, 'SN JUAN BAUTISTA', '1');
INSERT INTO acms_taddress VALUES (1174, 272, 'SAN SEBASTIAN', '1');
INSERT INTO acms_taddress VALUES (1175, 272, 'DR. FCO. ROMERO LOBO', '1');
INSERT INTO acms_taddress VALUES (1176, 273, 'CM. PREGONERO', '1');
INSERT INTO acms_taddress VALUES (1177, 273, 'CARDENAS', '1');
INSERT INTO acms_taddress VALUES (1178, 273, 'POTOSI', '1');
INSERT INTO acms_taddress VALUES (1179, 273, 'JUAN PABLO PEÃ‘ALOZA', '1');
INSERT INTO acms_taddress VALUES (1180, 274, 'CM. STA. ANA  DEL TACHIRA', '1');
INSERT INTO acms_taddress VALUES (1181, 275, 'CM. LA FRIA', '1');
INSERT INTO acms_taddress VALUES (1182, 275, 'BOCA DE GRITA', '1');
INSERT INTO acms_taddress VALUES (1183, 275, 'JOSE ANTONIO PAEZ', '1');
INSERT INTO acms_taddress VALUES (1184, 276, 'CM. PALMIRA', '1');
INSERT INTO acms_taddress VALUES (1185, 277, 'CM. MICHELENA', '1');
INSERT INTO acms_taddress VALUES (1186, 278, 'CM. ABEJALES', '1');
INSERT INTO acms_taddress VALUES (1187, 278, 'SAN JOAQUIN DE NAVAY', '1');
INSERT INTO acms_taddress VALUES (1188, 278, 'DORADAS', '1');
INSERT INTO acms_taddress VALUES (1189, 278, 'EMETERIO OCHOA', '1');
INSERT INTO acms_taddress VALUES (1190, 279, 'CM. COLONCITO', '1');
INSERT INTO acms_taddress VALUES (1191, 279, 'LA PALMITA', '1');
INSERT INTO acms_taddress VALUES (1192, 280, 'CM. UREÃ‘A', '1');
INSERT INTO acms_taddress VALUES (1193, 280, 'NUEVA ARCADIA', '1');
INSERT INTO acms_taddress VALUES (1194, 281, 'CM. QUENIQUEA', '1');
INSERT INTO acms_taddress VALUES (1195, 281, 'SAN PABLO', '1');
INSERT INTO acms_taddress VALUES (1196, 281, 'ELEAZAR LOPEZ CONTRERA', '1');
INSERT INTO acms_taddress VALUES (1197, 281, 'CM. CORDERO', '1');
INSERT INTO acms_taddress VALUES (1198, 283, 'CM.SAN RAFAEL DEL PINAL', '1');
INSERT INTO acms_taddress VALUES (1199, 283, 'SANTO DOMINGO', '1');
INSERT INTO acms_taddress VALUES (1200, 283, 'ALBERTO ADRIANI', '1');
INSERT INTO acms_taddress VALUES (1201, 284, 'CM. CAPACHO VIEJO', '1');
INSERT INTO acms_taddress VALUES (1202, 284, 'CIPRIANO CASTRO', '1');
INSERT INTO acms_taddress VALUES (1203, 284, 'MANUEL FELIPE RUGELES', '1');
INSERT INTO acms_taddress VALUES (1204, 285, 'CM. LA TENDIDA', '1');
INSERT INTO acms_taddress VALUES (1205, 285, 'BOCONO', '1');
INSERT INTO acms_taddress VALUES (1206, 285, 'HERNANDEZ', '1');
INSERT INTO acms_taddress VALUES (1207, 286, 'CM. SEBORUCO', '1');
INSERT INTO acms_taddress VALUES (1208, 287, 'CM. LAS MESAS', '1');
INSERT INTO acms_taddress VALUES (1209, 288, 'CM. SAN JOSE DE BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (1210, 289, 'CM. EL COBRE', '1');
INSERT INTO acms_taddress VALUES (1211, 290, 'CM. DELICIAS', '1');
INSERT INTO acms_taddress VALUES (1212, 291, 'CM. SAN SIMON', '1');
INSERT INTO acms_taddress VALUES (1213, 292, 'CM. SAN JOSECITO', '1');
INSERT INTO acms_taddress VALUES (1214, 293, 'CM. UMUQUENA', '1');
INSERT INTO acms_taddress VALUES (1215, 294, 'BETIJOQUE', '1');
INSERT INTO acms_taddress VALUES (1216, 294, 'JOSE G HERNANDEZ', '1');
INSERT INTO acms_taddress VALUES (1217, 294, 'LA PUEBLITA', '1');
INSERT INTO acms_taddress VALUES (1218, 294, 'EL CEDRO', '1');
INSERT INTO acms_taddress VALUES (1219, 295, 'BOCONO', '1');
INSERT INTO acms_taddress VALUES (1220, 295, 'EL CARMEN', '1');
INSERT INTO acms_taddress VALUES (1221, 295, 'MOSQUEY', '1');
INSERT INTO acms_taddress VALUES (1222, 295, 'AYACUCHO', '1');
INSERT INTO acms_taddress VALUES (1223, 295, 'BURBUSAY', '1');
INSERT INTO acms_taddress VALUES (1224, 295, 'GENERAL RIVAS', '1');
INSERT INTO acms_taddress VALUES (1225, 295, 'MONSEÃ‘OR JAUREGUI', '1');
INSERT INTO acms_taddress VALUES (1226, 295, 'RAFAEL RANGEL', '1');
INSERT INTO acms_taddress VALUES (1227, 295, 'SAN JOSE', '1');
INSERT INTO acms_taddress VALUES (1228, 295, 'SAN MIGUEL', '1');
INSERT INTO acms_taddress VALUES (1229, 295, 'GUARAMACAL', '1');
INSERT INTO acms_taddress VALUES (1230, 295, 'LA VEGA DE GUARAMACAL', '1');
INSERT INTO acms_taddress VALUES (1231, 296, 'CARACHE', '1');
INSERT INTO acms_taddress VALUES (1232, 296, 'LA CONCEPCION', '1');
INSERT INTO acms_taddress VALUES (1233, 296, 'CUICAS', '1');
INSERT INTO acms_taddress VALUES (1234, 296, 'PANAMERICANA', '1');
INSERT INTO acms_taddress VALUES (1235, 296, 'SANTA CRUZ', '1');
INSERT INTO acms_taddress VALUES (1236, 297, 'ESCUQUE', '1');
INSERT INTO acms_taddress VALUES (1237, 297, 'SABANA LIBRE', '1');
INSERT INTO acms_taddress VALUES (1238, 297, 'LA UNION', '1');
INSERT INTO acms_taddress VALUES (1239, 297, 'SANTA RITA', '1');
INSERT INTO acms_taddress VALUES (1240, 298, 'CRISTOBAL MENDOZA', '1');
INSERT INTO acms_taddress VALUES (1241, 298, 'CHIQUINQUIRA', '1');
INSERT INTO acms_taddress VALUES (1242, 298, 'MATRIZ', '1');
INSERT INTO acms_taddress VALUES (1243, 298, 'MONSEÃ‘OR CARRILLO', '1');
INSERT INTO acms_taddress VALUES (1244, 298, 'CRUZ CARRILLO', '1');
INSERT INTO acms_taddress VALUES (1245, 298, 'ANDRES LINARES', '1');
INSERT INTO acms_taddress VALUES (1246, 298, 'TRES ESQUINAS', '1');
INSERT INTO acms_taddress VALUES (1247, 299, 'LA QUEBRADA', '1');
INSERT INTO acms_taddress VALUES (1248, 299, 'JAJO', '1');
INSERT INTO acms_taddress VALUES (1249, 299, 'LA MESA', '1');
INSERT INTO acms_taddress VALUES (1250, 299, 'SANTIAGO', '1');
INSERT INTO acms_taddress VALUES (1251, 299, 'CABIMBU', '1');
INSERT INTO acms_taddress VALUES (1252, 299, 'TUÃ‘AME', '1');
INSERT INTO acms_taddress VALUES (1253, 300, 'MERCEDES DIAZ', '1');
INSERT INTO acms_taddress VALUES (1254, 300, 'JUAN IGNACIO MONTILLA', '1');
INSERT INTO acms_taddress VALUES (1255, 300, 'LA BEATRIZ', '1');
INSERT INTO acms_taddress VALUES (1256, 300, 'MENDOZA', '1');
INSERT INTO acms_taddress VALUES (1257, 300, 'LA PUERTA', '1');
INSERT INTO acms_taddress VALUES (1258, 300, 'SAN LUIS', '1');
INSERT INTO acms_taddress VALUES (1259, 301, 'CHEJENDE', '1');
INSERT INTO acms_taddress VALUES (1260, 301, 'CARRILLO', '1');
INSERT INTO acms_taddress VALUES (1261, 301, 'CEGARRA', '1');
INSERT INTO acms_taddress VALUES (1262, 301, 'BOLIVIA', '1');
INSERT INTO acms_taddress VALUES (1263, 301, 'MANUEL SALVADOR ULLOA', '1');
INSERT INTO acms_taddress VALUES (1264, 301, 'SAN JOSE', '1');
INSERT INTO acms_taddress VALUES (1265, 301, 'ARNOLDO GABALDON', '1');
INSERT INTO acms_taddress VALUES (1266, 302, 'EL DIVIDIVE', '1');
INSERT INTO acms_taddress VALUES (1267, 302, 'AGUA CALIENTE', '1');
INSERT INTO acms_taddress VALUES (1268, 302, 'EL CENIZO', '1');
INSERT INTO acms_taddress VALUES (1269, 302, 'AGUA SANTA', '1');
INSERT INTO acms_taddress VALUES (1270, 302, 'VALERITA', '1');
INSERT INTO acms_taddress VALUES (1271, 303, 'MONTE CARMELO', '1');
INSERT INTO acms_taddress VALUES (1272, 303, 'BUENA VISTA', '1');
INSERT INTO acms_taddress VALUES (1273, 303, 'STA MARIA DEL HORCON', '1');
INSERT INTO acms_taddress VALUES (1274, 304, 'MOTATAN', '1');
INSERT INTO acms_taddress VALUES (1275, 304, 'EL BAÃ‘O', '1');
INSERT INTO acms_taddress VALUES (1276, 304, 'JALISCO', '1');
INSERT INTO acms_taddress VALUES (1277, 305, 'PAMPAN', '1');
INSERT INTO acms_taddress VALUES (1278, 305, 'SANTA ANA', '1');
INSERT INTO acms_taddress VALUES (1279, 305, 'LA PAZ', '1');
INSERT INTO acms_taddress VALUES (1280, 305, 'FLOR DE PATRIA', '1');
INSERT INTO acms_taddress VALUES (1281, 306, 'CARVAJAL', '1');
INSERT INTO acms_taddress VALUES (1282, 306, 'ANTONIO N BRICEÃ‘O', '1');
INSERT INTO acms_taddress VALUES (1283, 306, 'CAMPO ALEGRE', '1');
INSERT INTO acms_taddress VALUES (1284, 306, 'JOSE LEONARDO SUAREZ', '1');
INSERT INTO acms_taddress VALUES (1285, 307, 'SABANA DE MENDOZA', '1');
INSERT INTO acms_taddress VALUES (1286, 307, 'JUNIN', '1');
INSERT INTO acms_taddress VALUES (1287, 307, 'VALMORE RODRIGUEZ', '1');
INSERT INTO acms_taddress VALUES (1288, 307, 'EL PARAISO', '1');
INSERT INTO acms_taddress VALUES (1289, 308, 'SANTA ISABEL', '1');
INSERT INTO acms_taddress VALUES (1290, 308, 'ARAGUANEY', '1');
INSERT INTO acms_taddress VALUES (1291, 308, 'EL JAGUITO', '1');
INSERT INTO acms_taddress VALUES (1292, 308, 'LA ESPERANZA', '1');
INSERT INTO acms_taddress VALUES (1293, 309, 'SABANA GRANDE', '1');
INSERT INTO acms_taddress VALUES (1294, 309, 'CHEREGUE', '1');
INSERT INTO acms_taddress VALUES (1295, 309, 'GRANADOS', '1');
INSERT INTO acms_taddress VALUES (1296, 310, 'EL SOCORRO', '1');
INSERT INTO acms_taddress VALUES (1297, 310, 'LOS CAPRICHOS', '1');
INSERT INTO acms_taddress VALUES (1298, 310, 'ANTONIO JOSE DE SUCRE', '1');
INSERT INTO acms_taddress VALUES (1299, 311, 'CAMPO ELIAS', '1');
INSERT INTO acms_taddress VALUES (1300, 311, 'ARNOLDO GABALDON', '1');
INSERT INTO acms_taddress VALUES (1301, 312, 'SANTA APOLONIA', '1');
INSERT INTO acms_taddress VALUES (1302, 312, 'LA CEIBA', '1');
INSERT INTO acms_taddress VALUES (1303, 312, 'EL PROGRESO', '1');
INSERT INTO acms_taddress VALUES (1304, 312, 'TRES DE FEBRERO', '1');
INSERT INTO acms_taddress VALUES (1305, 313, 'PAMPANITO', '1');
INSERT INTO acms_taddress VALUES (1306, 313, 'PAMPANITO II', '1');
INSERT INTO acms_taddress VALUES (1307, 313, 'LA CONCEPCION', '1');
INSERT INTO acms_taddress VALUES (1308, 214, 'CM. AROA', '1');
INSERT INTO acms_taddress VALUES (1309, 315, 'CM. CHIVACOA', '1');
INSERT INTO acms_taddress VALUES (1310, 315, 'CAMPO ELIAS', '1');
INSERT INTO acms_taddress VALUES (1311, 316, 'CM. NIRGUA', '1');
INSERT INTO acms_taddress VALUES (1312, 316, 'SALOM', '1');
INSERT INTO acms_taddress VALUES (1313, 316, 'TEMERLA', '1');
INSERT INTO acms_taddress VALUES (1314, 317, 'CM. SAN FELIPE', '1');
INSERT INTO acms_taddress VALUES (1315, 317, 'ALBARICO', '1');
INSERT INTO acms_taddress VALUES (1316, 317, 'SAN JAVIER', '1');
INSERT INTO acms_taddress VALUES (1317, 318, 'CM. GUAMA', '1');
INSERT INTO acms_taddress VALUES (1318, 319, 'CM. URACHICHE', '1');
INSERT INTO acms_taddress VALUES (1319, 320, 'CM. YARITAGUA', '1');
INSERT INTO acms_taddress VALUES (1320, 320, 'SAN ANDRES', '1');
INSERT INTO acms_taddress VALUES (1321, 321, 'CM. SABANA DE PARRA', '1');
INSERT INTO acms_taddress VALUES (1322, 322, 'CM. BORAURE', '1');
INSERT INTO acms_taddress VALUES (1323, 323, 'CM. COCOROTE', '1');
INSERT INTO acms_taddress VALUES (1324, 324, 'CM. INDEPENDENCIA', '1');
INSERT INTO acms_taddress VALUES (1325, 325, 'CM. SAN PABLO', '1');
INSERT INTO acms_taddress VALUES (1326, 326, 'CM. YUMARE', '1');
INSERT INTO acms_taddress VALUES (1327, 327, 'CM. FARRIAR', '1');
INSERT INTO acms_taddress VALUES (1328, 327, 'EL GUAYABO', '1');
INSERT INTO acms_taddress VALUES (1329, 328, 'GENERAL URDANETA', '1');
INSERT INTO acms_taddress VALUES (1330, 328, 'LIBERTADOR', '1');
INSERT INTO acms_taddress VALUES (1331, 328, 'MANUEL GUANIPA MATOS', '1');
INSERT INTO acms_taddress VALUES (1332, 328, 'MARCELINO BRICEÃ‘O', '1');
INSERT INTO acms_taddress VALUES (1333, 328, 'SAN TIMOTEO', '1');
INSERT INTO acms_taddress VALUES (1334, 328, 'PUEBLO NUEVO', '1');
INSERT INTO acms_taddress VALUES (1335, 329, 'PEDRO LUCAS URRIBARRI', '1');
INSERT INTO acms_taddress VALUES (1336, 329, 'SANTA RITA', '1');
INSERT INTO acms_taddress VALUES (1337, 329, 'JOSE CENOVIO URRIBARR', '1');
INSERT INTO acms_taddress VALUES (1338, 329, 'EL MENE', '1');
INSERT INTO acms_taddress VALUES (1339, 330, 'SANTA CRUZ DEL ZULIA', '1');
INSERT INTO acms_taddress VALUES (1340, 330, 'URRIBARRI', '1');
INSERT INTO acms_taddress VALUES (1341, 330, 'MORALITO', '1');
INSERT INTO acms_taddress VALUES (1342, 330, 'SAN CARLOS DEL ZULIA', '1');
INSERT INTO acms_taddress VALUES (1343, 330, 'SANTA BARBARA', '1');
INSERT INTO acms_taddress VALUES (1344, 331, 'LUIS DE VICENTE', '1');
INSERT INTO acms_taddress VALUES (1345, 331, 'RICAURTE', '1');
INSERT INTO acms_taddress VALUES (1346, 331, 'MONS.MARCOS SERGIO G', '1');
INSERT INTO acms_taddress VALUES (1347, 331, 'SAN RAFAEL', '1');
INSERT INTO acms_taddress VALUES (1348, 331, 'LAS PARCELAS', '1');
INSERT INTO acms_taddress VALUES (1349, 331, 'TAMARE', '1');
INSERT INTO acms_taddress VALUES (1350, 331, 'LA SIERRITA', '1');
INSERT INTO acms_taddress VALUES (1351, 332, 'BOLIVAR', '1');
INSERT INTO acms_taddress VALUES (1352, 332, 'COQUIVACOA', '1');
INSERT INTO acms_taddress VALUES (1353, 332, 'CRISTO DE ARANZA', '1');
INSERT INTO acms_taddress VALUES (1354, 332, 'CHIQUINQUIRA', '1');
INSERT INTO acms_taddress VALUES (1355, 332, 'SANTA LUCIA', '1');
INSERT INTO acms_taddress VALUES (1356, 332, 'OLEGARIO VILLALOBOS', '1');
INSERT INTO acms_taddress VALUES (1357, 332, 'JUANA DE AVILA', '1');
INSERT INTO acms_taddress VALUES (1358, 332, 'CARACCIOLO PARRA PEREZ', '1');
INSERT INTO acms_taddress VALUES (1359, 332, 'IDELFONZO VASQUEZ', '1');
INSERT INTO acms_taddress VALUES (1360, 332, 'CACIQUE MARA', '1');
INSERT INTO acms_taddress VALUES (1361, 332, 'CECILIO ACOSTA', '1');
INSERT INTO acms_taddress VALUES (1362, 332, 'RAUL LEONI', '1');
INSERT INTO acms_taddress VALUES (1363, 332, 'FRANCISCO EUGENIO B', '1');
INSERT INTO acms_taddress VALUES (1364, 332, 'MANUEL DAGNINO', '1');
INSERT INTO acms_taddress VALUES (1365, 332, 'LUIS HURTADO HIGUERA', '1');
INSERT INTO acms_taddress VALUES (1366, 332, 'VENANCIO PULGAR', '1');
INSERT INTO acms_taddress VALUES (1367, 332, 'ANTONIO BORJAS ROMERO', '1');
INSERT INTO acms_taddress VALUES (1368, 332, 'SAN ISIDRO', '1');
INSERT INTO acms_taddress VALUES (1369, 333, 'FARIA', '1');
INSERT INTO acms_taddress VALUES (1370, 333, 'SAN ANTONIO', '1');
INSERT INTO acms_taddress VALUES (1371, 333, 'ANA MARIA CAMPOS', '1');
INSERT INTO acms_taddress VALUES (1372, 333, 'SAN JOSE', '1');
INSERT INTO acms_taddress VALUES (1373, 333, 'ALTAGRACIA', '1');
INSERT INTO acms_taddress VALUES (1374, 334, 'GOAJIRA', '1');
INSERT INTO acms_taddress VALUES (1375, 334, 'ELIAS SANCHEZ RUBIO', '1');
INSERT INTO acms_taddress VALUES (1376, 334, 'SINAMAICA', '1');
INSERT INTO acms_taddress VALUES (1377, 334, 'ALTA GUAJIRA', '1');
INSERT INTO acms_taddress VALUES (1378, 335, 'SAN JOSE DE PERIJA', '1');
INSERT INTO acms_taddress VALUES (1379, 335, 'BARTOLOME DE LAS CASAS', '1');
INSERT INTO acms_taddress VALUES (1380, 335, 'LIBERTAD', '1');
INSERT INTO acms_taddress VALUES (1381, 335, 'RIO NEGRO', '1');
INSERT INTO acms_taddress VALUES (1382, 336, 'GIBRALTAR', '1');
INSERT INTO acms_taddress VALUES (1383, 336, 'HERAS', '1');
INSERT INTO acms_taddress VALUES (1384, 336, 'M.ARTURO CELESTINO A', '1');
INSERT INTO acms_taddress VALUES (1385, 336, 'ROMULO GALLEGOS', '1');
INSERT INTO acms_taddress VALUES (1386, 336, 'BOBURES', '1');
INSERT INTO acms_taddress VALUES (1387, 336, 'EL BATEY', '1');
INSERT INTO acms_taddress VALUES (1388, 337, 'ANDRES BELLO (', '1');
INSERT INTO acms_taddress VALUES (1389, 337, 'POTRERITOS', '1');
INSERT INTO acms_taddress VALUES (1390, 337, 'EL CARMELO', '1');
INSERT INTO acms_taddress VALUES (1391, 337, 'CHIQUINQUIRA', '1');
INSERT INTO acms_taddress VALUES (1392, 337, 'CONCEPCION', '1');
INSERT INTO acms_taddress VALUES (1393, 338, 'ELEAZAR LOPEZ C', '1');
INSERT INTO acms_taddress VALUES (1394, 338, 'ALONSO DE OJEDA', '1');
INSERT INTO acms_taddress VALUES (1395, 338, 'VENEZUELA', '1');
INSERT INTO acms_taddress VALUES (1396, 338, 'CAMPO LARA', '1');
INSERT INTO acms_taddress VALUES (1397, 338, 'LIBERTAD', '1');
INSERT INTO acms_taddress VALUES (1398, 339, 'UDON PEREZ', '1');
INSERT INTO acms_taddress VALUES (1399, 339, 'ENCONTRADOS', '1');
INSERT INTO acms_taddress VALUES (1400, 340, 'DONALDO GARCIA', '1');
INSERT INTO acms_taddress VALUES (1401, 340, 'SIXTO ZAMBRANO', '1');
INSERT INTO acms_taddress VALUES (1402, 340, 'EL ROSARIO', '1');
INSERT INTO acms_taddress VALUES (1403, 341, 'AMBROSIO', '1');
INSERT INTO acms_taddress VALUES (1404, 341, 'GERMAN RIOS LINARES', '1');
INSERT INTO acms_taddress VALUES (1405, 341, 'JORGE HERNANDEZ', '1');
INSERT INTO acms_taddress VALUES (1406, 341, 'LA ROSA', '1');
INSERT INTO acms_taddress VALUES (1407, 341, 'PUNTA GORDA', '1');
INSERT INTO acms_taddress VALUES (1408, 341, 'CARMEN HERRERA', '1');
INSERT INTO acms_taddress VALUES (1409, 341, 'SAN BENITO', '1');
INSERT INTO acms_taddress VALUES (1410, 341, 'ROMULO BETANCOURT', '1');
INSERT INTO acms_taddress VALUES (1411, 341, 'ARISTIDES CALVANI', '1');
INSERT INTO acms_taddress VALUES (1412, 342, 'RAUL CUENCA', '1');
INSERT INTO acms_taddress VALUES (1413, 342, 'LA VICTORIA', '1');
INSERT INTO acms_taddress VALUES (1414, 342, 'RAFAEL URDANETA', '1');
INSERT INTO acms_taddress VALUES (1415, 343, 'JOSE RAMON YEPEZ', '1');
INSERT INTO acms_taddress VALUES (1416, 343, 'LA CONCEPCION', '1');
INSERT INTO acms_taddress VALUES (1417, 343, 'SAN JOSE', '1');
INSERT INTO acms_taddress VALUES (1418, 343, 'MARIANO PARRA LEON', '1');
INSERT INTO acms_taddress VALUES (1419, 344, 'MONAGAS', '1');
INSERT INTO acms_taddress VALUES (1420, 344, 'ISLA DE TOAS', '1');
INSERT INTO acms_taddress VALUES (1421, 345, 'MARCIAL HERNANDEZ', '1');
INSERT INTO acms_taddress VALUES (1422, 345, 'FRANCISCO OCHOA', '1');
INSERT INTO acms_taddress VALUES (1423, 345, 'SAN FRANCISCO', '1');
INSERT INTO acms_taddress VALUES (1424, 345, 'EL BAJO', '1');
INSERT INTO acms_taddress VALUES (1425, 345, 'DOMITILA FLORES', '1');
INSERT INTO acms_taddress VALUES (1426, 345, 'LOS CORTIJOS', '1');
INSERT INTO acms_taddress VALUES (1427, 346, 'BARI', '1');
INSERT INTO acms_taddress VALUES (1428, 346, 'JESUS M SEMPRUN', '1');
INSERT INTO acms_taddress VALUES (1429, 347, 'SIMON RODRIGUEZ', '1');
INSERT INTO acms_taddress VALUES (1430, 347, 'CARLOS QUEVEDO', '1');
INSERT INTO acms_taddress VALUES (1431, 347, 'FRANCISCO J PULGAR', '1');
INSERT INTO acms_taddress VALUES (1432, 348, 'RAFAEL MARIA BARALT', '1');
INSERT INTO acms_taddress VALUES (1433, 348, 'MANUEL MANRIQUE', '1');
INSERT INTO acms_taddress VALUES (1434, 348, 'RAFAEL URDANETA', '1');
INSERT INTO acms_taddress VALUES (1435, 349, 'FERNANDO GIRON TOVAR', '1');
INSERT INTO acms_taddress VALUES (1436, 349, 'LUIS ALBERTO GOMEZ', '1');
INSERT INTO acms_taddress VALUES (1437, 349, 'PARHUEÃ‘A', '1');
INSERT INTO acms_taddress VALUES (1438, 349, 'PLATANILLAL', '1');
INSERT INTO acms_taddress VALUES (1439, 350, 'CM. SAN FERNANDO DE ATABA', '1');
INSERT INTO acms_taddress VALUES (1440, 350, 'UCATA', '1');
INSERT INTO acms_taddress VALUES (1441, 350, 'YAPACANA', '1');
INSERT INTO acms_taddress VALUES (1442, 350, 'CANAME', '1');
INSERT INTO acms_taddress VALUES (1443, 351, 'CM. MAROA', '1');
INSERT INTO acms_taddress VALUES (1444, 351, 'VICTORINO', '1');
INSERT INTO acms_taddress VALUES (1445, 351, 'COMUNIDAD', '1');
INSERT INTO acms_taddress VALUES (1446, 352, 'CM. SAN CARLOS DE RIO NEG', '1');
INSERT INTO acms_taddress VALUES (1447, 352, 'SOLANO', '1');
INSERT INTO acms_taddress VALUES (1448, 352, 'COCUY', '1');
INSERT INTO acms_taddress VALUES (1449, 353, 'CM. ISLA DE RATON', '1');
INSERT INTO acms_taddress VALUES (1450, 353, 'SAMARIAPO', '1');
INSERT INTO acms_taddress VALUES (1451, 353, 'SIPAPO', '1');
INSERT INTO acms_taddress VALUES (1452, 353, 'MUNDUAPO', '1');
INSERT INTO acms_taddress VALUES (1453, 353, 'GUAYAPO', '1');
INSERT INTO acms_taddress VALUES (1454, 354, 'CM. SAN JUAN DE MANAPIARE', '1');
INSERT INTO acms_taddress VALUES (1455, 354, 'ALTO VENTUARI', '1');
INSERT INTO acms_taddress VALUES (1456, 354, 'MEDIO VENTUARI', '1');
INSERT INTO acms_taddress VALUES (1457, 354, 'BAJO VENTUARI', '1');
INSERT INTO acms_taddress VALUES (1458, 355, 'CM. LA ESMERALDA', '1');
INSERT INTO acms_taddress VALUES (1459, 355, 'HUACHAMACARE', '1');
INSERT INTO acms_taddress VALUES (1460, 355, 'MARAWAKA', '1');
INSERT INTO acms_taddress VALUES (1461, 355, 'MAVACA', '1');
INSERT INTO acms_taddress VALUES (1462, 355, 'SIERRA PARIMA', '1');
INSERT INTO acms_taddress VALUES (1463, 356, 'SAN JOSE', '1');
INSERT INTO acms_taddress VALUES (1464, 356, 'VIRGEN DEL VALLE', '1');
INSERT INTO acms_taddress VALUES (1465, 356, 'SAN RAFAEL', '1');
INSERT INTO acms_taddress VALUES (1466, 356, 'JOSE VIDAL MARCANO', '1');
INSERT INTO acms_taddress VALUES (1467, 356, 'LEONARDO RUIZ PINEDA', '1');
INSERT INTO acms_taddress VALUES (1468, 356, 'MONS. ARGIMIRO GARCIA', '1');
INSERT INTO acms_taddress VALUES (1469, 356, 'MCL.ANTONIO J DE SUCRE', '1');
INSERT INTO acms_taddress VALUES (1470, 356, 'JUAN MILLAN', '1');
INSERT INTO acms_taddress VALUES (1471, 357, 'PEDERNALES', '1');
INSERT INTO acms_taddress VALUES (1472, 357, 'LUIS B PRIETO FIGUERO', '1');
INSERT INTO acms_taddress VALUES (1473, 358, 'CURIAPO', '1');
INSERT INTO acms_taddress VALUES (1474, 358, 'SANTOS DE ABELGAS', '1');
INSERT INTO acms_taddress VALUES (1475, 358, 'MANUEL RENAUD', '1');
INSERT INTO acms_taddress VALUES (1476, 358, 'PADRE BARRAL', '1');
INSERT INTO acms_taddress VALUES (1477, 358, 'ANICETO LUGO', '1');
INSERT INTO acms_taddress VALUES (1478, 358, 'ALMIRANTE LUIS BRION', '1');
INSERT INTO acms_taddress VALUES (1479, 359, 'IMATACA', '1');
INSERT INTO acms_taddress VALUES (1480, 359, 'ROMULO GALLEGOS', '1');
INSERT INTO acms_taddress VALUES (1481, 359, 'JUAN BAUTISTA ARISMEN', '1');
INSERT INTO acms_taddress VALUES (1482, 359, 'MANUEL PIAR', '1');
INSERT INTO acms_taddress VALUES (1483, 359, '5 DE JULIO', '1');
INSERT INTO acms_taddress VALUES (1484, 360, 'CARABALLEDA', '1');
INSERT INTO acms_taddress VALUES (1485, 360, 'CARAYACA', '1');
INSERT INTO acms_taddress VALUES (1486, 360, 'CARUAO', '1');
INSERT INTO acms_taddress VALUES (1487, 360, 'CATIA LA MAR', '1');
INSERT INTO acms_taddress VALUES (1488, 360, 'LA GUAIRA', '1');
INSERT INTO acms_taddress VALUES (1489, 360, 'MACUTO', '1');
INSERT INTO acms_taddress VALUES (1490, 360, 'MAIQUETIA', '1');
INSERT INTO acms_taddress VALUES (1491, 360, 'NAIGUATA', '1');
INSERT INTO acms_taddress VALUES (1492, 360, 'EL JUNKO', '1');
INSERT INTO acms_taddress VALUES (1493, 360, 'PQ RAUL LEONI', '1');
INSERT INTO acms_taddress VALUES (1494, 360, 'PQ CARLOS SOUBLETTE', '1');
INSERT INTO acms_taddress VALUES (1495, 0, 'COLOMBIA', '1');
INSERT INTO acms_taddress VALUES (1496, 1495, 'LA GUAJIRA', '1');
INSERT INTO acms_taddress VALUES (1497, 1495, 'AMAZONAS', '1');
INSERT INTO acms_taddress VALUES (1498, 1495, 'ARAUCA', '1');
INSERT INTO acms_taddress VALUES (1499, 1495, 'ANTIOQUIA', '1');
INSERT INTO acms_taddress VALUES (1500, 0, 'URUGUAY', '1');
INSERT INTO acms_taddress VALUES (1501, 0, 'PERU', '1');
INSERT INTO acms_taddress VALUES (1502, 1501, 'LIMA', '1');


--
-- Name: acms_taddress_idaddress_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_taddress_idaddress_seq', 1502, false);


--
-- Data for Name: acms_tcharge; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tcharge VALUES (1, 'Administrador', '1');
INSERT INTO acms_tcharge VALUES (2, 'gerente', '1');


--
-- Name: acms_tcharge_idcharge_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tcharge_idcharge_seq', 2, true);


--
-- Data for Name: acms_tcontact; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: acms_tcontact_idcontact_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tcontact_idcontact_seq', 6729, false);


--
-- Data for Name: acms_tdcharge_service_action; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tdcharge_service_action VALUES (6588, 1, 28, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6589, 1, 28, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6590, 1, 28, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6591, 1, 23, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6592, 1, 23, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6593, 1, 23, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6594, 1, 23, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6595, 1, 23, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6596, 1, 23, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6597, 1, 32, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6598, 1, 33, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6599, 1, 33, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6600, 1, 33, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6601, 1, 33, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6602, 1, 33, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6603, 1, 33, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6604, 1, 34, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6605, 1, 34, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6606, 1, 34, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6607, 1, 34, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6608, 1, 34, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6609, 1, 34, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6610, 1, 24, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6611, 1, 24, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6612, 1, 24, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6613, 1, 24, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6614, 1, 24, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6615, 1, 24, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6616, 1, 29, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6617, 1, 29, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6618, 1, 27, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6619, 1, 27, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6620, 1, 27, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6621, 1, 27, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6622, 1, 22, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6623, 1, 22, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6624, 1, 22, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6625, 1, 22, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6626, 1, 22, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6627, 1, 22, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6628, 1, 22, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6629, 1, 30, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6630, 1, 30, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6631, 1, 30, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6632, 1, 30, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6633, 1, 30, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6634, 1, 30, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6635, 1, 13, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6636, 1, 13, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6637, 1, 13, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6638, 1, 13, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6639, 1, 13, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6640, 1, 13, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6641, 1, 13, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6642, 1, 11, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6643, 1, 11, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6644, 1, 11, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6645, 1, 11, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6646, 1, 11, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6647, 1, 11, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6648, 1, 11, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6649, 1, 12, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6650, 1, 12, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6651, 1, 12, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6652, 1, 12, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6653, 1, 12, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6654, 1, 12, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6655, 1, 12, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6656, 1, 10, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6657, 1, 10, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6658, 1, 10, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6659, 1, 10, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6660, 1, 10, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6661, 1, 10, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6662, 1, 10, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6663, 1, 25, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6664, 1, 18, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6665, 1, 18, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6666, 1, 19, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6667, 1, 19, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6668, 1, 17, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6669, 1, 17, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6670, 1, 31, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6671, 1, 31, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6672, 1, 5, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6673, 1, 5, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6674, 1, 5, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6675, 1, 5, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6676, 1, 5, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6677, 1, 5, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6678, 1, 5, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6679, 1, 15, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6680, 1, 15, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6681, 1, 15, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6682, 1, 15, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6683, 1, 15, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6684, 1, 15, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6685, 1, 15, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6686, 1, 3, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6687, 1, 3, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6688, 1, 3, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6689, 1, 3, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6690, 1, 3, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6691, 1, 3, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6692, 1, 8, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6693, 1, 8, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6694, 1, 8, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6695, 1, 8, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6696, 1, 8, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6697, 1, 8, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6698, 1, 6, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6699, 1, 6, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6700, 1, 6, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6701, 1, 6, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6702, 1, 6, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6703, 1, 6, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6704, 1, 6, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6705, 1, 20, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6706, 1, 20, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6707, 1, 4, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6708, 1, 4, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6709, 1, 4, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6710, 1, 4, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6711, 1, 4, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6712, 1, 4, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6713, 1, 4, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6714, 1, 14, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6715, 1, 14, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6716, 1, 14, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6717, 1, 14, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6718, 1, 14, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6719, 1, 14, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6720, 1, 14, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6721, 1, 2, 1);
INSERT INTO acms_tdcharge_service_action VALUES (6722, 1, 2, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6723, 1, 2, 3);
INSERT INTO acms_tdcharge_service_action VALUES (6724, 1, 2, 4);
INSERT INTO acms_tdcharge_service_action VALUES (6725, 1, 2, 5);
INSERT INTO acms_tdcharge_service_action VALUES (6726, 1, 2, 6);
INSERT INTO acms_tdcharge_service_action VALUES (6727, 1, 2, 7);
INSERT INTO acms_tdcharge_service_action VALUES (6728, 1, 7, 2);
INSERT INTO acms_tdcharge_service_action VALUES (6729, 1, 7, 3);


--
-- Name: acms_tdcharge_service_action_idcharge_service_action_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tdcharge_service_action_idcharge_service_action_seq', 1, false);


--
-- Data for Name: acms_tdpassword; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tdpassword VALUES (1, 1, '$2y$10$aDzI0WoOWNUBtlqFg1e78OP.CISTk7OHFyyFBCs23JqC7cC/EV25m', '2017-08-10 20:11:01', '1');


--
-- Name: acms_tdpassword_idpassword_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tdpassword_idpassword_seq', 1, false);


--
-- Data for Name: acms_tdquestion_answer; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: acms_tdquestion_answer_idquestion_answer_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tdquestion_answer_idquestion_answer_seq', 1, false);


--
-- Data for Name: acms_tdservice_action; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tdservice_action VALUES (1, 2, 1);
INSERT INTO acms_tdservice_action VALUES (2, 2, 2);
INSERT INTO acms_tdservice_action VALUES (3, 2, 3);
INSERT INTO acms_tdservice_action VALUES (4, 2, 4);
INSERT INTO acms_tdservice_action VALUES (5, 2, 5);
INSERT INTO acms_tdservice_action VALUES (6, 2, 6);
INSERT INTO acms_tdservice_action VALUES (7, 2, 7);
INSERT INTO acms_tdservice_action VALUES (8, 3, 1);
INSERT INTO acms_tdservice_action VALUES (9, 3, 2);
INSERT INTO acms_tdservice_action VALUES (10, 3, 3);
INSERT INTO acms_tdservice_action VALUES (11, 3, 4);
INSERT INTO acms_tdservice_action VALUES (12, 3, 5);
INSERT INTO acms_tdservice_action VALUES (14, 3, 7);
INSERT INTO acms_tdservice_action VALUES (15, 4, 1);
INSERT INTO acms_tdservice_action VALUES (16, 4, 2);
INSERT INTO acms_tdservice_action VALUES (17, 4, 3);
INSERT INTO acms_tdservice_action VALUES (18, 4, 4);
INSERT INTO acms_tdservice_action VALUES (19, 4, 5);
INSERT INTO acms_tdservice_action VALUES (20, 4, 6);
INSERT INTO acms_tdservice_action VALUES (21, 4, 7);
INSERT INTO acms_tdservice_action VALUES (122, 6, 1);
INSERT INTO acms_tdservice_action VALUES (123, 6, 2);
INSERT INTO acms_tdservice_action VALUES (124, 6, 3);
INSERT INTO acms_tdservice_action VALUES (125, 6, 4);
INSERT INTO acms_tdservice_action VALUES (126, 6, 5);
INSERT INTO acms_tdservice_action VALUES (127, 6, 6);
INSERT INTO acms_tdservice_action VALUES (128, 6, 7);
INSERT INTO acms_tdservice_action VALUES (129, 5, 1);
INSERT INTO acms_tdservice_action VALUES (130, 5, 2);
INSERT INTO acms_tdservice_action VALUES (131, 5, 3);
INSERT INTO acms_tdservice_action VALUES (132, 5, 4);
INSERT INTO acms_tdservice_action VALUES (133, 5, 5);
INSERT INTO acms_tdservice_action VALUES (134, 5, 6);
INSERT INTO acms_tdservice_action VALUES (135, 5, 7);
INSERT INTO acms_tdservice_action VALUES (136, 7, 2);
INSERT INTO acms_tdservice_action VALUES (137, 7, 3);
INSERT INTO acms_tdservice_action VALUES (138, 8, 1);
INSERT INTO acms_tdservice_action VALUES (139, 8, 2);
INSERT INTO acms_tdservice_action VALUES (140, 8, 3);
INSERT INTO acms_tdservice_action VALUES (141, 8, 4);
INSERT INTO acms_tdservice_action VALUES (142, 8, 5);
INSERT INTO acms_tdservice_action VALUES (143, 8, 7);
INSERT INTO acms_tdservice_action VALUES (144, 10, 1);
INSERT INTO acms_tdservice_action VALUES (145, 10, 2);
INSERT INTO acms_tdservice_action VALUES (146, 10, 3);
INSERT INTO acms_tdservice_action VALUES (147, 10, 4);
INSERT INTO acms_tdservice_action VALUES (148, 10, 5);
INSERT INTO acms_tdservice_action VALUES (149, 10, 6);
INSERT INTO acms_tdservice_action VALUES (150, 10, 7);
INSERT INTO acms_tdservice_action VALUES (151, 11, 1);
INSERT INTO acms_tdservice_action VALUES (153, 11, 3);
INSERT INTO acms_tdservice_action VALUES (154, 11, 4);
INSERT INTO acms_tdservice_action VALUES (155, 11, 5);
INSERT INTO acms_tdservice_action VALUES (156, 11, 6);
INSERT INTO acms_tdservice_action VALUES (157, 11, 7);
INSERT INTO acms_tdservice_action VALUES (158, 11, 2);
INSERT INTO acms_tdservice_action VALUES (159, 12, 1);
INSERT INTO acms_tdservice_action VALUES (160, 12, 2);
INSERT INTO acms_tdservice_action VALUES (161, 12, 3);
INSERT INTO acms_tdservice_action VALUES (162, 12, 4);
INSERT INTO acms_tdservice_action VALUES (163, 12, 5);
INSERT INTO acms_tdservice_action VALUES (164, 12, 6);
INSERT INTO acms_tdservice_action VALUES (165, 12, 7);
INSERT INTO acms_tdservice_action VALUES (166, 13, 1);
INSERT INTO acms_tdservice_action VALUES (167, 13, 2);
INSERT INTO acms_tdservice_action VALUES (168, 13, 3);
INSERT INTO acms_tdservice_action VALUES (169, 13, 4);
INSERT INTO acms_tdservice_action VALUES (170, 13, 5);
INSERT INTO acms_tdservice_action VALUES (171, 13, 6);
INSERT INTO acms_tdservice_action VALUES (172, 13, 7);
INSERT INTO acms_tdservice_action VALUES (174, 14, 2);
INSERT INTO acms_tdservice_action VALUES (175, 14, 3);
INSERT INTO acms_tdservice_action VALUES (176, 14, 4);
INSERT INTO acms_tdservice_action VALUES (177, 14, 5);
INSERT INTO acms_tdservice_action VALUES (178, 14, 6);
INSERT INTO acms_tdservice_action VALUES (179, 14, 7);
INSERT INTO acms_tdservice_action VALUES (180, 15, 1);
INSERT INTO acms_tdservice_action VALUES (181, 15, 2);
INSERT INTO acms_tdservice_action VALUES (182, 15, 3);
INSERT INTO acms_tdservice_action VALUES (183, 15, 4);
INSERT INTO acms_tdservice_action VALUES (184, 15, 5);
INSERT INTO acms_tdservice_action VALUES (185, 15, 6);
INSERT INTO acms_tdservice_action VALUES (186, 15, 7);
INSERT INTO acms_tdservice_action VALUES (190, 17, 3);
INSERT INTO acms_tdservice_action VALUES (191, 18, 3);
INSERT INTO acms_tdservice_action VALUES (192, 19, 3);
INSERT INTO acms_tdservice_action VALUES (195, 14, 1);
INSERT INTO acms_tdservice_action VALUES (196, 20, 2);
INSERT INTO acms_tdservice_action VALUES (197, 20, 3);
INSERT INTO acms_tdservice_action VALUES (198, 22, 1);
INSERT INTO acms_tdservice_action VALUES (199, 22, 2);
INSERT INTO acms_tdservice_action VALUES (200, 22, 3);
INSERT INTO acms_tdservice_action VALUES (201, 22, 4);
INSERT INTO acms_tdservice_action VALUES (202, 22, 5);
INSERT INTO acms_tdservice_action VALUES (203, 22, 6);
INSERT INTO acms_tdservice_action VALUES (204, 22, 7);
INSERT INTO acms_tdservice_action VALUES (205, 23, 1);
INSERT INTO acms_tdservice_action VALUES (206, 23, 2);
INSERT INTO acms_tdservice_action VALUES (207, 23, 3);
INSERT INTO acms_tdservice_action VALUES (208, 23, 4);
INSERT INTO acms_tdservice_action VALUES (209, 23, 5);
INSERT INTO acms_tdservice_action VALUES (211, 23, 7);
INSERT INTO acms_tdservice_action VALUES (212, 24, 1);
INSERT INTO acms_tdservice_action VALUES (213, 24, 2);
INSERT INTO acms_tdservice_action VALUES (214, 24, 3);
INSERT INTO acms_tdservice_action VALUES (215, 24, 4);
INSERT INTO acms_tdservice_action VALUES (216, 24, 5);
INSERT INTO acms_tdservice_action VALUES (218, 24, 7);
INSERT INTO acms_tdservice_action VALUES (219, 25, 3);
INSERT INTO acms_tdservice_action VALUES (220, 26, 2);
INSERT INTO acms_tdservice_action VALUES (221, 26, 3);
INSERT INTO acms_tdservice_action VALUES (222, 27, 1);
INSERT INTO acms_tdservice_action VALUES (223, 27, 3);
INSERT INTO acms_tdservice_action VALUES (224, 27, 7);
INSERT INTO acms_tdservice_action VALUES (225, 27, 2);
INSERT INTO acms_tdservice_action VALUES (226, 19, 6);
INSERT INTO acms_tdservice_action VALUES (227, 18, 6);
INSERT INTO acms_tdservice_action VALUES (228, 17, 6);
INSERT INTO acms_tdservice_action VALUES (229, 28, 2);
INSERT INTO acms_tdservice_action VALUES (230, 28, 3);
INSERT INTO acms_tdservice_action VALUES (239, 31, 2);
INSERT INTO acms_tdservice_action VALUES (240, 31, 3);
INSERT INTO acms_tdservice_action VALUES (241, 28, 4);


--
-- Name: acms_tdservice_action_idservice_action_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tdservice_action_idservice_action_seq', 256, false);


--
-- Data for Name: acms_tdslider; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tdslider VALUES (23, 17, 2, '4', '5', 1);
INSERT INTO acms_tdslider VALUES (24, 17, 1, '2', '2', 1);
INSERT INTO acms_tdslider VALUES (25, 17, 2, '1', '3', 1);


--
-- Name: acms_tdslider_iddslider_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tdslider_iddslider_seq', 25, false);


--
-- Data for Name: acms_tduser_service_ordered; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: acms_tduser_service_ordered_iduser_service_ordered_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tduser_service_ordered_iduser_service_ordered_seq', 1, false);


--
-- Data for Name: acms_tethnicity; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tethnicity VALUES (1, 'NINGUNO', '1');
INSERT INTO acms_tethnicity VALUES (2, 'ACAHUAYO', '1');
INSERT INTO acms_tethnicity VALUES (3, 'ARAHUAC DEL DELTA AMACURO', '1');
INSERT INTO acms_tethnicity VALUES (4, 'ARAHUAC DEL RIO NEGRO', '1');
INSERT INTO acms_tethnicity VALUES (5, 'ARUTANI', '1');
INSERT INTO acms_tethnicity VALUES (6, 'BARI', '1');
INSERT INTO acms_tethnicity VALUES (7, 'GUAJIBO', '1');
INSERT INTO acms_tethnicity VALUES (8, 'GUAJIRO', '1');
INSERT INTO acms_tethnicity VALUES (9, 'GUARAO O WARAO', '1');
INSERT INTO acms_tethnicity VALUES (10, 'GUAYQUERY', '1');
INSERT INTO acms_tethnicity VALUES (11, 'MAPOYO O YAHUANA', '1');
INSERT INTO acms_tethnicity VALUES (12, 'MAQUIRITARE', '1');
INSERT INTO acms_tethnicity VALUES (13, 'PANARE', '1');
INSERT INTO acms_tethnicity VALUES (14, 'PARAUJANO', '1');
INSERT INTO acms_tethnicity VALUES (15, 'PEMON', '1');
INSERT INTO acms_tethnicity VALUES (16, 'PIAROA', '1');
INSERT INTO acms_tethnicity VALUES (17, 'SAPE', '1');
INSERT INTO acms_tethnicity VALUES (18, 'YANOMAMI', '1');
INSERT INTO acms_tethnicity VALUES (19, 'YARURO', '1');
INSERT INTO acms_tethnicity VALUES (20, 'YUCPA', '1');
INSERT INTO acms_tethnicity VALUES (21, 'VOCABLOS DE ORIGEN INDIGENA', '1');
INSERT INTO acms_tethnicity VALUES (22, 'CARI', '1');


--
-- Name: acms_tethnicity_idethnicity_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tethnicity_idethnicity_seq', 22, false);


--
-- Data for Name: acms_tgallery; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tgallery VALUES (1, 1, 'uploads/gallery/2017082320382016923927_1348435195230600_1816631906_n.jpg', '', '', '', '', '2017-08-23');
INSERT INTO acms_tgallery VALUES (2, 1, 'uploads/gallery/2017082320392316933488_1348432158564237_1757376988_n.jpg', '', '', '', '', '2017-08-23');
INSERT INTO acms_tgallery VALUES (3, 1, 'uploads/gallery/20170826063617LogoMC.png', NULL, NULL, NULL, NULL, '2017-08-26');


--
-- Name: acms_tgallery_idgallery_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tgallery_idgallery_seq', 3, true);


--
-- Data for Name: acms_ticon; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_ticon VALUES (1, 'glyphicon', 'glyphicon-asterisk', '1');
INSERT INTO acms_ticon VALUES (2, 'glyphicon', 'glyphicon-plus', '1');
INSERT INTO acms_ticon VALUES (3, 'glyphicon', 'glyphicon-euro', '1');
INSERT INTO acms_ticon VALUES (4, 'glyphicon', 'glyphicon-eur', '1');
INSERT INTO acms_ticon VALUES (5, 'glyphicon', 'glyphicon-minus', '1');
INSERT INTO acms_ticon VALUES (6, 'glyphicon', 'glyphicon-cloud', '1');
INSERT INTO acms_ticon VALUES (7, 'glyphicon', 'glyphicon-envelope', '1');
INSERT INTO acms_ticon VALUES (8, 'glyphicon', 'glyphicon-pencil', '1');
INSERT INTO acms_ticon VALUES (9, 'glyphicon', 'glyphicon-glass', '1');
INSERT INTO acms_ticon VALUES (10, 'glyphicon', 'glyphicon-music', '1');
INSERT INTO acms_ticon VALUES (11, 'glyphicon', 'glyphicon-search', '1');
INSERT INTO acms_ticon VALUES (12, 'glyphicon', 'glyphicon-heart', '1');
INSERT INTO acms_ticon VALUES (13, 'glyphicon', 'glyphicon-star', '1');
INSERT INTO acms_ticon VALUES (14, 'glyphicon', 'glyphicon-star-empty', '1');
INSERT INTO acms_ticon VALUES (15, 'glyphicon', 'glyphicon-user', '1');
INSERT INTO acms_ticon VALUES (16, 'glyphicon', 'glyphicon-film', '1');
INSERT INTO acms_ticon VALUES (17, 'glyphicon', 'glyphicon-th-large', '1');
INSERT INTO acms_ticon VALUES (18, 'glyphicon', 'glyphicon-th', '1');
INSERT INTO acms_ticon VALUES (19, 'glyphicon', 'glyphicon-th-list', '1');
INSERT INTO acms_ticon VALUES (20, 'glyphicon', 'glyphicon-ok', '1');
INSERT INTO acms_ticon VALUES (21, 'glyphicon', 'glyphicon-remove', '1');
INSERT INTO acms_ticon VALUES (22, 'glyphicon', 'glyphicon-zoom-in', '1');
INSERT INTO acms_ticon VALUES (23, 'glyphicon', 'glyphicon-zoom-out', '1');
INSERT INTO acms_ticon VALUES (24, 'glyphicon', 'glyphicon-off', '1');
INSERT INTO acms_ticon VALUES (25, 'glyphicon', 'glyphicon-signal', '1');
INSERT INTO acms_ticon VALUES (26, 'glyphicon', 'glyphicon-cog', '1');
INSERT INTO acms_ticon VALUES (27, 'glyphicon', 'glyphicon-trash', '1');
INSERT INTO acms_ticon VALUES (28, 'glyphicon', 'glyphicon-home', '1');
INSERT INTO acms_ticon VALUES (29, 'glyphicon', 'glyphicon-file', '1');
INSERT INTO acms_ticon VALUES (30, 'glyphicon', 'glyphicon-time', '1');
INSERT INTO acms_ticon VALUES (31, 'glyphicon', 'glyphicon-road', '1');
INSERT INTO acms_ticon VALUES (32, 'glyphicon', 'glyphicon-download-alt', '1');
INSERT INTO acms_ticon VALUES (33, 'glyphicon', 'glyphicon-download', '1');
INSERT INTO acms_ticon VALUES (34, 'glyphicon', 'glyphicon-upload', '1');
INSERT INTO acms_ticon VALUES (35, 'glyphicon', 'glyphicon-inbox', '1');
INSERT INTO acms_ticon VALUES (36, 'glyphicon', 'glyphicon-play-circle', '1');
INSERT INTO acms_ticon VALUES (37, 'glyphicon', 'glyphicon-repeat', '1');
INSERT INTO acms_ticon VALUES (38, 'glyphicon', 'glyphicon-refresh', '1');
INSERT INTO acms_ticon VALUES (39, 'glyphicon', 'glyphicon-list-alt', '1');
INSERT INTO acms_ticon VALUES (40, 'glyphicon', 'glyphicon-lock', '1');
INSERT INTO acms_ticon VALUES (41, 'glyphicon', 'glyphicon-flag', '1');
INSERT INTO acms_ticon VALUES (42, 'glyphicon', 'glyphicon-headphones', '1');
INSERT INTO acms_ticon VALUES (43, 'glyphicon', 'glyphicon-volume-off', '1');
INSERT INTO acms_ticon VALUES (44, 'glyphicon', 'glyphicon-volume-down', '1');
INSERT INTO acms_ticon VALUES (45, 'glyphicon', 'glyphicon-volume-up', '1');
INSERT INTO acms_ticon VALUES (46, 'glyphicon', 'glyphicon-qrcode', '1');
INSERT INTO acms_ticon VALUES (47, 'glyphicon', 'glyphicon-barcode', '1');
INSERT INTO acms_ticon VALUES (48, 'glyphicon', 'glyphicon-tag', '1');
INSERT INTO acms_ticon VALUES (49, 'glyphicon', 'glyphicon-tags', '1');
INSERT INTO acms_ticon VALUES (50, 'glyphicon', 'glyphicon-book', '1');
INSERT INTO acms_ticon VALUES (51, 'glyphicon', 'glyphicon-bookmark', '1');
INSERT INTO acms_ticon VALUES (52, 'glyphicon', 'glyphicon-print', '1');
INSERT INTO acms_ticon VALUES (53, 'glyphicon', 'glyphicon-camera', '1');
INSERT INTO acms_ticon VALUES (54, 'glyphicon', 'glyphicon-font', '1');
INSERT INTO acms_ticon VALUES (55, 'glyphicon', 'glyphicon-bold', '1');
INSERT INTO acms_ticon VALUES (56, 'glyphicon', 'glyphicon-italic', '1');
INSERT INTO acms_ticon VALUES (57, 'glyphicon', 'glyphicon-text-height', '1');
INSERT INTO acms_ticon VALUES (58, 'glyphicon', 'glyphicon-text-width', '1');
INSERT INTO acms_ticon VALUES (59, 'glyphicon', 'glyphicon-align-left', '1');
INSERT INTO acms_ticon VALUES (60, 'glyphicon', 'glyphicon-align-center', '1');
INSERT INTO acms_ticon VALUES (61, 'glyphicon', 'glyphicon-align-right', '1');
INSERT INTO acms_ticon VALUES (62, 'glyphicon', 'glyphicon-align-justify', '1');
INSERT INTO acms_ticon VALUES (63, 'glyphicon', 'glyphicon-list', '1');
INSERT INTO acms_ticon VALUES (64, 'glyphicon', 'glyphicon-indent-left', '1');
INSERT INTO acms_ticon VALUES (65, 'glyphicon', 'glyphicon-indent-right', '1');
INSERT INTO acms_ticon VALUES (66, 'glyphicon', 'glyphicon-facetime-video', '1');
INSERT INTO acms_ticon VALUES (67, 'glyphicon', 'glyphicon-picture', '1');
INSERT INTO acms_ticon VALUES (68, 'glyphicon', 'glyphicon-map-marker', '1');
INSERT INTO acms_ticon VALUES (69, 'glyphicon', 'glyphicon-adjust', '1');
INSERT INTO acms_ticon VALUES (70, 'glyphicon', 'glyphicon-tint', '1');
INSERT INTO acms_ticon VALUES (71, 'glyphicon', 'glyphicon-edit', '1');
INSERT INTO acms_ticon VALUES (72, 'glyphicon', 'glyphicon-share', '1');
INSERT INTO acms_ticon VALUES (73, 'glyphicon', 'glyphicon-check', '1');
INSERT INTO acms_ticon VALUES (74, 'glyphicon', 'glyphicon-move', '1');
INSERT INTO acms_ticon VALUES (75, 'glyphicon', 'glyphicon-step-backward', '1');
INSERT INTO acms_ticon VALUES (76, 'glyphicon', 'glyphicon-fast-backward', '1');
INSERT INTO acms_ticon VALUES (77, 'glyphicon', 'glyphicon-backward', '1');
INSERT INTO acms_ticon VALUES (78, 'glyphicon', 'glyphicon-play', '1');
INSERT INTO acms_ticon VALUES (79, 'glyphicon', 'glyphicon-pause', '1');
INSERT INTO acms_ticon VALUES (80, 'glyphicon', 'glyphicon-stop', '1');
INSERT INTO acms_ticon VALUES (81, 'glyphicon', 'glyphicon-forward', '1');
INSERT INTO acms_ticon VALUES (82, 'glyphicon', 'glyphicon-fast-forward', '1');
INSERT INTO acms_ticon VALUES (83, 'glyphicon', 'glyphicon-step-forward', '1');
INSERT INTO acms_ticon VALUES (84, 'glyphicon', 'glyphicon-eject', '1');
INSERT INTO acms_ticon VALUES (85, 'glyphicon', 'glyphicon-chevron-left', '1');
INSERT INTO acms_ticon VALUES (86, 'glyphicon', 'glyphicon-chevron-right', '1');
INSERT INTO acms_ticon VALUES (87, 'glyphicon', 'glyphicon-plus-sign', '1');
INSERT INTO acms_ticon VALUES (88, 'glyphicon', 'glyphicon-minus-sign', '1');
INSERT INTO acms_ticon VALUES (89, 'glyphicon', 'glyphicon-remove-sign', '1');
INSERT INTO acms_ticon VALUES (90, 'glyphicon', 'glyphicon-ok-sign', '1');
INSERT INTO acms_ticon VALUES (91, 'glyphicon', 'glyphicon-question-sign', '1');
INSERT INTO acms_ticon VALUES (92, 'glyphicon', 'glyphicon-info-sign', '1');
INSERT INTO acms_ticon VALUES (93, 'glyphicon', 'glyphicon-screenshot', '1');
INSERT INTO acms_ticon VALUES (94, 'glyphicon', 'glyphicon-remove-circle', '1');
INSERT INTO acms_ticon VALUES (95, 'glyphicon', 'glyphicon-ok-circle', '1');
INSERT INTO acms_ticon VALUES (96, 'glyphicon', 'glyphicon-ban-circle', '1');
INSERT INTO acms_ticon VALUES (97, 'glyphicon', 'glyphicon-arrow-left', '1');
INSERT INTO acms_ticon VALUES (98, 'glyphicon', 'glyphicon-arrow-right', '1');
INSERT INTO acms_ticon VALUES (99, 'glyphicon', 'glyphicon-arrow-up', '1');
INSERT INTO acms_ticon VALUES (100, 'glyphicon', 'glyphicon-arrow-down', '1');
INSERT INTO acms_ticon VALUES (101, 'glyphicon', 'glyphicon-share-alt', '1');
INSERT INTO acms_ticon VALUES (102, 'glyphicon', 'glyphicon-resize-full', '1');
INSERT INTO acms_ticon VALUES (103, 'glyphicon', 'glyphicon-resize-small', '1');
INSERT INTO acms_ticon VALUES (104, 'glyphicon', 'glyphicon-exclamation-sign', '1');
INSERT INTO acms_ticon VALUES (105, 'glyphicon', 'glyphicon-gift', '1');
INSERT INTO acms_ticon VALUES (106, 'glyphicon', 'glyphicon-leaf', '1');
INSERT INTO acms_ticon VALUES (107, 'glyphicon', 'glyphicon-fire', '1');
INSERT INTO acms_ticon VALUES (108, 'glyphicon', 'glyphicon-eye-open', '1');
INSERT INTO acms_ticon VALUES (109, 'glyphicon', 'glyphicon-eye-close', '1');
INSERT INTO acms_ticon VALUES (110, 'glyphicon', 'glyphicon-warning-sign', '1');
INSERT INTO acms_ticon VALUES (111, 'glyphicon', 'glyphicon-plane', '1');
INSERT INTO acms_ticon VALUES (112, 'glyphicon', 'glyphicon-calendar', '1');
INSERT INTO acms_ticon VALUES (113, 'glyphicon', 'glyphicon-random', '1');
INSERT INTO acms_ticon VALUES (114, 'glyphicon', 'glyphicon-comment', '1');
INSERT INTO acms_ticon VALUES (115, 'glyphicon', 'glyphicon-magnet', '1');
INSERT INTO acms_ticon VALUES (116, 'glyphicon', 'glyphicon-chevron-up', '1');
INSERT INTO acms_ticon VALUES (117, 'glyphicon', 'glyphicon-chevron-down', '1');
INSERT INTO acms_ticon VALUES (118, 'glyphicon', 'glyphicon-retweet', '1');
INSERT INTO acms_ticon VALUES (119, 'glyphicon', 'glyphicon-shopping-cart', '1');
INSERT INTO acms_ticon VALUES (120, 'glyphicon', 'glyphicon-folder-close', '1');
INSERT INTO acms_ticon VALUES (121, 'glyphicon', 'glyphicon-folder-open', '1');
INSERT INTO acms_ticon VALUES (122, 'glyphicon', 'glyphicon-resize-vertical', '1');
INSERT INTO acms_ticon VALUES (123, 'glyphicon', 'glyphicon-resize-horizontal', '1');
INSERT INTO acms_ticon VALUES (124, 'glyphicon', 'glyphicon-hdd', '1');
INSERT INTO acms_ticon VALUES (125, 'glyphicon', 'glyphicon-bullhorn', '1');
INSERT INTO acms_ticon VALUES (126, 'glyphicon', 'glyphicon-bell', '1');
INSERT INTO acms_ticon VALUES (127, 'glyphicon', 'glyphicon-certificate', '1');
INSERT INTO acms_ticon VALUES (128, 'glyphicon', 'glyphicon-thumbs-up', '1');
INSERT INTO acms_ticon VALUES (129, 'glyphicon', 'glyphicon-thumbs-down', '1');
INSERT INTO acms_ticon VALUES (130, 'glyphicon', 'glyphicon-hand-right', '1');
INSERT INTO acms_ticon VALUES (131, 'glyphicon', 'glyphicon-hand-left', '1');
INSERT INTO acms_ticon VALUES (132, 'glyphicon', 'glyphicon-hand-up', '1');
INSERT INTO acms_ticon VALUES (133, 'glyphicon', 'glyphicon-hand-down', '1');
INSERT INTO acms_ticon VALUES (134, 'glyphicon', 'glyphicon-circle-arrow-right', '1');
INSERT INTO acms_ticon VALUES (135, 'glyphicon', 'glyphicon-circle-arrow-left', '1');
INSERT INTO acms_ticon VALUES (136, 'glyphicon', 'glyphicon-circle-arrow-up', '1');
INSERT INTO acms_ticon VALUES (137, 'glyphicon', 'glyphicon-circle-arrow-down', '1');
INSERT INTO acms_ticon VALUES (138, 'glyphicon', 'glyphicon-globe', '1');
INSERT INTO acms_ticon VALUES (139, 'glyphicon', 'glyphicon-wrench', '1');
INSERT INTO acms_ticon VALUES (140, 'glyphicon', 'glyphicon-tasks', '1');
INSERT INTO acms_ticon VALUES (141, 'glyphicon', 'glyphicon-filter', '1');
INSERT INTO acms_ticon VALUES (142, 'glyphicon', 'glyphicon-briefcase', '1');
INSERT INTO acms_ticon VALUES (143, 'glyphicon', 'glyphicon-fullscreen', '1');
INSERT INTO acms_ticon VALUES (144, 'glyphicon', 'glyphicon-dashboard', '1');
INSERT INTO acms_ticon VALUES (145, 'glyphicon', 'glyphicon-paperclip', '1');
INSERT INTO acms_ticon VALUES (146, 'glyphicon', 'glyphicon-heart-empty', '1');
INSERT INTO acms_ticon VALUES (147, 'glyphicon', 'glyphicon-link', '1');
INSERT INTO acms_ticon VALUES (148, 'glyphicon', 'glyphicon-phone', '1');
INSERT INTO acms_ticon VALUES (149, 'glyphicon', 'glyphicon-pushpin', '1');
INSERT INTO acms_ticon VALUES (150, 'glyphicon', 'glyphicon-usd', '1');
INSERT INTO acms_ticon VALUES (151, 'glyphicon', 'glyphicon-gbp', '1');
INSERT INTO acms_ticon VALUES (152, 'glyphicon', 'glyphicon-sort', '1');
INSERT INTO acms_ticon VALUES (153, 'glyphicon', 'glyphicon-sort-by-alphabet', '1');
INSERT INTO acms_ticon VALUES (154, 'glyphicon', 'glyphicon-sort-by-alphabet-alt', '1');
INSERT INTO acms_ticon VALUES (155, 'glyphicon', 'glyphicon-sort-by-order', '1');
INSERT INTO acms_ticon VALUES (156, 'glyphicon', 'glyphicon-sort-by-order-alt', '1');
INSERT INTO acms_ticon VALUES (157, 'glyphicon', 'glyphicon-sort-by-attributes', '1');
INSERT INTO acms_ticon VALUES (158, 'glyphicon', 'glyphicon-sort-by-attributes-alt', '1');
INSERT INTO acms_ticon VALUES (159, 'glyphicon', 'glyphicon-unchecked', '1');
INSERT INTO acms_ticon VALUES (160, 'glyphicon', 'glyphicon-expand', '1');
INSERT INTO acms_ticon VALUES (161, 'glyphicon', 'glyphicon-collapse-down', '1');
INSERT INTO acms_ticon VALUES (162, 'glyphicon', 'glyphicon-collapse-up', '1');
INSERT INTO acms_ticon VALUES (163, 'glyphicon', 'glyphicon-log-in', '1');
INSERT INTO acms_ticon VALUES (164, 'glyphicon', 'glyphicon-flash', '1');
INSERT INTO acms_ticon VALUES (165, 'glyphicon', 'glyphicon-log-out', '1');
INSERT INTO acms_ticon VALUES (166, 'glyphicon', 'glyphicon-new-window', '1');
INSERT INTO acms_ticon VALUES (167, 'glyphicon', 'glyphicon-record', '1');
INSERT INTO acms_ticon VALUES (168, 'glyphicon', 'glyphicon-save', '1');
INSERT INTO acms_ticon VALUES (169, 'glyphicon', 'glyphicon-open', '1');
INSERT INTO acms_ticon VALUES (170, 'glyphicon', 'glyphicon-saved', '1');
INSERT INTO acms_ticon VALUES (171, 'glyphicon', 'glyphicon-import', '1');
INSERT INTO acms_ticon VALUES (172, 'glyphicon', 'glyphicon-export', '1');
INSERT INTO acms_ticon VALUES (173, 'glyphicon', 'glyphicon-send', '1');
INSERT INTO acms_ticon VALUES (174, 'glyphicon', 'glyphicon-floppy-disk', '1');
INSERT INTO acms_ticon VALUES (175, 'glyphicon', 'glyphicon-floppy-saved', '1');
INSERT INTO acms_ticon VALUES (176, 'glyphicon', 'glyphicon-floppy-remove', '1');
INSERT INTO acms_ticon VALUES (177, 'glyphicon', 'glyphicon-floppy-save', '1');
INSERT INTO acms_ticon VALUES (178, 'glyphicon', 'glyphicon-floppy-open', '1');
INSERT INTO acms_ticon VALUES (179, 'glyphicon', 'glyphicon-credit-card', '1');
INSERT INTO acms_ticon VALUES (180, 'glyphicon', 'glyphicon-transfer', '1');
INSERT INTO acms_ticon VALUES (181, 'glyphicon', 'glyphicon-cutlery', '1');
INSERT INTO acms_ticon VALUES (182, 'glyphicon', 'glyphicon-header', '1');
INSERT INTO acms_ticon VALUES (183, 'glyphicon', 'glyphicon-compressed', '1');
INSERT INTO acms_ticon VALUES (184, 'glyphicon', 'glyphicon-earphone', '1');
INSERT INTO acms_ticon VALUES (185, 'glyphicon', 'glyphicon-phone-alt', '1');
INSERT INTO acms_ticon VALUES (186, 'glyphicon', 'glyphicon-tower', '1');
INSERT INTO acms_ticon VALUES (187, 'glyphicon', 'glyphicon-stats', '1');
INSERT INTO acms_ticon VALUES (188, 'glyphicon', 'glyphicon-sd-video', '1');
INSERT INTO acms_ticon VALUES (189, 'glyphicon', 'glyphicon-hd-video', '1');
INSERT INTO acms_ticon VALUES (190, 'glyphicon', 'glyphicon-subtitles', '1');
INSERT INTO acms_ticon VALUES (191, 'glyphicon', 'glyphicon-sound-stereo', '1');
INSERT INTO acms_ticon VALUES (192, 'glyphicon', 'glyphicon-sound-dolby', '1');
INSERT INTO acms_ticon VALUES (193, 'glyphicon', 'glyphicon-sound-5-1', '1');
INSERT INTO acms_ticon VALUES (194, 'glyphicon', 'glyphicon-sound-6-1', '1');
INSERT INTO acms_ticon VALUES (195, 'glyphicon', 'glyphicon-sound-7-1', '1');
INSERT INTO acms_ticon VALUES (196, 'glyphicon', 'glyphicon-copyright-mark', '1');
INSERT INTO acms_ticon VALUES (197, 'glyphicon', 'glyphicon-registration-mark', '1');
INSERT INTO acms_ticon VALUES (198, 'glyphicon', 'glyphicon-cloud-download', '1');
INSERT INTO acms_ticon VALUES (199, 'glyphicon', 'glyphicon-cloud-upload', '1');
INSERT INTO acms_ticon VALUES (200, 'glyphicon', 'glyphicon-tree-conifer', '1');
INSERT INTO acms_ticon VALUES (201, 'glyphicon', 'glyphicon-tree-deciduous', '1');
INSERT INTO acms_ticon VALUES (202, 'glyphicon', 'glyphicon-cd', '1');
INSERT INTO acms_ticon VALUES (203, 'glyphicon', 'glyphicon-save-file', '1');
INSERT INTO acms_ticon VALUES (204, 'glyphicon', 'glyphicon-open-file', '1');
INSERT INTO acms_ticon VALUES (205, 'glyphicon', 'glyphicon-level-up', '1');
INSERT INTO acms_ticon VALUES (206, 'glyphicon', 'glyphicon-copy', '1');
INSERT INTO acms_ticon VALUES (207, 'glyphicon', 'glyphicon-paste', '1');
INSERT INTO acms_ticon VALUES (208, 'glyphicon', 'glyphicon-alert', '1');
INSERT INTO acms_ticon VALUES (209, 'glyphicon', 'glyphicon-equalizer', '1');
INSERT INTO acms_ticon VALUES (210, 'glyphicon', 'glyphicon-king', '1');
INSERT INTO acms_ticon VALUES (211, 'glyphicon', 'glyphicon-queen', '1');
INSERT INTO acms_ticon VALUES (212, 'glyphicon', 'glyphicon-pawn', '1');
INSERT INTO acms_ticon VALUES (213, 'glyphicon', 'glyphicon-bishop', '1');
INSERT INTO acms_ticon VALUES (214, 'glyphicon', 'glyphicon-knight', '1');
INSERT INTO acms_ticon VALUES (215, 'glyphicon', 'glyphicon-baby-formula', '1');
INSERT INTO acms_ticon VALUES (216, 'glyphicon', 'glyphicon-tent', '1');
INSERT INTO acms_ticon VALUES (217, 'glyphicon', 'glyphicon-blackboard', '1');
INSERT INTO acms_ticon VALUES (218, 'glyphicon', 'glyphicon-bed', '1');
INSERT INTO acms_ticon VALUES (219, 'glyphicon', 'glyphicon-apple', '1');
INSERT INTO acms_ticon VALUES (220, 'glyphicon', 'glyphicon-erase', '1');
INSERT INTO acms_ticon VALUES (221, 'glyphicon', 'glyphicon-hourglass', '1');
INSERT INTO acms_ticon VALUES (222, 'glyphicon', 'glyphicon-lamp', '1');
INSERT INTO acms_ticon VALUES (223, 'glyphicon', 'glyphicon-duplicate', '1');
INSERT INTO acms_ticon VALUES (224, 'glyphicon', 'glyphicon-piggy-bank', '1');
INSERT INTO acms_ticon VALUES (225, 'glyphicon', 'glyphicon-scissors', '1');
INSERT INTO acms_ticon VALUES (226, 'glyphicon', 'glyphicon-bitcoin', '1');
INSERT INTO acms_ticon VALUES (227, 'glyphicon', 'glyphicon-yen', '1');
INSERT INTO acms_ticon VALUES (228, 'glyphicon', 'glyphicon-ruble', '1');
INSERT INTO acms_ticon VALUES (229, 'glyphicon', 'glyphicon-scale', '1');
INSERT INTO acms_ticon VALUES (230, 'glyphicon', 'glyphicon-ice-lolly', '1');
INSERT INTO acms_ticon VALUES (231, 'glyphicon', 'glyphicon-ice-lolly-tasted', '1');
INSERT INTO acms_ticon VALUES (232, 'glyphicon', 'glyphicon-education', '1');
INSERT INTO acms_ticon VALUES (233, 'glyphicon', 'glyphicon-option-horizontal', '1');
INSERT INTO acms_ticon VALUES (234, 'glyphicon', 'glyphicon-option-vertical', '1');
INSERT INTO acms_ticon VALUES (235, 'glyphicon', 'glyphicon-menu-hamburger', '1');
INSERT INTO acms_ticon VALUES (236, 'glyphicon', 'glyphicon-modal-window', '1');
INSERT INTO acms_ticon VALUES (237, 'glyphicon', 'glyphicon-oil', '1');
INSERT INTO acms_ticon VALUES (238, 'glyphicon', 'glyphicon-grain', '1');
INSERT INTO acms_ticon VALUES (239, 'glyphicon', 'glyphicon-sunglasses', '1');
INSERT INTO acms_ticon VALUES (240, 'glyphicon', 'glyphicon-text-size', '1');
INSERT INTO acms_ticon VALUES (241, 'glyphicon', 'glyphicon-text-color', '1');
INSERT INTO acms_ticon VALUES (242, 'glyphicon', 'glyphicon-text-background', '1');
INSERT INTO acms_ticon VALUES (243, 'glyphicon', 'glyphicon-object-align-top', '1');
INSERT INTO acms_ticon VALUES (244, 'glyphicon', 'glyphicon-object-align-bottom', '1');
INSERT INTO acms_ticon VALUES (245, 'glyphicon', 'glyphicon-object-align-horizontal', '1');
INSERT INTO acms_ticon VALUES (246, 'glyphicon', 'glyphicon-object-align-left', '1');
INSERT INTO acms_ticon VALUES (247, 'glyphicon', 'glyphicon-object-align-vertical', '1');
INSERT INTO acms_ticon VALUES (248, 'glyphicon', 'glyphicon-object-align-right', '1');
INSERT INTO acms_ticon VALUES (249, 'glyphicon', 'glyphicon-triangle-right', '1');
INSERT INTO acms_ticon VALUES (250, 'glyphicon', 'glyphicon-triangle-left', '1');
INSERT INTO acms_ticon VALUES (251, 'glyphicon', 'glyphicon-triangle-bottom', '1');
INSERT INTO acms_ticon VALUES (252, 'glyphicon', 'glyphicon-triangle-top', '1');
INSERT INTO acms_ticon VALUES (253, 'glyphicon', 'glyphicon-console', '1');
INSERT INTO acms_ticon VALUES (254, 'glyphicon', 'glyphicon-superscript', '1');
INSERT INTO acms_ticon VALUES (255, 'glyphicon', 'glyphicon-subscript', '1');
INSERT INTO acms_ticon VALUES (256, 'glyphicon', 'glyphicon-menu-left', '1');
INSERT INTO acms_ticon VALUES (257, 'glyphicon', 'glyphicon-menu-right', '1');
INSERT INTO acms_ticon VALUES (258, 'glyphicon', 'glyphicon-menu-down', '1');
INSERT INTO acms_ticon VALUES (259, 'glyphicon', 'glyphicon-menu-up', '1');
INSERT INTO acms_ticon VALUES (260, 'fa', 'fa-american-sign-language-interpreting', '1');
INSERT INTO acms_ticon VALUES (261, 'fa', 'fa-assistive-listening-systems', '1');
INSERT INTO acms_ticon VALUES (262, 'fa', 'fa-glass', '1');
INSERT INTO acms_ticon VALUES (263, 'fa', 'fa-music', '1');
INSERT INTO acms_ticon VALUES (264, 'fa', 'fa-search', '1');
INSERT INTO acms_ticon VALUES (265, 'fa', 'fa-envelope-o', '1');
INSERT INTO acms_ticon VALUES (266, 'fa', 'fa-heart', '1');
INSERT INTO acms_ticon VALUES (267, 'fa', 'fa-star', '1');
INSERT INTO acms_ticon VALUES (268, 'fa', 'fa-star-o', '1');
INSERT INTO acms_ticon VALUES (269, 'fa', 'fa-user', '1');
INSERT INTO acms_ticon VALUES (270, 'fa', 'fa-film', '1');
INSERT INTO acms_ticon VALUES (271, 'fa', 'fa-th-large', '1');
INSERT INTO acms_ticon VALUES (272, 'fa', 'fa-th', '1');
INSERT INTO acms_ticon VALUES (273, 'fa', 'fa-th-list', '1');
INSERT INTO acms_ticon VALUES (274, 'fa', 'fa-check', '1');
INSERT INTO acms_ticon VALUES (275, 'fa', 'fa-remove', '1');
INSERT INTO acms_ticon VALUES (276, 'fa', 'fa-close', '1');
INSERT INTO acms_ticon VALUES (277, 'fa', 'fa-times', '1');
INSERT INTO acms_ticon VALUES (278, 'fa', 'fa-search-plus', '1');
INSERT INTO acms_ticon VALUES (279, 'fa', 'fa-search-minus', '1');
INSERT INTO acms_ticon VALUES (280, 'fa', 'fa-power-off', '1');
INSERT INTO acms_ticon VALUES (281, 'fa', 'fa-signal', '1');
INSERT INTO acms_ticon VALUES (282, 'fa', 'fa-gear', '1');
INSERT INTO acms_ticon VALUES (283, 'fa', 'fa-cog', '1');
INSERT INTO acms_ticon VALUES (284, 'fa', 'fa-trash-o', '1');
INSERT INTO acms_ticon VALUES (285, 'fa', 'fa-home', '1');
INSERT INTO acms_ticon VALUES (286, 'fa', 'fa-file-o', '1');
INSERT INTO acms_ticon VALUES (287, 'fa', 'fa-clock-o', '1');
INSERT INTO acms_ticon VALUES (288, 'fa', 'fa-road', '1');
INSERT INTO acms_ticon VALUES (289, 'fa', 'fa-download', '1');
INSERT INTO acms_ticon VALUES (290, 'fa', 'fa-arrow-circle-o-down', '1');
INSERT INTO acms_ticon VALUES (291, 'fa', 'fa-arrow-circle-o-up', '1');
INSERT INTO acms_ticon VALUES (292, 'fa', 'fa-inbox', '1');
INSERT INTO acms_ticon VALUES (293, 'fa', 'fa-play-circle-o', '1');
INSERT INTO acms_ticon VALUES (294, 'fa', 'fa-rotate-right', '1');
INSERT INTO acms_ticon VALUES (295, 'fa', 'fa-repeat', '1');
INSERT INTO acms_ticon VALUES (296, 'fa', 'fa-refresh', '1');
INSERT INTO acms_ticon VALUES (297, 'fa', 'fa-list-alt', '1');
INSERT INTO acms_ticon VALUES (298, 'fa', 'fa-lock', '1');
INSERT INTO acms_ticon VALUES (299, 'fa', 'fa-flag', '1');
INSERT INTO acms_ticon VALUES (300, 'fa', 'fa-headphones', '1');
INSERT INTO acms_ticon VALUES (301, 'fa', 'fa-volume-off', '1');
INSERT INTO acms_ticon VALUES (302, 'fa', 'fa-volume-down', '1');
INSERT INTO acms_ticon VALUES (303, 'fa', 'fa-volume-up', '1');
INSERT INTO acms_ticon VALUES (304, 'fa', 'fa-qrcode', '1');
INSERT INTO acms_ticon VALUES (305, 'fa', 'fa-barcode', '1');
INSERT INTO acms_ticon VALUES (306, 'fa', 'fa-tag', '1');
INSERT INTO acms_ticon VALUES (307, 'fa', 'fa-tags', '1');
INSERT INTO acms_ticon VALUES (308, 'fa', 'fa-book', '1');
INSERT INTO acms_ticon VALUES (309, 'fa', 'fa-bookmark', '1');
INSERT INTO acms_ticon VALUES (310, 'fa', 'fa-print', '1');
INSERT INTO acms_ticon VALUES (311, 'fa', 'fa-camera', '1');
INSERT INTO acms_ticon VALUES (312, 'fa', 'fa-font', '1');
INSERT INTO acms_ticon VALUES (313, 'fa', 'fa-bold', '1');
INSERT INTO acms_ticon VALUES (314, 'fa', 'fa-italic', '1');
INSERT INTO acms_ticon VALUES (315, 'fa', 'fa-text-height', '1');
INSERT INTO acms_ticon VALUES (316, 'fa', 'fa-text-width', '1');
INSERT INTO acms_ticon VALUES (317, 'fa', 'fa-align-left', '1');
INSERT INTO acms_ticon VALUES (318, 'fa', 'fa-align-center', '1');
INSERT INTO acms_ticon VALUES (319, 'fa', 'fa-align-right', '1');
INSERT INTO acms_ticon VALUES (320, 'fa', 'fa-align-justify', '1');
INSERT INTO acms_ticon VALUES (321, 'fa', 'fa-list', '1');
INSERT INTO acms_ticon VALUES (322, 'fa', 'fa-dedent', '1');
INSERT INTO acms_ticon VALUES (323, 'fa', 'fa-outdent', '1');
INSERT INTO acms_ticon VALUES (324, 'fa', 'fa-indent', '1');
INSERT INTO acms_ticon VALUES (325, 'fa', 'fa-video-camera', '1');
INSERT INTO acms_ticon VALUES (326, 'fa', 'fa-photo', '1');
INSERT INTO acms_ticon VALUES (327, 'fa', 'fa-image', '1');
INSERT INTO acms_ticon VALUES (328, 'fa', 'fa-picture-o', '1');
INSERT INTO acms_ticon VALUES (329, 'fa', 'fa-pencil', '1');
INSERT INTO acms_ticon VALUES (330, 'fa', 'fa-map-marker', '1');
INSERT INTO acms_ticon VALUES (331, 'fa', 'fa-adjust', '1');
INSERT INTO acms_ticon VALUES (332, 'fa', 'fa-tint', '1');
INSERT INTO acms_ticon VALUES (333, 'fa', 'fa-edit', '1');
INSERT INTO acms_ticon VALUES (334, 'fa', 'fa-pencil-square-o', '1');
INSERT INTO acms_ticon VALUES (335, 'fa', 'fa-share-square-o', '1');
INSERT INTO acms_ticon VALUES (336, 'fa', 'fa-check-square-o', '1');
INSERT INTO acms_ticon VALUES (337, 'fa', 'fa-arrows', '1');
INSERT INTO acms_ticon VALUES (338, 'fa', 'fa-step-backward', '1');
INSERT INTO acms_ticon VALUES (339, 'fa', 'fa-fast-backward', '1');
INSERT INTO acms_ticon VALUES (340, 'fa', 'fa-backward', '1');
INSERT INTO acms_ticon VALUES (341, 'fa', 'fa-play', '1');
INSERT INTO acms_ticon VALUES (342, 'fa', 'fa-pause', '1');
INSERT INTO acms_ticon VALUES (343, 'fa', 'fa-stop', '1');
INSERT INTO acms_ticon VALUES (344, 'fa', 'fa-forward', '1');
INSERT INTO acms_ticon VALUES (345, 'fa', 'fa-fast-forward', '1');
INSERT INTO acms_ticon VALUES (346, 'fa', 'fa-step-forward', '1');
INSERT INTO acms_ticon VALUES (347, 'fa', 'fa-eject', '1');
INSERT INTO acms_ticon VALUES (348, 'fa', 'fa-chevron-left', '1');
INSERT INTO acms_ticon VALUES (349, 'fa', 'fa-chevron-right', '1');
INSERT INTO acms_ticon VALUES (350, 'fa', 'fa-plus-circle', '1');
INSERT INTO acms_ticon VALUES (351, 'fa', 'fa-minus-circle', '1');
INSERT INTO acms_ticon VALUES (352, 'fa', 'fa-times-circle', '1');
INSERT INTO acms_ticon VALUES (353, 'fa', 'fa-check-circle', '1');
INSERT INTO acms_ticon VALUES (354, 'fa', 'fa-question-circle', '1');
INSERT INTO acms_ticon VALUES (355, 'fa', 'fa-info-circle', '1');
INSERT INTO acms_ticon VALUES (356, 'fa', 'fa-crosshairs', '1');
INSERT INTO acms_ticon VALUES (357, 'fa', 'fa-times-circle-o', '1');
INSERT INTO acms_ticon VALUES (358, 'fa', 'fa-check-circle-o', '1');
INSERT INTO acms_ticon VALUES (359, 'fa', 'fa-ban', '1');
INSERT INTO acms_ticon VALUES (360, 'fa', 'fa-arrow-left', '1');
INSERT INTO acms_ticon VALUES (361, 'fa', 'fa-arrow-right', '1');
INSERT INTO acms_ticon VALUES (362, 'fa', 'fa-arrow-up', '1');
INSERT INTO acms_ticon VALUES (363, 'fa', 'fa-arrow-down', '1');
INSERT INTO acms_ticon VALUES (364, 'fa', 'fa-mail-forward', '1');
INSERT INTO acms_ticon VALUES (365, 'fa', 'fa-share', '1');
INSERT INTO acms_ticon VALUES (366, 'fa', 'fa-expand', '1');
INSERT INTO acms_ticon VALUES (367, 'fa', 'fa-compress', '1');
INSERT INTO acms_ticon VALUES (368, 'fa', 'fa-plus', '1');
INSERT INTO acms_ticon VALUES (369, 'fa', 'fa-minus', '1');
INSERT INTO acms_ticon VALUES (370, 'fa', 'fa-asterisk', '1');
INSERT INTO acms_ticon VALUES (371, 'fa', 'fa-exclamation-circle', '1');
INSERT INTO acms_ticon VALUES (372, 'fa', 'fa-gift', '1');
INSERT INTO acms_ticon VALUES (373, 'fa', 'fa-leaf', '1');
INSERT INTO acms_ticon VALUES (374, 'fa', 'fa-fire', '1');
INSERT INTO acms_ticon VALUES (375, 'fa', 'fa-eye', '1');
INSERT INTO acms_ticon VALUES (376, 'fa', 'fa-eye-slash', '1');
INSERT INTO acms_ticon VALUES (377, 'fa', 'fa-warning', '1');
INSERT INTO acms_ticon VALUES (378, 'fa', 'fa-exclamation-triangle', '1');
INSERT INTO acms_ticon VALUES (379, 'fa', 'fa-plane', '1');
INSERT INTO acms_ticon VALUES (380, 'fa', 'fa-calendar', '1');
INSERT INTO acms_ticon VALUES (381, 'fa', 'fa-random', '1');
INSERT INTO acms_ticon VALUES (382, 'fa', 'fa-comment', '1');
INSERT INTO acms_ticon VALUES (383, 'fa', 'fa-magnet', '1');
INSERT INTO acms_ticon VALUES (384, 'fa', 'fa-chevron-up', '1');
INSERT INTO acms_ticon VALUES (385, 'fa', 'fa-chevron-down', '1');
INSERT INTO acms_ticon VALUES (386, 'fa', 'fa-retweet', '1');
INSERT INTO acms_ticon VALUES (387, 'fa', 'fa-shopping-cart', '1');
INSERT INTO acms_ticon VALUES (388, 'fa', 'fa-folder', '1');
INSERT INTO acms_ticon VALUES (389, 'fa', 'fa-folder-open', '1');
INSERT INTO acms_ticon VALUES (390, 'fa', 'fa-arrows-v', '1');
INSERT INTO acms_ticon VALUES (391, 'fa', 'fa-arrows-h', '1');
INSERT INTO acms_ticon VALUES (392, 'fa', 'fa-bar-chart-o', '1');
INSERT INTO acms_ticon VALUES (393, 'fa', 'fa-bar-chart', '1');
INSERT INTO acms_ticon VALUES (394, 'fa', 'fa-twitter-square', '1');
INSERT INTO acms_ticon VALUES (395, 'fa', 'fa-facebook-square', '1');
INSERT INTO acms_ticon VALUES (396, 'fa', 'fa-camera-retro', '1');
INSERT INTO acms_ticon VALUES (397, 'fa', 'fa-key', '1');
INSERT INTO acms_ticon VALUES (398, 'fa', 'fa-gears', '1');
INSERT INTO acms_ticon VALUES (399, 'fa', 'fa-cogs', '1');
INSERT INTO acms_ticon VALUES (400, 'fa', 'fa-comments', '1');
INSERT INTO acms_ticon VALUES (401, 'fa', 'fa-thumbs-o-up', '1');
INSERT INTO acms_ticon VALUES (402, 'fa', 'fa-thumbs-o-down', '1');
INSERT INTO acms_ticon VALUES (403, 'fa', 'fa-star-half', '1');
INSERT INTO acms_ticon VALUES (404, 'fa', 'fa-heart-o', '1');
INSERT INTO acms_ticon VALUES (405, 'fa', 'fa-sign-out', '1');
INSERT INTO acms_ticon VALUES (406, 'fa', 'fa-linkedin-square', '1');
INSERT INTO acms_ticon VALUES (407, 'fa', 'fa-thumb-tack', '1');
INSERT INTO acms_ticon VALUES (408, 'fa', 'fa-external-link', '1');
INSERT INTO acms_ticon VALUES (409, 'fa', 'fa-sign-in', '1');
INSERT INTO acms_ticon VALUES (410, 'fa', 'fa-trophy', '1');
INSERT INTO acms_ticon VALUES (411, 'fa', 'fa-github-square', '1');
INSERT INTO acms_ticon VALUES (412, 'fa', 'fa-upload', '1');
INSERT INTO acms_ticon VALUES (413, 'fa', 'fa-lemon-o', '1');
INSERT INTO acms_ticon VALUES (414, 'fa', 'fa-phone', '1');
INSERT INTO acms_ticon VALUES (415, 'fa', 'fa-square-o', '1');
INSERT INTO acms_ticon VALUES (416, 'fa', 'fa-bookmark-o', '1');
INSERT INTO acms_ticon VALUES (417, 'fa', 'fa-phone-square', '1');
INSERT INTO acms_ticon VALUES (418, 'fa', 'fa-twitter', '1');
INSERT INTO acms_ticon VALUES (419, 'fa', 'fa-facebook-f', '1');
INSERT INTO acms_ticon VALUES (420, 'fa', 'fa-facebook', '1');
INSERT INTO acms_ticon VALUES (421, 'fa', 'fa-github', '1');
INSERT INTO acms_ticon VALUES (422, 'fa', 'fa-unlock', '1');
INSERT INTO acms_ticon VALUES (423, 'fa', 'fa-credit-card', '1');
INSERT INTO acms_ticon VALUES (424, 'fa', 'fa-feed', '1');
INSERT INTO acms_ticon VALUES (425, 'fa', 'fa-rss', '1');
INSERT INTO acms_ticon VALUES (426, 'fa', 'fa-hdd-o', '1');
INSERT INTO acms_ticon VALUES (427, 'fa', 'fa-bullhorn', '1');
INSERT INTO acms_ticon VALUES (428, 'fa', 'fa-bell', '1');
INSERT INTO acms_ticon VALUES (429, 'fa', 'fa-certificate', '1');
INSERT INTO acms_ticon VALUES (430, 'fa', 'fa-hand-o-right', '1');
INSERT INTO acms_ticon VALUES (431, 'fa', 'fa-hand-o-left', '1');
INSERT INTO acms_ticon VALUES (432, 'fa', 'fa-hand-o-up', '1');
INSERT INTO acms_ticon VALUES (433, 'fa', 'fa-hand-o-down', '1');
INSERT INTO acms_ticon VALUES (434, 'fa', 'fa-arrow-circle-left', '1');
INSERT INTO acms_ticon VALUES (435, 'fa', 'fa-arrow-circle-right', '1');
INSERT INTO acms_ticon VALUES (436, 'fa', 'fa-arrow-circle-up', '1');
INSERT INTO acms_ticon VALUES (437, 'fa', 'fa-arrow-circle-down', '1');
INSERT INTO acms_ticon VALUES (438, 'fa', 'fa-globe', '1');
INSERT INTO acms_ticon VALUES (439, 'fa', 'fa-wrench', '1');
INSERT INTO acms_ticon VALUES (440, 'fa', 'fa-tasks', '1');
INSERT INTO acms_ticon VALUES (441, 'fa', 'fa-filter', '1');
INSERT INTO acms_ticon VALUES (442, 'fa', 'fa-briefcase', '1');
INSERT INTO acms_ticon VALUES (443, 'fa', 'fa-arrows-alt', '1');
INSERT INTO acms_ticon VALUES (444, 'fa', 'fa-group', '1');
INSERT INTO acms_ticon VALUES (445, 'fa', 'fa-users', '1');
INSERT INTO acms_ticon VALUES (446, 'fa', 'fa-chain', '1');
INSERT INTO acms_ticon VALUES (447, 'fa', 'fa-link', '1');
INSERT INTO acms_ticon VALUES (448, 'fa', 'fa-cloud', '1');
INSERT INTO acms_ticon VALUES (449, 'fa', 'fa-flask', '1');
INSERT INTO acms_ticon VALUES (450, 'fa', 'fa-cut', '1');
INSERT INTO acms_ticon VALUES (451, 'fa', 'fa-scissors', '1');
INSERT INTO acms_ticon VALUES (452, 'fa', 'fa-copy', '1');
INSERT INTO acms_ticon VALUES (453, 'fa', 'fa-files-o', '1');
INSERT INTO acms_ticon VALUES (454, 'fa', 'fa-paperclip', '1');
INSERT INTO acms_ticon VALUES (455, 'fa', 'fa-save', '1');
INSERT INTO acms_ticon VALUES (456, 'fa', 'fa-floppy-o', '1');
INSERT INTO acms_ticon VALUES (457, 'fa', 'fa-square', '1');
INSERT INTO acms_ticon VALUES (458, 'fa', 'fa-navicon', '1');
INSERT INTO acms_ticon VALUES (459, 'fa', 'fa-reorder', '1');
INSERT INTO acms_ticon VALUES (460, 'fa', 'fa-bars', '1');
INSERT INTO acms_ticon VALUES (461, 'fa', 'fa-list-ul', '1');
INSERT INTO acms_ticon VALUES (462, 'fa', 'fa-list-ol', '1');
INSERT INTO acms_ticon VALUES (463, 'fa', 'fa-strikethrough', '1');
INSERT INTO acms_ticon VALUES (464, 'fa', 'fa-underline', '1');
INSERT INTO acms_ticon VALUES (465, 'fa', 'fa-table', '1');
INSERT INTO acms_ticon VALUES (466, 'fa', 'fa-magic', '1');
INSERT INTO acms_ticon VALUES (467, 'fa', 'fa-truck', '1');
INSERT INTO acms_ticon VALUES (468, 'fa', 'fa-pinterest', '1');
INSERT INTO acms_ticon VALUES (469, 'fa', 'fa-pinterest-square', '1');
INSERT INTO acms_ticon VALUES (470, 'fa', 'fa-google-plus-square', '1');
INSERT INTO acms_ticon VALUES (471, 'fa', 'fa-google-plus', '1');
INSERT INTO acms_ticon VALUES (472, 'fa', 'fa-money', '1');
INSERT INTO acms_ticon VALUES (473, 'fa', 'fa-caret-down', '1');
INSERT INTO acms_ticon VALUES (474, 'fa', 'fa-caret-up', '1');
INSERT INTO acms_ticon VALUES (475, 'fa', 'fa-caret-left', '1');
INSERT INTO acms_ticon VALUES (476, 'fa', 'fa-caret-right', '1');
INSERT INTO acms_ticon VALUES (477, 'fa', 'fa-columns', '1');
INSERT INTO acms_ticon VALUES (478, 'fa', 'fa-unsorted', '1');
INSERT INTO acms_ticon VALUES (479, 'fa', 'fa-sort', '1');
INSERT INTO acms_ticon VALUES (480, 'fa', 'fa-sort-down', '1');
INSERT INTO acms_ticon VALUES (481, 'fa', 'fa-sort-desc', '1');
INSERT INTO acms_ticon VALUES (482, 'fa', 'fa-sort-up', '1');
INSERT INTO acms_ticon VALUES (483, 'fa', 'fa-sort-asc', '1');
INSERT INTO acms_ticon VALUES (484, 'fa', 'fa-envelope', '1');
INSERT INTO acms_ticon VALUES (485, 'fa', 'fa-linkedin', '1');
INSERT INTO acms_ticon VALUES (486, 'fa', 'fa-rotate-left', '1');
INSERT INTO acms_ticon VALUES (487, 'fa', 'fa-undo', '1');
INSERT INTO acms_ticon VALUES (488, 'fa', 'fa-legal', '1');
INSERT INTO acms_ticon VALUES (489, 'fa', 'fa-gavel', '1');
INSERT INTO acms_ticon VALUES (490, 'fa', 'fa-dashboard', '1');
INSERT INTO acms_ticon VALUES (491, 'fa', 'fa-tachometer', '1');
INSERT INTO acms_ticon VALUES (492, 'fa', 'fa-comment-o', '1');
INSERT INTO acms_ticon VALUES (493, 'fa', 'fa-comments-o', '1');
INSERT INTO acms_ticon VALUES (494, 'fa', 'fa-flash', '1');
INSERT INTO acms_ticon VALUES (495, 'fa', 'fa-bolt', '1');
INSERT INTO acms_ticon VALUES (496, 'fa', 'fa-sitemap', '1');
INSERT INTO acms_ticon VALUES (497, 'fa', 'fa-umbrella', '1');
INSERT INTO acms_ticon VALUES (498, 'fa', 'fa-paste', '1');
INSERT INTO acms_ticon VALUES (499, 'fa', 'fa-clipboard', '1');
INSERT INTO acms_ticon VALUES (500, 'fa', 'fa-lightbulb-o', '1');
INSERT INTO acms_ticon VALUES (501, 'fa', 'fa-exchange', '1');
INSERT INTO acms_ticon VALUES (502, 'fa', 'fa-cloud-download', '1');
INSERT INTO acms_ticon VALUES (503, 'fa', 'fa-cloud-upload', '1');
INSERT INTO acms_ticon VALUES (504, 'fa', 'fa-user-md', '1');
INSERT INTO acms_ticon VALUES (505, 'fa', 'fa-stethoscope', '1');
INSERT INTO acms_ticon VALUES (506, 'fa', 'fa-suitcase', '1');
INSERT INTO acms_ticon VALUES (507, 'fa', 'fa-bell-o', '1');
INSERT INTO acms_ticon VALUES (508, 'fa', 'fa-coffee', '1');
INSERT INTO acms_ticon VALUES (509, 'fa', 'fa-cutlery', '1');
INSERT INTO acms_ticon VALUES (510, 'fa', 'fa-file-text-o', '1');
INSERT INTO acms_ticon VALUES (511, 'fa', 'fa-building-o', '1');
INSERT INTO acms_ticon VALUES (512, 'fa', 'fa-hospital-o', '1');
INSERT INTO acms_ticon VALUES (513, 'fa', 'fa-ambulance', '1');
INSERT INTO acms_ticon VALUES (514, 'fa', 'fa-medkit', '1');
INSERT INTO acms_ticon VALUES (515, 'fa', 'fa-fighter-jet', '1');
INSERT INTO acms_ticon VALUES (516, 'fa', 'fa-beer', '1');
INSERT INTO acms_ticon VALUES (517, 'fa', 'fa-h-square', '1');
INSERT INTO acms_ticon VALUES (518, 'fa', 'fa-plus-square', '1');
INSERT INTO acms_ticon VALUES (519, 'fa', 'fa-angle-double-left', '1');
INSERT INTO acms_ticon VALUES (520, 'fa', 'fa-angle-double-right', '1');
INSERT INTO acms_ticon VALUES (521, 'fa', 'fa-angle-double-up', '1');
INSERT INTO acms_ticon VALUES (522, 'fa', 'fa-angle-double-down', '1');
INSERT INTO acms_ticon VALUES (523, 'fa', 'fa-angle-left', '1');
INSERT INTO acms_ticon VALUES (524, 'fa', 'fa-angle-right', '1');
INSERT INTO acms_ticon VALUES (525, 'fa', 'fa-angle-up', '1');
INSERT INTO acms_ticon VALUES (526, 'fa', 'fa-angle-down', '1');
INSERT INTO acms_ticon VALUES (527, 'fa', 'fa-desktop', '1');
INSERT INTO acms_ticon VALUES (528, 'fa', 'fa-laptop', '1');
INSERT INTO acms_ticon VALUES (529, 'fa', 'fa-tablet', '1');
INSERT INTO acms_ticon VALUES (530, 'fa', 'fa-mobile-phone', '1');
INSERT INTO acms_ticon VALUES (531, 'fa', 'fa-mobile', '1');
INSERT INTO acms_ticon VALUES (532, 'fa', 'fa-circle-o', '1');
INSERT INTO acms_ticon VALUES (533, 'fa', 'fa-quote-left', '1');
INSERT INTO acms_ticon VALUES (534, 'fa', 'fa-quote-right', '1');
INSERT INTO acms_ticon VALUES (535, 'fa', 'fa-spinner', '1');
INSERT INTO acms_ticon VALUES (536, 'fa', 'fa-circle', '1');
INSERT INTO acms_ticon VALUES (537, 'fa', 'fa-mail-reply', '1');
INSERT INTO acms_ticon VALUES (538, 'fa', 'fa-reply', '1');
INSERT INTO acms_ticon VALUES (539, 'fa', 'fa-github-alt', '1');
INSERT INTO acms_ticon VALUES (540, 'fa', 'fa-folder-o', '1');
INSERT INTO acms_ticon VALUES (541, 'fa', 'fa-folder-open-o', '1');
INSERT INTO acms_ticon VALUES (542, 'fa', 'fa-smile-o', '1');
INSERT INTO acms_ticon VALUES (543, 'fa', 'fa-frown-o', '1');
INSERT INTO acms_ticon VALUES (544, 'fa', 'fa-meh-o', '1');
INSERT INTO acms_ticon VALUES (545, 'fa', 'fa-gamepad', '1');
INSERT INTO acms_ticon VALUES (546, 'fa', 'fa-keyboard-o', '1');
INSERT INTO acms_ticon VALUES (547, 'fa', 'fa-flag-o', '1');
INSERT INTO acms_ticon VALUES (548, 'fa', 'fa-flag-checkered', '1');
INSERT INTO acms_ticon VALUES (549, 'fa', 'fa-terminal', '1');
INSERT INTO acms_ticon VALUES (550, 'fa', 'fa-code', '1');
INSERT INTO acms_ticon VALUES (551, 'fa', 'fa-mail-reply-all', '1');
INSERT INTO acms_ticon VALUES (552, 'fa', 'fa-reply-all', '1');
INSERT INTO acms_ticon VALUES (553, 'fa', 'fa-star-half-empty', '1');
INSERT INTO acms_ticon VALUES (554, 'fa', 'fa-star-half-full', '1');
INSERT INTO acms_ticon VALUES (555, 'fa', 'fa-star-half-o', '1');
INSERT INTO acms_ticon VALUES (556, 'fa', 'fa-location-arrow', '1');
INSERT INTO acms_ticon VALUES (557, 'fa', 'fa-crop', '1');
INSERT INTO acms_ticon VALUES (558, 'fa', 'fa-code-fork', '1');
INSERT INTO acms_ticon VALUES (559, 'fa', 'fa-unlink', '1');
INSERT INTO acms_ticon VALUES (560, 'fa', 'fa-chain-broken', '1');
INSERT INTO acms_ticon VALUES (561, 'fa', 'fa-question', '1');
INSERT INTO acms_ticon VALUES (562, 'fa', 'fa-info', '1');
INSERT INTO acms_ticon VALUES (563, 'fa', 'fa-exclamation', '1');
INSERT INTO acms_ticon VALUES (564, 'fa', 'fa-superscript', '1');
INSERT INTO acms_ticon VALUES (565, 'fa', 'fa-subscript', '1');
INSERT INTO acms_ticon VALUES (566, 'fa', 'fa-eraser', '1');
INSERT INTO acms_ticon VALUES (567, 'fa', 'fa-puzzle-piece', '1');
INSERT INTO acms_ticon VALUES (568, 'fa', 'fa-microphone', '1');
INSERT INTO acms_ticon VALUES (569, 'fa', 'fa-microphone-slash', '1');
INSERT INTO acms_ticon VALUES (570, 'fa', 'fa-shield', '1');
INSERT INTO acms_ticon VALUES (571, 'fa', 'fa-calendar-o', '1');
INSERT INTO acms_ticon VALUES (572, 'fa', 'fa-fire-extinguisher', '1');
INSERT INTO acms_ticon VALUES (573, 'fa', 'fa-rocket', '1');
INSERT INTO acms_ticon VALUES (574, 'fa', 'fa-maxcdn', '1');
INSERT INTO acms_ticon VALUES (575, 'fa', 'fa-chevron-circle-left', '1');
INSERT INTO acms_ticon VALUES (576, 'fa', 'fa-chevron-circle-right', '1');
INSERT INTO acms_ticon VALUES (577, 'fa', 'fa-chevron-circle-up', '1');
INSERT INTO acms_ticon VALUES (578, 'fa', 'fa-chevron-circle-down', '1');
INSERT INTO acms_ticon VALUES (579, 'fa', 'fa-html5', '1');
INSERT INTO acms_ticon VALUES (580, 'fa', 'fa-css3', '1');
INSERT INTO acms_ticon VALUES (581, 'fa', 'fa-anchor', '1');
INSERT INTO acms_ticon VALUES (582, 'fa', 'fa-unlock-alt', '1');
INSERT INTO acms_ticon VALUES (583, 'fa', 'fa-bullseye', '1');
INSERT INTO acms_ticon VALUES (584, 'fa', 'fa-ellipsis-h', '1');
INSERT INTO acms_ticon VALUES (585, 'fa', 'fa-ellipsis-v', '1');
INSERT INTO acms_ticon VALUES (586, 'fa', 'fa-rss-square', '1');
INSERT INTO acms_ticon VALUES (587, 'fa', 'fa-play-circle', '1');
INSERT INTO acms_ticon VALUES (588, 'fa', 'fa-ticket', '1');
INSERT INTO acms_ticon VALUES (589, 'fa', 'fa-minus-square', '1');
INSERT INTO acms_ticon VALUES (590, 'fa', 'fa-minus-square-o', '1');
INSERT INTO acms_ticon VALUES (591, 'fa', 'fa-level-up', '1');
INSERT INTO acms_ticon VALUES (592, 'fa', 'fa-level-down', '1');
INSERT INTO acms_ticon VALUES (593, 'fa', 'fa-check-square', '1');
INSERT INTO acms_ticon VALUES (594, 'fa', 'fa-pencil-square', '1');
INSERT INTO acms_ticon VALUES (595, 'fa', 'fa-external-link-square', '1');
INSERT INTO acms_ticon VALUES (596, 'fa', 'fa-share-square', '1');
INSERT INTO acms_ticon VALUES (597, 'fa', 'fa-compass', '1');
INSERT INTO acms_ticon VALUES (598, 'fa', 'fa-toggle-down', '1');
INSERT INTO acms_ticon VALUES (599, 'fa', 'fa-caret-square-o-down', '1');
INSERT INTO acms_ticon VALUES (600, 'fa', 'fa-toggle-up', '1');
INSERT INTO acms_ticon VALUES (601, 'fa', 'fa-caret-square-o-up', '1');
INSERT INTO acms_ticon VALUES (602, 'fa', 'fa-toggle-right', '1');
INSERT INTO acms_ticon VALUES (603, 'fa', 'fa-caret-square-o-right', '1');
INSERT INTO acms_ticon VALUES (604, 'fa', 'fa-euro', '1');
INSERT INTO acms_ticon VALUES (605, 'fa', 'fa-eur', '1');
INSERT INTO acms_ticon VALUES (606, 'fa', 'fa-gbp', '1');
INSERT INTO acms_ticon VALUES (607, 'fa', 'fa-dollar', '1');
INSERT INTO acms_ticon VALUES (608, 'fa', 'fa-usd', '1');
INSERT INTO acms_ticon VALUES (609, 'fa', 'fa-rupee', '1');
INSERT INTO acms_ticon VALUES (610, 'fa', 'fa-inr', '1');
INSERT INTO acms_ticon VALUES (611, 'fa', 'fa-cny', '1');
INSERT INTO acms_ticon VALUES (612, 'fa', 'fa-rmb', '1');
INSERT INTO acms_ticon VALUES (613, 'fa', 'fa-yen', '1');
INSERT INTO acms_ticon VALUES (614, 'fa', 'fa-jpy', '1');
INSERT INTO acms_ticon VALUES (615, 'fa', 'fa-ruble', '1');
INSERT INTO acms_ticon VALUES (616, 'fa', 'fa-rouble', '1');
INSERT INTO acms_ticon VALUES (617, 'fa', 'fa-rub', '1');
INSERT INTO acms_ticon VALUES (618, 'fa', 'fa-won', '1');
INSERT INTO acms_ticon VALUES (619, 'fa', 'fa-krw', '1');
INSERT INTO acms_ticon VALUES (620, 'fa', 'fa-bitcoin', '1');
INSERT INTO acms_ticon VALUES (621, 'fa', 'fa-btc', '1');
INSERT INTO acms_ticon VALUES (622, 'fa', 'fa-file', '1');
INSERT INTO acms_ticon VALUES (623, 'fa', 'fa-file-text', '1');
INSERT INTO acms_ticon VALUES (624, 'fa', 'fa-sort-alpha-asc', '1');
INSERT INTO acms_ticon VALUES (625, 'fa', 'fa-sort-alpha-desc', '1');
INSERT INTO acms_ticon VALUES (626, 'fa', 'fa-sort-amount-asc', '1');
INSERT INTO acms_ticon VALUES (627, 'fa', 'fa-sort-amount-desc', '1');
INSERT INTO acms_ticon VALUES (628, 'fa', 'fa-sort-numeric-asc', '1');
INSERT INTO acms_ticon VALUES (629, 'fa', 'fa-sort-numeric-desc', '1');
INSERT INTO acms_ticon VALUES (630, 'fa', 'fa-thumbs-up', '1');
INSERT INTO acms_ticon VALUES (631, 'fa', 'fa-thumbs-down', '1');
INSERT INTO acms_ticon VALUES (632, 'fa', 'fa-youtube-square', '1');
INSERT INTO acms_ticon VALUES (633, 'fa', 'fa-youtube', '1');
INSERT INTO acms_ticon VALUES (634, 'fa', 'fa-xing', '1');
INSERT INTO acms_ticon VALUES (635, 'fa', 'fa-xing-square', '1');
INSERT INTO acms_ticon VALUES (636, 'fa', 'fa-youtube-play', '1');
INSERT INTO acms_ticon VALUES (637, 'fa', 'fa-dropbox', '1');
INSERT INTO acms_ticon VALUES (638, 'fa', 'fa-stack-overflow', '1');
INSERT INTO acms_ticon VALUES (639, 'fa', 'fa-instagram', '1');
INSERT INTO acms_ticon VALUES (640, 'fa', 'fa-flickr', '1');
INSERT INTO acms_ticon VALUES (641, 'fa', 'fa-adn', '1');
INSERT INTO acms_ticon VALUES (642, 'fa', 'fa-bitbucket', '1');
INSERT INTO acms_ticon VALUES (643, 'fa', 'fa-bitbucket-square', '1');
INSERT INTO acms_ticon VALUES (644, 'fa', 'fa-tumblr', '1');
INSERT INTO acms_ticon VALUES (645, 'fa', 'fa-tumblr-square', '1');
INSERT INTO acms_ticon VALUES (646, 'fa', 'fa-long-arrow-down', '1');
INSERT INTO acms_ticon VALUES (647, 'fa', 'fa-long-arrow-up', '1');
INSERT INTO acms_ticon VALUES (648, 'fa', 'fa-long-arrow-left', '1');
INSERT INTO acms_ticon VALUES (649, 'fa', 'fa-long-arrow-right', '1');
INSERT INTO acms_ticon VALUES (650, 'fa', 'fa-apple', '1');
INSERT INTO acms_ticon VALUES (651, 'fa', 'fa-windows', '1');
INSERT INTO acms_ticon VALUES (652, 'fa', 'fa-android', '1');
INSERT INTO acms_ticon VALUES (653, 'fa', 'fa-linux', '1');
INSERT INTO acms_ticon VALUES (654, 'fa', 'fa-dribbble', '1');
INSERT INTO acms_ticon VALUES (655, 'fa', 'fa-skype', '1');
INSERT INTO acms_ticon VALUES (656, 'fa', 'fa-foursquare', '1');
INSERT INTO acms_ticon VALUES (657, 'fa', 'fa-trello', '1');
INSERT INTO acms_ticon VALUES (658, 'fa', 'fa-female', '1');
INSERT INTO acms_ticon VALUES (659, 'fa', 'fa-male', '1');
INSERT INTO acms_ticon VALUES (660, 'fa', 'fa-gittip', '1');
INSERT INTO acms_ticon VALUES (661, 'fa', 'fa-gratipay', '1');
INSERT INTO acms_ticon VALUES (662, 'fa', 'fa-sun-o', '1');
INSERT INTO acms_ticon VALUES (663, 'fa', 'fa-moon-o', '1');
INSERT INTO acms_ticon VALUES (664, 'fa', 'fa-archive', '1');
INSERT INTO acms_ticon VALUES (665, 'fa', 'fa-bug', '1');
INSERT INTO acms_ticon VALUES (666, 'fa', 'fa-vk', '1');
INSERT INTO acms_ticon VALUES (667, 'fa', 'fa-weibo', '1');
INSERT INTO acms_ticon VALUES (668, 'fa', 'fa-renren', '1');
INSERT INTO acms_ticon VALUES (669, 'fa', 'fa-pagelines', '1');
INSERT INTO acms_ticon VALUES (670, 'fa', 'fa-stack-exchange', '1');
INSERT INTO acms_ticon VALUES (671, 'fa', 'fa-arrow-circle-o-right', '1');
INSERT INTO acms_ticon VALUES (672, 'fa', 'fa-arrow-circle-o-left', '1');
INSERT INTO acms_ticon VALUES (673, 'fa', 'fa-toggle-left', '1');
INSERT INTO acms_ticon VALUES (674, 'fa', 'fa-caret-square-o-left', '1');
INSERT INTO acms_ticon VALUES (675, 'fa', 'fa-dot-circle-o', '1');
INSERT INTO acms_ticon VALUES (676, 'fa', 'fa-wheelchair', '1');
INSERT INTO acms_ticon VALUES (677, 'fa', 'fa-vimeo-square', '1');
INSERT INTO acms_ticon VALUES (678, 'fa', 'fa-turkish-lira', '1');
INSERT INTO acms_ticon VALUES (679, 'fa', 'fa-try', '1');
INSERT INTO acms_ticon VALUES (680, 'fa', 'fa-plus-square-o', '1');
INSERT INTO acms_ticon VALUES (681, 'fa', 'fa-space-shuttle', '1');
INSERT INTO acms_ticon VALUES (682, 'fa', 'fa-slack', '1');
INSERT INTO acms_ticon VALUES (683, 'fa', 'fa-envelope-square', '1');
INSERT INTO acms_ticon VALUES (684, 'fa', 'fa-wordpress', '1');
INSERT INTO acms_ticon VALUES (685, 'fa', 'fa-openid', '1');
INSERT INTO acms_ticon VALUES (686, 'fa', 'fa-institution', '1');
INSERT INTO acms_ticon VALUES (687, 'fa', 'fa-bank', '1');
INSERT INTO acms_ticon VALUES (688, 'fa', 'fa-university', '1');
INSERT INTO acms_ticon VALUES (689, 'fa', 'fa-mortar-board', '1');
INSERT INTO acms_ticon VALUES (690, 'fa', 'fa-graduation-cap', '1');
INSERT INTO acms_ticon VALUES (691, 'fa', 'fa-yahoo', '1');
INSERT INTO acms_ticon VALUES (692, 'fa', 'fa-google', '1');
INSERT INTO acms_ticon VALUES (693, 'fa', 'fa-reddit', '1');
INSERT INTO acms_ticon VALUES (694, 'fa', 'fa-reddit-square', '1');
INSERT INTO acms_ticon VALUES (695, 'fa', 'fa-stumbleupon-circle', '1');
INSERT INTO acms_ticon VALUES (696, 'fa', 'fa-stumbleupon', '1');
INSERT INTO acms_ticon VALUES (697, 'fa', 'fa-delicious', '1');
INSERT INTO acms_ticon VALUES (698, 'fa', 'fa-digg', '1');
INSERT INTO acms_ticon VALUES (699, 'fa', 'fa-pied-piper-pp', '1');
INSERT INTO acms_ticon VALUES (700, 'fa', 'fa-pied-piper-alt', '1');
INSERT INTO acms_ticon VALUES (701, 'fa', 'fa-drupal', '1');
INSERT INTO acms_ticon VALUES (702, 'fa', 'fa-joomla', '1');
INSERT INTO acms_ticon VALUES (703, 'fa', 'fa-language', '1');
INSERT INTO acms_ticon VALUES (704, 'fa', 'fa-fax', '1');
INSERT INTO acms_ticon VALUES (705, 'fa', 'fa-building', '1');
INSERT INTO acms_ticon VALUES (706, 'fa', 'fa-child', '1');
INSERT INTO acms_ticon VALUES (707, 'fa', 'fa-paw', '1');
INSERT INTO acms_ticon VALUES (708, 'fa', 'fa-spoon', '1');
INSERT INTO acms_ticon VALUES (709, 'fa', 'fa-cube', '1');
INSERT INTO acms_ticon VALUES (710, 'fa', 'fa-cubes', '1');
INSERT INTO acms_ticon VALUES (711, 'fa', 'fa-behance', '1');
INSERT INTO acms_ticon VALUES (712, 'fa', 'fa-behance-square', '1');
INSERT INTO acms_ticon VALUES (713, 'fa', 'fa-steam', '1');
INSERT INTO acms_ticon VALUES (714, 'fa', 'fa-steam-square', '1');
INSERT INTO acms_ticon VALUES (715, 'fa', 'fa-recycle', '1');
INSERT INTO acms_ticon VALUES (716, 'fa', 'fa-automobile', '1');
INSERT INTO acms_ticon VALUES (717, 'fa', 'fa-car', '1');
INSERT INTO acms_ticon VALUES (718, 'fa', 'fa-cab', '1');
INSERT INTO acms_ticon VALUES (719, 'fa', 'fa-taxi', '1');
INSERT INTO acms_ticon VALUES (720, 'fa', 'fa-tree', '1');
INSERT INTO acms_ticon VALUES (721, 'fa', 'fa-spotify', '1');
INSERT INTO acms_ticon VALUES (722, 'fa', 'fa-deviantart', '1');
INSERT INTO acms_ticon VALUES (723, 'fa', 'fa-soundcloud', '1');
INSERT INTO acms_ticon VALUES (724, 'fa', 'fa-database', '1');
INSERT INTO acms_ticon VALUES (725, 'fa', 'fa-file-pdf-o', '1');
INSERT INTO acms_ticon VALUES (726, 'fa', 'fa-file-word-o', '1');
INSERT INTO acms_ticon VALUES (727, 'fa', 'fa-file-excel-o', '1');
INSERT INTO acms_ticon VALUES (728, 'fa', 'fa-file-powerpoint-o', '1');
INSERT INTO acms_ticon VALUES (729, 'fa', 'fa-file-photo-o', '1');
INSERT INTO acms_ticon VALUES (730, 'fa', 'fa-file-picture-o', '1');
INSERT INTO acms_ticon VALUES (731, 'fa', 'fa-file-image-o', '1');
INSERT INTO acms_ticon VALUES (732, 'fa', 'fa-file-zip-o', '1');
INSERT INTO acms_ticon VALUES (733, 'fa', 'fa-file-archive-o', '1');
INSERT INTO acms_ticon VALUES (734, 'fa', 'fa-file-sound-o', '1');
INSERT INTO acms_ticon VALUES (735, 'fa', 'fa-file-audio-o', '1');
INSERT INTO acms_ticon VALUES (736, 'fa', 'fa-file-movie-o', '1');
INSERT INTO acms_ticon VALUES (737, 'fa', 'fa-file-video-o', '1');
INSERT INTO acms_ticon VALUES (738, 'fa', 'fa-file-code-o', '1');
INSERT INTO acms_ticon VALUES (739, 'fa', 'fa-vine', '1');
INSERT INTO acms_ticon VALUES (740, 'fa', 'fa-codepen', '1');
INSERT INTO acms_ticon VALUES (741, 'fa', 'fa-jsfiddle', '1');
INSERT INTO acms_ticon VALUES (742, 'fa', 'fa-life-bouy', '1');
INSERT INTO acms_ticon VALUES (743, 'fa', 'fa-life-buoy', '1');
INSERT INTO acms_ticon VALUES (744, 'fa', 'fa-life-saver', '1');
INSERT INTO acms_ticon VALUES (745, 'fa', 'fa-support', '1');
INSERT INTO acms_ticon VALUES (746, 'fa', 'fa-life-ring', '1');
INSERT INTO acms_ticon VALUES (747, 'fa', 'fa-circle-o-notch', '1');
INSERT INTO acms_ticon VALUES (748, 'fa', 'fa-ra', '1');
INSERT INTO acms_ticon VALUES (749, 'fa', 'fa-resistance', '1');
INSERT INTO acms_ticon VALUES (750, 'fa', 'fa-rebel', '1');
INSERT INTO acms_ticon VALUES (751, 'fa', 'fa-ge', '1');
INSERT INTO acms_ticon VALUES (752, 'fa', 'fa-empire', '1');
INSERT INTO acms_ticon VALUES (753, 'fa', 'fa-git-square', '1');
INSERT INTO acms_ticon VALUES (754, 'fa', 'fa-git', '1');
INSERT INTO acms_ticon VALUES (755, 'fa', 'fa-y-combinator-square', '1');
INSERT INTO acms_ticon VALUES (756, 'fa', 'fa-yc-square', '1');
INSERT INTO acms_ticon VALUES (757, 'fa', 'fa-hacker-news', '1');
INSERT INTO acms_ticon VALUES (758, 'fa', 'fa-tencent-weibo', '1');
INSERT INTO acms_ticon VALUES (759, 'fa', 'fa-qq', '1');
INSERT INTO acms_ticon VALUES (760, 'fa', 'fa-wechat', '1');
INSERT INTO acms_ticon VALUES (761, 'fa', 'fa-weixin', '1');
INSERT INTO acms_ticon VALUES (762, 'fa', 'fa-send', '1');
INSERT INTO acms_ticon VALUES (763, 'fa', 'fa-paper-plane', '1');
INSERT INTO acms_ticon VALUES (764, 'fa', 'fa-send-o', '1');
INSERT INTO acms_ticon VALUES (765, 'fa', 'fa-paper-plane-o', '1');
INSERT INTO acms_ticon VALUES (766, 'fa', 'fa-history', '1');
INSERT INTO acms_ticon VALUES (767, 'fa', 'fa-circle-thin', '1');
INSERT INTO acms_ticon VALUES (768, 'fa', 'fa-header', '1');
INSERT INTO acms_ticon VALUES (769, 'fa', 'fa-paragraph', '1');
INSERT INTO acms_ticon VALUES (770, 'fa', 'fa-sliders', '1');
INSERT INTO acms_ticon VALUES (771, 'fa', 'fa-share-alt', '1');
INSERT INTO acms_ticon VALUES (772, 'fa', 'fa-share-alt-square', '1');
INSERT INTO acms_ticon VALUES (773, 'fa', 'fa-bomb', '1');
INSERT INTO acms_ticon VALUES (774, 'fa', 'fa-soccer-ball-o', '1');
INSERT INTO acms_ticon VALUES (775, 'fa', 'fa-futbol-o', '1');
INSERT INTO acms_ticon VALUES (776, 'fa', 'fa-tty', '1');
INSERT INTO acms_ticon VALUES (777, 'fa', 'fa-binoculars', '1');
INSERT INTO acms_ticon VALUES (778, 'fa', 'fa-plug', '1');
INSERT INTO acms_ticon VALUES (779, 'fa', 'fa-slideshare', '1');
INSERT INTO acms_ticon VALUES (780, 'fa', 'fa-twitch', '1');
INSERT INTO acms_ticon VALUES (781, 'fa', 'fa-yelp', '1');
INSERT INTO acms_ticon VALUES (782, 'fa', 'fa-newspaper-o', '1');
INSERT INTO acms_ticon VALUES (783, 'fa', 'fa-wifi', '1');
INSERT INTO acms_ticon VALUES (784, 'fa', 'fa-calculator', '1');
INSERT INTO acms_ticon VALUES (785, 'fa', 'fa-paypal', '1');
INSERT INTO acms_ticon VALUES (786, 'fa', 'fa-google-wallet', '1');
INSERT INTO acms_ticon VALUES (787, 'fa', 'fa-cc-visa', '1');
INSERT INTO acms_ticon VALUES (788, 'fa', 'fa-cc-mastercard', '1');
INSERT INTO acms_ticon VALUES (789, 'fa', 'fa-cc-discover', '1');
INSERT INTO acms_ticon VALUES (790, 'fa', 'fa-cc-amex', '1');
INSERT INTO acms_ticon VALUES (791, 'fa', 'fa-cc-paypal', '1');
INSERT INTO acms_ticon VALUES (792, 'fa', 'fa-cc-stripe', '1');
INSERT INTO acms_ticon VALUES (793, 'fa', 'fa-bell-slash', '1');
INSERT INTO acms_ticon VALUES (794, 'fa', 'fa-bell-slash-o', '1');
INSERT INTO acms_ticon VALUES (795, 'fa', 'fa-trash', '1');
INSERT INTO acms_ticon VALUES (796, 'fa', 'fa-copyright', '1');
INSERT INTO acms_ticon VALUES (797, 'fa', 'fa-at', '1');
INSERT INTO acms_ticon VALUES (798, 'fa', 'fa-eyedropper', '1');
INSERT INTO acms_ticon VALUES (799, 'fa', 'fa-paint-brush', '1');
INSERT INTO acms_ticon VALUES (800, 'fa', 'fa-birthday-cake', '1');
INSERT INTO acms_ticon VALUES (801, 'fa', 'fa-area-chart', '1');
INSERT INTO acms_ticon VALUES (802, 'fa', 'fa-pie-chart', '1');
INSERT INTO acms_ticon VALUES (803, 'fa', 'fa-line-chart', '1');
INSERT INTO acms_ticon VALUES (804, 'fa', 'fa-lastfm', '1');
INSERT INTO acms_ticon VALUES (805, 'fa', 'fa-lastfm-square', '1');
INSERT INTO acms_ticon VALUES (806, 'fa', 'fa-toggle-off', '1');
INSERT INTO acms_ticon VALUES (807, 'fa', 'fa-toggle-on', '1');
INSERT INTO acms_ticon VALUES (808, 'fa', 'fa-bicycle', '1');
INSERT INTO acms_ticon VALUES (809, 'fa', 'fa-bus', '1');
INSERT INTO acms_ticon VALUES (810, 'fa', 'fa-ioxhost', '1');
INSERT INTO acms_ticon VALUES (811, 'fa', 'fa-angellist', '1');
INSERT INTO acms_ticon VALUES (812, 'fa', 'fa-cc', '1');
INSERT INTO acms_ticon VALUES (813, 'fa', 'fa-shekel', '1');
INSERT INTO acms_ticon VALUES (814, 'fa', 'fa-sheqel', '1');
INSERT INTO acms_ticon VALUES (815, 'fa', 'fa-ils', '1');
INSERT INTO acms_ticon VALUES (816, 'fa', 'fa-meanpath', '1');
INSERT INTO acms_ticon VALUES (817, 'fa', 'fa-buysellads', '1');
INSERT INTO acms_ticon VALUES (818, 'fa', 'fa-connectdevelop', '1');
INSERT INTO acms_ticon VALUES (819, 'fa', 'fa-dashcube', '1');
INSERT INTO acms_ticon VALUES (820, 'fa', 'fa-forumbee', '1');
INSERT INTO acms_ticon VALUES (821, 'fa', 'fa-leanpub', '1');
INSERT INTO acms_ticon VALUES (822, 'fa', 'fa-sellsy', '1');
INSERT INTO acms_ticon VALUES (823, 'fa', 'fa-shirtsinbulk', '1');
INSERT INTO acms_ticon VALUES (824, 'fa', 'fa-simplybuilt', '1');
INSERT INTO acms_ticon VALUES (825, 'fa', 'fa-skyatlas', '1');
INSERT INTO acms_ticon VALUES (826, 'fa', 'fa-cart-plus', '1');
INSERT INTO acms_ticon VALUES (827, 'fa', 'fa-cart-arrow-down', '1');
INSERT INTO acms_ticon VALUES (828, 'fa', 'fa-diamond', '1');
INSERT INTO acms_ticon VALUES (829, 'fa', 'fa-ship', '1');
INSERT INTO acms_ticon VALUES (830, 'fa', 'fa-user-secret', '1');
INSERT INTO acms_ticon VALUES (831, 'fa', 'fa-motorcycle', '1');
INSERT INTO acms_ticon VALUES (832, 'fa', 'fa-street-view', '1');
INSERT INTO acms_ticon VALUES (833, 'fa', 'fa-heartbeat', '1');
INSERT INTO acms_ticon VALUES (834, 'fa', 'fa-venus', '1');
INSERT INTO acms_ticon VALUES (835, 'fa', 'fa-mars', '1');
INSERT INTO acms_ticon VALUES (836, 'fa', 'fa-mercury', '1');
INSERT INTO acms_ticon VALUES (837, 'fa', 'fa-intersex', '1');
INSERT INTO acms_ticon VALUES (838, 'fa', 'fa-transgender', '1');
INSERT INTO acms_ticon VALUES (839, 'fa', 'fa-transgender-alt', '1');
INSERT INTO acms_ticon VALUES (840, 'fa', 'fa-venus-double', '1');
INSERT INTO acms_ticon VALUES (841, 'fa', 'fa-mars-double', '1');
INSERT INTO acms_ticon VALUES (842, 'fa', 'fa-venus-mars', '1');
INSERT INTO acms_ticon VALUES (843, 'fa', 'fa-mars-stroke', '1');
INSERT INTO acms_ticon VALUES (844, 'fa', 'fa-mars-stroke-v', '1');
INSERT INTO acms_ticon VALUES (845, 'fa', 'fa-mars-stroke-h', '1');
INSERT INTO acms_ticon VALUES (846, 'fa', 'fa-neuter', '1');
INSERT INTO acms_ticon VALUES (847, 'fa', 'fa-genderless', '1');
INSERT INTO acms_ticon VALUES (848, 'fa', 'fa-facebook-official', '1');
INSERT INTO acms_ticon VALUES (849, 'fa', 'fa-pinterest-p', '1');
INSERT INTO acms_ticon VALUES (850, 'fa', 'fa-whatsapp', '1');
INSERT INTO acms_ticon VALUES (851, 'fa', 'fa-server', '1');
INSERT INTO acms_ticon VALUES (852, 'fa', 'fa-user-plus', '1');
INSERT INTO acms_ticon VALUES (853, 'fa', 'fa-user-times', '1');
INSERT INTO acms_ticon VALUES (854, 'fa', 'fa-hotel', '1');
INSERT INTO acms_ticon VALUES (855, 'fa', 'fa-bed', '1');
INSERT INTO acms_ticon VALUES (856, 'fa', 'fa-viacoin', '1');
INSERT INTO acms_ticon VALUES (857, 'fa', 'fa-train', '1');
INSERT INTO acms_ticon VALUES (858, 'fa', 'fa-subway', '1');
INSERT INTO acms_ticon VALUES (859, 'fa', 'fa-medium', '1');
INSERT INTO acms_ticon VALUES (860, 'fa', 'fa-yc', '1');
INSERT INTO acms_ticon VALUES (861, 'fa', 'fa-y-combinator', '1');
INSERT INTO acms_ticon VALUES (862, 'fa', 'fa-optin-monster', '1');
INSERT INTO acms_ticon VALUES (863, 'fa', 'fa-opencart', '1');
INSERT INTO acms_ticon VALUES (864, 'fa', 'fa-expeditedssl', '1');
INSERT INTO acms_ticon VALUES (865, 'fa', 'fa-battery-4', '1');
INSERT INTO acms_ticon VALUES (866, 'fa', 'fa-battery-full', '1');
INSERT INTO acms_ticon VALUES (867, 'fa', 'fa-battery-3', '1');
INSERT INTO acms_ticon VALUES (868, 'fa', 'fa-battery-three-quarters', '1');
INSERT INTO acms_ticon VALUES (869, 'fa', 'fa-battery-2', '1');
INSERT INTO acms_ticon VALUES (870, 'fa', 'fa-battery-half', '1');
INSERT INTO acms_ticon VALUES (871, 'fa', 'fa-battery-1', '1');
INSERT INTO acms_ticon VALUES (872, 'fa', 'fa-battery-quarter', '1');
INSERT INTO acms_ticon VALUES (873, 'fa', 'fa-battery-0', '1');
INSERT INTO acms_ticon VALUES (874, 'fa', 'fa-battery-empty', '1');
INSERT INTO acms_ticon VALUES (875, 'fa', 'fa-mouse-pointer', '1');
INSERT INTO acms_ticon VALUES (876, 'fa', 'fa-i-cursor', '1');
INSERT INTO acms_ticon VALUES (877, 'fa', 'fa-object-group', '1');
INSERT INTO acms_ticon VALUES (878, 'fa', 'fa-object-ungroup', '1');
INSERT INTO acms_ticon VALUES (879, 'fa', 'fa-sticky-note', '1');
INSERT INTO acms_ticon VALUES (880, 'fa', 'fa-sticky-note-o', '1');
INSERT INTO acms_ticon VALUES (881, 'fa', 'fa-cc-jcb', '1');
INSERT INTO acms_ticon VALUES (882, 'fa', 'fa-cc-diners-club', '1');
INSERT INTO acms_ticon VALUES (883, 'fa', 'fa-clone', '1');
INSERT INTO acms_ticon VALUES (884, 'fa', 'fa-balance-scale', '1');
INSERT INTO acms_ticon VALUES (885, 'fa', 'fa-hourglass-o', '1');
INSERT INTO acms_ticon VALUES (886, 'fa', 'fa-hourglass-1', '1');
INSERT INTO acms_ticon VALUES (887, 'fa', 'fa-hourglass-start', '1');
INSERT INTO acms_ticon VALUES (888, 'fa', 'fa-hourglass-2', '1');
INSERT INTO acms_ticon VALUES (889, 'fa', 'fa-hourglass-half', '1');
INSERT INTO acms_ticon VALUES (890, 'fa', 'fa-hourglass-3', '1');
INSERT INTO acms_ticon VALUES (891, 'fa', 'fa-hourglass-end', '1');
INSERT INTO acms_ticon VALUES (892, 'fa', 'fa-hourglass', '1');
INSERT INTO acms_ticon VALUES (893, 'fa', 'fa-hand-grab-o', '1');
INSERT INTO acms_ticon VALUES (894, 'fa', 'fa-hand-rock-o', '1');
INSERT INTO acms_ticon VALUES (895, 'fa', 'fa-hand-stop-o', '1');
INSERT INTO acms_ticon VALUES (896, 'fa', 'fa-hand-paper-o', '1');
INSERT INTO acms_ticon VALUES (897, 'fa', 'fa-hand-scissors-o', '1');
INSERT INTO acms_ticon VALUES (898, 'fa', 'fa-hand-lizard-o', '1');
INSERT INTO acms_ticon VALUES (899, 'fa', 'fa-hand-spock-o', '1');
INSERT INTO acms_ticon VALUES (900, 'fa', 'fa-hand-pointer-o', '1');
INSERT INTO acms_ticon VALUES (901, 'fa', 'fa-hand-peace-o', '1');
INSERT INTO acms_ticon VALUES (902, 'fa', 'fa-trademark', '1');
INSERT INTO acms_ticon VALUES (903, 'fa', 'fa-registered', '1');
INSERT INTO acms_ticon VALUES (904, 'fa', 'fa-creative-commons', '1');
INSERT INTO acms_ticon VALUES (905, 'fa', 'fa-gg', '1');
INSERT INTO acms_ticon VALUES (906, 'fa', 'fa-gg-circle', '1');
INSERT INTO acms_ticon VALUES (907, 'fa', 'fa-tripadvisor', '1');
INSERT INTO acms_ticon VALUES (908, 'fa', 'fa-odnoklassniki', '1');
INSERT INTO acms_ticon VALUES (909, 'fa', 'fa-odnoklassniki-square', '1');
INSERT INTO acms_ticon VALUES (910, 'fa', 'fa-get-pocket', '1');
INSERT INTO acms_ticon VALUES (911, 'fa', 'fa-wikipedia-w', '1');
INSERT INTO acms_ticon VALUES (912, 'fa', 'fa-safari', '1');
INSERT INTO acms_ticon VALUES (913, 'fa', 'fa-chrome', '1');
INSERT INTO acms_ticon VALUES (914, 'fa', 'fa-firefox', '1');
INSERT INTO acms_ticon VALUES (915, 'fa', 'fa-opera', '1');
INSERT INTO acms_ticon VALUES (916, 'fa', 'fa-internet-explorer', '1');
INSERT INTO acms_ticon VALUES (917, 'fa', 'fa-tv', '1');
INSERT INTO acms_ticon VALUES (918, 'fa', 'fa-television', '1');
INSERT INTO acms_ticon VALUES (919, 'fa', 'fa-contao', '1');
INSERT INTO acms_ticon VALUES (920, 'fa', 'fa-500px', '1');
INSERT INTO acms_ticon VALUES (921, 'fa', 'fa-amazon', '1');
INSERT INTO acms_ticon VALUES (922, 'fa', 'fa-calendar-plus-o', '1');
INSERT INTO acms_ticon VALUES (923, 'fa', 'fa-calendar-minus-o', '1');
INSERT INTO acms_ticon VALUES (924, 'fa', 'fa-calendar-times-o', '1');
INSERT INTO acms_ticon VALUES (925, 'fa', 'fa-calendar-check-o', '1');
INSERT INTO acms_ticon VALUES (926, 'fa', 'fa-industry', '1');
INSERT INTO acms_ticon VALUES (927, 'fa', 'fa-map-pin', '1');
INSERT INTO acms_ticon VALUES (928, 'fa', 'fa-map-signs', '1');
INSERT INTO acms_ticon VALUES (929, 'fa', 'fa-map-o', '1');
INSERT INTO acms_ticon VALUES (930, 'fa', 'fa-map', '1');
INSERT INTO acms_ticon VALUES (931, 'fa', 'fa-commenting', '1');
INSERT INTO acms_ticon VALUES (932, 'fa', 'fa-commenting-o', '1');
INSERT INTO acms_ticon VALUES (933, 'fa', 'fa-houzz', '1');
INSERT INTO acms_ticon VALUES (934, 'fa', 'fa-vimeo', '1');
INSERT INTO acms_ticon VALUES (935, 'fa', 'fa-black-tie', '1');
INSERT INTO acms_ticon VALUES (936, 'fa', 'fa-fonticons', '1');
INSERT INTO acms_ticon VALUES (937, 'fa', 'fa-reddit-alien', '1');
INSERT INTO acms_ticon VALUES (938, 'fa', 'fa-edge', '1');
INSERT INTO acms_ticon VALUES (939, 'fa', 'fa-credit-card-alt', '1');
INSERT INTO acms_ticon VALUES (940, 'fa', 'fa-codiepie', '1');
INSERT INTO acms_ticon VALUES (941, 'fa', 'fa-modx', '1');
INSERT INTO acms_ticon VALUES (942, 'fa', 'fa-fort-awesome', '1');
INSERT INTO acms_ticon VALUES (943, 'fa', 'fa-usb', '1');
INSERT INTO acms_ticon VALUES (944, 'fa', 'fa-product-hunt', '1');
INSERT INTO acms_ticon VALUES (945, 'fa', 'fa-mixcloud', '1');
INSERT INTO acms_ticon VALUES (946, 'fa', 'fa-scribd', '1');
INSERT INTO acms_ticon VALUES (947, 'fa', 'fa-pause-circle', '1');
INSERT INTO acms_ticon VALUES (948, 'fa', 'fa-pause-circle-o', '1');
INSERT INTO acms_ticon VALUES (949, 'fa', 'fa-stop-circle', '1');
INSERT INTO acms_ticon VALUES (950, 'fa', 'fa-stop-circle-o', '1');
INSERT INTO acms_ticon VALUES (951, 'fa', 'fa-shopping-bag', '1');
INSERT INTO acms_ticon VALUES (952, 'fa', 'fa-shopping-basket', '1');
INSERT INTO acms_ticon VALUES (953, 'fa', 'fa-hashtag', '1');
INSERT INTO acms_ticon VALUES (954, 'fa', 'fa-bluetooth', '1');
INSERT INTO acms_ticon VALUES (955, 'fa', 'fa-bluetooth-b', '1');
INSERT INTO acms_ticon VALUES (956, 'fa', 'fa-percent', '1');
INSERT INTO acms_ticon VALUES (957, 'fa', 'fa-gitlab', '1');
INSERT INTO acms_ticon VALUES (958, 'fa', 'fa-wpbeginner', '1');
INSERT INTO acms_ticon VALUES (959, 'fa', 'fa-wpforms', '1');
INSERT INTO acms_ticon VALUES (960, 'fa', 'fa-envira', '1');
INSERT INTO acms_ticon VALUES (961, 'fa', 'fa-universal-access', '1');
INSERT INTO acms_ticon VALUES (962, 'fa', 'fa-wheelchair-alt', '1');
INSERT INTO acms_ticon VALUES (963, 'fa', 'fa-question-circle-o', '1');
INSERT INTO acms_ticon VALUES (964, 'fa', 'fa-blind', '1');
INSERT INTO acms_ticon VALUES (965, 'fa', 'fa-audio-description', '1');
INSERT INTO acms_ticon VALUES (966, 'fa', 'fa-volume-control-phone', '1');
INSERT INTO acms_ticon VALUES (967, 'fa', 'fa-braille', '1');
INSERT INTO acms_ticon VALUES (968, 'fa', 'fa-asl-interpreting', '1');
INSERT INTO acms_ticon VALUES (969, 'fa', 'fa-deafness', '1');
INSERT INTO acms_ticon VALUES (970, 'fa', 'fa-hard-of-hearing', '1');
INSERT INTO acms_ticon VALUES (971, 'fa', 'fa-deaf', '1');
INSERT INTO acms_ticon VALUES (972, 'fa', 'fa-glide', '1');
INSERT INTO acms_ticon VALUES (973, 'fa', 'fa-glide-g', '1');
INSERT INTO acms_ticon VALUES (974, 'fa', 'fa-signing', '1');
INSERT INTO acms_ticon VALUES (975, 'fa', 'fa-sign-language', '1');
INSERT INTO acms_ticon VALUES (976, 'fa', 'fa-low-vision', '1');
INSERT INTO acms_ticon VALUES (977, 'fa', 'fa-viadeo', '1');
INSERT INTO acms_ticon VALUES (978, 'fa', 'fa-viadeo-square', '1');
INSERT INTO acms_ticon VALUES (979, 'fa', 'fa-snapchat', '1');
INSERT INTO acms_ticon VALUES (980, 'fa', 'fa-snapchat-ghost', '1');
INSERT INTO acms_ticon VALUES (981, 'fa', 'fa-snapchat-square', '1');
INSERT INTO acms_ticon VALUES (982, 'fa', 'fa-pied-piper', '1');
INSERT INTO acms_ticon VALUES (983, 'fa', 'fa-first-order', '1');
INSERT INTO acms_ticon VALUES (984, 'fa', 'fa-yoast', '1');
INSERT INTO acms_ticon VALUES (985, 'fa', 'fa-themeisle', '1');
INSERT INTO acms_ticon VALUES (986, 'fa', 'fa-google-plus-circle', '1');
INSERT INTO acms_ticon VALUES (987, 'fa', 'fa-google-plus-official', '1');
INSERT INTO acms_ticon VALUES (988, 'fa', 'fa-fa', '1');
INSERT INTO acms_ticon VALUES (989, 'fa', 'fa-font-awesome', '1');


--
-- Name: acms_ticon_idicon_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_ticon_idicon_seq', 989, false);


--
-- Data for Name: acms_tlog_access; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tlog_access VALUES (1, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 18:18:36', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (2, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 18:22:14', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (3, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 19:21:25', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (4, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 19:22:07', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (5, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 19:26:15', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (6, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 19:26:28', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (7, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 19:55:23', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (8, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 20:00:51', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (9, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 20:01:05', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (10, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 20:01:31', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (11, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 20:02:00', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (12, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 20:02:41', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (13, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 20:02:51', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (14, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 20:04:37', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (15, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 20:04:49', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (16, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 20:08:53', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (17, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-12 20:10:32', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (18, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.90', '2017-08-15 23:15:03', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (19, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.101', '2017-08-20 00:05:35', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (20, 'admin', 'Usuario o clave incorrectos', '::1', 'CHROME 60.0.3112.101', '2017-08-25 23:28:20.709', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (21, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.101', '2017-08-25 23:29:07.557', 'WINDOWS 7');
INSERT INTO acms_tlog_access VALUES (22, 'admin', 'Sesion iniciada exitosamente', '::1', 'CHROME 60.0.3112.101', '2017-08-26 01:10:41.165', 'WINDOWS 7');


--
-- Name: acms_tlog_access_idlog_access_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tlog_access_idlog_access_seq', 22, true);


--
-- Data for Name: acms_tlog_movement; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tlog_movement VALUES (1, 1, 3, '27', 'Listado', '', '2017-08-10 20:56:39');
INSERT INTO acms_tlog_movement VALUES (2, 1, 3, '23', 'Listado', '', '2017-08-10 20:56:45');
INSERT INTO acms_tlog_movement VALUES (3, 1, 3, '22', 'Listado', '', '2017-08-10 20:56:52');
INSERT INTO acms_tlog_movement VALUES (4, 1, 3, '27', 'Listado', '', '2017-08-10 20:57:00');
INSERT INTO acms_tlog_movement VALUES (5, 1, 3, '14', 'Listado', '', '2017-08-12 01:56:36');
INSERT INTO acms_tlog_movement VALUES (6, 1, 3, '14', 'Listado', '', '2017-08-12 02:00:54');
INSERT INTO acms_tlog_movement VALUES (7, 1, 3, '14', 'Listado', '', '2017-08-12 02:14:30');
INSERT INTO acms_tlog_movement VALUES (8, 1, 3, '14', 'Listado', '', '2017-08-12 18:07:01');
INSERT INTO acms_tlog_movement VALUES (9, 1, 3, '14', 'Consultar', '{CÃ³digo:''1''}', '2017-08-12 18:07:06');
INSERT INTO acms_tlog_movement VALUES (10, 1, 2, '14', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''1'',Nacionalidad:''1'',Etnia:''1'',Cargo:''1'',Cedula:''00000000'',Imagen de perfil:'''',Primer nombre:''Administrador'',Segundo nombre:'''',Primer apellido:''Root'',Segundo apellido:'''',Sexo:''F'',Correo electronico:''augustoalvarez05@gmail.com'',Fecha de nacimiento:'''',Lugar de nacimiento:''asad'',Direccion:''1036'',Direccion opcional:'''',Primer telefono:'''',Segundo telefono:''''}', '2017-08-12 18:07:26');
INSERT INTO acms_tlog_movement VALUES (11, 1, 3, '14', 'Consultar', '{CÃ³digo:''1''}', '2017-08-12 18:07:27');
INSERT INTO acms_tlog_movement VALUES (12, 1, 3, '7', 'Listado', '', '2017-08-12 18:08:35');
INSERT INTO acms_tlog_movement VALUES (13, 1, 3, '14', 'Listado', '', '2017-08-12 18:08:41');
INSERT INTO acms_tlog_movement VALUES (14, 1, 3, '14', 'Consultar', '{CÃ³digo:''1''}', '2017-08-12 18:08:45');
INSERT INTO acms_tlog_movement VALUES (15, 1, 3, '14', 'Listado', '', '2017-08-12 18:10:11');
INSERT INTO acms_tlog_movement VALUES (16, 1, 3, '14', 'Consultar', '{CÃ³digo:''1''}', '2017-08-12 18:10:18');
INSERT INTO acms_tlog_movement VALUES (17, 1, 3, '14', 'Listado', '', '2017-08-12 18:11:32');
INSERT INTO acms_tlog_movement VALUES (18, 1, 3, '14', 'Consultar', '{CÃ³digo:''1''}', '2017-08-12 18:11:35');
INSERT INTO acms_tlog_movement VALUES (19, 1, 3, '14', 'Listado', '', '2017-08-12 20:04:58');
INSERT INTO acms_tlog_movement VALUES (20, 1, 3, '14', 'Consultar', '{CÃ³digo:''1''}', '2017-08-12 20:05:02');
INSERT INTO acms_tlog_movement VALUES (21, 1, 3, '14', 'Consultar', '{CÃ³digo:''1''}', '2017-08-12 20:06:06');
INSERT INTO acms_tlog_movement VALUES (22, 1, 3, '14', 'Listado', '', '2017-08-12 20:06:20');
INSERT INTO acms_tlog_movement VALUES (23, 1, 3, '14', 'Listado', '', '2017-08-12 20:06:26');
INSERT INTO acms_tlog_movement VALUES (24, 1, 3, '14', 'Consultar', '{CÃ³digo:''1''}', '2017-08-12 20:06:29');
INSERT INTO acms_tlog_movement VALUES (25, 1, 3, '14', 'Consultar', '{CÃ³digo:''1''}', '2017-08-12 20:06:49');
INSERT INTO acms_tlog_movement VALUES (26, 1, 3, '14', 'Listado', '', '2017-08-12 20:09:02');
INSERT INTO acms_tlog_movement VALUES (27, 1, 3, '14', 'Consultar', '{CÃ³digo:''1''}', '2017-08-12 20:09:05');
INSERT INTO acms_tlog_movement VALUES (28, 1, 3, '2', 'Listado', '', '2017-08-12 20:10:41');
INSERT INTO acms_tlog_movement VALUES (29, 1, 3, '4', 'Listado', '', '2017-08-12 20:10:58');
INSERT INTO acms_tlog_movement VALUES (30, 1, 3, '4', 'Consultar', '{CÃ³digo:''28''}', '2017-08-12 20:11:01');
INSERT INTO acms_tlog_movement VALUES (31, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''28'',Modulo:''21'',Nombre:''Temas'',URL:''theme'',Icono:''710'',Color de letra:''F5F5F5''}', '2017-08-12 20:11:05');
INSERT INTO acms_tlog_movement VALUES (32, 1, 3, '4', 'Consultar', '{CÃ³digo:''28''}', '2017-08-12 20:11:05');
INSERT INTO acms_tlog_movement VALUES (33, 1, 3, '2', 'Listado', '', '2017-08-12 20:11:09');
INSERT INTO acms_tlog_movement VALUES (34, 1, 3, '2', 'Listado', '', '2017-08-12 20:11:44');
INSERT INTO acms_tlog_movement VALUES (35, 1, 3, '2', 'Listado', '', '2017-08-12 20:12:04');
INSERT INTO acms_tlog_movement VALUES (36, 1, 3, '2', 'Listado', '', '2017-08-12 20:13:22');
INSERT INTO acms_tlog_movement VALUES (37, 1, 3, '2', 'Listado', '', '2017-08-12 20:13:33');
INSERT INTO acms_tlog_movement VALUES (38, 1, 3, '2', 'Listado', '', '2017-08-12 20:13:56');
INSERT INTO acms_tlog_movement VALUES (39, 1, 3, '2', 'Listado', '', '2017-08-12 20:14:14');
INSERT INTO acms_tlog_movement VALUES (40, 1, 3, '2', 'Listado', '', '2017-08-12 20:14:19');
INSERT INTO acms_tlog_movement VALUES (41, 1, 3, '2', 'Listado', '', '2017-08-12 20:14:33');
INSERT INTO acms_tlog_movement VALUES (42, 1, 3, '2', 'Listado', '', '2017-08-12 20:14:45');
INSERT INTO acms_tlog_movement VALUES (43, 1, 3, '2', 'Listado', '', '2017-08-12 20:15:00');
INSERT INTO acms_tlog_movement VALUES (44, 1, 3, '2', 'Listado', '', '2017-08-12 20:15:11');
INSERT INTO acms_tlog_movement VALUES (45, 1, 3, '2', 'Listado', '', '2017-08-12 20:15:17');
INSERT INTO acms_tlog_movement VALUES (46, 1, 3, '2', 'Listado', '', '2017-08-12 20:15:22');
INSERT INTO acms_tlog_movement VALUES (47, 1, 3, '2', 'Listado', '', '2017-08-12 20:15:26');
INSERT INTO acms_tlog_movement VALUES (48, 1, 3, '2', 'Listado', '', '2017-08-12 20:15:35');
INSERT INTO acms_tlog_movement VALUES (49, 1, 3, '2', 'Listado', '', '2017-08-12 20:15:41');
INSERT INTO acms_tlog_movement VALUES (50, 1, 3, '2', 'Listado', '', '2017-08-12 20:16:04');
INSERT INTO acms_tlog_movement VALUES (51, 1, 3, '2', 'Listado', '', '2017-08-12 20:16:08');
INSERT INTO acms_tlog_movement VALUES (52, 1, 3, '2', 'Listado', '', '2017-08-12 20:16:15');
INSERT INTO acms_tlog_movement VALUES (53, 1, 3, '2', 'Listado', '', '2017-08-12 20:16:23');
INSERT INTO acms_tlog_movement VALUES (54, 1, 3, '2', 'Listado', '', '2017-08-12 20:16:33');
INSERT INTO acms_tlog_movement VALUES (55, 1, 3, '2', 'Listado', '', '2017-08-12 20:16:41');
INSERT INTO acms_tlog_movement VALUES (56, 1, 3, '2', 'Listado', '', '2017-08-12 20:16:53');
INSERT INTO acms_tlog_movement VALUES (57, 1, 3, '2', 'Listado', '', '2017-08-12 20:16:58');
INSERT INTO acms_tlog_movement VALUES (58, 1, 3, '2', 'Listado', '', '2017-08-12 20:17:06');
INSERT INTO acms_tlog_movement VALUES (59, 1, 3, '2', 'Listado', '', '2017-08-12 20:17:23');
INSERT INTO acms_tlog_movement VALUES (60, 1, 3, '2', 'Listado', '', '2017-08-12 20:17:28');
INSERT INTO acms_tlog_movement VALUES (61, 1, 3, '2', 'Listado', '', '2017-08-12 20:17:33');
INSERT INTO acms_tlog_movement VALUES (62, 1, 3, '2', 'Listado', '', '2017-08-12 20:17:42');
INSERT INTO acms_tlog_movement VALUES (63, 1, 3, '2', 'Listado', '', '2017-08-12 20:17:53');
INSERT INTO acms_tlog_movement VALUES (64, 1, 3, '2', 'Listado', '', '2017-08-12 20:18:00');
INSERT INTO acms_tlog_movement VALUES (65, 1, 3, '2', 'Listado', '', '2017-08-12 20:18:53');
INSERT INTO acms_tlog_movement VALUES (66, 1, 3, '2', 'Listado', '', '2017-08-12 20:19:03');
INSERT INTO acms_tlog_movement VALUES (67, 1, 3, '2', 'Listado', '', '2017-08-12 20:19:14');
INSERT INTO acms_tlog_movement VALUES (68, 1, 3, '2', 'Listado', '', '2017-08-12 20:19:22');
INSERT INTO acms_tlog_movement VALUES (69, 1, 3, '2', 'Listado', '', '2017-08-12 20:19:31');
INSERT INTO acms_tlog_movement VALUES (70, 1, 3, '2', 'Listado', '', '2017-08-12 20:19:38');
INSERT INTO acms_tlog_movement VALUES (71, 1, 3, '2', 'Listado', '', '2017-08-12 20:19:52');
INSERT INTO acms_tlog_movement VALUES (72, 1, 3, '2', 'Listado', '', '2017-08-12 20:20:09');
INSERT INTO acms_tlog_movement VALUES (73, 1, 3, '2', 'Listado', '', '2017-08-12 20:20:25');
INSERT INTO acms_tlog_movement VALUES (74, 1, 3, '2', 'Listado', '', '2017-08-12 20:20:32');
INSERT INTO acms_tlog_movement VALUES (75, 1, 3, '2', 'Listado', '', '2017-08-12 20:21:22');
INSERT INTO acms_tlog_movement VALUES (76, 1, 3, '2', 'Listado', '', '2017-08-12 20:22:00');
INSERT INTO acms_tlog_movement VALUES (77, 1, 3, '2', 'Listado', '', '2017-08-12 20:40:58');
INSERT INTO acms_tlog_movement VALUES (78, 1, 3, '2', 'Listado', '', '2017-08-12 20:42:51');
INSERT INTO acms_tlog_movement VALUES (79, 1, 3, '2', 'Listado', '', '2017-08-12 20:42:59');
INSERT INTO acms_tlog_movement VALUES (80, 1, 3, '2', 'Listado', '', '2017-08-12 20:43:06');
INSERT INTO acms_tlog_movement VALUES (81, 1, 3, '2', 'Listado', '', '2017-08-12 20:43:37');
INSERT INTO acms_tlog_movement VALUES (82, 1, 3, '2', 'Listado', '', '2017-08-12 20:44:05');
INSERT INTO acms_tlog_movement VALUES (83, 1, 3, '2', 'Listado', '', '2017-08-12 20:44:13');
INSERT INTO acms_tlog_movement VALUES (84, 1, 3, '2', 'Listado', '', '2017-08-12 20:45:05');
INSERT INTO acms_tlog_movement VALUES (85, 1, 3, '2', 'Listado', '', '2017-08-12 20:45:16');
INSERT INTO acms_tlog_movement VALUES (86, 1, 3, '2', 'Listado', '', '2017-08-12 20:45:51');
INSERT INTO acms_tlog_movement VALUES (87, 1, 3, '2', 'Listado', '', '2017-08-12 20:46:01');
INSERT INTO acms_tlog_movement VALUES (88, 1, 3, '2', 'Listado', '', '2017-08-13 00:10:16');
INSERT INTO acms_tlog_movement VALUES (89, 1, 3, '2', 'Listado', '', '2017-08-13 00:11:27');
INSERT INTO acms_tlog_movement VALUES (90, 1, 3, '2', 'Listado', '', '2017-08-13 00:11:42');
INSERT INTO acms_tlog_movement VALUES (91, 1, 3, '2', 'Listado', '', '2017-08-13 00:11:57');
INSERT INTO acms_tlog_movement VALUES (92, 1, 3, '2', 'Listado', '', '2017-08-13 00:55:03');
INSERT INTO acms_tlog_movement VALUES (93, 1, 3, '2', 'Listado', '', '2017-08-13 00:55:12');
INSERT INTO acms_tlog_movement VALUES (94, 1, 3, '2', 'Listado', '', '2017-08-13 01:09:51');
INSERT INTO acms_tlog_movement VALUES (95, 1, 3, '2', 'Listado', '', '2017-08-13 01:13:00');
INSERT INTO acms_tlog_movement VALUES (96, 1, 3, '2', 'Listado', '', '2017-08-13 01:13:06');
INSERT INTO acms_tlog_movement VALUES (97, 1, 3, '2', 'Listado', '', '2017-08-13 01:23:22');
INSERT INTO acms_tlog_movement VALUES (98, 1, 3, '2', 'Listado', '', '2017-08-13 01:23:25');
INSERT INTO acms_tlog_movement VALUES (99, 1, 3, '2', 'Listado', '', '2017-08-13 01:23:34');
INSERT INTO acms_tlog_movement VALUES (100, 1, 3, '2', 'Listado', '', '2017-08-13 01:23:39');
INSERT INTO acms_tlog_movement VALUES (101, 1, 3, '2', 'Listado', '', '2017-08-13 01:24:30');
INSERT INTO acms_tlog_movement VALUES (102, 1, 3, '2', 'Listado', '', '2017-08-13 01:24:40');
INSERT INTO acms_tlog_movement VALUES (103, 1, 3, '2', 'Listado', '', '2017-08-13 01:24:52');
INSERT INTO acms_tlog_movement VALUES (104, 1, 3, '2', 'Listado', '', '2017-08-13 01:25:08');
INSERT INTO acms_tlog_movement VALUES (105, 1, 3, '2', 'Listado', '', '2017-08-13 01:25:38');
INSERT INTO acms_tlog_movement VALUES (106, 1, 3, '2', 'Listado', '', '2017-08-13 01:25:44');
INSERT INTO acms_tlog_movement VALUES (107, 1, 3, '2', 'Listado', '', '2017-08-13 01:25:58');
INSERT INTO acms_tlog_movement VALUES (108, 1, 3, '2', 'Listado', '', '2017-08-13 01:26:04');
INSERT INTO acms_tlog_movement VALUES (109, 1, 3, '2', 'Listado', '', '2017-08-13 01:26:18');
INSERT INTO acms_tlog_movement VALUES (110, 1, 3, '2', 'Listado', '', '2017-08-13 01:26:27');
INSERT INTO acms_tlog_movement VALUES (111, 1, 3, '2', 'Listado', '', '2017-08-13 01:26:49');
INSERT INTO acms_tlog_movement VALUES (112, 1, 3, '2', 'Listado', '', '2017-08-13 01:26:55');
INSERT INTO acms_tlog_movement VALUES (113, 1, 3, '2', 'Listado', '', '2017-08-13 01:27:17');
INSERT INTO acms_tlog_movement VALUES (114, 1, 3, '2', 'Listado', '', '2017-08-13 01:27:26');
INSERT INTO acms_tlog_movement VALUES (115, 1, 3, '2', 'Listado', '', '2017-08-13 01:28:17');
INSERT INTO acms_tlog_movement VALUES (116, 1, 3, '2', 'Listado', '', '2017-08-13 01:28:24');
INSERT INTO acms_tlog_movement VALUES (117, 1, 3, '2', 'Listado', '', '2017-08-13 01:28:29');
INSERT INTO acms_tlog_movement VALUES (118, 1, 3, '2', 'Listado', '', '2017-08-13 01:28:33');
INSERT INTO acms_tlog_movement VALUES (119, 1, 3, '2', 'Listado', '', '2017-08-13 02:08:32');
INSERT INTO acms_tlog_movement VALUES (120, 1, 3, '2', 'Listado', '', '2017-08-13 02:10:04');
INSERT INTO acms_tlog_movement VALUES (121, 1, 3, '2', 'Listado', '', '2017-08-13 02:10:30');
INSERT INTO acms_tlog_movement VALUES (122, 1, 3, '2', 'Listado', '', '2017-08-13 02:10:48');
INSERT INTO acms_tlog_movement VALUES (123, 1, 3, '2', 'Listado', '', '2017-08-13 02:11:23');
INSERT INTO acms_tlog_movement VALUES (124, 1, 3, '2', 'Listado', '', '2017-08-13 02:11:28');
INSERT INTO acms_tlog_movement VALUES (125, 1, 3, '2', 'Listado', '', '2017-08-13 02:11:31');
INSERT INTO acms_tlog_movement VALUES (126, 1, 3, '2', 'Listado', '', '2017-08-13 02:11:57');
INSERT INTO acms_tlog_movement VALUES (127, 1, 3, '2', 'Listado', '', '2017-08-13 02:12:15');
INSERT INTO acms_tlog_movement VALUES (128, 1, 3, '2', 'Listado', '', '2017-08-13 02:12:22');
INSERT INTO acms_tlog_movement VALUES (129, 1, 3, '2', 'Listado', '', '2017-08-13 02:12:26');
INSERT INTO acms_tlog_movement VALUES (130, 1, 3, '2', 'Listado', '', '2017-08-13 02:12:29');
INSERT INTO acms_tlog_movement VALUES (131, 1, 3, '2', 'Listado', '', '2017-08-13 02:12:33');
INSERT INTO acms_tlog_movement VALUES (132, 1, 3, '2', 'Listado', '', '2017-08-13 02:12:37');
INSERT INTO acms_tlog_movement VALUES (133, 1, 3, '2', 'Listado', '', '2017-08-13 02:12:46');
INSERT INTO acms_tlog_movement VALUES (134, 1, 3, '2', 'Listado', '', '2017-08-13 02:12:50');
INSERT INTO acms_tlog_movement VALUES (135, 1, 3, '2', 'Listado', '', '2017-08-13 02:12:53');
INSERT INTO acms_tlog_movement VALUES (136, 1, 3, '2', 'Listado', '', '2017-08-13 02:12:57');
INSERT INTO acms_tlog_movement VALUES (137, 1, 3, '2', 'Listado', '', '2017-08-13 02:12:59');
INSERT INTO acms_tlog_movement VALUES (138, 1, 3, '2', 'Listado', '', '2017-08-13 02:13:25');
INSERT INTO acms_tlog_movement VALUES (139, 1, 3, '2', 'Listado', '', '2017-08-13 02:13:48');
INSERT INTO acms_tlog_movement VALUES (140, 1, 3, '2', 'Listado', '', '2017-08-13 02:14:06');
INSERT INTO acms_tlog_movement VALUES (141, 1, 3, '2', 'Listado', '', '2017-08-13 02:15:15');
INSERT INTO acms_tlog_movement VALUES (142, 1, 3, '2', 'Listado', '', '2017-08-13 02:15:44');
INSERT INTO acms_tlog_movement VALUES (143, 1, 3, '2', 'Listado', '', '2017-08-13 02:15:49');
INSERT INTO acms_tlog_movement VALUES (144, 1, 3, '2', 'Listado', '', '2017-08-13 02:15:55');
INSERT INTO acms_tlog_movement VALUES (145, 1, 3, '2', 'Listado', '', '2017-08-13 02:16:07');
INSERT INTO acms_tlog_movement VALUES (146, 1, 3, '2', 'Listado', '', '2017-08-13 02:16:15');
INSERT INTO acms_tlog_movement VALUES (147, 1, 3, '2', 'Listado', '', '2017-08-13 02:16:18');
INSERT INTO acms_tlog_movement VALUES (148, 1, 3, '2', 'Listado', '', '2017-08-13 02:16:25');
INSERT INTO acms_tlog_movement VALUES (149, 1, 3, '2', 'Listado', '', '2017-08-13 02:16:44');
INSERT INTO acms_tlog_movement VALUES (150, 1, 3, '2', 'Listado', '', '2017-08-13 02:33:08');
INSERT INTO acms_tlog_movement VALUES (151, 1, 3, '2', 'Listado', '', '2017-08-13 02:33:17');
INSERT INTO acms_tlog_movement VALUES (152, 1, 3, '2', 'Listado', '', '2017-08-13 02:33:28');
INSERT INTO acms_tlog_movement VALUES (153, 1, 3, '2', 'Listado', '', '2017-08-14 12:53:24');
INSERT INTO acms_tlog_movement VALUES (154, 1, 3, '2', 'Listado', '', '2017-08-14 13:16:50');
INSERT INTO acms_tlog_movement VALUES (155, 1, 3, '2', 'Listado', '', '2017-08-14 13:16:58');
INSERT INTO acms_tlog_movement VALUES (156, 1, 3, '2', 'Listado', '', '2017-08-14 13:17:01');
INSERT INTO acms_tlog_movement VALUES (157, 1, 3, '2', 'Listado', '', '2017-08-14 13:17:11');
INSERT INTO acms_tlog_movement VALUES (158, 1, 3, '2', 'Listado', '', '2017-08-14 13:17:40');
INSERT INTO acms_tlog_movement VALUES (159, 1, 3, '2', 'Listado', '', '2017-08-14 13:17:53');
INSERT INTO acms_tlog_movement VALUES (160, 1, 3, '2', 'Listado', '', '2017-08-14 13:17:59');
INSERT INTO acms_tlog_movement VALUES (161, 1, 3, '2', 'Listado', '', '2017-08-14 13:18:23');
INSERT INTO acms_tlog_movement VALUES (162, 1, 3, '2', 'Listado', '', '2017-08-14 13:18:33');
INSERT INTO acms_tlog_movement VALUES (163, 1, 3, '2', 'Listado', '', '2017-08-14 13:18:51');
INSERT INTO acms_tlog_movement VALUES (164, 1, 3, '2', 'Listado', '', '2017-08-14 13:19:17');
INSERT INTO acms_tlog_movement VALUES (165, 1, 3, '2', 'Listado', '', '2017-08-14 13:23:10');
INSERT INTO acms_tlog_movement VALUES (166, 1, 3, '2', 'Listado', '', '2017-08-14 13:25:20');
INSERT INTO acms_tlog_movement VALUES (167, 1, 3, '24', 'Listado', '', '2017-08-14 13:25:22');
INSERT INTO acms_tlog_movement VALUES (168, 1, 3, '2', 'Listado', '', '2017-08-14 13:25:38');
INSERT INTO acms_tlog_movement VALUES (169, 1, 3, '2', 'Listado', '', '2017-08-14 13:25:55');
INSERT INTO acms_tlog_movement VALUES (170, 1, 3, '2', 'Listado', '', '2017-08-14 13:57:44');
INSERT INTO acms_tlog_movement VALUES (171, 1, 3, '2', 'Listado', '', '2017-08-14 14:00:00');
INSERT INTO acms_tlog_movement VALUES (172, 1, 3, '2', 'Listado', '', '2017-08-14 14:00:42');
INSERT INTO acms_tlog_movement VALUES (173, 1, 3, '2', 'Listado', '', '2017-08-14 14:01:09');
INSERT INTO acms_tlog_movement VALUES (174, 1, 3, '2', 'Listado', '', '2017-08-14 14:02:58');
INSERT INTO acms_tlog_movement VALUES (175, 1, 3, '2', 'Listado', '', '2017-08-14 14:03:07');
INSERT INTO acms_tlog_movement VALUES (176, 1, 3, '2', 'Listado', '', '2017-08-14 14:03:18');
INSERT INTO acms_tlog_movement VALUES (177, 1, 3, '2', 'Listado', '', '2017-08-14 14:06:21');
INSERT INTO acms_tlog_movement VALUES (178, 1, 3, '2', 'Listado', '', '2017-08-14 14:06:43');
INSERT INTO acms_tlog_movement VALUES (179, 1, 3, '2', 'Listado', '', '2017-08-14 14:07:10');
INSERT INTO acms_tlog_movement VALUES (180, 1, 3, '2', 'Listado', '', '2017-08-14 14:09:07');
INSERT INTO acms_tlog_movement VALUES (181, 1, 3, '2', 'Listado', '', '2017-08-14 14:09:28');
INSERT INTO acms_tlog_movement VALUES (182, 1, 3, '2', 'Listado', '', '2017-08-14 14:09:35');
INSERT INTO acms_tlog_movement VALUES (183, 1, 3, '2', 'Listado', '', '2017-08-14 14:10:03');
INSERT INTO acms_tlog_movement VALUES (184, 1, 3, '2', 'Listado', '', '2017-08-14 14:10:33');
INSERT INTO acms_tlog_movement VALUES (185, 1, 3, '2', 'Listado', '', '2017-08-14 14:12:14');
INSERT INTO acms_tlog_movement VALUES (186, 1, 3, '2', 'Listado', '', '2017-08-14 14:27:41');
INSERT INTO acms_tlog_movement VALUES (187, 1, 3, '2', 'Listado', '', '2017-08-14 15:03:52');
INSERT INTO acms_tlog_movement VALUES (188, 1, 3, '2', 'Listado', '', '2017-08-14 15:04:04');
INSERT INTO acms_tlog_movement VALUES (189, 1, 3, '2', 'Listado', '', '2017-08-14 15:04:39');
INSERT INTO acms_tlog_movement VALUES (190, 1, 3, '2', 'Listado', '', '2017-08-14 17:19:19');
INSERT INTO acms_tlog_movement VALUES (191, 1, 3, '2', 'Listado', '', '2017-08-14 17:24:45');
INSERT INTO acms_tlog_movement VALUES (192, 1, 3, '2', 'Listado', '', '2017-08-14 17:31:48');
INSERT INTO acms_tlog_movement VALUES (193, 1, 3, '2', 'Listado', '', '2017-08-14 17:32:04');
INSERT INTO acms_tlog_movement VALUES (194, 1, 3, '2', 'Listado', '', '2017-08-14 17:38:27');
INSERT INTO acms_tlog_movement VALUES (195, 1, 3, '2', 'Listado', '', '2017-08-14 17:38:48');
INSERT INTO acms_tlog_movement VALUES (196, 1, 3, '2', 'Listado', '', '2017-08-14 17:40:08');
INSERT INTO acms_tlog_movement VALUES (197, 1, 3, '2', 'Listado', '', '2017-08-14 17:40:59');
INSERT INTO acms_tlog_movement VALUES (198, 1, 3, '2', 'Listado', '', '2017-08-14 17:41:25');
INSERT INTO acms_tlog_movement VALUES (199, 1, 3, '2', 'Listado', '', '2017-08-14 17:42:03');
INSERT INTO acms_tlog_movement VALUES (200, 1, 3, '2', 'Listado', '', '2017-08-14 17:44:55');
INSERT INTO acms_tlog_movement VALUES (201, 1, 3, '2', 'Listado', '', '2017-08-14 17:45:06');
INSERT INTO acms_tlog_movement VALUES (202, 1, 3, '2', 'Listado', '', '2017-08-14 17:45:16');
INSERT INTO acms_tlog_movement VALUES (203, 1, 3, '2', 'Listado', '', '2017-08-14 17:45:21');
INSERT INTO acms_tlog_movement VALUES (204, 1, 3, '2', 'Listado', '', '2017-08-14 17:45:29');
INSERT INTO acms_tlog_movement VALUES (205, 1, 3, '2', 'Listado', '', '2017-08-14 17:45:42');
INSERT INTO acms_tlog_movement VALUES (206, 1, 3, '2', 'Listado', '', '2017-08-14 17:46:41');
INSERT INTO acms_tlog_movement VALUES (207, 1, 3, '2', 'Listado', '', '2017-08-14 17:46:56');
INSERT INTO acms_tlog_movement VALUES (208, 1, 3, '2', 'Listado', '', '2017-08-14 17:47:12');
INSERT INTO acms_tlog_movement VALUES (209, 1, 3, '2', 'Listado', '', '2017-08-14 17:47:31');
INSERT INTO acms_tlog_movement VALUES (210, 1, 3, '2', 'Listado', '', '2017-08-14 17:47:44');
INSERT INTO acms_tlog_movement VALUES (211, 1, 3, '2', 'Listado', '', '2017-08-14 17:50:15');
INSERT INTO acms_tlog_movement VALUES (212, 1, 3, '2', 'Listado', '', '2017-08-14 17:55:18');
INSERT INTO acms_tlog_movement VALUES (213, 1, 3, '2', 'Listado', '', '2017-08-14 17:55:38');
INSERT INTO acms_tlog_movement VALUES (214, 1, 3, '2', 'Listado', '', '2017-08-14 17:56:05');
INSERT INTO acms_tlog_movement VALUES (215, 1, 3, '2', 'Listado', '', '2017-08-14 17:56:19');
INSERT INTO acms_tlog_movement VALUES (216, 1, 3, '2', 'Listado', '', '2017-08-14 18:40:19');
INSERT INTO acms_tlog_movement VALUES (217, 1, 3, '4', 'Listado', '', '2017-08-14 20:16:33');
INSERT INTO acms_tlog_movement VALUES (218, 1, 3, '4', 'Listado', '', '2017-08-14 20:22:57');
INSERT INTO acms_tlog_movement VALUES (219, 1, 3, '4', 'Listado', '', '2017-08-14 20:38:22');
INSERT INTO acms_tlog_movement VALUES (220, 1, 3, '2', 'Listado', '', '2017-08-14 20:38:28');
INSERT INTO acms_tlog_movement VALUES (221, 1, 3, '2', 'Listado', '', '2017-08-14 20:38:45');
INSERT INTO acms_tlog_movement VALUES (222, 1, 3, '2', 'Listado', '', '2017-08-14 20:38:51');
INSERT INTO acms_tlog_movement VALUES (223, 1, 3, '2', 'Listado', '', '2017-08-14 20:39:03');
INSERT INTO acms_tlog_movement VALUES (224, 1, 3, '2', 'Listado', '', '2017-08-14 20:39:08');
INSERT INTO acms_tlog_movement VALUES (225, 1, 3, '2', 'Listado', '', '2017-08-14 20:39:13');
INSERT INTO acms_tlog_movement VALUES (226, 1, 3, '2', 'Listado', '', '2017-08-14 20:39:23');
INSERT INTO acms_tlog_movement VALUES (227, 1, 3, '2', 'Listado', '', '2017-08-14 20:39:47');
INSERT INTO acms_tlog_movement VALUES (228, 1, 3, '2', 'Listado', '', '2017-08-14 20:39:57');
INSERT INTO acms_tlog_movement VALUES (229, 1, 3, '2', 'Listado', '', '2017-08-14 20:40:03');
INSERT INTO acms_tlog_movement VALUES (230, 1, 3, '2', 'Listado', '', '2017-08-14 20:40:14');
INSERT INTO acms_tlog_movement VALUES (231, 1, 3, '2', 'Listado', '', '2017-08-14 20:40:30');
INSERT INTO acms_tlog_movement VALUES (232, 1, 3, '2', 'Listado', '', '2017-08-14 20:40:41');
INSERT INTO acms_tlog_movement VALUES (233, 1, 3, '2', 'Listado', '', '2017-08-14 20:40:55');
INSERT INTO acms_tlog_movement VALUES (234, 1, 3, '2', 'Listado', '', '2017-08-14 20:42:24');
INSERT INTO acms_tlog_movement VALUES (235, 1, 3, '2', 'Listado', '', '2017-08-14 20:42:48');
INSERT INTO acms_tlog_movement VALUES (236, 1, 3, '2', 'Listado', '', '2017-08-14 20:43:47');
INSERT INTO acms_tlog_movement VALUES (237, 1, 3, '2', 'Listado', '', '2017-08-14 20:44:04');
INSERT INTO acms_tlog_movement VALUES (238, 1, 3, '2', 'Listado', '', '2017-08-14 20:44:17');
INSERT INTO acms_tlog_movement VALUES (239, 1, 3, '2', 'Listado', '', '2017-08-14 23:18:56');
INSERT INTO acms_tlog_movement VALUES (240, 1, 3, '2', 'Listado', '', '2017-08-14 23:32:37');
INSERT INTO acms_tlog_movement VALUES (241, 1, 3, '7', 'Listado', '', '2017-08-15 00:04:00');
INSERT INTO acms_tlog_movement VALUES (242, 1, 3, '2', 'Listado', '', '2017-08-15 00:04:05');
INSERT INTO acms_tlog_movement VALUES (243, 1, 3, '4', 'Listado', '', '2017-08-15 00:04:14');
INSERT INTO acms_tlog_movement VALUES (244, 1, 3, '4', 'Consultar', '{CÃ³digo:''7''}', '2017-08-15 00:04:19');
INSERT INTO acms_tlog_movement VALUES (245, 1, 3, '4', 'Listado', '', '2017-08-15 00:23:26');
INSERT INTO acms_tlog_movement VALUES (246, 1, 1, '4', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',Modulo:''21'',Nombre:''Noticias'',URL:''noticie'',Icono:''782'',Color de letra:''F5F5F5''}', '2017-08-15 00:23:59');
INSERT INTO acms_tlog_movement VALUES (247, 1, 3, '7', 'Listado', '', '2017-08-15 00:24:07');
INSERT INTO acms_tlog_movement VALUES (248, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-15 00:24:10');
INSERT INTO acms_tlog_movement VALUES (249, 1, 2, '7', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '', '2017-08-15 00:24:30');
INSERT INTO acms_tlog_movement VALUES (250, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-15 00:24:30');
INSERT INTO acms_tlog_movement VALUES (251, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-15 00:24:46');
INSERT INTO acms_tlog_movement VALUES (252, 1, 3, '4', 'Listado', '', '2017-08-15 00:24:53');
INSERT INTO acms_tlog_movement VALUES (253, 1, 3, '4', 'Consultar', '{CÃ³digo:''30''}', '2017-08-15 00:24:56');
INSERT INTO acms_tlog_movement VALUES (254, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''30'',Modulo:''21'',Nombre:''Noticias'',URL:''notice'',Icono:''782'',Color de letra:''F5F5F5''}', '2017-08-15 00:25:02');
INSERT INTO acms_tlog_movement VALUES (255, 1, 3, '4', 'Consultar', '{CÃ³digo:''30''}', '2017-08-15 00:25:02');
INSERT INTO acms_tlog_movement VALUES (256, 1, 3, '2', 'Listado', '', '2017-08-15 00:25:05');
INSERT INTO acms_tlog_movement VALUES (257, 1, 1, '2', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',notice_name:''''}', '2017-08-15 00:25:16');
INSERT INTO acms_tlog_movement VALUES (258, 1, 3, '2', 'Listado', '', '2017-08-15 00:25:19');
INSERT INTO acms_tlog_movement VALUES (259, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-15 00:25:23');
INSERT INTO acms_tlog_movement VALUES (260, 1, 2, '2', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',Titulo:'''',Contenido:''Nuevo hola mundos''}', '2017-08-15 00:25:26');
INSERT INTO acms_tlog_movement VALUES (261, 1, 3, '2', 'Consultar', '{CÃ³digo:''''}', '2017-08-15 00:25:26');
INSERT INTO acms_tlog_movement VALUES (262, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-15 00:25:29');
INSERT INTO acms_tlog_movement VALUES (263, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-15 00:25:37');
INSERT INTO acms_tlog_movement VALUES (264, 1, 2, '2', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''1'',Titulo:'''',Contenido:''Nuevo hola mundox''}', '2017-08-15 00:25:41');
INSERT INTO acms_tlog_movement VALUES (265, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-15 00:25:41');
INSERT INTO acms_tlog_movement VALUES (266, 1, 3, '2', 'Listado', '', '2017-08-15 00:25:43');
INSERT INTO acms_tlog_movement VALUES (267, 1, 3, '2', 'Listado', '', '2017-08-15 00:38:57');
INSERT INTO acms_tlog_movement VALUES (268, 1, 3, '2', 'Listado', '', '2017-08-15 21:32:35');
INSERT INTO acms_tlog_movement VALUES (269, 1, 3, '2', 'Listado', '', '2017-08-15 22:39:05');
INSERT INTO acms_tlog_movement VALUES (270, 1, 3, '2', 'Listado', '', '2017-08-15 23:06:25');
INSERT INTO acms_tlog_movement VALUES (271, 1, 3, '2', 'Listado', '', '2017-08-15 23:07:06');
INSERT INTO acms_tlog_movement VALUES (272, 1, 3, '2', 'Listado', '', '2017-08-15 23:07:14');
INSERT INTO acms_tlog_movement VALUES (273, 1, 3, '2', 'Listado', '', '2017-08-15 23:09:05');
INSERT INTO acms_tlog_movement VALUES (274, 1, 3, '2', 'Listado', '', '2017-08-15 23:10:50');
INSERT INTO acms_tlog_movement VALUES (275, 1, 3, '2', 'Listado', '', '2017-08-15 23:11:03');
INSERT INTO acms_tlog_movement VALUES (276, 1, 3, '2', 'Listado', '', '2017-08-15 23:15:18');
INSERT INTO acms_tlog_movement VALUES (277, 1, 3, '2', 'Listado', '', '2017-08-15 23:16:38');
INSERT INTO acms_tlog_movement VALUES (278, 1, 3, '2', 'Listado', '', '2017-08-15 23:16:48');
INSERT INTO acms_tlog_movement VALUES (279, 1, 3, '2', 'Listado', '', '2017-08-15 23:17:15');
INSERT INTO acms_tlog_movement VALUES (280, 1, 3, '2', 'Listado', '', '2017-08-15 23:17:28');
INSERT INTO acms_tlog_movement VALUES (281, 1, 3, '2', 'Listado', '', '2017-08-15 23:20:33');
INSERT INTO acms_tlog_movement VALUES (282, 1, 3, '2', 'Listado', '', '2017-08-15 23:23:45');
INSERT INTO acms_tlog_movement VALUES (283, 1, 3, '2', 'Listado', '', '2017-08-15 23:33:13');
INSERT INTO acms_tlog_movement VALUES (284, 1, 3, '2', 'Listado', '', '2017-08-15 23:34:02');
INSERT INTO acms_tlog_movement VALUES (285, 1, 3, '2', 'Listado', '', '2017-08-15 23:34:15');
INSERT INTO acms_tlog_movement VALUES (286, 1, 3, '2', 'Listado', '', '2017-08-15 23:34:26');
INSERT INTO acms_tlog_movement VALUES (287, 1, 3, '2', 'Listado', '', '2017-08-15 23:37:46');
INSERT INTO acms_tlog_movement VALUES (288, 1, 3, '2', 'Listado', '', '2017-08-15 23:38:22');
INSERT INTO acms_tlog_movement VALUES (289, 1, 3, '2', 'Listado', '', '2017-08-15 23:38:37');
INSERT INTO acms_tlog_movement VALUES (290, 1, 3, '2', 'Listado', '', '2017-08-15 23:39:03');
INSERT INTO acms_tlog_movement VALUES (291, 1, 3, '2', 'Listado', '', '2017-08-15 23:40:39');
INSERT INTO acms_tlog_movement VALUES (292, 1, 3, '2', 'Listado', '', '2017-08-15 23:40:39');
INSERT INTO acms_tlog_movement VALUES (293, 1, 3, '2', 'Listado', '', '2017-08-15 23:41:27');
INSERT INTO acms_tlog_movement VALUES (294, 1, 3, '2', 'Listado', '', '2017-08-15 23:42:24');
INSERT INTO acms_tlog_movement VALUES (295, 1, 3, '2', 'Listado', '', '2017-08-15 23:42:47');
INSERT INTO acms_tlog_movement VALUES (296, 1, 3, '2', 'Listado', '', '2017-08-15 23:43:02');
INSERT INTO acms_tlog_movement VALUES (297, 1, 3, '2', 'Listado', '', '2017-08-15 23:44:01');
INSERT INTO acms_tlog_movement VALUES (298, 1, 3, '2', 'Listado', '', '2017-08-15 23:44:08');
INSERT INTO acms_tlog_movement VALUES (299, 1, 3, '2', 'Listado', '', '2017-08-15 23:44:16');
INSERT INTO acms_tlog_movement VALUES (300, 1, 3, '2', 'Listado', '', '2017-08-15 23:44:27');
INSERT INTO acms_tlog_movement VALUES (301, 1, 3, '2', 'Listado', '', '2017-08-16 11:57:18');
INSERT INTO acms_tlog_movement VALUES (302, 1, 3, '2', 'Listado', '', '2017-08-16 22:11:47');
INSERT INTO acms_tlog_movement VALUES (303, 1, 3, '5', 'Listado', '', '2017-08-17 20:15:21');
INSERT INTO acms_tlog_movement VALUES (304, 1, 3, '2', 'Listado', '', '2017-08-17 20:15:25');
INSERT INTO acms_tlog_movement VALUES (305, 1, 3, '2', 'Listado', '', '2017-08-17 20:21:01');
INSERT INTO acms_tlog_movement VALUES (306, 1, 3, '2', 'Listado', '', '2017-08-17 20:21:52');
INSERT INTO acms_tlog_movement VALUES (307, 1, 3, '2', 'Listado', '', '2017-08-17 20:23:34');
INSERT INTO acms_tlog_movement VALUES (308, 1, 3, '2', 'Listado', '', '2017-08-17 20:25:00');
INSERT INTO acms_tlog_movement VALUES (309, 1, 3, '2', 'Listado', '', '2017-08-17 20:25:55');
INSERT INTO acms_tlog_movement VALUES (310, 1, 3, '2', 'Listado', '', '2017-08-17 20:29:52');
INSERT INTO acms_tlog_movement VALUES (311, 1, 3, '2', 'Listado', '', '2017-08-17 20:30:02');
INSERT INTO acms_tlog_movement VALUES (312, 1, 3, '2', 'Listado', '', '2017-08-17 20:30:09');
INSERT INTO acms_tlog_movement VALUES (313, 1, 3, '2', 'Listado', '', '2017-08-17 20:35:11');
INSERT INTO acms_tlog_movement VALUES (314, 1, 3, '2', 'Listado', '', '2017-08-17 20:35:36');
INSERT INTO acms_tlog_movement VALUES (315, 1, 3, '2', 'Listado', '', '2017-08-17 20:36:03');
INSERT INTO acms_tlog_movement VALUES (316, 1, 3, '2', 'Listado', '', '2017-08-17 20:36:52');
INSERT INTO acms_tlog_movement VALUES (317, 1, 3, '2', 'Listado', '', '2017-08-17 20:39:48');
INSERT INTO acms_tlog_movement VALUES (318, 1, 3, '2', 'Listado', '', '2017-08-17 20:40:02');
INSERT INTO acms_tlog_movement VALUES (319, 1, 3, '2', 'Listado', '', '2017-08-17 20:40:19');
INSERT INTO acms_tlog_movement VALUES (320, 1, 3, '2', 'Listado', '', '2017-08-17 20:40:32');
INSERT INTO acms_tlog_movement VALUES (321, 1, 3, '2', 'Listado', '', '2017-08-17 20:40:46');
INSERT INTO acms_tlog_movement VALUES (322, 1, 3, '2', 'Listado', '', '2017-08-17 20:41:59');
INSERT INTO acms_tlog_movement VALUES (323, 1, 3, '2', 'Listado', '', '2017-08-17 20:42:08');
INSERT INTO acms_tlog_movement VALUES (324, 1, 3, '2', 'Listado', '', '2017-08-17 20:42:31');
INSERT INTO acms_tlog_movement VALUES (325, 1, 3, '2', 'Listado', '', '2017-08-17 20:42:38');
INSERT INTO acms_tlog_movement VALUES (326, 1, 3, '2', 'Listado', '', '2017-08-17 20:43:15');
INSERT INTO acms_tlog_movement VALUES (327, 1, 3, '2', 'Listado', '', '2017-08-17 20:43:20');
INSERT INTO acms_tlog_movement VALUES (328, 1, 3, '2', 'Listado', '', '2017-08-17 20:43:25');
INSERT INTO acms_tlog_movement VALUES (329, 1, 3, '2', 'Listado', '', '2017-08-17 20:43:30');
INSERT INTO acms_tlog_movement VALUES (330, 1, 3, '2', 'Listado', '', '2017-08-17 20:43:38');
INSERT INTO acms_tlog_movement VALUES (331, 1, 3, '2', 'Listado', '', '2017-08-17 20:45:20');
INSERT INTO acms_tlog_movement VALUES (332, 1, 3, '2', 'Listado', '', '2017-08-17 20:45:25');
INSERT INTO acms_tlog_movement VALUES (333, 1, 3, '2', 'Listado', '', '2017-08-17 20:47:16');
INSERT INTO acms_tlog_movement VALUES (334, 1, 3, '2', 'Listado', '', '2017-08-17 20:47:31');
INSERT INTO acms_tlog_movement VALUES (335, 1, 3, '2', 'Listado', '', '2017-08-17 20:47:45');
INSERT INTO acms_tlog_movement VALUES (336, 1, 3, '2', 'Listado', '', '2017-08-17 20:47:51');
INSERT INTO acms_tlog_movement VALUES (337, 1, 3, '2', 'Listado', '', '2017-08-17 20:59:37');
INSERT INTO acms_tlog_movement VALUES (338, 1, 3, '2', 'Listado', '', '2017-08-17 21:00:00');
INSERT INTO acms_tlog_movement VALUES (339, 1, 3, '2', 'Listado', '', '2017-08-17 21:02:43');
INSERT INTO acms_tlog_movement VALUES (340, 1, 3, '2', 'Listado', '', '2017-08-17 21:03:12');
INSERT INTO acms_tlog_movement VALUES (341, 1, 3, '2', 'Listado', '', '2017-08-17 21:03:39');
INSERT INTO acms_tlog_movement VALUES (342, 1, 3, '2', 'Listado', '', '2017-08-17 21:04:01');
INSERT INTO acms_tlog_movement VALUES (343, 1, 3, '2', 'Listado', '', '2017-08-17 21:05:05');
INSERT INTO acms_tlog_movement VALUES (344, 1, 3, '2', 'Listado', '', '2017-08-17 21:05:21');
INSERT INTO acms_tlog_movement VALUES (345, 1, 3, '2', 'Listado', '', '2017-08-17 21:05:25');
INSERT INTO acms_tlog_movement VALUES (346, 1, 3, '2', 'Listado', '', '2017-08-17 21:05:55');
INSERT INTO acms_tlog_movement VALUES (347, 1, 3, '2', 'Listado', '', '2017-08-17 21:06:06');
INSERT INTO acms_tlog_movement VALUES (348, 1, 3, '2', 'Listado', '', '2017-08-17 21:07:39');
INSERT INTO acms_tlog_movement VALUES (349, 1, 3, '2', 'Listado', '', '2017-08-17 21:07:47');
INSERT INTO acms_tlog_movement VALUES (350, 1, 3, '2', 'Listado', '', '2017-08-17 21:07:56');
INSERT INTO acms_tlog_movement VALUES (351, 1, 3, '2', 'Listado', '', '2017-08-17 21:08:43');
INSERT INTO acms_tlog_movement VALUES (352, 1, 3, '2', 'Listado', '', '2017-08-17 21:08:53');
INSERT INTO acms_tlog_movement VALUES (353, 1, 3, '2', 'Listado', '', '2017-08-17 21:09:42');
INSERT INTO acms_tlog_movement VALUES (354, 1, 3, '2', 'Listado', '', '2017-08-17 21:09:53');
INSERT INTO acms_tlog_movement VALUES (355, 1, 3, '2', 'Listado', '', '2017-08-17 21:10:16');
INSERT INTO acms_tlog_movement VALUES (356, 1, 3, '2', 'Listado', '', '2017-08-17 21:11:17');
INSERT INTO acms_tlog_movement VALUES (357, 1, 3, '2', 'Listado', '', '2017-08-17 21:12:54');
INSERT INTO acms_tlog_movement VALUES (358, 1, 3, '2', 'Listado', '', '2017-08-17 21:13:47');
INSERT INTO acms_tlog_movement VALUES (359, 1, 3, '2', 'Listado', '', '2017-08-17 21:14:26');
INSERT INTO acms_tlog_movement VALUES (360, 1, 3, '2', 'Listado', '', '2017-08-17 21:14:32');
INSERT INTO acms_tlog_movement VALUES (361, 1, 3, '2', 'Listado', '', '2017-08-17 21:14:42');
INSERT INTO acms_tlog_movement VALUES (362, 1, 3, '2', 'Listado', '', '2017-08-17 21:15:28');
INSERT INTO acms_tlog_movement VALUES (363, 1, 3, '2', 'Listado', '', '2017-08-17 21:15:35');
INSERT INTO acms_tlog_movement VALUES (364, 1, 3, '2', 'Listado', '', '2017-08-17 21:15:50');
INSERT INTO acms_tlog_movement VALUES (365, 1, 3, '2', 'Listado', '', '2017-08-17 21:16:15');
INSERT INTO acms_tlog_movement VALUES (366, 1, 3, '2', 'Listado', '', '2017-08-17 21:16:25');
INSERT INTO acms_tlog_movement VALUES (367, 1, 3, '2', 'Listado', '', '2017-08-17 21:16:41');
INSERT INTO acms_tlog_movement VALUES (368, 1, 3, '2', 'Listado', '', '2017-08-17 21:17:32');
INSERT INTO acms_tlog_movement VALUES (369, 1, 3, '2', 'Listado', '', '2017-08-17 21:17:56');
INSERT INTO acms_tlog_movement VALUES (370, 1, 3, '2', 'Listado', '', '2017-08-17 21:18:43');
INSERT INTO acms_tlog_movement VALUES (371, 1, 3, '2', 'Listado', '', '2017-08-17 21:18:50');
INSERT INTO acms_tlog_movement VALUES (372, 1, 3, '2', 'Listado', '', '2017-08-17 21:19:06');
INSERT INTO acms_tlog_movement VALUES (373, 1, 3, '2', 'Listado', '', '2017-08-17 21:19:50');
INSERT INTO acms_tlog_movement VALUES (374, 1, 3, '2', 'Listado', '', '2017-08-17 21:21:01');
INSERT INTO acms_tlog_movement VALUES (375, 1, 3, '2', 'Listado', '', '2017-08-17 21:21:09');
INSERT INTO acms_tlog_movement VALUES (376, 1, 3, '2', 'Listado', '', '2017-08-17 21:21:13');
INSERT INTO acms_tlog_movement VALUES (377, 1, 3, '2', 'Listado', '', '2017-08-17 21:21:22');
INSERT INTO acms_tlog_movement VALUES (378, 1, 3, '2', 'Listado', '', '2017-08-17 21:21:33');
INSERT INTO acms_tlog_movement VALUES (379, 1, 3, '2', 'Listado', '', '2017-08-17 21:21:39');
INSERT INTO acms_tlog_movement VALUES (380, 1, 3, '2', 'Listado', '', '2017-08-17 21:21:48');
INSERT INTO acms_tlog_movement VALUES (381, 1, 3, '2', 'Listado', '', '2017-08-17 21:21:59');
INSERT INTO acms_tlog_movement VALUES (382, 1, 3, '2', 'Listado', '', '2017-08-17 21:22:12');
INSERT INTO acms_tlog_movement VALUES (383, 1, 3, '2', 'Listado', '', '2017-08-17 21:22:53');
INSERT INTO acms_tlog_movement VALUES (384, 1, 3, '2', 'Listado', '', '2017-08-17 21:23:40');
INSERT INTO acms_tlog_movement VALUES (385, 1, 3, '2', 'Listado', '', '2017-08-17 21:24:48');
INSERT INTO acms_tlog_movement VALUES (386, 1, 3, '2', 'Listado', '', '2017-08-17 21:25:37');
INSERT INTO acms_tlog_movement VALUES (387, 1, 3, '2', 'Listado', '', '2017-08-17 21:25:59');
INSERT INTO acms_tlog_movement VALUES (388, 1, 3, '2', 'Listado', '', '2017-08-17 21:26:13');
INSERT INTO acms_tlog_movement VALUES (389, 1, 3, '2', 'Listado', '', '2017-08-17 21:26:53');
INSERT INTO acms_tlog_movement VALUES (390, 1, 3, '2', 'Listado', '', '2017-08-17 21:27:00');
INSERT INTO acms_tlog_movement VALUES (391, 1, 3, '2', 'Listado', '', '2017-08-17 21:27:08');
INSERT INTO acms_tlog_movement VALUES (392, 1, 3, '2', 'Listado', '', '2017-08-17 21:27:22');
INSERT INTO acms_tlog_movement VALUES (393, 1, 3, '2', 'Listado', '', '2017-08-17 21:27:53');
INSERT INTO acms_tlog_movement VALUES (394, 1, 3, '2', 'Listado', '', '2017-08-17 21:28:03');
INSERT INTO acms_tlog_movement VALUES (395, 1, 3, '2', 'Listado', '', '2017-08-17 21:28:16');
INSERT INTO acms_tlog_movement VALUES (396, 1, 3, '2', 'Listado', '', '2017-08-17 21:28:59');
INSERT INTO acms_tlog_movement VALUES (397, 1, 3, '2', 'Listado', '', '2017-08-17 21:29:13');
INSERT INTO acms_tlog_movement VALUES (398, 1, 3, '2', 'Listado', '', '2017-08-17 21:29:24');
INSERT INTO acms_tlog_movement VALUES (399, 1, 3, '2', 'Listado', '', '2017-08-17 21:29:41');
INSERT INTO acms_tlog_movement VALUES (400, 1, 3, '2', 'Listado', '', '2017-08-17 21:29:56');
INSERT INTO acms_tlog_movement VALUES (401, 1, 3, '2', 'Listado', '', '2017-08-17 21:30:57');
INSERT INTO acms_tlog_movement VALUES (402, 1, 3, '2', 'Listado', '', '2017-08-17 21:31:11');
INSERT INTO acms_tlog_movement VALUES (403, 1, 3, '2', 'Listado', '', '2017-08-17 21:32:03');
INSERT INTO acms_tlog_movement VALUES (404, 1, 3, '2', 'Listado', '', '2017-08-17 23:50:36');
INSERT INTO acms_tlog_movement VALUES (405, 1, 3, '2', 'Listado', '', '2017-08-18 00:34:22');
INSERT INTO acms_tlog_movement VALUES (406, 1, 3, '2', 'Listado', '', '2017-08-18 00:34:34');
INSERT INTO acms_tlog_movement VALUES (407, 1, 3, '2', 'Listado', '', '2017-08-18 00:36:04');
INSERT INTO acms_tlog_movement VALUES (408, 1, 3, '2', 'Listado', '', '2017-08-18 00:36:09');
INSERT INTO acms_tlog_movement VALUES (409, 1, 3, '2', 'Listado', '', '2017-08-18 00:36:12');
INSERT INTO acms_tlog_movement VALUES (410, 1, 3, '2', 'Listado', '', '2017-08-18 00:36:15');
INSERT INTO acms_tlog_movement VALUES (411, 1, 3, '2', 'Listado', '', '2017-08-18 00:36:19');
INSERT INTO acms_tlog_movement VALUES (412, 1, 3, '2', 'Listado', '', '2017-08-18 00:36:49');
INSERT INTO acms_tlog_movement VALUES (413, 1, 3, '2', 'Listado', '', '2017-08-18 00:36:51');
INSERT INTO acms_tlog_movement VALUES (414, 1, 3, '2', 'Listado', '', '2017-08-18 00:36:57');
INSERT INTO acms_tlog_movement VALUES (415, 1, 3, '2', 'Listado', '', '2017-08-18 00:36:59');
INSERT INTO acms_tlog_movement VALUES (416, 1, 3, '2', 'Listado', '', '2017-08-18 00:37:05');
INSERT INTO acms_tlog_movement VALUES (417, 1, 3, '2', 'Listado', '', '2017-08-18 00:37:20');
INSERT INTO acms_tlog_movement VALUES (418, 1, 3, '2', 'Listado', '', '2017-08-18 00:44:51');
INSERT INTO acms_tlog_movement VALUES (419, 1, 3, '2', 'Listado', '', '2017-08-18 00:54:03');
INSERT INTO acms_tlog_movement VALUES (420, 1, 3, '2', 'Listado', '', '2017-08-18 00:54:14');
INSERT INTO acms_tlog_movement VALUES (421, 1, 3, '2', 'Listado', '', '2017-08-18 00:54:45');
INSERT INTO acms_tlog_movement VALUES (422, 1, 3, '2', 'Listado', '', '2017-08-18 01:13:16');
INSERT INTO acms_tlog_movement VALUES (423, 1, 3, '2', 'Listado', '', '2017-08-18 01:18:03');
INSERT INTO acms_tlog_movement VALUES (424, 1, 3, '2', 'Listado', '', '2017-08-18 13:17:47');
INSERT INTO acms_tlog_movement VALUES (425, 1, 3, '2', 'Listado', '', '2017-08-18 18:53:19');
INSERT INTO acms_tlog_movement VALUES (426, 1, 3, '2', 'Listado', '', '2017-08-18 19:06:24');
INSERT INTO acms_tlog_movement VALUES (427, 1, 3, '2', 'Listado', '', '2017-08-19 10:42:08');
INSERT INTO acms_tlog_movement VALUES (428, 1, 3, '2', 'Listado', '', '2017-08-19 11:07:38');
INSERT INTO acms_tlog_movement VALUES (429, 1, 3, '2', 'Listado', '', '2017-08-19 14:51:15');
INSERT INTO acms_tlog_movement VALUES (430, 1, 3, '2', 'Listado', '', '2017-08-20 00:16:21');
INSERT INTO acms_tlog_movement VALUES (431, 1, 3, '2', 'Listado', '', '2017-08-20 00:16:30');
INSERT INTO acms_tlog_movement VALUES (432, 1, 3, '2', 'Listado', '', '2017-08-20 00:17:02');
INSERT INTO acms_tlog_movement VALUES (433, 1, 3, '2', 'Listado', '', '2017-08-20 00:18:38');
INSERT INTO acms_tlog_movement VALUES (434, 1, 3, '2', 'Listado', '', '2017-08-20 00:19:04');
INSERT INTO acms_tlog_movement VALUES (435, 1, 3, '2', 'Listado', '', '2017-08-20 00:19:21');
INSERT INTO acms_tlog_movement VALUES (436, 1, 3, '2', 'Listado', '', '2017-08-20 00:44:13');
INSERT INTO acms_tlog_movement VALUES (437, 1, 3, '2', 'Listado', '', '2017-08-20 00:44:40');
INSERT INTO acms_tlog_movement VALUES (438, 1, 3, '2', 'Listado', '', '2017-08-20 00:44:57');
INSERT INTO acms_tlog_movement VALUES (439, 1, 3, '2', 'Listado', '', '2017-08-20 00:45:05');
INSERT INTO acms_tlog_movement VALUES (440, 1, 3, '2', 'Listado', '', '2017-08-20 00:45:18');
INSERT INTO acms_tlog_movement VALUES (441, 1, 3, '2', 'Listado', '', '2017-08-20 00:45:42');
INSERT INTO acms_tlog_movement VALUES (442, 1, 3, '2', 'Listado', '', '2017-08-20 00:45:50');
INSERT INTO acms_tlog_movement VALUES (443, 1, 3, '2', 'Listado', '', '2017-08-20 00:45:57');
INSERT INTO acms_tlog_movement VALUES (444, 1, 3, '2', 'Listado', '', '2017-08-20 00:46:04');
INSERT INTO acms_tlog_movement VALUES (445, 1, 3, '2', 'Listado', '', '2017-08-20 00:46:20');
INSERT INTO acms_tlog_movement VALUES (446, 1, 3, '2', 'Listado', '', '2017-08-20 00:46:25');
INSERT INTO acms_tlog_movement VALUES (447, 1, 3, '2', 'Listado', '', '2017-08-20 00:46:29');
INSERT INTO acms_tlog_movement VALUES (448, 1, 3, '2', 'Listado', '', '2017-08-20 00:53:35');
INSERT INTO acms_tlog_movement VALUES (449, 1, 3, '2', 'Listado', '', '2017-08-20 00:54:17');
INSERT INTO acms_tlog_movement VALUES (450, 1, 3, '2', 'Listado', '', '2017-08-20 00:54:25');
INSERT INTO acms_tlog_movement VALUES (451, 1, 3, '2', 'Listado', '', '2017-08-20 00:58:03');
INSERT INTO acms_tlog_movement VALUES (452, 1, 3, '2', 'Listado', '', '2017-08-20 00:59:08');
INSERT INTO acms_tlog_movement VALUES (453, 1, 3, '2', 'Listado', '', '2017-08-20 00:59:39');
INSERT INTO acms_tlog_movement VALUES (454, 1, 3, '2', 'Listado', '', '2017-08-20 01:00:25');
INSERT INTO acms_tlog_movement VALUES (455, 1, 3, '2', 'Listado', '', '2017-08-20 01:04:05');
INSERT INTO acms_tlog_movement VALUES (456, 1, 3, '2', 'Listado', '', '2017-08-20 01:06:12');
INSERT INTO acms_tlog_movement VALUES (457, 1, 3, '2', 'Listado', '', '2017-08-20 01:06:58');
INSERT INTO acms_tlog_movement VALUES (458, 1, 3, '2', 'Listado', '', '2017-08-20 01:07:12');
INSERT INTO acms_tlog_movement VALUES (459, 1, 3, '2', 'Listado', '', '2017-08-20 01:08:12');
INSERT INTO acms_tlog_movement VALUES (460, 1, 3, '2', 'Listado', '', '2017-08-20 01:09:33');
INSERT INTO acms_tlog_movement VALUES (461, 1, 3, '2', 'Listado', '', '2017-08-20 01:10:43');
INSERT INTO acms_tlog_movement VALUES (462, 1, 3, '2', 'Listado', '', '2017-08-20 01:11:14');
INSERT INTO acms_tlog_movement VALUES (463, 1, 3, '2', 'Listado', '', '2017-08-20 01:11:39');
INSERT INTO acms_tlog_movement VALUES (464, 1, 3, '2', 'Listado', '', '2017-08-20 01:12:26');
INSERT INTO acms_tlog_movement VALUES (465, 1, 3, '2', 'Listado', '', '2017-08-20 01:12:34');
INSERT INTO acms_tlog_movement VALUES (466, 1, 3, '2', 'Listado', '', '2017-08-20 01:12:39');
INSERT INTO acms_tlog_movement VALUES (467, 1, 3, '2', 'Listado', '', '2017-08-20 01:12:45');
INSERT INTO acms_tlog_movement VALUES (468, 1, 3, '2', 'Listado', '', '2017-08-20 01:12:50');
INSERT INTO acms_tlog_movement VALUES (469, 1, 3, '2', 'Listado', '', '2017-08-20 01:12:53');
INSERT INTO acms_tlog_movement VALUES (470, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:01');
INSERT INTO acms_tlog_movement VALUES (471, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:08');
INSERT INTO acms_tlog_movement VALUES (472, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:16');
INSERT INTO acms_tlog_movement VALUES (473, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:17');
INSERT INTO acms_tlog_movement VALUES (474, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:18');
INSERT INTO acms_tlog_movement VALUES (475, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:19');
INSERT INTO acms_tlog_movement VALUES (476, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:19');
INSERT INTO acms_tlog_movement VALUES (477, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:19');
INSERT INTO acms_tlog_movement VALUES (478, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:19');
INSERT INTO acms_tlog_movement VALUES (479, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:19');
INSERT INTO acms_tlog_movement VALUES (480, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:20');
INSERT INTO acms_tlog_movement VALUES (481, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:35');
INSERT INTO acms_tlog_movement VALUES (482, 1, 3, '2', 'Listado', '', '2017-08-20 01:13:59');
INSERT INTO acms_tlog_movement VALUES (483, 1, 3, '2', 'Listado', '', '2017-08-20 01:14:09');
INSERT INTO acms_tlog_movement VALUES (484, 1, 3, '2', 'Listado', '', '2017-08-20 01:14:17');
INSERT INTO acms_tlog_movement VALUES (485, 1, 3, '2', 'Listado', '', '2017-08-20 01:15:16');
INSERT INTO acms_tlog_movement VALUES (486, 1, 3, '2', 'Listado', '', '2017-08-20 01:15:31');
INSERT INTO acms_tlog_movement VALUES (487, 1, 3, '2', 'Listado', '', '2017-08-20 01:15:52');
INSERT INTO acms_tlog_movement VALUES (488, 1, 3, '2', 'Listado', '', '2017-08-20 01:15:59');
INSERT INTO acms_tlog_movement VALUES (489, 1, 3, '2', 'Listado', '', '2017-08-20 01:16:07');
INSERT INTO acms_tlog_movement VALUES (490, 1, 3, '2', 'Listado', '', '2017-08-20 01:16:29');
INSERT INTO acms_tlog_movement VALUES (491, 1, 3, '2', 'Listado', '', '2017-08-20 01:16:47');
INSERT INTO acms_tlog_movement VALUES (492, 1, 3, '2', 'Listado', '', '2017-08-20 01:16:56');
INSERT INTO acms_tlog_movement VALUES (493, 1, 3, '2', 'Listado', '', '2017-08-20 01:18:29');
INSERT INTO acms_tlog_movement VALUES (494, 1, 3, '2', 'Listado', '', '2017-08-20 01:18:49');
INSERT INTO acms_tlog_movement VALUES (495, 1, 3, '2', 'Listado', '', '2017-08-20 01:19:57');
INSERT INTO acms_tlog_movement VALUES (496, 1, 3, '2', 'Listado', '', '2017-08-20 01:20:05');
INSERT INTO acms_tlog_movement VALUES (497, 1, 3, '2', 'Listado', '', '2017-08-20 01:20:16');
INSERT INTO acms_tlog_movement VALUES (498, 1, 3, '2', 'Listado', '', '2017-08-20 01:21:27');
INSERT INTO acms_tlog_movement VALUES (499, 1, 3, '2', 'Listado', '', '2017-08-20 01:22:15');
INSERT INTO acms_tlog_movement VALUES (500, 1, 3, '2', 'Listado', '', '2017-08-20 01:22:31');
INSERT INTO acms_tlog_movement VALUES (501, 1, 3, '2', 'Listado', '', '2017-08-20 01:24:27');
INSERT INTO acms_tlog_movement VALUES (502, 1, 3, '2', 'Listado', '', '2017-08-20 01:25:40');
INSERT INTO acms_tlog_movement VALUES (503, 1, 3, '2', 'Listado', '', '2017-08-20 01:26:29');
INSERT INTO acms_tlog_movement VALUES (504, 1, 3, '2', 'Listado', '', '2017-08-20 01:28:13');
INSERT INTO acms_tlog_movement VALUES (505, 1, 3, '2', 'Listado', '', '2017-08-20 01:28:59');
INSERT INTO acms_tlog_movement VALUES (506, 1, 3, '2', 'Listado', '', '2017-08-20 01:29:26');
INSERT INTO acms_tlog_movement VALUES (507, 1, 3, '2', 'Listado', '', '2017-08-20 01:29:28');
INSERT INTO acms_tlog_movement VALUES (508, 1, 3, '2', 'Listado', '', '2017-08-20 01:29:35');
INSERT INTO acms_tlog_movement VALUES (509, 1, 3, '2', 'Listado', '', '2017-08-20 01:32:09');
INSERT INTO acms_tlog_movement VALUES (510, 1, 3, '2', 'Listado', '', '2017-08-20 01:34:09');
INSERT INTO acms_tlog_movement VALUES (511, 1, 3, '2', 'Listado', '', '2017-08-20 01:34:58');
INSERT INTO acms_tlog_movement VALUES (512, 1, 3, '2', 'Listado', '', '2017-08-20 01:35:19');
INSERT INTO acms_tlog_movement VALUES (513, 1, 3, '2', 'Listado', '', '2017-08-20 01:36:35');
INSERT INTO acms_tlog_movement VALUES (514, 1, 3, '2', 'Listado', '', '2017-08-20 01:36:43');
INSERT INTO acms_tlog_movement VALUES (515, 1, 3, '2', 'Listado', '', '2017-08-20 01:37:21');
INSERT INTO acms_tlog_movement VALUES (516, 1, 3, '2', 'Listado', '', '2017-08-20 01:37:35');
INSERT INTO acms_tlog_movement VALUES (517, 1, 3, '2', 'Listado', '', '2017-08-20 01:37:59');
INSERT INTO acms_tlog_movement VALUES (518, 1, 3, '2', 'Listado', '', '2017-08-20 01:38:33');
INSERT INTO acms_tlog_movement VALUES (519, 1, 3, '2', 'Listado', '', '2017-08-20 01:38:36');
INSERT INTO acms_tlog_movement VALUES (520, 1, 3, '2', 'Listado', '', '2017-08-20 01:38:49');
INSERT INTO acms_tlog_movement VALUES (521, 1, 3, '2', 'Listado', '', '2017-08-20 01:39:08');
INSERT INTO acms_tlog_movement VALUES (522, 1, 3, '2', 'Listado', '', '2017-08-20 01:39:42');
INSERT INTO acms_tlog_movement VALUES (523, 1, 3, '2', 'Listado', '', '2017-08-20 01:40:28');
INSERT INTO acms_tlog_movement VALUES (524, 1, 3, '2', 'Listado', '', '2017-08-20 01:40:35');
INSERT INTO acms_tlog_movement VALUES (525, 1, 3, '2', 'Listado', '', '2017-08-20 01:41:14');
INSERT INTO acms_tlog_movement VALUES (526, 1, 3, '2', 'Listado', '', '2017-08-20 01:43:19');
INSERT INTO acms_tlog_movement VALUES (527, 1, 3, '2', 'Listado', '', '2017-08-20 01:43:59');
INSERT INTO acms_tlog_movement VALUES (528, 1, 3, '2', 'Listado', '', '2017-08-20 01:44:29');
INSERT INTO acms_tlog_movement VALUES (529, 1, 3, '2', 'Listado', '', '2017-08-20 01:45:49');
INSERT INTO acms_tlog_movement VALUES (530, 1, 3, '7', 'Listado', '', '2017-08-20 01:52:52');
INSERT INTO acms_tlog_movement VALUES (531, 1, 3, '4', 'Listado', '', '2017-08-20 01:53:01');
INSERT INTO acms_tlog_movement VALUES (532, 1, 1, '4', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',Modulo:''1'',Nombre:''Editor de codigo'',URL:''codeeditor'',Icono:''550'',Color de letra:''F5F5F5''}', '2017-08-20 01:53:51');
INSERT INTO acms_tlog_movement VALUES (533, 1, 3, '7', 'Listado', '', '2017-08-20 01:53:56');
INSERT INTO acms_tlog_movement VALUES (534, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-20 01:54:00');
INSERT INTO acms_tlog_movement VALUES (535, 1, 2, '7', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '', '2017-08-20 01:54:18');
INSERT INTO acms_tlog_movement VALUES (536, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-20 01:54:18');
INSERT INTO acms_tlog_movement VALUES (537, 1, 3, '2', 'Listado', '', '2017-08-20 01:54:24');
INSERT INTO acms_tlog_movement VALUES (538, 1, 3, '2', 'Listado', '', '2017-08-20 01:54:36');
INSERT INTO acms_tlog_movement VALUES (539, 1, 3, '2', 'Listado', '', '2017-08-20 01:56:58');
INSERT INTO acms_tlog_movement VALUES (540, 1, 3, '2', 'Listado', '', '2017-08-20 01:57:22');
INSERT INTO acms_tlog_movement VALUES (541, 1, 3, '2', 'Listado', '', '2017-08-20 01:57:49');
INSERT INTO acms_tlog_movement VALUES (542, 1, 3, '2', 'Listado', '', '2017-08-20 01:58:35');
INSERT INTO acms_tlog_movement VALUES (543, 1, 3, '2', 'Listado', '', '2017-08-20 01:59:33');
INSERT INTO acms_tlog_movement VALUES (544, 1, 3, '2', 'Listado', '', '2017-08-20 01:59:45');
INSERT INTO acms_tlog_movement VALUES (545, 1, 3, '2', 'Listado', '', '2017-08-20 02:00:04');
INSERT INTO acms_tlog_movement VALUES (546, 1, 3, '2', 'Listado', '', '2017-08-20 02:00:45');
INSERT INTO acms_tlog_movement VALUES (547, 1, 3, '2', 'Listado', '', '2017-08-20 02:01:13');
INSERT INTO acms_tlog_movement VALUES (548, 1, 3, '2', 'Listado', '', '2017-08-20 02:01:23');
INSERT INTO acms_tlog_movement VALUES (549, 1, 3, '2', 'Listado', '', '2017-08-20 02:01:45');
INSERT INTO acms_tlog_movement VALUES (550, 1, 3, '2', 'Listado', '', '2017-08-20 02:01:52');
INSERT INTO acms_tlog_movement VALUES (551, 1, 3, '2', 'Listado', '', '2017-08-20 02:01:58');
INSERT INTO acms_tlog_movement VALUES (552, 1, 3, '2', 'Listado', '', '2017-08-20 02:02:06');
INSERT INTO acms_tlog_movement VALUES (553, 1, 3, '2', 'Listado', '', '2017-08-20 02:02:57');
INSERT INTO acms_tlog_movement VALUES (554, 1, 3, '2', 'Listado', '', '2017-08-20 02:03:47');
INSERT INTO acms_tlog_movement VALUES (555, 1, 3, '2', 'Listado', '', '2017-08-20 02:04:06');
INSERT INTO acms_tlog_movement VALUES (556, 1, 3, '2', 'Listado', '', '2017-08-20 02:04:31');
INSERT INTO acms_tlog_movement VALUES (557, 1, 3, '2', 'Listado', '', '2017-08-20 02:04:59');
INSERT INTO acms_tlog_movement VALUES (558, 1, 3, '2', 'Listado', '', '2017-08-20 02:06:01');
INSERT INTO acms_tlog_movement VALUES (559, 1, 3, '2', 'Listado', '', '2017-08-20 02:06:10');
INSERT INTO acms_tlog_movement VALUES (560, 1, 3, '2', 'Listado', '', '2017-08-20 02:06:21');
INSERT INTO acms_tlog_movement VALUES (561, 1, 3, '2', 'Listado', '', '2017-08-20 02:06:28');
INSERT INTO acms_tlog_movement VALUES (562, 1, 3, '2', 'Listado', '', '2017-08-20 02:06:40');
INSERT INTO acms_tlog_movement VALUES (563, 1, 3, '2', 'Listado', '', '2017-08-20 02:06:43');
INSERT INTO acms_tlog_movement VALUES (564, 1, 3, '2', 'Listado', '', '2017-08-20 02:06:52');
INSERT INTO acms_tlog_movement VALUES (565, 1, 3, '2', 'Listado', '', '2017-08-20 02:07:44');
INSERT INTO acms_tlog_movement VALUES (566, 1, 3, '2', 'Listado', '', '2017-08-20 02:09:27');
INSERT INTO acms_tlog_movement VALUES (567, 1, 3, '2', 'Listado', '', '2017-08-20 02:09:48');
INSERT INTO acms_tlog_movement VALUES (568, 1, 3, '2', 'Listado', '', '2017-08-20 02:10:19');
INSERT INTO acms_tlog_movement VALUES (569, 1, 3, '2', 'Listado', '', '2017-08-20 02:11:08');
INSERT INTO acms_tlog_movement VALUES (570, 1, 3, '2', 'Listado', '', '2017-08-20 02:11:17');
INSERT INTO acms_tlog_movement VALUES (571, 1, 3, '2', 'Listado', '', '2017-08-20 02:12:19');
INSERT INTO acms_tlog_movement VALUES (572, 1, 3, '2', 'Listado', '', '2017-08-20 02:12:42');
INSERT INTO acms_tlog_movement VALUES (573, 1, 3, '2', 'Listado', '', '2017-08-20 02:13:07');
INSERT INTO acms_tlog_movement VALUES (574, 1, 3, '2', 'Listado', '', '2017-08-20 02:13:27');
INSERT INTO acms_tlog_movement VALUES (575, 1, 3, '2', 'Listado', '', '2017-08-20 02:13:36');
INSERT INTO acms_tlog_movement VALUES (576, 1, 3, '2', 'Listado', '', '2017-08-20 02:13:41');
INSERT INTO acms_tlog_movement VALUES (577, 1, 3, '2', 'Listado', '', '2017-08-20 02:14:02');
INSERT INTO acms_tlog_movement VALUES (578, 1, 3, '2', 'Listado', '', '2017-08-20 02:17:04');
INSERT INTO acms_tlog_movement VALUES (579, 1, 3, '2', 'Listado', '', '2017-08-20 02:17:35');
INSERT INTO acms_tlog_movement VALUES (580, 1, 3, '2', 'Listado', '', '2017-08-20 02:18:46');
INSERT INTO acms_tlog_movement VALUES (581, 1, 3, '2', 'Listado', '', '2017-08-20 02:19:03');
INSERT INTO acms_tlog_movement VALUES (582, 1, 3, '2', 'Listado', '', '2017-08-20 02:20:08');
INSERT INTO acms_tlog_movement VALUES (583, 1, 3, '2', 'Listado', '', '2017-08-20 02:22:25');
INSERT INTO acms_tlog_movement VALUES (584, 1, 3, '2', 'Listado', '', '2017-08-20 02:29:08');
INSERT INTO acms_tlog_movement VALUES (585, 1, 3, '2', 'Listado', '', '2017-08-20 02:30:12');
INSERT INTO acms_tlog_movement VALUES (586, 1, 3, '2', 'Listado', '', '2017-08-20 02:31:53');
INSERT INTO acms_tlog_movement VALUES (587, 1, 3, '2', 'Listado', '', '2017-08-20 02:32:50');
INSERT INTO acms_tlog_movement VALUES (588, 1, 3, '2', 'Listado', '', '2017-08-20 02:33:37');
INSERT INTO acms_tlog_movement VALUES (589, 1, 3, '2', 'Listado', '', '2017-08-20 02:34:38');
INSERT INTO acms_tlog_movement VALUES (590, 1, 3, '2', 'Listado', '', '2017-08-20 02:34:58');
INSERT INTO acms_tlog_movement VALUES (591, 1, 3, '2', 'Listado', '', '2017-08-20 02:35:44');
INSERT INTO acms_tlog_movement VALUES (592, 1, 3, '2', 'Listado', '', '2017-08-20 02:36:08');
INSERT INTO acms_tlog_movement VALUES (593, 1, 3, '2', 'Listado', '', '2017-08-20 02:36:29');
INSERT INTO acms_tlog_movement VALUES (594, 1, 3, '2', 'Listado', '', '2017-08-20 02:36:40');
INSERT INTO acms_tlog_movement VALUES (595, 1, 3, '2', 'Listado', '', '2017-08-20 02:36:53');
INSERT INTO acms_tlog_movement VALUES (596, 1, 3, '2', 'Listado', '', '2017-08-20 02:37:05');
INSERT INTO acms_tlog_movement VALUES (597, 1, 3, '2', 'Listado', '', '2017-08-20 02:37:15');
INSERT INTO acms_tlog_movement VALUES (598, 1, 3, '2', 'Listado', '', '2017-08-20 02:40:19');
INSERT INTO acms_tlog_movement VALUES (599, 1, 3, '2', 'Listado', '', '2017-08-20 02:40:34');
INSERT INTO acms_tlog_movement VALUES (600, 1, 3, '2', 'Listado', '', '2017-08-20 02:40:43');
INSERT INTO acms_tlog_movement VALUES (601, 1, 3, '2', 'Listado', '', '2017-08-20 02:40:57');
INSERT INTO acms_tlog_movement VALUES (602, 1, 3, '2', 'Listado', '', '2017-08-20 02:41:27');
INSERT INTO acms_tlog_movement VALUES (603, 1, 3, '2', 'Listado', '', '2017-08-20 02:43:06');
INSERT INTO acms_tlog_movement VALUES (604, 1, 3, '2', 'Listado', '', '2017-08-20 02:50:54');
INSERT INTO acms_tlog_movement VALUES (605, 1, 3, '2', 'Listado', '', '2017-08-20 02:52:37');
INSERT INTO acms_tlog_movement VALUES (606, 1, 3, '2', 'Listado', '', '2017-08-20 02:52:51');
INSERT INTO acms_tlog_movement VALUES (607, 1, 3, '2', 'Listado', '', '2017-08-20 02:53:32');
INSERT INTO acms_tlog_movement VALUES (608, 1, 3, '2', 'Listado', '', '2017-08-20 02:58:20');
INSERT INTO acms_tlog_movement VALUES (609, 1, 3, '2', 'Listado', '', '2017-08-20 02:58:40');
INSERT INTO acms_tlog_movement VALUES (610, 1, 3, '2', 'Listado', '', '2017-08-20 03:00:26');
INSERT INTO acms_tlog_movement VALUES (611, 1, 3, '2', 'Listado', '', '2017-08-20 03:00:56');
INSERT INTO acms_tlog_movement VALUES (612, 1, 3, '2', 'Listado', '', '2017-08-20 03:04:40');
INSERT INTO acms_tlog_movement VALUES (613, 1, 3, '2', 'Listado', '', '2017-08-20 03:05:07');
INSERT INTO acms_tlog_movement VALUES (614, 1, 3, '2', 'Listado', '', '2017-08-20 03:05:10');
INSERT INTO acms_tlog_movement VALUES (615, 1, 3, '2', 'Listado', '', '2017-08-20 03:06:00');
INSERT INTO acms_tlog_movement VALUES (616, 1, 3, '2', 'Listado', '', '2017-08-20 03:07:03');
INSERT INTO acms_tlog_movement VALUES (617, 1, 3, '2', 'Listado', '', '2017-08-20 03:07:31');
INSERT INTO acms_tlog_movement VALUES (618, 1, 3, '2', 'Listado', '', '2017-08-20 03:07:54');
INSERT INTO acms_tlog_movement VALUES (619, 1, 3, '2', 'Listado', '', '2017-08-20 03:10:07');
INSERT INTO acms_tlog_movement VALUES (620, 1, 3, '2', 'Listado', '', '2017-08-20 03:10:28');
INSERT INTO acms_tlog_movement VALUES (621, 1, 3, '2', 'Listado', '', '2017-08-20 03:10:32');
INSERT INTO acms_tlog_movement VALUES (622, 1, 3, '2', 'Listado', '', '2017-08-20 03:13:33');
INSERT INTO acms_tlog_movement VALUES (623, 1, 3, '2', 'Listado', '', '2017-08-20 03:14:04');
INSERT INTO acms_tlog_movement VALUES (624, 1, 3, '2', 'Listado', '', '2017-08-20 03:14:07');
INSERT INTO acms_tlog_movement VALUES (625, 1, 3, '2', 'Listado', '', '2017-08-20 03:14:16');
INSERT INTO acms_tlog_movement VALUES (626, 1, 3, '2', 'Listado', '', '2017-08-20 03:17:08');
INSERT INTO acms_tlog_movement VALUES (627, 1, 3, '2', 'Listado', '', '2017-08-20 03:17:19');
INSERT INTO acms_tlog_movement VALUES (628, 1, 3, '2', 'Listado', '', '2017-08-20 03:17:29');
INSERT INTO acms_tlog_movement VALUES (629, 1, 3, '2', 'Listado', '', '2017-08-20 03:17:51');
INSERT INTO acms_tlog_movement VALUES (630, 1, 3, '2', 'Listado', '', '2017-08-20 03:18:02');
INSERT INTO acms_tlog_movement VALUES (631, 1, 3, '2', 'Listado', '', '2017-08-20 03:18:24');
INSERT INTO acms_tlog_movement VALUES (632, 1, 3, '2', 'Listado', '', '2017-08-20 11:48:05');
INSERT INTO acms_tlog_movement VALUES (633, 1, 3, '2', 'Listado', '', '2017-08-20 11:53:43');
INSERT INTO acms_tlog_movement VALUES (634, 1, 3, '7', 'Listado', '', '2017-08-20 12:10:40');
INSERT INTO acms_tlog_movement VALUES (635, 1, 3, '7', 'Listado', '', '2017-08-20 13:49:30');
INSERT INTO acms_tlog_movement VALUES (636, 1, 3, '7', 'Listado', '', '2017-08-20 13:55:07');
INSERT INTO acms_tlog_movement VALUES (637, 1, 3, '2', 'Listado', '', '2017-08-20 14:02:00');
INSERT INTO acms_tlog_movement VALUES (638, 1, 3, '2', 'Listado', '', '2017-08-20 14:02:24');
INSERT INTO acms_tlog_movement VALUES (639, 1, 3, '2', 'Listado', '', '2017-08-20 14:06:19');
INSERT INTO acms_tlog_movement VALUES (640, 1, 3, '2', 'Listado', '', '2017-08-20 14:06:35');
INSERT INTO acms_tlog_movement VALUES (641, 1, 3, '2', 'Listado', '', '2017-08-20 20:12:53');
INSERT INTO acms_tlog_movement VALUES (642, 1, 3, '2', 'Listado', '', '2017-08-20 20:13:00');
INSERT INTO acms_tlog_movement VALUES (643, 1, 3, '2', 'Listado', '', '2017-08-20 20:22:39');
INSERT INTO acms_tlog_movement VALUES (644, 1, 3, '2', 'Listado', '', '2017-08-20 20:26:14');
INSERT INTO acms_tlog_movement VALUES (645, 1, 3, '2', 'Listado', '', '2017-08-20 20:26:46');
INSERT INTO acms_tlog_movement VALUES (646, 1, 3, '2', 'Listado', '', '2017-08-20 20:27:30');
INSERT INTO acms_tlog_movement VALUES (647, 1, 3, '2', 'Listado', '', '2017-08-20 20:27:55');
INSERT INTO acms_tlog_movement VALUES (648, 1, 3, '2', 'Listado', '', '2017-08-20 20:28:27');
INSERT INTO acms_tlog_movement VALUES (649, 1, 3, '2', 'Listado', '', '2017-08-20 20:29:21');
INSERT INTO acms_tlog_movement VALUES (650, 1, 3, '2', 'Listado', '', '2017-08-20 20:32:48');
INSERT INTO acms_tlog_movement VALUES (651, 1, 3, '2', 'Listado', '', '2017-08-20 20:33:17');
INSERT INTO acms_tlog_movement VALUES (652, 1, 3, '2', 'Listado', '', '2017-08-20 20:33:34');
INSERT INTO acms_tlog_movement VALUES (653, 1, 3, '2', 'Listado', '', '2017-08-20 20:34:55');
INSERT INTO acms_tlog_movement VALUES (654, 1, 3, '2', 'Listado', '', '2017-08-20 20:34:59');
INSERT INTO acms_tlog_movement VALUES (655, 1, 3, '2', 'Listado', '', '2017-08-20 21:31:26');
INSERT INTO acms_tlog_movement VALUES (656, 1, 3, '2', 'Listado', '', '2017-08-20 21:31:44');
INSERT INTO acms_tlog_movement VALUES (657, 1, 3, '2', 'Listado', '', '2017-08-20 21:32:06');
INSERT INTO acms_tlog_movement VALUES (658, 1, 3, '2', 'Listado', '', '2017-08-20 21:33:28');
INSERT INTO acms_tlog_movement VALUES (659, 1, 3, '2', 'Listado', '', '2017-08-20 21:33:49');
INSERT INTO acms_tlog_movement VALUES (660, 1, 3, '2', 'Listado', '', '2017-08-20 21:55:35');
INSERT INTO acms_tlog_movement VALUES (661, 1, 3, '2', 'Listado', '', '2017-08-20 22:56:37');
INSERT INTO acms_tlog_movement VALUES (662, 1, 3, '2', 'Listado', '', '2017-08-20 22:58:18');
INSERT INTO acms_tlog_movement VALUES (663, 1, 3, '2', 'Listado', '', '2017-08-20 23:00:46');
INSERT INTO acms_tlog_movement VALUES (664, 1, 3, '2', 'Listado', '', '2017-08-20 23:01:16');
INSERT INTO acms_tlog_movement VALUES (665, 1, 3, '2', 'Listado', '', '2017-08-20 23:03:36');
INSERT INTO acms_tlog_movement VALUES (666, 1, 3, '2', 'Listado', '', '2017-08-20 23:20:38');
INSERT INTO acms_tlog_movement VALUES (667, 1, 3, '2', 'Listado', '', '2017-08-20 23:21:12');
INSERT INTO acms_tlog_movement VALUES (668, 1, 3, '2', 'Listado', '', '2017-08-20 23:21:31');
INSERT INTO acms_tlog_movement VALUES (669, 1, 3, '2', 'Listado', '', '2017-08-20 23:23:37');
INSERT INTO acms_tlog_movement VALUES (670, 1, 3, '2', 'Listado', '', '2017-08-20 23:23:44');
INSERT INTO acms_tlog_movement VALUES (671, 1, 3, '2', 'Listado', '', '2017-08-20 23:24:10');
INSERT INTO acms_tlog_movement VALUES (672, 1, 3, '2', 'Listado', '', '2017-08-20 23:32:25');
INSERT INTO acms_tlog_movement VALUES (673, 1, 3, '2', 'Listado', '', '2017-08-20 23:32:45');
INSERT INTO acms_tlog_movement VALUES (674, 1, 3, '7', 'Listado', '', '2017-08-20 23:34:38');
INSERT INTO acms_tlog_movement VALUES (675, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-20 23:34:43');
INSERT INTO acms_tlog_movement VALUES (676, 1, 3, '4', 'Listado', '', '2017-08-20 23:35:25');
INSERT INTO acms_tlog_movement VALUES (677, 1, 3, '4', 'Consultar', '{CÃ³digo:''28''}', '2017-08-20 23:35:32');
INSERT INTO acms_tlog_movement VALUES (678, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''28'',Modulo:''21'',Nombre:''Temas'',URL:''theme'',Icono:''710'',Color de letra:''F5F5F5''}', '2017-08-20 23:41:02');
INSERT INTO acms_tlog_movement VALUES (679, 1, 3, '4', 'Consultar', '{CÃ³digo:''28''}', '2017-08-20 23:41:02');
INSERT INTO acms_tlog_movement VALUES (680, 1, 3, '7', 'Listado', '', '2017-08-20 23:41:13');
INSERT INTO acms_tlog_movement VALUES (681, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-20 23:41:25');
INSERT INTO acms_tlog_movement VALUES (682, 1, 2, '7', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '', '2017-08-20 23:41:42');
INSERT INTO acms_tlog_movement VALUES (683, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-20 23:41:43');
INSERT INTO acms_tlog_movement VALUES (684, 1, 3, '2', 'Listado', '', '2017-08-20 23:41:50');
INSERT INTO acms_tlog_movement VALUES (685, 1, 4, '2', 'toastr.info(''Registro activado con exito'','''',{progressBar:true})', '{CÃ³digo:''1''}', '2017-08-20 23:42:03');
INSERT INTO acms_tlog_movement VALUES (686, 1, 3, '2', 'Listado', '', '2017-08-20 23:42:03');
INSERT INTO acms_tlog_movement VALUES (687, 1, 4, '2', 'toastr.info(''Registro activado con exito'','''',{progressBar:true})', '{CÃ³digo:''2''}', '2017-08-20 23:42:08');
INSERT INTO acms_tlog_movement VALUES (688, 1, 3, '2', 'Listado', '', '2017-08-20 23:42:08');
INSERT INTO acms_tlog_movement VALUES (689, 1, 3, '4', 'Listado', '', '2017-08-21 03:04:26');
INSERT INTO acms_tlog_movement VALUES (690, 1, 3, '4', 'Consultar', '{CÃ³digo:''24''}', '2017-08-21 03:07:10');
INSERT INTO acms_tlog_movement VALUES (691, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''24'',Modulo:''23'',Nombre:''Redes sociales'',URL:''social_network'',Icono:''848'',Color de letra:''F5F5F5''}', '2017-08-21 03:07:30');
INSERT INTO acms_tlog_movement VALUES (692, 1, 3, '4', 'Consultar', '{CÃ³digo:''24''}', '2017-08-21 03:07:30');
INSERT INTO acms_tlog_movement VALUES (693, 1, 3, '23', 'Listado', '', '2017-08-21 03:07:37');
INSERT INTO acms_tlog_movement VALUES (694, 1, 3, '23', 'Listado', '', '2017-08-21 03:10:43');
INSERT INTO acms_tlog_movement VALUES (695, 1, 3, '23', 'Listado', '', '2017-08-21 03:10:53');
INSERT INTO acms_tlog_movement VALUES (696, 1, 3, '23', 'Listado', '', '2017-08-21 10:23:16');
INSERT INTO acms_tlog_movement VALUES (697, 1, 3, '23', 'Listado', '', '2017-08-21 11:19:45');
INSERT INTO acms_tlog_movement VALUES (698, 1, 3, '23', 'Listado', '', '2017-08-21 11:56:17');
INSERT INTO acms_tlog_movement VALUES (699, 1, 3, '23', 'Listado', '', '2017-08-21 11:56:32');
INSERT INTO acms_tlog_movement VALUES (700, 1, 3, '4', 'Listado', '', '2017-08-21 11:58:48');
INSERT INTO acms_tlog_movement VALUES (701, 1, 3, '4', 'Consultar', '{CÃ³digo:''24''}', '2017-08-21 11:58:53');
INSERT INTO acms_tlog_movement VALUES (702, 1, 3, '4', 'Consultar', '{CÃ³digo:''social_network''}', '2017-08-21 12:00:21');
INSERT INTO acms_tlog_movement VALUES (703, 1, 3, '4', 'Consultar', '{CÃ³digo:''social_network''}', '2017-08-21 12:02:33');
INSERT INTO acms_tlog_movement VALUES (704, 1, 3, '4', 'Consultar', '{CÃ³digo:''social_network''}', '2017-08-21 12:03:13');
INSERT INTO acms_tlog_movement VALUES (705, 1, 3, '4', 'Consultar', '{CÃ³digo:''social_network''}', '2017-08-21 12:04:18');
INSERT INTO acms_tlog_movement VALUES (706, 1, 3, '24', 'Listado', '', '2017-08-21 12:04:24');
INSERT INTO acms_tlog_movement VALUES (707, 1, 3, '22', 'Listado', '', '2017-08-21 12:04:30');
INSERT INTO acms_tlog_movement VALUES (708, 1, 3, '24', 'Listado', '', '2017-08-21 12:04:34');
INSERT INTO acms_tlog_movement VALUES (709, 1, 3, '7', 'Listado', '', '2017-08-21 12:17:38');
INSERT INTO acms_tlog_movement VALUES (710, 1, 3, '4', 'Listado', '', '2017-08-21 12:21:39');
INSERT INTO acms_tlog_movement VALUES (711, 1, 5, '4', 'toastr.info(''Registro desactivado con exito'','''',{progressBar:true})', '{CÃ³digo:''26''}', '2017-08-21 12:21:50');
INSERT INTO acms_tlog_movement VALUES (712, 1, 3, '4', 'Listado', '', '2017-08-21 12:21:50');
INSERT INTO acms_tlog_movement VALUES (713, 1, 3, '2', 'Listado', '', '2017-08-21 12:23:55');
INSERT INTO acms_tlog_movement VALUES (714, 1, 3, '5', 'Listado', '', '2017-08-21 12:24:17');
INSERT INTO acms_tlog_movement VALUES (715, 1, 3, '5', 'Listado', '', '2017-08-21 12:43:59');
INSERT INTO acms_tlog_movement VALUES (716, 1, 3, '4', 'Listado', '', '2017-08-21 12:44:15');
INSERT INTO acms_tlog_movement VALUES (717, 1, 3, '24', 'Listado', '', '2017-08-21 12:44:58');
INSERT INTO acms_tlog_movement VALUES (718, 1, 3, '24', 'Listado', '', '2017-08-21 12:44:58');
INSERT INTO acms_tlog_movement VALUES (719, 1, 3, '4', 'Listado', '', '2017-08-21 12:45:12');
INSERT INTO acms_tlog_movement VALUES (720, 1, 3, '4', 'Consultar', '{CÃ³digo:''24''}', '2017-08-21 12:45:19');
INSERT INTO acms_tlog_movement VALUES (721, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''24'',Modulo:''21'',Nombre:''Redes sociales'',URL:''social_network'',Icono:''848'',Color de letra:''F5F5F5''}', '2017-08-21 12:45:24');
INSERT INTO acms_tlog_movement VALUES (722, 1, 3, '4', 'Consultar', '{CÃ³digo:''24''}', '2017-08-21 12:45:24');
INSERT INTO acms_tlog_movement VALUES (723, 1, 3, '4', 'Listado', '', '2017-08-21 12:45:28');
INSERT INTO acms_tlog_movement VALUES (724, 1, 1, '4', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',Modulo:''0'',Nombre:''Personalizar'',URL:'''',Icono:''709'',Color de letra:''F5F5F5''}', '2017-08-21 12:46:14');
INSERT INTO acms_tlog_movement VALUES (725, 1, 3, '4', 'Listado', '', '2017-08-21 12:46:18');
INSERT INTO acms_tlog_movement VALUES (726, 1, 3, '4', 'Consultar', '{CÃ³digo:''32''}', '2017-08-21 12:46:22');
INSERT INTO acms_tlog_movement VALUES (727, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''32'',Modulo:''21'',Nombre:''Personalizar'',URL:'''',Icono:''709'',Color de letra:''F5F5F5''}', '2017-08-21 12:46:32');
INSERT INTO acms_tlog_movement VALUES (728, 1, 3, '4', 'Consultar', '{CÃ³digo:''32''}', '2017-08-21 12:46:32');
INSERT INTO acms_tlog_movement VALUES (729, 1, 3, '4', 'Consultar', '{CÃ³digo:''27''}', '2017-08-21 12:46:42');
INSERT INTO acms_tlog_movement VALUES (730, 1, 3, '4', 'Listado', '', '2017-08-21 12:46:47');
INSERT INTO acms_tlog_movement VALUES (731, 1, 3, '4', 'Consultar', '{CÃ³digo:''24''}', '2017-08-21 12:46:55');
INSERT INTO acms_tlog_movement VALUES (732, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''24'',Modulo:''32'',Nombre:''Redes sociales'',URL:''social_network'',Icono:''848'',Color de letra:''F5F5F5''}', '2017-08-21 12:47:14');
INSERT INTO acms_tlog_movement VALUES (733, 1, 3, '4', 'Consultar', '{CÃ³digo:''24''}', '2017-08-21 12:47:14');
INSERT INTO acms_tlog_movement VALUES (734, 1, 3, '7', 'Listado', '', '2017-08-21 12:47:21');
INSERT INTO acms_tlog_movement VALUES (735, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-21 12:47:24');
INSERT INTO acms_tlog_movement VALUES (736, 1, 3, '2', 'Listado', '', '2017-08-21 13:17:21');
INSERT INTO acms_tlog_movement VALUES (737, 1, 3, '2', 'Listado', '', '2017-08-21 13:42:52');
INSERT INTO acms_tlog_movement VALUES (738, 1, 3, '15', 'Listado', '', '2017-08-21 13:43:24');
INSERT INTO acms_tlog_movement VALUES (739, 1, 3, '22', 'Listado', '', '2017-08-21 13:43:33');
INSERT INTO acms_tlog_movement VALUES (740, 1, 3, '4', 'Listado', '', '2017-08-21 13:43:47');
INSERT INTO acms_tlog_movement VALUES (741, 1, 3, '4', 'Listado', '', '2017-08-21 18:27:19');
INSERT INTO acms_tlog_movement VALUES (742, 1, 3, '4', 'Listado', '', '2017-08-21 19:26:50');
INSERT INTO acms_tlog_movement VALUES (743, 1, 3, '4', 'Listado', '', '2017-08-21 20:21:31');
INSERT INTO acms_tlog_movement VALUES (744, 1, 3, '4', 'Listado', '', '2017-08-21 23:28:35');
INSERT INTO acms_tlog_movement VALUES (745, 1, 3, '7', 'Listado', '', '2017-08-21 23:40:18');
INSERT INTO acms_tlog_movement VALUES (746, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-21 23:40:23');
INSERT INTO acms_tlog_movement VALUES (747, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-21 23:56:05');
INSERT INTO acms_tlog_movement VALUES (748, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-21 23:58:59');
INSERT INTO acms_tlog_movement VALUES (749, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 00:03:04');
INSERT INTO acms_tlog_movement VALUES (750, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:09:55');
INSERT INTO acms_tlog_movement VALUES (751, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:13:27');
INSERT INTO acms_tlog_movement VALUES (752, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:14:45');
INSERT INTO acms_tlog_movement VALUES (753, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:16:03');
INSERT INTO acms_tlog_movement VALUES (754, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:16:59');
INSERT INTO acms_tlog_movement VALUES (755, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:17:37');
INSERT INTO acms_tlog_movement VALUES (756, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:20:03');
INSERT INTO acms_tlog_movement VALUES (757, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:22:13');
INSERT INTO acms_tlog_movement VALUES (758, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:22:34');
INSERT INTO acms_tlog_movement VALUES (759, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:24:36');
INSERT INTO acms_tlog_movement VALUES (760, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:26:10');
INSERT INTO acms_tlog_movement VALUES (761, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:26:27');
INSERT INTO acms_tlog_movement VALUES (762, 1, 2, '7', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '', '2017-08-22 01:27:19');
INSERT INTO acms_tlog_movement VALUES (763, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:27:19');
INSERT INTO acms_tlog_movement VALUES (764, 1, 2, '7', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '', '2017-08-22 01:27:49');
INSERT INTO acms_tlog_movement VALUES (765, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:27:49');
INSERT INTO acms_tlog_movement VALUES (766, 1, 2, '7', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '', '2017-08-22 01:28:04');
INSERT INTO acms_tlog_movement VALUES (767, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 01:28:04');
INSERT INTO acms_tlog_movement VALUES (768, 1, 3, '4', 'Listado', '', '2017-08-22 01:35:40');
INSERT INTO acms_tlog_movement VALUES (769, 1, 3, '4', 'Listado', '', '2017-08-22 01:45:28');
INSERT INTO acms_tlog_movement VALUES (770, 1, 3, '4', 'Listado', '', '2017-08-22 01:45:34');
INSERT INTO acms_tlog_movement VALUES (771, 1, 3, '4', 'Listado', '', '2017-08-22 01:45:47');
INSERT INTO acms_tlog_movement VALUES (772, 1, 3, '4', 'Consultar', '{CÃ³digo:''32''}', '2017-08-22 03:19:38');
INSERT INTO acms_tlog_movement VALUES (773, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''32'',Modulo:''21'',Nombre:''Personalizar'',URL:'''',Icono:''709'',Color de letra:''F5F5F5''}', '2017-08-22 03:20:09');
INSERT INTO acms_tlog_movement VALUES (774, 1, 3, '4', 'Consultar', '{CÃ³digo:''32''}', '2017-08-22 03:20:09');
INSERT INTO acms_tlog_movement VALUES (775, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''32'',Modulo:''21'',Nombre:''Personalizar'',URL:'''',Icono:''709'',Color de letra:''F5F5F5''}', '2017-08-22 03:20:22');
INSERT INTO acms_tlog_movement VALUES (776, 1, 3, '4', 'Consultar', '{CÃ³digo:''32''}', '2017-08-22 03:20:23');
INSERT INTO acms_tlog_movement VALUES (777, 1, 3, '7', 'Listado', '', '2017-08-22 03:20:25');
INSERT INTO acms_tlog_movement VALUES (778, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 03:20:29');
INSERT INTO acms_tlog_movement VALUES (779, 1, 2, '7', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '', '2017-08-22 03:20:42');
INSERT INTO acms_tlog_movement VALUES (780, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 03:20:43');
INSERT INTO acms_tlog_movement VALUES (781, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 03:20:49');
INSERT INTO acms_tlog_movement VALUES (782, 1, 3, '24', 'Listado', '', '2017-08-22 03:20:54');
INSERT INTO acms_tlog_movement VALUES (783, 1, 3, '5', 'Listado', '', '2017-08-22 03:21:02');
INSERT INTO acms_tlog_movement VALUES (784, 1, 3, '5', 'Listado', '', '2017-08-22 12:14:52');
INSERT INTO acms_tlog_movement VALUES (785, 1, 3, '5', 'Listado', '', '2017-08-22 12:46:55');
INSERT INTO acms_tlog_movement VALUES (786, 1, 3, '24', 'Listado', '', '2017-08-22 12:55:32');
INSERT INTO acms_tlog_movement VALUES (787, 1, 3, '22', 'Listado', '', '2017-08-22 14:24:23');
INSERT INTO acms_tlog_movement VALUES (788, 1, 3, '22', 'Listado', '', '2017-08-22 18:45:06');
INSERT INTO acms_tlog_movement VALUES (789, 1, 3, '3', 'Listado', '', '2017-08-22 18:46:43');
INSERT INTO acms_tlog_movement VALUES (790, 1, 3, '3', 'Listado', '', '2017-08-22 18:47:29');
INSERT INTO acms_tlog_movement VALUES (791, 1, 3, '4', 'Listado', '', '2017-08-22 18:47:46');
INSERT INTO acms_tlog_movement VALUES (792, 1, 3, '2', 'Listado', '', '2017-08-22 18:51:29');
INSERT INTO acms_tlog_movement VALUES (793, 1, 3, '24', 'Listado', '', '2017-08-22 21:36:37');
INSERT INTO acms_tlog_movement VALUES (794, 1, 3, '2', 'Listado', '', '2017-08-22 22:01:00');
INSERT INTO acms_tlog_movement VALUES (795, 1, 3, '2', 'Listado', '', '2017-08-22 22:04:37');
INSERT INTO acms_tlog_movement VALUES (796, 1, 3, '4', 'Listado', '', '2017-08-22 22:37:39');
INSERT INTO acms_tlog_movement VALUES (797, 1, 1, '4', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',Modulo:''32'',Nombre:''Slider'',URL:''slider'',Icono:''327'',Color de letra:''F5F5F5''}', '2017-08-22 22:40:12');
INSERT INTO acms_tlog_movement VALUES (798, 1, 1, '4', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',Modulo:''32'',Nombre:''Servicios'',URL:''services_home'',Icono:''851'',Color de letra:''F5F5F5''}', '2017-08-22 22:40:57');
INSERT INTO acms_tlog_movement VALUES (799, 1, 3, '7', 'Listado', '', '2017-08-22 22:41:01');
INSERT INTO acms_tlog_movement VALUES (800, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 22:41:05');
INSERT INTO acms_tlog_movement VALUES (801, 1, 2, '7', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '', '2017-08-22 22:41:20');
INSERT INTO acms_tlog_movement VALUES (802, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-22 22:41:20');
INSERT INTO acms_tlog_movement VALUES (803, 1, 3, '2', 'Listado', '', '2017-08-22 22:42:46');
INSERT INTO acms_tlog_movement VALUES (804, 1, 3, '2', 'Listado', '', '2017-08-22 22:43:01');
INSERT INTO acms_tlog_movement VALUES (805, 1, 3, '2', 'Listado', '', '2017-08-22 22:43:24');
INSERT INTO acms_tlog_movement VALUES (806, 1, 3, '22', 'Listado', '', '2017-08-23 12:05:43');
INSERT INTO acms_tlog_movement VALUES (807, 1, 3, '22', 'Consultar', '{CÃ³digo:''1''}', '2017-08-23 12:05:49');
INSERT INTO acms_tlog_movement VALUES (808, 1, 3, '2', 'Listado', '', '2017-08-23 12:06:25');
INSERT INTO acms_tlog_movement VALUES (809, 1, 1, '2', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',slider_name:''''}', '2017-08-23 12:13:25');
INSERT INTO acms_tlog_movement VALUES (810, 1, 3, '2', 'Listado', '', '2017-08-23 12:13:44');
INSERT INTO acms_tlog_movement VALUES (811, 1, 1, '2', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',slider_name:''''}', '2017-08-23 12:14:35');
INSERT INTO acms_tlog_movement VALUES (812, 1, 1, '2', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',slider_name:''''}', '2017-08-23 12:14:36');
INSERT INTO acms_tlog_movement VALUES (813, 1, 1, '2', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',slider_name:''Primer slider''}', '2017-08-23 15:04:04');
INSERT INTO acms_tlog_movement VALUES (814, 1, 1, '2', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',slider_name:''hola mundo''}', '2017-08-23 15:06:36');
INSERT INTO acms_tlog_movement VALUES (815, 1, 1, '2', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',slider_name:''primer slider''}', '2017-08-23 15:15:32');
INSERT INTO acms_tlog_movement VALUES (816, 1, 3, '2', 'Listado', '', '2017-08-23 15:16:31');
INSERT INTO acms_tlog_movement VALUES (817, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:16:43');
INSERT INTO acms_tlog_movement VALUES (818, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:25:11');
INSERT INTO acms_tlog_movement VALUES (819, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:25:33');
INSERT INTO acms_tlog_movement VALUES (820, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:25:47');
INSERT INTO acms_tlog_movement VALUES (821, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:25:52');
INSERT INTO acms_tlog_movement VALUES (822, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:25:57');
INSERT INTO acms_tlog_movement VALUES (823, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:26:01');
INSERT INTO acms_tlog_movement VALUES (824, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:26:06');
INSERT INTO acms_tlog_movement VALUES (825, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:28:13');
INSERT INTO acms_tlog_movement VALUES (826, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:30:19');
INSERT INTO acms_tlog_movement VALUES (827, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:33:28');
INSERT INTO acms_tlog_movement VALUES (828, 1, 3, '2', 'Consultar', '{CÃ³digo:''uploads''}', '2017-08-23 15:33:28');
INSERT INTO acms_tlog_movement VALUES (829, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:34:02');
INSERT INTO acms_tlog_movement VALUES (830, 1, 3, '2', 'Consultar', '{CÃ³digo:''<''}', '2017-08-23 15:34:02');
INSERT INTO acms_tlog_movement VALUES (831, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:34:10');
INSERT INTO acms_tlog_movement VALUES (832, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:34:13');
INSERT INTO acms_tlog_movement VALUES (833, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:35:27');
INSERT INTO acms_tlog_movement VALUES (834, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:56:21');
INSERT INTO acms_tlog_movement VALUES (835, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:56:38');
INSERT INTO acms_tlog_movement VALUES (836, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:56:49');
INSERT INTO acms_tlog_movement VALUES (837, 1, 3, '2', 'Consultar', '{CÃ³digo:''16''}', '2017-08-23 15:56:55');
INSERT INTO acms_tlog_movement VALUES (838, 1, 3, '2', 'Listado', '', '2017-08-23 15:57:12');
INSERT INTO acms_tlog_movement VALUES (839, 1, 3, '2', 'Listado', '', '2017-08-23 15:58:44');
INSERT INTO acms_tlog_movement VALUES (840, 1, 3, '2', 'Listado', '', '2017-08-23 16:00:24');
INSERT INTO acms_tlog_movement VALUES (841, 1, 1, '2', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',slider_name:''nuevoasd''}', '2017-08-23 16:01:12');
INSERT INTO acms_tlog_movement VALUES (842, 1, 3, '2', 'Listado', '', '2017-08-23 16:01:16');
INSERT INTO acms_tlog_movement VALUES (843, 1, 3, '7', 'Listado', '', '2017-08-23 16:01:37');
INSERT INTO acms_tlog_movement VALUES (844, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-23 16:01:40');
INSERT INTO acms_tlog_movement VALUES (845, 1, 3, '4', 'Listado', '', '2017-08-23 16:01:45');
INSERT INTO acms_tlog_movement VALUES (846, 1, 3, '4', 'Consultar', '{CÃ³digo:''34''}', '2017-08-23 16:01:47');
INSERT INTO acms_tlog_movement VALUES (847, 1, 3, '4', 'Listado', '', '2017-08-23 16:01:50');
INSERT INTO acms_tlog_movement VALUES (848, 1, 3, '4', 'Consultar', '{CÃ³digo:''33''}', '2017-08-23 16:01:53');
INSERT INTO acms_tlog_movement VALUES (849, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''33'',Modulo:''32'',Nombre:''Slider'',URL:''slider'',Icono:''327'',Color de letra:''F5F5F5''}', '2017-08-23 16:02:04');
INSERT INTO acms_tlog_movement VALUES (850, 1, 3, '4', 'Consultar', '{CÃ³digo:''33''}', '2017-08-23 16:02:04');
INSERT INTO acms_tlog_movement VALUES (851, 1, 3, '2', 'Listado', '', '2017-08-23 16:02:12');
INSERT INTO acms_tlog_movement VALUES (852, 1, 3, '7', 'Listado', '', '2017-08-23 16:02:31');
INSERT INTO acms_tlog_movement VALUES (853, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-23 16:02:35');
INSERT INTO acms_tlog_movement VALUES (854, 1, 2, '7', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '', '2017-08-23 16:03:03');
INSERT INTO acms_tlog_movement VALUES (855, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-23 16:03:03');
INSERT INTO acms_tlog_movement VALUES (856, 1, 3, '2', 'Listado', '', '2017-08-23 16:03:10');
INSERT INTO acms_tlog_movement VALUES (857, 1, 3, '4', 'Listado', '', '2017-08-23 16:03:21');
INSERT INTO acms_tlog_movement VALUES (858, 1, 3, '4', 'Consultar', '{CÃ³digo:''33''}', '2017-08-23 16:03:24');
INSERT INTO acms_tlog_movement VALUES (859, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''33'',Modulo:''32'',Nombre:''Slider'',URL:''slider'',Icono:''327'',Color de letra:''F5F5F5''}', '2017-08-23 16:03:28');
INSERT INTO acms_tlog_movement VALUES (860, 1, 3, '4', 'Consultar', '{CÃ³digo:''33''}', '2017-08-23 16:03:28');
INSERT INTO acms_tlog_movement VALUES (861, 1, 3, '7', 'Listado', '', '2017-08-23 16:03:46');
INSERT INTO acms_tlog_movement VALUES (862, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-23 16:03:49');
INSERT INTO acms_tlog_movement VALUES (863, 1, 2, '7', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '', '2017-08-23 16:04:02');
INSERT INTO acms_tlog_movement VALUES (864, 1, 3, '7', 'Consultar', '{CÃ³digo:''1''}', '2017-08-23 16:04:02');
INSERT INTO acms_tlog_movement VALUES (865, 1, 3, '2', 'Listado', '', '2017-08-23 16:04:09');
INSERT INTO acms_tlog_movement VALUES (866, 1, 5, '2', 'toastr.info(''Registro desactivado con exito'','''',{progressBar:true})', '{CÃ³digo:''17''}', '2017-08-23 16:04:11');
INSERT INTO acms_tlog_movement VALUES (867, 1, 3, '2', 'Listado', '', '2017-08-23 16:04:11');
INSERT INTO acms_tlog_movement VALUES (868, 1, 4, '2', 'toastr.info(''Registro activado con exito'','''',{progressBar:true})', '{CÃ³digo:''17''}', '2017-08-23 16:04:13');
INSERT INTO acms_tlog_movement VALUES (869, 1, 3, '2', 'Listado', '', '2017-08-23 16:04:13');
INSERT INTO acms_tlog_movement VALUES (870, 1, 3, '2', 'Listado', '', '2017-08-23 16:04:39');
INSERT INTO acms_tlog_movement VALUES (871, 1, 5, '2', 'toastr.info(''Registro desactivado con exito'','''',{progressBar:true})', '{CÃ³digo:''17''}', '2017-08-23 16:04:42');
INSERT INTO acms_tlog_movement VALUES (872, 1, 3, '2', 'Listado', '', '2017-08-23 16:04:42');
INSERT INTO acms_tlog_movement VALUES (873, 1, 4, '2', 'toastr.info(''Registro activado con exito'','''',{progressBar:true})', '{CÃ³digo:''16''}', '2017-08-23 16:04:45');
INSERT INTO acms_tlog_movement VALUES (874, 1, 3, '2', 'Listado', '', '2017-08-23 16:04:46');
INSERT INTO acms_tlog_movement VALUES (875, 1, 4, '2', 'toastr.info(''Registro activado con exito'','''',{progressBar:true})', '{CÃ³digo:''16''}', '2017-08-23 16:04:53');
INSERT INTO acms_tlog_movement VALUES (876, 1, 3, '2', 'Listado', '', '2017-08-23 16:04:53');
INSERT INTO acms_tlog_movement VALUES (877, 1, 3, '2', 'Listado', '', '2017-08-23 16:05:08');
INSERT INTO acms_tlog_movement VALUES (878, 1, 4, '2', 'toastr.info(''Registro activado con exito'','''',{progressBar:true})', '{CÃ³digo:''16''}', '2017-08-23 16:05:10');
INSERT INTO acms_tlog_movement VALUES (879, 1, 3, '2', 'Listado', '', '2017-08-23 16:05:10');
INSERT INTO acms_tlog_movement VALUES (880, 1, 3, '2', 'Listado', '', '2017-08-23 16:05:28');
INSERT INTO acms_tlog_movement VALUES (881, 1, 4, '2', 'toastr.info(''Registro activado con exito'','''',{progressBar:true})', '{CÃ³digo:''17''}', '2017-08-23 16:05:31');
INSERT INTO acms_tlog_movement VALUES (882, 1, 3, '2', 'Listado', '', '2017-08-23 16:05:32');
INSERT INTO acms_tlog_movement VALUES (883, 1, 4, '2', 'toastr.info(''Registro activado con exito'','''',{progressBar:true})', '{CÃ³digo:''16''}', '2017-08-23 16:05:34');
INSERT INTO acms_tlog_movement VALUES (884, 1, 3, '2', 'Listado', '', '2017-08-23 16:05:34');
INSERT INTO acms_tlog_movement VALUES (885, 1, 7, '2', 'toastr.info(''Registro eliminado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''16''}', '2017-08-23 16:05:45');
INSERT INTO acms_tlog_movement VALUES (886, 1, 3, '2', 'Listado', '', '2017-08-23 16:05:45');
INSERT INTO acms_tlog_movement VALUES (887, 1, 4, '2', 'toastr.info(''Registro activado con exito'','''',{progressBar:true})', '{CÃ³digo:''17''}', '2017-08-23 16:05:47');
INSERT INTO acms_tlog_movement VALUES (888, 1, 3, '2', 'Listado', '', '2017-08-23 16:05:48');
INSERT INTO acms_tlog_movement VALUES (889, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 16:05:54');
INSERT INTO acms_tlog_movement VALUES (890, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 16:06:46');
INSERT INTO acms_tlog_movement VALUES (891, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 16:07:30');
INSERT INTO acms_tlog_movement VALUES (892, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 16:07:55');
INSERT INTO acms_tlog_movement VALUES (893, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 16:08:36');
INSERT INTO acms_tlog_movement VALUES (894, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 16:09:22');
INSERT INTO acms_tlog_movement VALUES (895, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 16:10:23');
INSERT INTO acms_tlog_movement VALUES (896, 1, 3, '2', 'Listado', '', '2017-08-23 16:10:29');
INSERT INTO acms_tlog_movement VALUES (897, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 16:10:32');
INSERT INTO acms_tlog_movement VALUES (898, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 16:11:05');
INSERT INTO acms_tlog_movement VALUES (899, 1, 3, '2', 'Listado', '', '2017-08-23 16:11:13');
INSERT INTO acms_tlog_movement VALUES (900, 1, 5, '2', 'toastr.info(''Registro desactivado con exito'','''',{progressBar:true})', '{CÃ³digo:''17''}', '2017-08-23 16:14:14');
INSERT INTO acms_tlog_movement VALUES (901, 1, 3, '2', 'Listado', '', '2017-08-23 16:14:14');
INSERT INTO acms_tlog_movement VALUES (902, 1, 4, '2', 'toastr.info(''Registro activado con exito'','''',{progressBar:true})', '{CÃ³digo:''17''}', '2017-08-23 16:14:17');
INSERT INTO acms_tlog_movement VALUES (903, 1, 3, '2', 'Listado', '', '2017-08-23 16:14:17');
INSERT INTO acms_tlog_movement VALUES (904, 1, 3, '2', 'Listado', '', '2017-08-23 16:14:28');
INSERT INTO acms_tlog_movement VALUES (905, 1, 3, '2', 'Listado', '', '2017-08-23 16:47:07');
INSERT INTO acms_tlog_movement VALUES (906, 1, 3, '2', 'Listado', '', '2017-08-23 16:47:22');
INSERT INTO acms_tlog_movement VALUES (907, 1, 3, '24', 'Listado', '', '2017-08-23 16:47:30');
INSERT INTO acms_tlog_movement VALUES (908, 1, 3, '24', 'Listado', '', '2017-08-23 17:05:48');
INSERT INTO acms_tlog_movement VALUES (909, 1, 3, '2', 'Listado', '', '2017-08-23 19:53:58');
INSERT INTO acms_tlog_movement VALUES (910, 1, 3, '2', 'Listado', '', '2017-08-23 20:00:31');
INSERT INTO acms_tlog_movement VALUES (911, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:02:12');
INSERT INTO acms_tlog_movement VALUES (912, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:03:37');
INSERT INTO acms_tlog_movement VALUES (913, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:04:41');
INSERT INTO acms_tlog_movement VALUES (914, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:08:48');
INSERT INTO acms_tlog_movement VALUES (915, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:09:52');
INSERT INTO acms_tlog_movement VALUES (916, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:10:03');
INSERT INTO acms_tlog_movement VALUES (917, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:12:04');
INSERT INTO acms_tlog_movement VALUES (918, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:12:45');
INSERT INTO acms_tlog_movement VALUES (919, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:15:29');
INSERT INTO acms_tlog_movement VALUES (920, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:15:58');
INSERT INTO acms_tlog_movement VALUES (921, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:16:06');
INSERT INTO acms_tlog_movement VALUES (922, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 20:16:08');
INSERT INTO acms_tlog_movement VALUES (923, 1, 3, '2', 'Listado', '', '2017-08-23 20:16:14');
INSERT INTO acms_tlog_movement VALUES (924, 1, 3, '2', 'Listado', '', '2017-08-23 20:16:28');
INSERT INTO acms_tlog_movement VALUES (925, 1, 3, '2', 'Listado', '', '2017-08-23 20:16:51');
INSERT INTO acms_tlog_movement VALUES (926, 1, 3, '2', 'Listado', '', '2017-08-23 20:40:30');
INSERT INTO acms_tlog_movement VALUES (927, 1, 3, '2', 'Listado', '', '2017-08-23 21:07:45');
INSERT INTO acms_tlog_movement VALUES (928, 1, 3, '2', 'Listado', '', '2017-08-23 21:23:30');
INSERT INTO acms_tlog_movement VALUES (929, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:23:35');
INSERT INTO acms_tlog_movement VALUES (930, 1, 3, '2', 'Listado', '', '2017-08-23 21:23:37');
INSERT INTO acms_tlog_movement VALUES (931, 1, 3, '2', 'Listado', '', '2017-08-23 21:25:36');
INSERT INTO acms_tlog_movement VALUES (932, 1, 3, '2', 'Listado', '', '2017-08-23 21:25:46');
INSERT INTO acms_tlog_movement VALUES (933, 1, 3, '2', 'Listado', '', '2017-08-23 21:36:04');
INSERT INTO acms_tlog_movement VALUES (934, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:36:06');
INSERT INTO acms_tlog_movement VALUES (935, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:36:56');
INSERT INTO acms_tlog_movement VALUES (936, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:37:18');
INSERT INTO acms_tlog_movement VALUES (937, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:38:07');
INSERT INTO acms_tlog_movement VALUES (938, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:38:49');
INSERT INTO acms_tlog_movement VALUES (939, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:39:17');
INSERT INTO acms_tlog_movement VALUES (940, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:41:46');
INSERT INTO acms_tlog_movement VALUES (941, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:43:20');
INSERT INTO acms_tlog_movement VALUES (942, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:44:22');
INSERT INTO acms_tlog_movement VALUES (943, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:44:32');
INSERT INTO acms_tlog_movement VALUES (944, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:45:20');
INSERT INTO acms_tlog_movement VALUES (945, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:45:27');
INSERT INTO acms_tlog_movement VALUES (946, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:45:33');
INSERT INTO acms_tlog_movement VALUES (947, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 21:46:24');
INSERT INTO acms_tlog_movement VALUES (948, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 22:10:39');
INSERT INTO acms_tlog_movement VALUES (949, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 22:28:03');
INSERT INTO acms_tlog_movement VALUES (950, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 22:33:15');
INSERT INTO acms_tlog_movement VALUES (951, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 22:35:22');
INSERT INTO acms_tlog_movement VALUES (952, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 22:36:26');
INSERT INTO acms_tlog_movement VALUES (953, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 22:37:56');
INSERT INTO acms_tlog_movement VALUES (954, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 22:43:34');
INSERT INTO acms_tlog_movement VALUES (955, 1, 3, '2', 'Consultar', '{CÃ³digo:''17''}', '2017-08-23 22:59:30');
INSERT INTO acms_tlog_movement VALUES (956, 1, 3, '4', 'Listado', '', '2017-08-23 23:23:23');
INSERT INTO acms_tlog_movement VALUES (957, 1, 3, '4', 'Consultar', '{CÃ³digo:''34''}', '2017-08-23 23:23:35');
INSERT INTO acms_tlog_movement VALUES (958, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''34'',Modulo:''32'',Nombre:''Servicios'',URL:''serviceshome'',Icono:''851'',Color de letra:''F5F5F5''}', '2017-08-23 23:23:40');
INSERT INTO acms_tlog_movement VALUES (959, 1, 3, '4', 'Consultar', '{CÃ³digo:''34''}', '2017-08-23 23:23:40');
INSERT INTO acms_tlog_movement VALUES (960, 1, 3, '15', 'Listado', '', '2017-08-23 23:23:50');
INSERT INTO acms_tlog_movement VALUES (961, 1, 3, '2', 'Listado', '', '2017-08-23 23:23:52');
INSERT INTO acms_tlog_movement VALUES (962, 1, 3, '2', 'Listado', '', '2017-08-23 23:24:04');
INSERT INTO acms_tlog_movement VALUES (963, 1, 3, '2', 'Listado', '', '2017-08-23 23:24:34');
INSERT INTO acms_tlog_movement VALUES (964, 1, 3, '4', 'Listado', '', '2017-08-23 23:24:43');
INSERT INTO acms_tlog_movement VALUES (965, 1, 3, '4', 'Consultar', '{CÃ³digo:''34''}', '2017-08-23 23:24:49');
INSERT INTO acms_tlog_movement VALUES (966, 1, 2, '4', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''34'',Modulo:''32'',Nombre:''Servicios'',URL:''servicehome'',Icono:''851'',Color de letra:''F5F5F5''}', '2017-08-23 23:24:54');
INSERT INTO acms_tlog_movement VALUES (967, 1, 3, '4', 'Consultar', '{CÃ³digo:''34''}', '2017-08-23 23:24:54');
INSERT INTO acms_tlog_movement VALUES (968, 1, 3, '2', 'Listado', '', '2017-08-23 23:25:00');
INSERT INTO acms_tlog_movement VALUES (969, 1, 3, '2', 'Listado', '', '2017-08-23 23:25:10');
INSERT INTO acms_tlog_movement VALUES (970, 1, 3, '2', 'Listado', '', '2017-08-23 23:25:18');
INSERT INTO acms_tlog_movement VALUES (971, 1, 3, '2', 'Listado', '', '2017-08-23 23:25:23');
INSERT INTO acms_tlog_movement VALUES (972, 1, 3, '2', 'Listado', '', '2017-08-23 23:27:32');
INSERT INTO acms_tlog_movement VALUES (973, 1, 3, '2', 'Listado', '', '2017-08-23 23:43:14');
INSERT INTO acms_tlog_movement VALUES (974, 1, 3, '2', 'Listado', '', '2017-08-23 23:44:01');
INSERT INTO acms_tlog_movement VALUES (975, 1, 3, '2', 'Listado', '', '2017-08-24 00:07:32');
INSERT INTO acms_tlog_movement VALUES (976, 1, 1, '2', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',servicehome_name:''''}', '2017-08-24 00:08:06');
INSERT INTO acms_tlog_movement VALUES (977, 1, 3, '2', 'Listado', '', '2017-08-24 00:08:09');
INSERT INTO acms_tlog_movement VALUES (978, 1, 3, '2', 'Listado', '', '2017-08-24 00:11:43');
INSERT INTO acms_tlog_movement VALUES (979, 1, 3, '2', 'Listado', '', '2017-08-24 00:12:12');
INSERT INTO acms_tlog_movement VALUES (980, 1, 3, '2', 'Listado', '', '2017-08-24 00:13:52');
INSERT INTO acms_tlog_movement VALUES (981, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:14:42');
INSERT INTO acms_tlog_movement VALUES (982, 1, 2, '2', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''1'',servicehome_name:''''}', '2017-08-24 00:14:56');
INSERT INTO acms_tlog_movement VALUES (983, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:14:56');
INSERT INTO acms_tlog_movement VALUES (984, 1, 2, '2', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''1'',servicehome_name:''''}', '2017-08-24 00:15:03');
INSERT INTO acms_tlog_movement VALUES (985, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:15:03');
INSERT INTO acms_tlog_movement VALUES (986, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:17:15');
INSERT INTO acms_tlog_movement VALUES (987, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:18:01');
INSERT INTO acms_tlog_movement VALUES (988, 1, 2, '2', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''1'',servicehome_name:''''}', '2017-08-24 00:18:58');
INSERT INTO acms_tlog_movement VALUES (989, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:18:58');
INSERT INTO acms_tlog_movement VALUES (990, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:19:28');
INSERT INTO acms_tlog_movement VALUES (991, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:21:05');
INSERT INTO acms_tlog_movement VALUES (992, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:21:45');
INSERT INTO acms_tlog_movement VALUES (993, 1, 2, '2', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''1'',servicehome_name:''''}', '2017-08-24 00:21:52');
INSERT INTO acms_tlog_movement VALUES (994, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:21:52');
INSERT INTO acms_tlog_movement VALUES (995, 1, 3, '2', 'Listado', '', '2017-08-24 00:21:57');
INSERT INTO acms_tlog_movement VALUES (996, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:21:59');
INSERT INTO acms_tlog_movement VALUES (997, 1, 2, '2', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''1'',servicehome_name:''''}', '2017-08-24 00:22:07');
INSERT INTO acms_tlog_movement VALUES (998, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:22:08');
INSERT INTO acms_tlog_movement VALUES (999, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:24:22');
INSERT INTO acms_tlog_movement VALUES (1000, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:24:32');
INSERT INTO acms_tlog_movement VALUES (1001, 1, 3, '2', 'Listado', '', '2017-08-24 00:24:36');
INSERT INTO acms_tlog_movement VALUES (1002, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:24:39');
INSERT INTO acms_tlog_movement VALUES (1003, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:25:57');
INSERT INTO acms_tlog_movement VALUES (1004, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:25:59');
INSERT INTO acms_tlog_movement VALUES (1005, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:26:12');
INSERT INTO acms_tlog_movement VALUES (1006, 1, 3, '2', 'Listado', '', '2017-08-24 00:26:16');
INSERT INTO acms_tlog_movement VALUES (1007, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:26:18');
INSERT INTO acms_tlog_movement VALUES (1008, 1, 2, '2', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:''1'',servicehome_name:''''}', '2017-08-24 00:26:24');
INSERT INTO acms_tlog_movement VALUES (1009, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:26:24');
INSERT INTO acms_tlog_movement VALUES (1010, 1, 3, '2', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 00:27:41');
INSERT INTO acms_tlog_movement VALUES (1011, 1, 3, '23', 'Listado', '', '2017-08-24 01:29:32');
INSERT INTO acms_tlog_movement VALUES (1012, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 01:29:34');
INSERT INTO acms_tlog_movement VALUES (1013, 1, 2, '23', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',Url:''mkasda'',Nombre:''asdasd'',Nombre:''asdasd'',page_img:'''',Contenido:''<p>nkasdka</p>''}', '2017-08-24 01:29:40');
INSERT INTO acms_tlog_movement VALUES (1014, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 01:29:41');
INSERT INTO acms_tlog_movement VALUES (1015, 1, 3, '2', 'Listado', '', '2017-08-24 01:29:45');
INSERT INTO acms_tlog_movement VALUES (1016, 1, 3, '2', 'Listado', '', '2017-08-24 01:29:47');
INSERT INTO acms_tlog_movement VALUES (1017, 1, 3, '23', 'Listado', '', '2017-08-24 02:00:05');
INSERT INTO acms_tlog_movement VALUES (1018, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 02:00:08');
INSERT INTO acms_tlog_movement VALUES (1019, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 02:07:08');
INSERT INTO acms_tlog_movement VALUES (1020, 1, 3, '23', 'Listado', '', '2017-08-24 02:10:00');
INSERT INTO acms_tlog_movement VALUES (1021, 1, 3, '23', 'Listado', '', '2017-08-24 02:13:39');
INSERT INTO acms_tlog_movement VALUES (1022, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 02:13:41');
INSERT INTO acms_tlog_movement VALUES (1023, 1, 2, '23', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',Url:''mkasda'',Nombre:''asdasd'',Nombre:''asdasd'',page_img:'''',Contenido:''<p>nkasdka</p>''}', '2017-08-24 02:13:46');
INSERT INTO acms_tlog_movement VALUES (1024, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 02:13:46');
INSERT INTO acms_tlog_movement VALUES (1025, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 02:14:15');
INSERT INTO acms_tlog_movement VALUES (1026, 1, 2, '23', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',Url:''mkasda'',Nombre:''asdasd'',Nombre:''asdasd'',page_img:'''',Contenido:''<p>nkasdka</p>''}', '2017-08-24 02:14:21');
INSERT INTO acms_tlog_movement VALUES (1027, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 02:14:21');
INSERT INTO acms_tlog_movement VALUES (1028, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 02:15:25');
INSERT INTO acms_tlog_movement VALUES (1029, 1, 3, '23', 'Listado', '', '2017-08-24 02:15:32');
INSERT INTO acms_tlog_movement VALUES (1030, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 02:15:35');
INSERT INTO acms_tlog_movement VALUES (1031, 1, 2, '23', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{CÃ³digo:'''',Url:''mkasda'',Nombre:''asdasd'',Nombre:''asdasd'',page_img:'''',Contenido:''<p>nkasdka</p>''}', '2017-08-24 02:15:41');
INSERT INTO acms_tlog_movement VALUES (1032, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 02:15:41');
INSERT INTO acms_tlog_movement VALUES (1033, 1, 3, '23', 'Consultar', '{CÃ³digo:''1''}', '2017-08-24 02:16:05');
INSERT INTO acms_tlog_movement VALUES (1034, 1, 3, '2', 'Listado', '', '2017-08-24 02:16:58');
INSERT INTO acms_tlog_movement VALUES (1035, 1, 3, '3', 'Listado', '', '2017-08-25 22:20:47.268');
INSERT INTO acms_tlog_movement VALUES (1036, 1, 3, '3', 'Listado', '', '2017-08-25 22:27:40.949');
INSERT INTO acms_tlog_movement VALUES (1037, 1, 3, '3', 'Listado', '', '2017-08-25 22:27:52.724');
INSERT INTO acms_tlog_movement VALUES (1038, 1, 3, '3', 'Listado', '', '2017-08-25 22:27:53.872');
INSERT INTO acms_tlog_movement VALUES (1039, 1, 3, '3', 'Listado', '', '2017-08-25 22:27:54.467');
INSERT INTO acms_tlog_movement VALUES (1040, 1, 3, '3', 'Listado', '', '2017-08-25 22:27:55.185');
INSERT INTO acms_tlog_movement VALUES (1041, 1, 3, '3', 'Listado', '', '2017-08-25 22:27:56.018');
INSERT INTO acms_tlog_movement VALUES (1042, 1, 3, '3', 'Listado', '', '2017-08-25 22:27:56.645');
INSERT INTO acms_tlog_movement VALUES (1043, 1, 3, '3', 'Listado', '', '2017-08-25 22:27:58.327');
INSERT INTO acms_tlog_movement VALUES (1044, 1, 3, '3', 'Listado', '', '2017-08-25 22:28:23.45');
INSERT INTO acms_tlog_movement VALUES (1045, 1, 3, '3', 'Listado', '', '2017-08-25 22:28:40.719');
INSERT INTO acms_tlog_movement VALUES (1046, 1, 3, '3', 'Listado', '', '2017-08-25 22:32:29.799');
INSERT INTO acms_tlog_movement VALUES (1047, 1, 3, '3', 'Listado', '', '2017-08-25 22:32:34.248');
INSERT INTO acms_tlog_movement VALUES (1048, 1, 3, '3', 'Listado', '', '2017-08-25 22:32:38.391');
INSERT INTO acms_tlog_movement VALUES (1049, 1, 3, '3', 'Listado', '', '2017-08-25 22:32:46.339');
INSERT INTO acms_tlog_movement VALUES (1050, 1, 3, '3', 'Listado', '', '2017-08-25 22:32:54.272');
INSERT INTO acms_tlog_movement VALUES (1051, 1, 3, '3', 'Listado', '', '2017-08-25 22:33:50.744');
INSERT INTO acms_tlog_movement VALUES (1052, 1, 3, '22', 'Listado', '', '2017-08-25 22:41:44.926');
INSERT INTO acms_tlog_movement VALUES (1053, 1, 3, '2', 'Listado', '', '2017-08-25 22:41:53.493');
INSERT INTO acms_tlog_movement VALUES (1054, 1, 3, '2', 'Listado', '', '2017-08-25 22:42:10.615');
INSERT INTO acms_tlog_movement VALUES (1055, 1, 3, '3', 'Listado', '', '2017-08-25 23:36:07.174');
INSERT INTO acms_tlog_movement VALUES (1056, 1, 3, '3', 'Listado', '', '2017-08-25 23:37:02.562');
INSERT INTO acms_tlog_movement VALUES (1057, 1, 3, '3', 'Listado', '', '2017-08-25 23:38:26.114');
INSERT INTO acms_tlog_movement VALUES (1058, 1, 3, '3', 'Listado', '', '2017-08-25 23:38:27.952');
INSERT INTO acms_tlog_movement VALUES (1059, 1, 3, '3', 'Listado', '', '2017-08-25 23:38:35.396');
INSERT INTO acms_tlog_movement VALUES (1060, 1, 3, '3', 'Listado', '', '2017-08-25 23:38:36.353');
INSERT INTO acms_tlog_movement VALUES (1061, 1, 3, '3', 'Listado', '', '2017-08-25 23:39:06.607');
INSERT INTO acms_tlog_movement VALUES (1062, 1, 3, '3', 'Listado', '', '2017-08-25 23:39:07.604');
INSERT INTO acms_tlog_movement VALUES (1063, 1, 3, '3', 'Listado', '', '2017-08-25 23:39:35.567');
INSERT INTO acms_tlog_movement VALUES (1064, 1, 3, '2', 'Listado', '', '2017-08-25 23:40:05.368');
INSERT INTO acms_tlog_movement VALUES (1065, 1, 1, '2', 'toastr.info(''Registro agregado exitosamente'','''',{progressBar:true})', '{Código:'''',Nombre:''gerente''}', '2017-08-25 23:40:15.759');
INSERT INTO acms_tlog_movement VALUES (1066, 1, 3, '2', 'Listado', '', '2017-08-25 23:40:18.358');
INSERT INTO acms_tlog_movement VALUES (1067, 1, 3, '2', 'Consultar', '{Código:''2''}', '2017-08-25 23:48:06.234');
INSERT INTO acms_tlog_movement VALUES (1068, 1, 3, '2', 'Listado', '', '2017-08-25 23:48:08.979');
INSERT INTO acms_tlog_movement VALUES (1069, 1, 5, '2', 'toastr.info(''Registro desactivado con exito'','''',{progressBar:true})', '{Código:''2''}', '2017-08-25 23:48:11.249');
INSERT INTO acms_tlog_movement VALUES (1070, 1, 3, '2', 'Listado', '', '2017-08-25 23:48:11.3');
INSERT INTO acms_tlog_movement VALUES (1071, 1, 4, '2', 'toastr.info(''Registro activado con exito'','''',{progressBar:true})', '{Código:''2''}', '2017-08-25 23:48:12.737');
INSERT INTO acms_tlog_movement VALUES (1072, 1, 3, '2', 'Listado', '', '2017-08-25 23:48:12.778');
INSERT INTO acms_tlog_movement VALUES (1073, 1, 3, '2', 'Consultar', '{Código:''2''}', '2017-08-25 23:48:14.262');
INSERT INTO acms_tlog_movement VALUES (1074, 1, 3, '14', 'Listado', '', '2017-08-25 23:48:16.257');
INSERT INTO acms_tlog_movement VALUES (1075, 1, 3, '2', 'Listado', '', '2017-08-25 23:48:21.116');
INSERT INTO acms_tlog_movement VALUES (1076, 1, 3, '24', 'Listado', '', '2017-08-25 23:48:50.892');
INSERT INTO acms_tlog_movement VALUES (1077, 1, 3, '24', 'Listado', '', '2017-08-25 23:49:06.04');
INSERT INTO acms_tlog_movement VALUES (1078, 1, 3, '20', 'Listado', '', '2017-08-26 00:04:07.29');
INSERT INTO acms_tlog_movement VALUES (1079, 1, 3, '20', 'Listado', '', '2017-08-26 00:08:54.595');
INSERT INTO acms_tlog_movement VALUES (1080, 1, 3, '20', 'Listado', '', '2017-08-26 00:17:08.111');
INSERT INTO acms_tlog_movement VALUES (1081, 1, 2, '20', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{Nombre corto:''AmeliaCMS'',Nombre largo:''AmeliaCMS '',Correo electronico:''augustoalvarez05@gmail.com'',Descripcion:''Version Beta'',Direccion:''av 36 entre 22 y 23'',Encabezado:'''',Logo de la web (Favicon):''3'',Derechos:''Todos los derechos reservados 2017'',Primer telefono:''04245370954'',Segundo telefono:'''',Tercer telefono:'''',Numero de preguntas y respuestas:''2'',Mostrar login:''1'',Enviar clave a correo:''0'',organization_email_host:''lcoalhost'',organization_email_port:''23'',organization_email_security_smtp:''1'',organization_type_email_security_smtp:'''',organization_email_user:''root'',organization_email_password:''1234'',organization_email_subject:''asda'',organization_email_message:'''',Numero de claves no repetibles:''3'',Numero de respuestas permitidas:''2''}', '2017-08-26 00:19:32.75');
INSERT INTO acms_tlog_movement VALUES (1082, 1, 3, '20', 'Consultar', '', '2017-08-26 00:19:32.823');
INSERT INTO acms_tlog_movement VALUES (1083, 1, 3, '20', 'Consultar', '', '2017-08-26 00:30:47.028');
INSERT INTO acms_tlog_movement VALUES (1084, 1, 2, '20', 'toastr.info(''Registro modificado exitosamente'','''',{progressBar:true})', '{Nombre corto:''AmeliaCMS'',Nombre largo:''AmeliaCMS '',Correo electronico:''augustoalvarez05@gmail.com'',Descripcion:''Version Beta'',Direccion:''av 36 entre 22 y 23'',Encabezado:'''',Logo de la web (Favicon):''3'',Derechos:''Todos los derechos reservados 2017'',Primer telefono:''04245370954'',Segundo telefono:'''',Tercer telefono:'''',Numero de preguntas y respuestas:''2'',Mostrar login:''0'',Enviar clave a correo:''0'',organization_email_host:''lcoalhost'',organization_email_port:''23'',organization_email_security_smtp:''1'',organization_type_email_security_smtp:'''',organization_email_user:''root'',organization_email_password:''1234'',organization_email_subject:''asda'',organization_email_message:'''',Numero de claves no repetibles:''3'',Numero de respuestas permitidas:''2''}', '2017-08-26 00:44:54.634');
INSERT INTO acms_tlog_movement VALUES (1085, 1, 3, '20', 'Consultar', '', '2017-08-26 00:44:54.765');
INSERT INTO acms_tlog_movement VALUES (1086, 1, 3, '2', 'Listado', '', '2017-09-08 23:45:07.485');
INSERT INTO acms_tlog_movement VALUES (1087, 1, 3, '2', 'Listado', '', '2017-09-08 23:47:15.805');


--
-- Name: acms_tlog_movement_idlog_movement_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tlog_movement_idlog_movement_seq', 1087, true);


--
-- Data for Name: acms_tlog_report; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: acms_tlog_report_idlog_report_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tlog_report_idlog_report_seq', 1, false);


--
-- Data for Name: acms_tnationality; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tnationality VALUES (1, 'V', 'Venezolano', '1');


--
-- Name: acms_tnationality_idnationality_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tnationality_idnationality_seq', 1, false);


--
-- Data for Name: acms_tnotice; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: acms_tnotice_idnotice_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tnotice_idnotice_seq', 1, false);


--
-- Data for Name: acms_torganization; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_torganization VALUES ('AmeliaCMS', 'AmeliaCMS ', 'augustoalvarez05@gmail.com', 'Version Beta', 0, 3, 'av 36 entre 22 y 23', 'Todos los derechos reservados 2017', '04245370954', '', '', 2, 0, 0, 'lcoalhost', '23', '1', 'TLS', 'root', '1234', 'asda', '', 3, 2, NULL, NULL);
INSERT INTO acms_torganization VALUES ('AmeliaCMS', 'AmeliaCMS ', 'augustoalvarez05@gmail.com', 'Version Beta', 0, 3, 'av 36 entre 22 y 23', 'Todos los derechos reservados 2017', '04245370954', '', '', 2, 0, 0, 'lcoalhost', '23', '1', 'TLS', 'root', '1234', 'asda', '', 3, 2, NULL, NULL);
INSERT INTO acms_torganization VALUES ('AmeliaCMS', 'AmeliaCMS ', 'augustoalvarez05@gmail.com', 'Version Beta', 0, 3, 'av 36 entre 22 y 23', 'Todos los derechos reservados 2017', '04245370954', '', '', 2, 0, 0, 'lcoalhost', '23', '1', 'TLS', 'root', '1234', 'asda', '', 3, 2, NULL, NULL);
INSERT INTO acms_torganization VALUES ('AmeliaCMS', 'AmeliaCMS ', 'augustoalvarez05@gmail.com', 'Version Beta', 0, 3, 'av 36 entre 22 y 23', 'Todos los derechos reservados 2017', '04245370954', '', '', 2, 0, 0, 'lcoalhost', '23', '1', 'TLS', 'root', '1234', 'asda', '', 3, 2, NULL, NULL);
INSERT INTO acms_torganization VALUES ('AmeliaCMS', 'AmeliaCMS ', 'augustoalvarez05@gmail.com', 'Version Beta', 0, 3, 'av 36 entre 22 y 23', 'Todos los derechos reservados 2017', '04245370954', '', '', 2, 0, 0, 'lcoalhost', '23', '1', 'TLS', 'root', '1234', 'asda', '', 3, 2, NULL, NULL);
INSERT INTO acms_torganization VALUES ('AmeliaCMS', 'AmeliaCMS ', 'augustoalvarez05@gmail.com', 'Version Beta', 0, 3, 'av 36 entre 22 y 23', 'Todos los derechos reservados 2017', '04245370954', '', '', 2, 0, 0, 'lcoalhost', '23', '1', 'TLS', 'root', '1234', 'asda', '', 3, 2, NULL, NULL);


--
-- Data for Name: acms_tpage; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tpage VALUES (1, 'mkasda', '0', 'asdasd', '', 1, '<p>nkasdka</p>', '1', '1');


--
-- Name: acms_tpage_idpage_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tpage_idpage_seq', 1, false);


--
-- Data for Name: acms_tperson; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tperson VALUES (1, 1, 1, 1, '', '00000000', 'Administrador', '', 'Root', '', 'F', 'augustoalvarez05@gmail.com', '2017-08-11', 'asad', 1036, '', '', '', '1');


--
-- Name: acms_tperson_idperson_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tperson_idperson_seq', 1, false);


--
-- Data for Name: acms_tportfolio; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: acms_tportfolio_idportfolio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tportfolio_idportfolio_seq', 1, false);


--
-- Data for Name: acms_tpost; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tpost VALUES (1, 'ameliacms', 'AmeliaCMS', '151559 ', 4, '<p style="text-align: justify;"><span style="color: #000000;">Es una plataforma dise&ntilde;ada para crear aplicaciones web, posee caracter&iacute;sticas relevantes y f&aacute;ciles de utilizar.</span><br /><span style="color: #000000;">Con solo importar la base de datos el usuario esta listo para hacer uso de ella. Adem&aacute;s, posee una curva de aprendizaje alta y permite la escalabilidad ya que esta basado bajo la arquitectura MVC.</span></p>', 1, '2017-08-03', '1');


--
-- Name: acms_tpost_idpost_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tpost_idpost_seq', 1, false);


--
-- Data for Name: acms_tservice; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tservice VALUES (1, 0, 'Seguridad y config.', '', 139, '       ', '1');
INSERT INTO acms_tservice VALUES (2, 1, 'Cargos', 'charge', 591, '       ', '1');
INSERT INTO acms_tservice VALUES (3, 1, 'Acciones', 'action', 108, 'F5F5F5 ', '1');
INSERT INTO acms_tservice VALUES (4, 1, 'Servicios', 'service', 26, '       ', '1');
INSERT INTO acms_tservice VALUES (5, 1, 'Etnias', 'ethnicity', 964, '       ', '1');
INSERT INTO acms_tservice VALUES (6, 1, 'Nacionalidades', 'nationality', 179, '       ', '1');
INSERT INTO acms_tservice VALUES (7, 1, 'Permisos', 'permission', 8, '       ', '1');
INSERT INTO acms_tservice VALUES (8, 1, 'Iconos', 'icon', 8, '       ', '1');
INSERT INTO acms_tservice VALUES (9, 0, 'Localidades', '', 438, '       ', '1');
INSERT INTO acms_tservice VALUES (10, 9, 'Parroquias', 'parish', 327, '       ', '1');
INSERT INTO acms_tservice VALUES (11, 9, 'Municipios', 'municipality', 328, '       ', '1');
INSERT INTO acms_tservice VALUES (12, 9, 'Estados', 'state', 328, '       ', '1');
INSERT INTO acms_tservice VALUES (13, 9, 'Paises', 'country', 328, '       ', '1');
INSERT INTO acms_tservice VALUES (14, 1, 'Personas', 'person', 445, '       ', '1');
INSERT INTO acms_tservice VALUES (15, 1, 'Usuarios', 'user', 445, '       ', '1');
INSERT INTO acms_tservice VALUES (16, 0, 'Reportes', '', 392, '       ', '1');
INSERT INTO acms_tservice VALUES (17, 16, 'Bitacora de acceso', 'log_access', 801, 'F5F5F5 ', '1');
INSERT INTO acms_tservice VALUES (18, 16, 'Bitacora de movimientos', 'log_movement', 803, 'F5F5F5 ', '1');
INSERT INTO acms_tservice VALUES (19, 16, 'Bitacora de reportes', 'log_report', 802, 'F5F5F5 ', '1');
INSERT INTO acms_tservice VALUES (20, 1, 'Organizacion', 'organization', 28, '       ', '1');
INSERT INTO acms_tservice VALUES (22, 21, 'Publicaciones', 'post', 782, '       ', '1');
INSERT INTO acms_tservice VALUES (23, 21, 'Paginas', 'page', 29, 'F5F5F5 ', '1');
INSERT INTO acms_tservice VALUES (24, 32, 'Redes sociales', 'social_network', 848, 'F5F5F5 ', '1');
INSERT INTO acms_tservice VALUES (25, 16, 'Listados', 'list_report', 321, 'F5F5F5 ', '1');
INSERT INTO acms_tservice VALUES (26, 1, 'Configuracion', 'configuration', 124, 'F5F5F5 ', '0');
INSERT INTO acms_tservice VALUES (27, 21, 'Galeria', 'gallery', 327, 'F5F5F5 ', '1');
INSERT INTO acms_tservice VALUES (28, 21, 'Temas', 'theme', 710, 'F5F5F5 ', '1');
INSERT INTO acms_tservice VALUES (31, 1, 'Editor de codigo', 'codeeditor', 550, 'F5F5F5 ', '1');
INSERT INTO acms_tservice VALUES (21, 0, 'Blog', '', 50, '       ', '0');


--
-- Name: acms_tservice_idservice_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tservice_idservice_seq', 1, false);


--
-- Data for Name: acms_tservicehome; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: acms_tservicehome_idservicehome_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tservicehome_idservicehome_seq', 1, false);


--
-- Data for Name: acms_tslider; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: acms_tslider_idslider_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tslider_idslider_seq', 1, false);


--
-- Data for Name: acms_tsocial_network; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: acms_tsocial_network_idsocial_network_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tsocial_network_idsocial_network_seq', 1, false);


--
-- Data for Name: acms_ttheme; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_ttheme VALUES (1, 'Clean Blog', 'blog1', 'clean-blog/', 'img', ' ');
INSERT INTO acms_ttheme VALUES (2, 'Basica', 'Simple tema', 'basica/', 'img', '1');


--
-- Name: acms_ttheme_idtheme_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_ttheme_idtheme_seq', 2, true);


--
-- Data for Name: acms_ttheme_origin; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: acms_ttheme_origin_idtheme_origin_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_ttheme_origin_idtheme_origin_seq', 1, false);


--
-- Data for Name: acms_tuser; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acms_tuser VALUES (1, 1, 'admin', 0, 1, '', '1');


--
-- Name: acms_tuser_iduser_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acms_tuser_iduser_seq', 1, true);


--
-- Name: acms_taction_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_taction
    ADD CONSTRAINT acms_taction_pkey PRIMARY KEY (idaction);


--
-- Name: acms_taddress_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_taddress
    ADD CONSTRAINT acms_taddress_pkey PRIMARY KEY (idaddress);


--
-- Name: acms_tcharge_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tcharge
    ADD CONSTRAINT acms_tcharge_pkey PRIMARY KEY (idcharge);


--
-- Name: acms_tcontact_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tcontact
    ADD CONSTRAINT acms_tcontact_pkey PRIMARY KEY (idcontact);


--
-- Name: acms_tdcharge_service_action_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tdcharge_service_action
    ADD CONSTRAINT acms_tdcharge_service_action_pkey PRIMARY KEY (idcharge_service_action);


--
-- Name: acms_tdpassword_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tdpassword
    ADD CONSTRAINT acms_tdpassword_pkey PRIMARY KEY (idpassword);


--
-- Name: acms_tdquestion_answer_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tdquestion_answer
    ADD CONSTRAINT acms_tdquestion_answer_pkey PRIMARY KEY (idquestion_answer);


--
-- Name: acms_tdservice_action_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tdservice_action
    ADD CONSTRAINT acms_tdservice_action_pkey PRIMARY KEY (idservice_action);


--
-- Name: acms_tdslider_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tdslider
    ADD CONSTRAINT acms_tdslider_pkey PRIMARY KEY (iddslider);


--
-- Name: acms_tduser_service_ordered_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tduser_service_ordered
    ADD CONSTRAINT acms_tduser_service_ordered_pkey PRIMARY KEY (iduser_service_ordered);


--
-- Name: acms_tethnicity_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tethnicity
    ADD CONSTRAINT acms_tethnicity_pkey PRIMARY KEY (idethnicity);


--
-- Name: acms_tgallery_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tgallery
    ADD CONSTRAINT acms_tgallery_pkey PRIMARY KEY (idgallery);


--
-- Name: acms_ticon_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_ticon
    ADD CONSTRAINT acms_ticon_pkey PRIMARY KEY (idicon);


--
-- Name: acms_tlog_access_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tlog_access
    ADD CONSTRAINT acms_tlog_access_pkey PRIMARY KEY (idlog_access);


--
-- Name: acms_tlog_movement_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tlog_movement
    ADD CONSTRAINT acms_tlog_movement_pkey PRIMARY KEY (idlog_movement);


--
-- Name: acms_tlog_report_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tlog_report
    ADD CONSTRAINT acms_tlog_report_pkey PRIMARY KEY (idlog_report);


--
-- Name: acms_tnationality_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tnationality
    ADD CONSTRAINT acms_tnationality_pkey PRIMARY KEY (idnationality);


--
-- Name: acms_tnotice_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tnotice
    ADD CONSTRAINT acms_tnotice_pkey PRIMARY KEY (idnotice);


--
-- Name: acms_tpage_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tpage
    ADD CONSTRAINT acms_tpage_pkey PRIMARY KEY (idpage);


--
-- Name: acms_tperson_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tperson
    ADD CONSTRAINT acms_tperson_pkey PRIMARY KEY (idperson);


--
-- Name: acms_tportfolio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tportfolio
    ADD CONSTRAINT acms_tportfolio_pkey PRIMARY KEY (idportfolio);


--
-- Name: acms_tpost_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tpost
    ADD CONSTRAINT acms_tpost_pkey PRIMARY KEY (idpost);


--
-- Name: acms_tservice_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tservice
    ADD CONSTRAINT acms_tservice_pkey PRIMARY KEY (idservice);


--
-- Name: acms_tservicehome_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tservicehome
    ADD CONSTRAINT acms_tservicehome_pkey PRIMARY KEY (idservicehome);


--
-- Name: acms_tslider_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tslider
    ADD CONSTRAINT acms_tslider_pkey PRIMARY KEY (idslider);


--
-- Name: acms_tsocial_network_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tsocial_network
    ADD CONSTRAINT acms_tsocial_network_pkey PRIMARY KEY (idsocial_network);


--
-- Name: acms_ttheme_origin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_ttheme_origin
    ADD CONSTRAINT acms_ttheme_origin_pkey PRIMARY KEY (idtheme_origin);


--
-- Name: acms_ttheme_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_ttheme
    ADD CONSTRAINT acms_ttheme_pkey PRIMARY KEY (idtheme);


--
-- Name: acms_tuser_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acms_tuser
    ADD CONSTRAINT acms_tuser_pkey PRIMARY KEY (iduser);


--
-- Name: acms_tdcharge_service_action_idcharge_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tdcharge_service_action
    ADD CONSTRAINT acms_tdcharge_service_action_idcharge_fkey FOREIGN KEY (idcharge) REFERENCES acms_tservice(idservice) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: acms_tdservice_action_idservice_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY acms_tdservice_action
    ADD CONSTRAINT acms_tdservice_action_idservice_fkey FOREIGN KEY (idservice) REFERENCES acms_tservice(idservice) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

