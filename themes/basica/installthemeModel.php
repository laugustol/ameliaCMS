<?php
namespace themes\basica;
class installthemeModel{
	private $db;
	public function __construct(){
		$this->db = new \core\ameliaBD;
	}
	public function add(){
		if(DRIVER == "mysql"){
			$this->db->prepare("UPDATE ".PREFIX." SET status='0'; 
				INSERT INTO ".PREFIX."ttheme (name,description,src,img,status) VALUES ('Basica','Simple tema web','basica/','img','1');

				CREATE TABLE ".PREFIX."tportfolio (
				  idportfolio int(11) NOT NULL  PRIMARY KEY AUTO_INCREMENT,
				  title varchar(60) NOT NULL,
				  description varchar(100) NOT NULL,
				  idgallery int(11) NOT NULL,
				  idpage int(1) NOT NULL,
				  status char(1) NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;
				
				CREATE TABLE ".PREFIX."tservicehome (
				  idservicehome int(11) NOT NULL  PRIMARY KEY AUTO_INCREMENT,
				  title varchar(60) CHARACTER SET latin1 NOT NULL,
				  description varchar(100) CHARACTER SET latin1 NOT NULL,
				  idicon int(11) NOT NULL,
				  idgallery int(11) NOT NULL,
				  idpage int(11) NOT NULL,
				  status char(1) CHARACTER SET latin1 NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
				
				CREATE TABLE ".PREFIX."tslider (
				  idslider int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				  name varchar(60) CHARACTER SET latin1 NOT NULL,
				  status char(1) CHARACTER SET latin1 NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

				CREATE TABLE ".PREFIX."tdslider (
				  iddslider int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				  idslider int(11) NOT NULL,
				  idgallery int(11) NOT NULL,
				  title varchar(50) CHARACTER SET latin1 NOT NULL,
				  description text CHARACTER SET latin1 NOT NULL,
				  idpage int(11) NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

				UPDATE ".PREFIX."tservice SET status='1' WHERE url='concact';
    			UPDATE ".PREFIX."tservice SET status='1' WHERE url='social_network';
    			
    			INSERT INTO ".PREFIX."tservice (idfather,name,url,idicon,color,status) (SELECT (SELECT idservice FROM ".PREFIX."tservice WHERE name='Personalizar'),'Slider','slider',327,'F5F5F5','1' FROM ".PREFIX."tservice WHERE NOT EXISTS (SELECT name FROM ".PREFIX."tservice WHERE name='Slider')) LIMIT 1;
    			
    			INSERT INTO ".PREFIX."tservice (idfather,name,url,idicon,color,status) (SELECT (SELECT idservice FROM ".PREFIX."tservice WHERE name='Personalizar'),'Servicios','servicehome',851,'F5F5F5','1' FROM ".PREFIX."tservice WHERE NOT EXISTS (SELECT name FROM ".PREFIX."tservice WHERE url='servicehome')) LIMIT 1;
    			
    			INSERT INTO ".PREFIX."tservice (idfather,name,url,idicon,color,status) (SELECT (SELECT idservice FROM ".PREFIX."tservice WHERE name='Personalizar'),'Portafolio','portfolio',121,'F5F5F5','1' FROM ".PREFIX."tservice WHERE NOT EXISTS (SELECT name FROM ".PREFIX."tservice WHERE url='portfolio')) LIMIT 1;");

		}else if(DRIVER == "pgsql"){
			$this->db->prepare("UPDATE ".PREFIX."ttheme SET status='0';
			UPDATE ".PREFIX."tservice SET status='1' WHERE url='contact';
				INSERT INTO ".PREFIX."ttheme (name,description,src,img,status) VALUES ('Basica','Simple tema web','basica/','img','1');
				CREATE TABLE ".PREFIX."tportfolio (
				    idportfolio integer NOT NULL,
				    title character varying(60),
				    description character varying(100),
				    idgallery integer,
				    idpage integer,
				    status character(1)
				);
				CREATE SEQUENCE ".PREFIX."tportfolio_idportfolio_seq
				    START WITH 1
				    INCREMENT BY 1
				    NO MINVALUE
				    NO MAXVALUE
				    CACHE 1;
				ALTER SEQUENCE ".PREFIX."tportfolio_idportfolio_seq OWNED BY ".PREFIX."tportfolio.idportfolio;
				ALTER TABLE ONLY ".PREFIX."tportfolio ALTER COLUMN idportfolio SET DEFAULT nextval('".PREFIX."tportfolio_idportfolio_seq'::regclass);
				SELECT pg_catalog.setval('".PREFIX."tportfolio_idportfolio_seq', 1, false);
				ALTER TABLE ONLY ".PREFIX."tportfolio
    				ADD CONSTRAINT ".PREFIX."tportfolio_pkey PRIMARY KEY (idportfolio);
    			CREATE TABLE ".PREFIX."tservicehome (
				    idservicehome integer NOT NULL,
				    title character varying(60),
				    description character varying(100),
				    idicon integer,
				    idgallery integer,
				    idpage integer,
				    status character(1)
				);
				CREATE SEQUENCE ".PREFIX."tservicehome_idservicehome_seq
				    START WITH 1
				    INCREMENT BY 1
				    NO MINVALUE
				    NO MAXVALUE
				    CACHE 1;
				ALTER SEQUENCE ".PREFIX."tservicehome_idservicehome_seq OWNED BY ".PREFIX."tservicehome.idservicehome;
				ALTER TABLE ONLY ".PREFIX."tservicehome ALTER COLUMN idservicehome SET DEFAULT nextval('".PREFIX."tservicehome_idservicehome_seq'::regclass);
				SELECT pg_catalog.setval('".PREFIX."tservicehome_idservicehome_seq', 1, false);
				ALTER TABLE ONLY ".PREFIX."tservicehome
    				ADD CONSTRAINT ".PREFIX."tservicehome_pkey PRIMARY KEY (idservicehome);

				CREATE TABLE ".PREFIX."tslider (
				    idslider integer NOT NULL,
				    name character varying(60),
				    status character(1)
				);
				CREATE SEQUENCE ".PREFIX."tslider_idslider_seq
				    START WITH 1
				    INCREMENT BY 1
				    NO MINVALUE
				    NO MAXVALUE
				    CACHE 1;
				ALTER SEQUENCE ".PREFIX."tslider_idslider_seq OWNED BY ".PREFIX."tslider.idslider;
				ALTER TABLE ONLY ".PREFIX."tslider ALTER COLUMN idslider SET DEFAULT nextval('".PREFIX."tslider_idslider_seq'::regclass);
				SELECT pg_catalog.setval('".PREFIX."tslider_idslider_seq', 1, false);
				ALTER TABLE ONLY ".PREFIX."tslider
    				ADD CONSTRAINT ".PREFIX."tslider_pkey PRIMARY KEY (idslider);
    			CREATE TABLE ".PREFIX."tdslider (
				    iddslider integer NOT NULL,
				    idslider integer,
				    idgallery integer,
				    title character varying(50),
				    description text,
				    idpage integer
				);
				CREATE SEQUENCE ".PREFIX."tdslider_iddslider_seq
				    START WITH 1
				    INCREMENT BY 1
				    NO MINVALUE
				    NO MAXVALUE
				    CACHE 1;
				ALTER SEQUENCE ".PREFIX."tdslider_iddslider_seq OWNED BY ".PREFIX."tdslider.iddslider;
				ALTER TABLE ONLY ".PREFIX."tdslider ALTER COLUMN iddslider SET DEFAULT nextval('".PREFIX."tdslider_iddslider_seq'::regclass);
				SELECT pg_catalog.setval('".PREFIX."tdslider_iddslider_seq', 25, false);
				ALTER TABLE ONLY ".PREFIX."tdslider
    				ADD CONSTRAINT ".PREFIX."tdslider_pkey PRIMARY KEY (iddslider);
    			
    			UPDATE ".PREFIX."tservice SET status='1' WHERE url='concact';
    			UPDATE ".PREFIX."tservice SET status='1' WHERE url='social_network';
    			
    			INSERT INTO ".PREFIX."tservice (idfather,name,url,idicon,color,status) (SELECT (SELECT idservice FROM ".PREFIX."tservice WHERE name='Personalizar'),'Slider','slider',327,'F5F5F5','1' FROM ".PREFIX."tservice WHERE NOT EXISTS (SELECT name FROM ".PREFIX."tservice WHERE name='Slider')) LIMIT 1;
    			
    			INSERT INTO ".PREFIX."tservice (idfather,name,url,idicon,color,status) (SELECT (SELECT idservice FROM ".PREFIX."tservice WHERE name='Personalizar'),'Servicios','servicehome',851,'F5F5F5','1' FROM ".PREFIX."tservice WHERE NOT EXISTS (SELECT name FROM ".PREFIX."tservice WHERE url='servicehome')) LIMIT 1;
    			
    			INSERT INTO ".PREFIX."tservice (idfather,name,url,idicon,color,status) (SELECT (SELECT idservice FROM ".PREFIX."tservice WHERE name='Personalizar'),'Portafolio','portfolio',121,'F5F5F5','1' FROM ".PREFIX."tservice WHERE NOT EXISTS (SELECT name FROM ".PREFIX."tservice WHERE url='portfolio')) LIMIT 1;");
		}
		rename('themes/basica/sliderModel.php', 'models/sliderModel.php');
		rename('themes/basica/sliderController.php', 'controllers/sliderController.php');
		rename('themes/basica/slider.php', 'views/slider.php');

		rename('themes/basica/servicehomeModel.php', 'models/servicehomeModel.php');
		rename('themes/basica/servicehomeController.php', 'controllers/servicehomeController.php');
		rename('themes/basica/servicehome.php', 'views/servicehome.php');
		
		rename('themes/basica/portfolioModel.php', 'models/portfolioModel.php');
		rename('themes/basica/portfolioController.php', 'controllers/portfolioController.php');
		rename('themes/basica/portfolio.php', 'views/portfolio.php');
		
		return $this->db->execute();
	}
}
?>