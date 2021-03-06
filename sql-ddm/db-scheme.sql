-- Generated by Oracle SQL Developer Data Modeler 3.2.0.735
--   at:        2017-10-10 22:59:04 PDT
--   site:      Oracle Database 11g
--   type:      Oracle Database 11g



CREATE TABLE Provider 
    ( 
     id NUMBER (9)  NOT NULL , 
     code INTEGER , 
     phone VARCHAR2 (15 CHAR) , 
     priority SMALLINT 
    ) 
;



ALTER TABLE Provider 
    ADD CONSTRAINT "Provider PK" PRIMARY KEY ( id ) ;



CREATE TABLE basket 
    ( 
     customer_id NUMBER (9)  NOT NULL , 
     notebook_id NUMBER (9)  NOT NULL , 
     quantity NUMBER (9) , 
     discount NUMBER (9,2) 
    ) 
;



ALTER TABLE basket 
    ADD CONSTRAINT basket__IDX PRIMARY KEY ( customer_id, notebook_id ) ;



CREATE TABLE brand 
    ( 
     id NUMBER (9)  NOT NULL , 
     title VARCHAR2 (255 CHAR)  NOT NULL , 
     country_id NUMBER (9) 
    ) 
;



ALTER TABLE brand 
    ADD CONSTRAINT "Brand PK" PRIMARY KEY ( id ) ;



CREATE TABLE city 
    ( 
     id NUMBER (9)  NOT NULL , 
     title VARCHAR2 (255 CHAR)  NOT NULL , 
     country_id NUMBER (9) 
    ) 
;



ALTER TABLE city 
    ADD CONSTRAINT "City PK" PRIMARY KEY ( id ) ;



CREATE TABLE country 
    ( 
     id NUMBER (9)  NOT NULL , 
     title VARCHAR2 (255 CHAR)  NOT NULL 
    ) 
;



ALTER TABLE country 
    ADD CONSTRAINT "Country PK" PRIMARY KEY ( id ) ;



CREATE TABLE customer 
    ( 
     id NUMBER (9)  NOT NULL , 
     first_name VARCHAR2 (255 CHAR)  NOT NULL , 
     last_name VARCHAR2 (255 CHAR) , 
     email VARCHAR2 (255 CHAR)  NOT NULL , 
     password VARCHAR2 (255 CHAR)  NOT NULL , 
     city_id NUMBER (9) 
    ) 
;



ALTER TABLE customer 
    ADD CONSTRAINT "Notebook PK" PRIMARY KEY ( id ) ;



CREATE TABLE image 
    ( 
     id NUMBER (9)  NOT NULL , 
     link VARCHAR2 (255 CHAR)  NOT NULL , 
     type SMALLINT  NOT NULL , 
     notebook_id NUMBER (9) 
    ) 
;



ALTER TABLE image 
    ADD CONSTRAINT "Image PK" PRIMARY KEY ( id ) ;



CREATE TABLE notebook 
    ( 
     id NUMBER (9)  NOT NULL , 
     title VARCHAR2 (255 CHAR)  NOT NULL , 
     description CLOB , 
     config CLOB , 
     price NUMBER (9,2)  NOT NULL , 
     brand_id NUMBER (9) , 
     provider_id NUMBER (9) 
    ) 
;



ALTER TABLE notebook 
    ADD CONSTRAINT "Notebook PK" PRIMARY KEY ( id ) ;



CREATE TABLE review 
    ( 
     customer_id NUMBER (9)  NOT NULL , 
     notebook_id NUMBER (9)  NOT NULL , 
     mark NUMBER (9) , 
     review CLOB 
    ) 
;



ALTER TABLE review 
    ADD CONSTRAINT review__IDX PRIMARY KEY ( customer_id, notebook_id ) ;




ALTER TABLE basket 
    ADD CONSTRAINT FK_ASS_1 FOREIGN KEY 
    ( 
     customer_id
    ) 
    REFERENCES customer 
    ( 
     id
    ) 
    ON DELETE CASCADE 
;


ALTER TABLE review 
    ADD CONSTRAINT FK_ASS_10 FOREIGN KEY 
    ( 
     notebook_id
    ) 
    REFERENCES notebook 
    ( 
     id
    ) 
    ON DELETE CASCADE 
;


ALTER TABLE basket 
    ADD CONSTRAINT FK_ASS_2 FOREIGN KEY 
    ( 
     notebook_id
    ) 
    REFERENCES notebook 
    ( 
     id
    ) 
    ON DELETE CASCADE 
;


ALTER TABLE review 
    ADD CONSTRAINT FK_ASS_9 FOREIGN KEY 
    ( 
     customer_id
    ) 
    REFERENCES customer 
    ( 
     id
    ) 
    ON DELETE CASCADE 
;


ALTER TABLE notebook 
    ADD CONSTRAINT brand_notebook FOREIGN KEY 
    ( 
     brand_id
    ) 
    REFERENCES brand 
    ( 
     id
    ) 
;


ALTER TABLE customer 
    ADD CONSTRAINT city_costomer FOREIGN KEY 
    ( 
     city_id
    ) 
    REFERENCES city 
    ( 
     id
    ) 
;


ALTER TABLE brand 
    ADD CONSTRAINT country_brand FOREIGN KEY 
    ( 
     country_id
    ) 
    REFERENCES country 
    ( 
     id
    ) 
;


ALTER TABLE city 
    ADD CONSTRAINT country_city FOREIGN KEY 
    ( 
     country_id
    ) 
    REFERENCES country 
    ( 
     id
    ) 
;


ALTER TABLE image 
    ADD CONSTRAINT notebooks_image FOREIGN KEY 
    ( 
     notebook_id
    ) 
    REFERENCES notebook 
    ( 
     id
    ) 
    ON DELETE CASCADE 
;


ALTER TABLE notebook 
    ADD CONSTRAINT provider_notebook FOREIGN KEY 
    ( 
     provider_id
    ) 
    REFERENCES Provider 
    ( 
     id
    ) 
;



-- Oracle SQL Developer Data Modeler Summary Report: 
-- 
-- CREATE TABLE                             9
-- CREATE INDEX                             0
-- ALTER TABLE                             19
-- CREATE VIEW                              0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE STRUCTURED TYPE                   0
-- CREATE COLLECTION TYPE                   0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- ERRORS                                   0
-- WARNINGS                                 0
