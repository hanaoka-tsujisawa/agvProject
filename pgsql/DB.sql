CREATE TABLESPACE dbspace LOCATION 'C:\Demo\AGVdemo\pgsql';

DROP TABLESPACE dbspace;

CREATE DATABASE mapdata OWNER sample_user TABLESPACE sample_tablespace;